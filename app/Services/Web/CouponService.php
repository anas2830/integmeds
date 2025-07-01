<?php

namespace App\Services\Web;


use App\Models\Cupon;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class CouponService
{
    public function applyCoupon(string $code, float $subtotal)
    {
        if (Session::has('coupon_code')) {
            throw ValidationException::withMessages([
                'coupon_code' => 'A coupon is already applied. Please remove it first.'
            ]);
        }

        $coupon = Cupon::where('code', $code)->first();

        if (!$coupon) {
            throw ValidationException::withMessages(['coupon_code' => 'Invalid coupon code.']);
        }

        if (!$this->isCouponActive($coupon)) {
            throw ValidationException::withMessages(['coupon_code' => 'This coupon is inactive.']);
        }

        if (!$this->isWithinValidDate($coupon)) {
            throw ValidationException::withMessages(['coupon_code' => 'Coupon is not valid at this time.']);
        }

        if (!$this->isEligibleByMinimumPurchase($coupon, $subtotal)) {
            throw ValidationException::withMessages(['coupon_code' => 'Minimum purchase not met.']);
        }

        if ($coupon->usage_limit !== null && $coupon->used >= $coupon->usage_limit) {
            throw ValidationException::withMessages(['coupon_code' => 'Coupon usage limit reached.']);
        }

        $discount = $this->calculateDiscount($coupon->type, $coupon->value, $subtotal);

        $this->storeCouponInSession($coupon, $discount);

        return [
            'coupon_id'     => $coupon->id,
            'coupon_code'   => $coupon->code,
            'coupon_amount' => $discount,
            'coupon_type'   => $coupon->type,
        ];
    }


    public function refreshCouponAndValidate(float $newSubtotal)
    {
        if (!Session::has('coupon_code')) {
            return false;
        }

        $couponCode = Session::get('coupon_code');

        $coupon = Cupon::select('id', 'code', 'type', 'value', 'start_date', 'end_date', 'min_purchase', 'status')
            ->where('code', $couponCode)
            ->first();

        if (
            !$coupon ||
            !$this->isCouponValid($coupon, $newSubtotal) ||
            !$this->isCouponActive($coupon)
        ) {
            $this->removeSessionCoupon();
            return false;
        }

        $discount = $this->calculateDiscount($coupon->type, $coupon->value, $newSubtotal);
        Session::put('coupon_amount', $discount);

        return true;
    }


    protected function removeSessionCoupon(): void
    {
        Session::forget([
            'coupon_id',
            'coupon_code',
            'coupon_amount',
            'coupon_type',
        ]);
    }


    protected function calculateDiscount(string $type, float $value, float $subtotal): float
    {
        return $type === 'percent'
            ? round($subtotal * $value / 100, 2)
            : $value;
    }

    protected function isWithinValidDate(Cupon $coupon)
    {
        $now = now();
        return $now->between($coupon->start_date, $coupon->end_date);
    }

    protected function isEligibleByMinimumPurchase(Cupon $coupon, float $subtotal)
    {
        return $subtotal >= $coupon->min_purchase;
    }

    protected function isCouponValid(Cupon $coupon, float $subtotal)
    {
        return $this->isWithinValidDate($coupon) && $this->isEligibleByMinimumPurchase($coupon, $subtotal);
    }

    protected function isCouponActive(Cupon $coupon)
    {
        return $coupon->status == 1;
    }


    protected function storeCouponInSession($coupon, $discount){
        Session::put([
            'coupon_id'     => $coupon->id,
            'coupon_code'   => $coupon->code,
            'coupon_amount' => $discount,
            'coupon_type'   => $coupon->type,
        ]);
    }

    protected function removeCouponFromSession(){
        Session::forget([
            'coupon_id',
            'coupon_code',
            'coupon_amount',
            'coupon_type',
        ]);
    }

    public function removeCoupon(string $code)
    {
        $couponExist = Cupon::where('code', $code)->exists();

        if (!$couponExist) {
            return false;
        }
        if (Session::get('coupon_code') !== $code) {
            return false;
        }

        $this->removeCouponFromSession();
        return true;
    }
}

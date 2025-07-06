@if(!empty($formattedRates))
<div class="shipping-options-scrollable mt-3">
    @foreach($formattedRates as $index => $rate)
        <div class="form-check border px-5 rounded mb-2 mt-2">
            <input class="form-check-input mt-3 shipping-radio"
                   type="radio"
                   name="courier_service_id"
                   id="courier_service_id_{{ $index }}"
                   value="{{ $rate['courier_service_id'] }}"
                   {{ $index === 0 ? 'checked' : '' }} 
                   data-charge="{{ $rate['total_charge'] }}"
                   >
            <label class="form-check-label d-block w-100 mt-2" for="courier_service_id_{{ $index }}">
                <strong>{{ $rate['courier_name'] }}</strong><br>
                <small>Delivery Time: {{ $rate['delivery_time'] }}</small>
                <small>Total: {{ $rate['currency'] }} {{ $rate['total_charge'] }}</small>
            </label>
        </div>
    @endforeach
</div>
@endif

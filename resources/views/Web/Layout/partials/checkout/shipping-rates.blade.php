@if(!empty($formattedRates))
<div class="shipping-options-scrollable mt-3">
    @foreach($formattedRates as $index => $rate)
        <div class="form-check border px-5 rounded mb-2 mt-2" id="shipping-option-{{ $index }}">
            <input class="form-check-input mt-3 shipping-radio"
                   type="radio"
                   name="courier_service_id"
                   id="courier_service_id_{{ $index }}"
                   value="{{ $rate['courier_service_id'] }}"
                   {{ $index === 0 ? 'checked' : '' }} 
                   data-charge="{{ $rate['total_charge'] }}"
                   >
                <input type="hidden" class="shipping-courier-name" value="{{ $rate['courier_name'] }}">
                <input type="hidden" class="shipping-delivery-time" value="{{ $rate['delivery_time'] }}">
                <input type="hidden" class="shipping-courier-total-charge" value="{{ $rate['total_charge'] }}">
            
            <label class="form-check-label d-block w-100 mt-2" for="courier_service_id_{{ $index }}">
                <strong>{{ $rate['courier_name'] }}</strong><br>
                <small>Delivery Time: {{ $rate['delivery_time'] }}</small>
                <small>Total: {{ $rate['currency'] }} {{ $rate['total_charge'] }}</small>
            </label>
        </div>
    @endforeach
    <!-- Main hidden inputs to be submitted -->
    <input type="hidden" name="selected_courier_name" id="selected_courier_name">
    <input type="hidden" name="selected_delivery_time" id="selected_delivery_time">
    <input type="hidden" name="selected_courier_total_charge" id="selected_courier_total_charge">
</div>
@endif

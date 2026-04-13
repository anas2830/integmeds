<div class="shipping-form-wrap">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="firstName">First Name <span class="required">*</span></label>
            <input type="text" class="form-control @error('shipping.first_name') is-invalid @enderror" maxlength="100" id="firstName" name="shipping[first_name]" required
                value="{{ old('shipping.first_name', $shippingAddress->first_name ?? '') }}">
            @error('shipping.first_name') <small class="invalid-feedback d-block">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="lastName">Last Name <span class="required">*</span></label>
            <input type="text" class="form-control @error('shipping.last_name') is-invalid @enderror" maxlength="100" id="lastName" name="shipping[last_name]" required
                value="{{ old('shipping.last_name', $shippingAddress->last_name ?? '') }}">
            @error('shipping.last_name') <small class="invalid-feedback d-block">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Email <span class="required">*</span></label>
            <input type="email" class="form-control @error('shipping.email') is-invalid @enderror" maxlength="100" name="shipping[email]" required
                value="{{ old('shipping.email', $shippingAddress->email ?? '') }}">
            @error('shipping.email') <small class="invalid-feedback d-block">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Phone <span class="required">*</span></label>
            <input type="text" class="form-control @error('shipping.phone') is-invalid @enderror" maxlength="20" name="shipping[phone]" required
                value="{{ old('shipping.phone', $shippingAddress->phone ?? '') }}">
            @error('shipping.phone') <small class="invalid-feedback d-block">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Country/Region <span class="required">*</span></label>
            <select class="select2 country form-control @error('shipping.country') is-invalid @enderror shipping-country" name="shipping[country]" id="country" required style="width: 100%;">
                <option value="">Please choose your country/region</option>
                @foreach($countries as $country)
                    <option value="{{ $country->iso2 }}"
                        {{ (old('shipping.country', $shippingAddress->country ?? '') === $country->iso2) ? 'selected' : '' }}>
                        {{ $country->name }}
                    </option>
                @endforeach
            </select>
            @error('shipping.country') <small class="invalid-feedback d-block">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="address">Street Address <span class="required">*</span></label>
            <input type="text" class="form-control @error('shipping.address_line1') is-invalid @enderror" maxlength="1000" id="address" name="shipping[address_line1]" required
                value="{{ old('shipping.address_line1', $shippingAddress->address_line1 ?? '') }}">
            @error('shipping.address_line1') <small class="invalid-feedback d-block">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="address2">Apartment, Suite, etc. <span class="text-muted">(Optional)</span></label>
            <input type="text" class="form-control @error('shipping.address_line2') is-invalid @enderror" maxlength="200" id="address2" name="shipping[address_line2]"
                value="{{ old('shipping.address_line2', $shippingAddress->address_line2 ?? '') }}">
            @error('shipping.address_line2') <small class="invalid-feedback d-block">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="city">City <span class="required">*</span></label>
            <input type="text" class="form-control @error('shipping.city') is-invalid @enderror" maxlength="100" id="city" name="shipping[city]" required
                value="{{ old('shipping.city', $shippingAddress->city ?? '') }}">
            @error('shipping.city') <small class="invalid-feedback d-block">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="state">State/Province/Region <span class="required">*</span></label>
            <input type="text" class="form-control @error('shipping.state') is-invalid @enderror" maxlength="100" id="state" name="shipping[state]" required
                value="{{ old('shipping.state', $shippingAddress->state ?? '') }}">
            @error('shipping.state') <small class="invalid-feedback d-block">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="zip">Postal / Zip Code <span class="required">*</span></label>
            <input type="text" class="form-control @error('shipping.postal_code') is-invalid @enderror" maxlength="10" id="zip" name="shipping[postal_code]" required
                value="{{ old('shipping.postal_code', $shippingAddress->postal_code ?? '') }}">
            @error('shipping.postal_code') <small class="invalid-feedback d-block">{{ $message }}</small> @enderror
        </div>
    </div>
</div>

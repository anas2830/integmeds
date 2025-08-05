<div class="shipping-form-wrap">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="firstName">First Name <span class="required">*</span></label>
            <input type="text" class="form-control @error('billing.first_name') is-invalid @enderror" maxlength="100" id="firstName" name="billing[first_name]" required
                value="{{ old('billing.first_name', $billingAddress->first_name ?? '') }}">
            @error('billing.first_name') <small class="invalid-feedback d-block">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="lastName">Last Name <span class="required">*</span></label>
            <input type="text" class="form-control @error('billing.last_name') is-invalid @enderror" maxlength="100" id="lastName" name="billing[last_name]" required
                value="{{ old('billing.last_name', $billingAddress->last_name ?? '') }}">
            @error('billing.last_name') <small class="invalid-feedback d-block">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Email <span class="required">*</span></label>
            <input type="email" class="form-control @error('billing.email') is-invalid @enderror" maxlength="100" name="billing[email]" required
                value="{{ old('billing.email', $billingAddress->email ?? '') }}">
            @error('billing.email') <small class="invalid-feedback d-block">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Phone <span class="required">*</span></label>
            <input type="text" class="form-control @error('billing.phone') is-invalid @enderror" maxlength="20" name="billing[phone]" required
                value="{{ old('billing.phone', $billingAddress->phone ?? '') }}">
            @error('billing.phone') <small class="invalid-feedback d-block">{{ $message }}</small> @enderror
        </div>
        {{-- @dd($billingAddress)
        @dd($countries->take(5), $billingAddress->country) --}}
        <div class="col-md-6 mb-3">
            <label class="form-label">Country/Region <span class="required">*</span></label>
            <select class="select2 country form-control @error('billing.country') is-invalid @enderror" name="billing[country]" id="country" required style="width: 100%;">
                <option value="">Please choose your country/region</option>
                @foreach($countries as $country)
                    <option value="{{ $country->iso2 }}"
                        {{ (old('billing.country', $billingAddress->country ?? '') === $country->iso2) ? 'selected' : '' }}>
                        {{ $country->name }}
                    </option>
                @endforeach
            </select>
            @error('billing.country') <small class="invalid-feedback d-block">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="address">Street Address <span class="required">*</span></label>
            <input type="text" class="form-control @error('billing.address_line1') is-invalid @enderror" maxlength="1000" id="address" name="billing[address_line1]" required
                value="{{ old('billing.address_line1', $billingAddress->address_line1 ?? '') }}">
            @error('billing.address_line1') <small class="invalid-feedback d-block">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="address2">Apartment, Suite, etc. <span class="text-muted">(Optional)</span></label>
            <input type="text" class="form-control @error('billing.address_line2') is-invalid @enderror" maxlength="200" id="address2" name="billing[address_line2]"
                value="{{ old('billing.address_line2', $billingAddress->address_line2 ?? '') }}">
            @error('billing.address_line2') <small class="invalid-feedback d-block">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="city">City <span class="required">*</span></label>
            <input type="text" class="form-control @error('billing.city') is-invalid @enderror" maxlength="100" id="city" name="billing[city]" required
                value="{{ old('billing.city', $billingAddress->city ?? '') }}">
            @error('billing.city') <small class="invalid-feedback d-block">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="state">State/Province/Region <span class="required">*</span></label>
            <input type="text" class="form-control @error('billing.state') is-invalid @enderror" maxlength="100" id="state" name="billing[state]" required
                value="{{ old('billing.state', $billingAddress->state ?? '') }}">
            @error('billing.state') <small class="invalid-feedback d-block">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="zip">Postal / Zip Code <span class="required">*</span></label>
            <input type="text" class="form-control @error('billing.postal_code') is-invalid @enderror" maxlength="10" id="zip" name="billing[postal_code]" required
                value="{{ old('billing.postal_code', $billingAddress->postal_code ?? '') }}">
            @error('billing.postal_code') <small class="invalid-feedback d-block">{{ $message }}</small> @enderror
        </div>
    </div>
</div>

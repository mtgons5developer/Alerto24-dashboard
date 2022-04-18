
<div class="form-group">
    <div class="col-md-10">
        <label for="name">Name</label>


            @if(' required="true"'===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" type="text" id="name" value="{{ old('name', optional($user)->name) }}" minlength="1" maxlength="255" data=" required="true""  placeholder="Enter name here...">

            {!! $errors->first('name', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="is_admin">Is Admin</label>


            <div class="checkbox">
            <label for="is_admin_1">
            	<input id="is_admin_1" class="" name="is_admin" type="checkbox" value="1" {{ old('is_admin', optional($user)->is_admin) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

            {!! $errors->first('is_admin', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="email">Email</label>


            @if(' required="true"'===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" type="text" id="email" value="{{ old('email', optional($user)->email) }}" minlength="1" maxlength="255" data=" required="true""  placeholder="Enter email here...">

            {!! $errors->first('email', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="email_verified_at">Email Verified At</label>


        <input class="form-control  {{ $errors->has('email_verified_at') ? 'is-invalid' : '' }}" name="email_verified_at" type="date" id="email_verified_at" value="{{ old('email_verified_at', optional($user)->email_verified_at) }}" data=""  placeholder="Enter email verified at here...">

            {!! $errors->first('email_verified_at', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="password">Password</label>


            @if(' required="true"'===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" type="text" id="password"  placeholder="Enter password here...">

            {!! $errors->first('password', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="user_type">User Type</label>


        <select class="form-control" id="user_type" name="user_type">
            <option value="" {{ old('user_type', optional($user)->user_type ?: '') == '' ? 'selected' : '' }}  selected>Select User Type</option>
            @foreach (['user','admin','master'] as  $user_type)
                <option value="{{ $user_type }}" {{ old('user_type', optional($user_type)->user_type) == $user_type ? 'selected' : '' }}>
                    {{ $user_type }}
                </option>
            @endforeach
        </select>

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="street_address">Street Address</label>


            <textarea class="form-control" name="street_address" cols="50" rows="10" id="street_address" placeholder="Enter street address here...">{{ old('street_address', optional($user)->street_address) }}</textarea>
            {!! $errors->first('street_address', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="province_id">Province</label>


            <select class="form-control" id="province_id" name="province_id">
        	    <option value="" style="display: none;" {{ old('province_id', optional($user)->province_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select province</option>
        	@foreach ($provinces as $key => $province)
			    <option value="{{ $key }}" {{ old('province_id', optional($user)->province_id) == $key ? 'selected' : '' }}>
			    	{{ $province }}
			    </option>
			@endforeach
        </select>

            {!! $errors->first('province_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="city_id">City</label>


            <select class="form-control" id="city_id" name="city_id">
        	    <option value="" style="display: none;" {{ old('city_id', optional($user)->city_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select city</option>
        	@foreach ($cities as $key => $city)
			    <option value="{{ $key }}" {{ old('city_id', optional($user)->city_id) == $key ? 'selected' : '' }}>
			    	{{ $city }}
			    </option>
			@endforeach
        </select>

            {!! $errors->first('city_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="barangay_id">Barangay</label>


            <select class="form-control" id="barangay_id" name="barangay_id">
        	    <option value="" style="display: none;" {{ old('barangay_id', optional($user)->barangay_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select barangay</option>
        	@foreach ($barangays as $key => $barangay)
			    <option value="{{ $key }}" {{ old('barangay_id', optional($user)->barangay_id) == $key ? 'selected' : '' }}>
			    	{{ $barangay }}
			    </option>
			@endforeach
        </select>

            {!! $errors->first('barangay_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="region_id">Region</label>


            <select class="form-control" id="region_id" name="region_id">
        	    <option value="" style="display: none;" {{ old('region_id', optional($user)->region_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select region</option>
        	@foreach ($regions as $key => $region)
			    <option value="{{ $key }}" {{ old('region_id', optional($user)->region_id) == $key ? 'selected' : '' }}>
			    	{{ $region }}
			    </option>
			@endforeach
        </select>

            {!! $errors->first('region_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="contact_number">Contact Number</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('contact_number') ? 'is-invalid' : '' }}" name="contact_number" type="text" id="contact_number" value="{{ old('contact_number', optional($user)->contact_number) }}"   placeholder="Enter contact number here...">

            {!! $errors->first('contact_number', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="is_active">Is Active</label>


            <div class="checkbox">
            <label for="is_active_1">
            	<input id="is_active_1" class="" name="is_active" type="checkbox" value="1" {{ old('is_active', optional($user)->is_active) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

            {!! $errors->first('is_active', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="service_category_id">Service Category</label>


            <select class="form-control" id="service_category_id" name="service_category_id">
        	    <option value="" style="display: none;" {{ old('service_category_id', optional($user)->service_category_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select service category</option>
        	@foreach ($serviceCategories as $key => $serviceCategory)
			    <option value="{{ $key }}" {{ old('service_category_id', optional($user)->service_category_id) == $key ? 'selected' : '' }}>
			    	{{ $serviceCategory }}
			    </option>
			@endforeach
        </select>

            {!! $errors->first('service_category_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>


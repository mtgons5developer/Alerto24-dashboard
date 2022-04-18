
<div class="form-group">
    <div class="col-md-10">
        <label for="name">Name</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" type="text" id="name" value="{{ old('name', optional($barangay)->name) }}" minlength="1" maxlength="255" data=""  placeholder="Enter name here...">

            {!! $errors->first('name', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="code">Code</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('code') ? 'is-invalid' : '' }}" name="code" type="text" id="code" value="{{ old('code', optional($barangay)->code) }}" minlength="1" data=""  placeholder="Enter code here...">

            {!! $errors->first('code', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="city_code">City Code</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('city_code') ? 'is-invalid' : '' }}" name="city_code" type="text" id="city_code" value="{{ old('city_code', optional($barangay)->city_code) }}" minlength="1" data=""  placeholder="Enter city code here...">

            {!! $errors->first('city_code', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="province_code">Province Code</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('province_code') ? 'is-invalid' : '' }}" name="province_code" type="text" id="province_code" value="{{ old('province_code', optional($barangay)->province_code) }}" minlength="1" data=""  placeholder="Enter province code here...">

            {!! $errors->first('province_code', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="region_code">Region Code</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('region_code') ? 'is-invalid' : '' }}" name="region_code" type="text" id="region_code" value="{{ old('region_code', optional($barangay)->region_code) }}" minlength="1" data=""  placeholder="Enter region code here...">

            {!! $errors->first('region_code', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>


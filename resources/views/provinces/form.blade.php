
<div class="form-group">
    <div class="col-md-10">
        <label for="name">Name</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" type="text" id="name" value="{{ old('name', optional($province)->name) }}" minlength="1" maxlength="255" data=""  placeholder="Enter name here...">

            {!! $errors->first('name', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="code">Code</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('code') ? 'is-invalid' : '' }}" name="code" type="text" id="code" value="{{ old('code', optional($province)->code) }}" minlength="1" data=""  placeholder="Enter code here...">

            {!! $errors->first('code', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="psgc_code">Psgc Code</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('psgc_code') ? 'is-invalid' : '' }}" name="psgc_code" type="text" id="psgc_code" value="{{ old('psgc_code', optional($province)->psgc_code) }}" minlength="1" data=""  placeholder="Enter psgc code here...">

            {!! $errors->first('psgc_code', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="region_code">Region Code</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('region_code') ? 'is-invalid' : '' }}" name="region_code" type="text" id="region_code" value="{{ old('region_code', optional($province)->region_code) }}" minlength="1" data=""  placeholder="Enter region code here...">

            {!! $errors->first('region_code', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>


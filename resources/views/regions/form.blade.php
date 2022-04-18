
<div class="form-group">
    <div class="col-md-10">
        <label for="name">Name</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" type="text" id="name" value="{{ old('name', optional($region)->name) }}" minlength="1" maxlength="255" data=""  placeholder="Enter name here...">

            {!! $errors->first('name', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="code">Code</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('code') ? 'is-invalid' : '' }}" name="code" type="text" id="code" value="{{ old('code', optional($region)->code) }}" minlength="1" data=""  placeholder="Enter code here...">

            {!! $errors->first('code', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="psgc_code">Psgc Code</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('psgc_code') ? 'is-invalid' : '' }}" name="psgc_code" type="text" id="psgc_code" value="{{ old('psgc_code', optional($region)->psgc_code) }}" minlength="1" data=""  placeholder="Enter psgc code here...">

            {!! $errors->first('psgc_code', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>


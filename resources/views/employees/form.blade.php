
<div class="row mb-3">
    <label for="first_name" class="col-md-4 col-form-label text-md-end">First Name</label>
    <div class="col-md-6">
        <input id="first_name" value="{{ old('first_name', $employee->first_name??'') }}" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" placeholder="Enter employee first name." autofocus="">
        @error('first_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="last_name" class="col-md-4 col-form-label text-md-end">Last Name</label>
    <div class="col-md-6">
        <input id="last_name" value="{{ old('last_name', $employee->last_name??'') }}" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" placeholder="Enter employee last name." autofocus="">
        @error('last_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="company_id" class="col-md-4 col-form-label text-md-end">Company</label>
    <div class="col-md-6">
        <select name="company_id" id="company_id" class="form-control @error('company_id') is-invalid @enderror">
            <option value="" disabled selected>--Select company--</option>
            @foreach($companies as $company)
                <option value="{{ $company->id }}" {{ old('company_id', $employee->company_id ?? '') == $company->id ? 'selected' :'' }}>{{ $company->name }}</option>
            @endforeach
        </select>
        @error('company_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>
    <div class="col-md-6">
        <input id="email" value="{{ old('email', $employee->email??'') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter employee email" autocomplete="email" autofocus="">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>



<div class="row mb-3">
    <label for="phone" class="col-md-4 col-form-label text-md-end">Phone</label>
    <div class="col-md-6">
        <input id="phone" value="{{ old('phone', $employee->phone??'') }}" type="text" max="15" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Enter employee phone" autocomplete="url" autofocus="">
        @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-0">
    <div class="col-md-8 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __(isset($employee) ? 'Update': 'Create') }}
        </button>
    </div>
</div>


<div class="row mb-3">
    <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
    <div class="col-md-6">
        <input id="name" value="{{ old('name', $company->name??'') }}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Company Name." autofocus="">
        @error('name')
        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>
    <div class="col-md-6">
        <input id="email" value="{{ old('email', $company->email??'') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter company email" autocomplete="email" autofocus="">
        @error('email')
        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="logo_upload" class="col-md-4 col-form-label text-md-end">Logo</label>
    <div class="col-md-6">
        <input id="logo_upload" type="file" accept="image/png" class="form-control @error('logo_upload') is-invalid @enderror" name="logo_upload">
        @error('logo_upload')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        @if(isset($company))
        <div class="preview mt-2">
            <img src="{{ url('/storage/'.$company->logo)}}" height="100" width="100" alt="{{ $company->name.'"s photo' }}">
        </div>
            @endif
    </div>
</div>

<div class="row mb-3">
    <label for="website" class="col-md-4 col-form-label text-md-end">Website</label>
    <div class="col-md-6">
        <input id="website" value="{{ old('website', $company->website??'') }}" type="text" class="form-control @error('website') is-invalid @enderror" name="website" placeholder="Enter company website" autocomplete="url" autofocus="">
        @error('website')
        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
        @enderror
    </div>
</div>

<div class="row mb-0">
    <div class="col-md-8 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __(isset($company) ? 'Update': 'Create') }}
        </button>
    </div>
</div>

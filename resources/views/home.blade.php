@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Dashboard') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    Welcome {{ \Illuminate\Support\Facades\Auth::user()->name ?? 'User' }}, You are logged in!

                        @if(auth()->check() &&  auth()->user()->hasRole('admin'))
                            <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="{{ route('companies.index') }}" class="link-light">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4>Companies</h4>
                                                    Manage Companies
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-md-4">
                                        <a href="{{ route('companies.index') }}" class="link-light">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4>Employees</h4>
                                                    Manage Employees
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

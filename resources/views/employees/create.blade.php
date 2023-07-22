@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>Employees</h2>
            </div>
        </div>
        <div class="row mt-2 justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Emloyee Create') }}
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                            <form class="mt-2" action="{{ route('employees.store') }}" enctype="multipart/form-data" method="post">
                                @csrf
                                @include('employees.form')
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

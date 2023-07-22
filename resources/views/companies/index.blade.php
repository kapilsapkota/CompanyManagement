@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>Company</h2>
            </div>
        </div>
        <div class="row mt-2 justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">{{ __('Companies List') }}</div>
                            <div class="col-md-6">
                                <div class="pull-right" style="float: right;">
                                    <a href="{{ route('companies.create') }}" class="btn btn-sm btn-success">
                                        <i class="fa fa-plus"></i> Add
                                    </a>
                                </div>
                            </div>
                        </div>
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

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Logo</th>
                                        <th>Website</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($companies) && count($companies) > 0)
                                        @foreach($companies as $key=> $company)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $company->name ?? '' }}</td>
                                                <td>{{ $company->email ?? '' }}</td>
                                                <td>
                                                    <img height="50" width="50" src="{{ url('/storage/'.$company->logo)}}" alt="{{ $company->name }}">
                                                </td>
                                                <td>
                                                    <a target="_blank" href="{{ $company->website }}">
                                                        {{ $company->website }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('companies.edit', $company->id) }}" class="btn m-1 btn-sm btn-primary">
                                                        <i class="bi bi-pencil-square"></i> Edit
                                                    </a>
                                                    <a href="" onclick="event.preventDefault(); if(confirm('Are you sure?')){document.getElementById('company-{{$company->id}}').submit();}" class="btn btn-sm btn-danger">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </a>
                                                    <form id="company-{{$company->id}}" action="{{ route('companies.destroy', $company->id) }}" method="POST" class="d-none">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6">No datas to display</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            {!! $companies->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

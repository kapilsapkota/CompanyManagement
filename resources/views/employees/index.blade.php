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
                        <div class="row">
                            <div class="col-md-6">{{ __('Employees List') }}</div>
                            <div class="col-md-6">
                                <div class="pull-right" style="float: right;">
                                    <a href="{{ route('employees.create') }}" class="btn btn-sm btn-success">
                                        <i class="fa fa-plus"></i> Add New
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
                                        <th>Company</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($employees) && count($employees) > 0)
                                        @foreach($employees as $key=> $employee)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $employee->name ?? '' }}</td>
                                                <td>{{ $employee->email ?? '' }}</td>
                                                <td>
                                                    {{ $employee->company->name ?? 'Not Assigned' }}
                                                </td>
                                                <td>
                                                    <a href="tel:{{ $employee->phone }}" href="{{ $employee->phone }}">
                                                        {{ $employee->phone }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn m-1 btn-sm btn-primary">
                                                        <i class="bi bi-pencil-square"></i> Edit
                                                    </a>
                                                    <a href="" onclick="event.preventDefault(); if(confirm('Are you sure?')){document.getElementById('employee-{{$employee->id}}').submit();}" class="btn btn-sm btn-danger">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </a>
                                                    <form id="employee-{{$employee->id}}" action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-none">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="text-center" colspan="6">No datas to display</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            {!! $employees->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('include.mainlayout')
@section('tittle', 'login')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Employees</h1>
    <p class="mb-4">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Employees</li>
            <li class="breadcrumb-item active">View Employees</li>
        </ol>
    </nav>
    </p>
    <div class="card">
        <div class="card-body">
            <!-- <h6 class="card-title">Employee: {{$employee->name}}</h6> -->
            <form action="#" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Name<span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input value="{{$employee->name}}" type="text" class="form-control" id="name" name="name"
                            placeholder="Name" readonly>
                    </div>
                    <label for="name" class="col-sm-2 col-form-label">Department<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <select class="form-control" name="department_id" id="department_id" disabled>

                            @foreach($departments as $item)
                            <option value="{{$employee->department_id}}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('dropdown'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('dropdown') }}</strong>
                        </span>
                        @endif
                    </div>

                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Position<span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input value="{{$employee->position}}" type="text" class="form-control" id="position"
                            name="position" placeholder="Position" readonly>
                    </div>
                    <label for="name" class="col-sm-2 col-form-label">Basic Salary (RM)<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input value="{{$employee->basic_salary}}" type="text" class="form-control" id="basic_salary"
                            name="basic_salary" placeholder="Basic Salary" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Allowance<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input value="{{$employee->allowance}}" type="text" class="form-control" id="allowance"
                            name="allowance" placeholder="Allowance" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Overtime Hour<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input value="{{$employee->overtime_hours}}" type="number" class="form-control"
                            id="overtime_hours" name="overtime_hours" placeholder="0.00" readonly>
                    </div>
                    <label for="name" class="col-sm-2 col-form-label">Hourly Rate<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input value="{{$employee->hourly_rate}}" type="text" class="form-control" id="hourly_rate"
                            name="hourly_rate" placeholder="Hourly Rate" readonly>
                    </div>

                </div>
                <div class="d-sm-flex align-items-center justify-content-end mb-4">
                    <div class="float-right">
                        <a href="/employees" class="btn btn-primary btn-icon-split">
                            <span class="text">Back</span>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
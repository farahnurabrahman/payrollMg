@extends('include.mainlayout')
@section('tittle', 'login')
@section('content')
<div class="pagetitle">
    <h1>Employees</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Employees</li>
            <li class="breadcrumb-item active">Add New Employees</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Add Employees</h5>
        @if ($errors->any())
        <div class="mt-2 alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name<span class="text-danger">*</span></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                </div>
                <label for="name" class="col-sm-2 col-form-label">Department<span class="text-danger">*</span></label>
                <div class="col-sm-4">
                    <select class="form-control" name="department_id" id="department_id">
                        <option value="">Select</option>
                        @foreach($departments as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                    <input type="text" class="form-control" id="position" name="position" placeholder="Position"
                        required>
                </div>
                <label for="name" class="col-sm-2 col-form-label">Basic Salary (RM)<span
                        class="text-danger">*</span></label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="basic_salary" name="basic_salary"
                         step="0.01" min="0" placeholder="0.00" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Allowance (RM)<span class="text-danger">*</span></label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="allowance" name="allowance" 
                        step="0.01" min="0" placeholder="0.00" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Overtime Hour<span
                        class="text-danger">*</span></label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="overtime_hours" name="overtime_hours" placeholder="0"
                        required>
                </div>
                <label for="name" class="col-sm-2 col-form-label">Hourly Rate (RM)<span class="text-danger">*</span></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="hourly_rate" name="hourly_rate" step="0.01" min="0"
                        placeholder="0.00" required>
                </div>
            </div>
            <div class="d-sm-flex align-items-center justify-content-end mb-4">
                <div class="float-right">
                    <a href="/employees" class="btn btn-primary btn-icon-split">
                        <span class="text">Back</span>
                    </a>
                    <button type="submit" class="btn btn-success btn-icon-split">
                        <span class="text">Submit</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>
@endsection
@extends('include.mainlayout')
@section('tittle', 'login')
@section('content')

<h1 class="h3 mb-2 text-gray-800">Payroll Records</h1>
<div class="pagetitle">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Payroll Records</li>
            <li class="breadcrumb-item active">List of Payroll Records</li>
        </ol>
    </nav>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <!-- This pushes everything inside to the far right -->
        <div class="d-flex justify-content-end">
            <a href="{{route('payrollRecords.create')}}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Generate Payroll Records
            </a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('payrollRecords.index') }}" method="GET" class="form-inline">
            <div class="row w-100">
                <!-- Month Filter -->
                <div class="col-md-3">
                    <select class="form-control w-100" name="month" id="month">
                        <option value="">Select Month</option>
                        @foreach($month as $item)
                        <option value="{{ $item }}" {{ request('month') == $item ? 'selected' : '' }}>{{ $item }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Year Filter -->
                <div class="col-md-3">
                    <select class="form-control w-100" name="year" id="year">
                        <option value="">Select Year</option>
                        @foreach($year as $item)
                        <option value="{{ request('year') }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Department Filter -->
                <div class="col-md-3">
                    <select name="department_id" class="form-control w-100">
                        <option value="">Select Departments </option>
                        @foreach($departments as $dept)
                        <option value="{{ $dept->id }}" {{ request('department_id') == $dept->id ? 'selected' : '' }}>
                            {{ $dept->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Buttons -->
                <div class="col-md-3 d-flex align-items-end">
                    <div class="btn-group w-100">
                        <!-- Search Button -->
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Search
                        </button>

                        <!-- Reset Button (Matching Style) -->
                        <a href="{{ route('payrollRecords.index') }}" class="btn btn-secondary">
                            <i class="fas fa-undo"></i> Reset
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card shadow">
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">List of Payroll Records</h6>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Department</th>
                        <th>Payslip</th>
                        <th>Created Date</th>
                    </tr>
                </thead>
                @foreach($payrollRecords as $index => $val)
                <tr>
                    <td>
                        <div class="dropdown mb-4">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-fw fa-cog"></i>
                            </button>
                            <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                <!-- <a class="dropdown-item" href="{{route('payrollRecords.edit', $val->id)}}">Edit</a> -->
                                <a class="dropdown-item" href="{{route('payrollRecords.show', $val->id)}}">View</a>
                                <!-- <form action="{{ route('departments.destroy', $val->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item"
                                        onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form> -->
                            </div>
                        </div>
                    </td>
                    <td>{{++$index}}</td>
                    <td>{{$val->employee->name ?? 'N/A'}}</td>
                    <td>{{$val->employee->position}}</td>
                    <td>{{$val->employee->department->name}}</td>
                    <td>{{ $val->month_name }} {{$val->year}}</td>
                    <td>{{$val->created_at->format('d/m/Y')}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
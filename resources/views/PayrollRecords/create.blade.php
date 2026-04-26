@extends('include.mainlayout')
@section('tittle', 'login')
@section('content')
<div class="pagetitle">
    <h1>Payroll Records</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Payroll Records</li>
            <li class="breadcrumb-item active">Generate Payroll Records</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Add Payroll Records</h5>
        @if ($errors->any())
        <div class="mt-2 alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @php
    // Ambil nombor bulan sekarang (contoh: April = 4)
    $currentMonth = date('n'); 
    
    $monthNames = [
        1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 
        5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 
        9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
    ];
@endphp
        <form action="{{ route('payrollRecords.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Month<span class="text-danger">*</span></label>
                <div class="col-sm-4">
                    <select class="form-control" name="month" id="month">
                        <option value="">Select</option>
                        @foreach($month as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('dropdown'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('dropdown') }}</strong>
                    </span>
                    @endif
                </div>
                <label for="name" class="col-sm-2 col-form-label">Year<span class="text-danger">*</span></label>
                <div class="col-sm-4">
                    <select class="form-control" name="year" id="year">
                        <option value="">Select</option>
                        @foreach($year as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('dropdown'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('dropdown') }}</strong>
                    </span>
                    @endif
                </div>

            </div>
            <div class="d-sm-flex align-items-center justify-content-end mb-4">
                <div class="float-right">
                    <a href="/payrollRecords" class="btn btn-primary btn-icon-split">
                        <span class="text">Back</span>
                    </a>
                    <button type="submit" class="btn btn-success btn-icon-split">
                        <span class="text">Generate Records</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
    @if($payrollRecords->isNotEmpty())
    <div class="card-body">
        <div class="card-header bg-light">
            <strong>List for </strong>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Department</th>
                        <th>Payslip</th>
                        <th>Created Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                @foreach($payrollRecords as $index => $val)
                <tr>
                    <td>{{++$index}}</td>
                    <td>{{$val->employee->name ?? 'N/A'}}</td>
                    <td>{{$val->employee->position}}</td>
                    <td>{{$val->employee->department->name}}</td>
                    <td>{{ $val->month_name }} {{$val->year}}</td>
                    <td>{{$val->created_at->format('d/m/Y')}}</td>
                    <td><span class="badge bg-success">Generated</span></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
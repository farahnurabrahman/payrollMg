@extends('include.layoutedit')
@section('tittle', 'login')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Departments</h1>
    <p class="mb-4">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Departments</li>
            <li class="breadcrumb-item active">View Departments</li>
        </ol>
    </nav>
    </p>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Update Departments</h5>
            <form action="{{ route('departments.update', $department->id) }}" method="POST"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Name<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input value="{{$department->name}}" type="text" class="form-control" id="name" name="name"
                            placeholder="Name" required>
                    </div>
                </div>
                <div class="d-sm-flex align-items-center justify-content-end mb-4">
                    <div class="float-right">
                        <a href="/departments" class="btn btn-primary btn-icon-split">
                            <span class="text">Back</span>
                        </a>
                        <button type="submit" class="btn btn-success btn-icon-split">
                            <span class="text">Update</span>
                        </button>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
@endsection
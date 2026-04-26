@extends('include.mainlayout')
@section('tittle', 'login')
@section('content')
<div class="pagetitle">
      <h1>Departments</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Departments</li>
          <li class="breadcrumb-item active">Add New Departments</li>
        </ol>
      </nav>
    </div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Add Departments</h5>
        @if ($errors->any())
        <div class="mt-2 alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <form action="{{ route('departments.store') }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">Name<span class="text-danger">*</span></label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
            </div>
          </div>
          <div class="d-sm-flex align-items-center justify-content-end mb-4">
                <div class="float-right">
                    <a href="/departments" class="btn btn-primary btn-icon-split">
                        <span class="text">Back</span>
                    </a>
                    <button type="submit" class="btn btn-success btn-icon-split">
                        <span class="text">Submit</span>
                    </button>
                </div>
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
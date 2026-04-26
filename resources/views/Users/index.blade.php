@extends('include.mainlayout')
@section('tittle', 'login')
@section('content')

<h1 class="h3 mb-2 text-gray-800">Users</h1>
<div class="pagetitle">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Users</li>
            <li class="breadcrumb-item active">List of Users</li>
        </ol>
    </nav>
</div>
<div class="card shadow">
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">List of Users</h6>
            <a href="{{route('users.create')}}"
                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50 align-items-center"></i> Add New Users</a>
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
                        <th>Created Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $val)
                    <tr>
                        <td>
                            <div class="dropdown mb-4">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-fw fa-cog"></i>
                                </button>
                                <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                    <form action="{{ route('users.destroy', $val->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item"
                                            onclick="return confirm('Are you sure?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </td>
                        <td>{{++$index}}</td>
                        <td>{{$val->name}}</td>
                        <td>{{$val->created_at->format('d/m/Y')}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
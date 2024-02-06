@extends('admin.components.index')

@section('title','Employee Edit')

@section('content')
<div class="page-wrapper cardhead">
    <div class="content container-fluid">

        <!-- Page Header -->
		<div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Employee</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/employee">User Management</a></li>
                        <li class="breadcrumb-item active">Employee</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        @if ($errors->any())
        <div class="col-md-3">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                <strong>Peringatan !</strong> 
                <li>{{$error}}</li>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">EMPLOYEE EDIT FORM</h5>
                    </div>
                    <div class="card-body">
                        <form action="/employee/{{$listemployee->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Employee Name</label>
                                        <input type="text" class="form-control" value="{{$listemployee->employeename}}" name="employeename" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Employee Contact</label>
                                        <input type="text" class="form-control" value="{{$listemployee->employeecontact}}" name="employeecontact" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Employee Profession</label>
                                        <select class="select" name="employeeprofession" required>
                                            @foreach ($listprofession as $itemprofession)
                                            <option value="{{$itemprofession->id}}" @if ($listemployee->employeeprofession == $itemprofession->id) selected="selected" @endif>{{$itemprofession->profession}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="select" name="status" required>
                                            <option value="1" @if ($listemployee->status == "1") selected="selected" @endif> AKTIF</option>
                                            <option value="2" @if ($listemployee->status == "2") selected="selected" @endif> TIDAK AKTIF</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Employee Address</label>
                                <textarea class="form-control form-white" name="employeeaddress" required>{{$listemployee->employeeaddress}}</textarea>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label> Employee Signature</label>
                                    <div class="custom-file-container" data-upload-id="myFirstImage">
                                        <label>Signature(PNG/JPG) <a href="javascript:void(0)"
                                                class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                        <label class="custom-file-container__custom-file-1">
                                            <input type="file"
                                                class="custom-file-container__custom-file__custom-file-input"
                                                name="employeesignature" accept="image/*">
                                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                                        </label>
                                        <div class="custom-file-container__image-preview"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label> Employee Avatar</label>
                                    <div class="custom-file-container" data-upload-id="mySecondImage">
                                        <label>Avatar(PNG/JPG) <a href="javascript:void(0)"
                                                class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                        <label class="custom-file-container__custom-file">
                                            <input type="file"
                                                class="custom-file-container__custom-file__custom-file-input"
                                                name="employeeavatar" accept="image/*">
                                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                                        </label>
                                        <div class="custom-file-container__image-preview"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <h3 class="page-title">Employee Signature</h3>
                <div class="image-uploads">
                    <img src="{{asset('storage/employeesignature/'.$listemployee->employeesignature)}}" alt="signature">
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <h3 class="page-title">Employe Avatar</h3>
                <div class="image-uploads">
                    <img src="{{asset('storage/employeeavatar/'.$listemployee->employeeavatar)}}" alt="avatar">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
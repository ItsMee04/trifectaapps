@extends('admin.components.index')

@section('title', 'Employee')

@section('content')
    <div class="page-wrapper cardhead">
        <div class="content">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Employee</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">User Management</a></li>
                            <li class="breadcrumb-item active">Employee</li>
                        </ul>
                    </div>
                </div>
                <div class="page-btn">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#addEmployee" class="btn btn-added"><img
                            src="assets/img/icons/plus.svg" alt="img" class="me-1">Add Employee</a>
                </div>
            </div>
            <!-- /Page Header -->
            @if ($errors->any())
                <div class="col-md-3">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <strong>Peringatan !</strong>
                            <li>{{ $error }}</li>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            <!-- /product list -->
            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-input">
                                <a class="btn btn-searchset"><img src="{{ asset('assets') }}/img/icons/search-white.svg"
                                        alt="img"></a>
                            </div>
                        </div>
                        <div class="wordset">
                            <ul>
                                <li>
                                    <a data-toggle="tooltip" data-placement="top" title="pdf"><img
                                            src="{{ asset('assets') }}/img/icons/pdf.svg" alt="img"></a>
                                </li>
                                <li>
                                    <a data-toggle="tooltip" data-placement="top" title="excel"><img
                                            src="{{ asset('assets') }}/img/icons/excel.svg" alt="img"></a>
                                </li>
                                <li>
                                    <a data-toggle="tooltip" data-placement="top" title="print"><img
                                            src="{{ asset('assets') }}/img/icons/printer.svg" alt="img"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /Filter -->
                    <div class="table-responsive">
                        <table class="table  datanew">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Profession </th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listemployee as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $item->employeename }}</td>
                                        <td>{{ $item->employeeaddress }}</td>
                                        <td>{{ $item->employeecontact }}</td>
                                        <td>{{ $item->employeeprofession }}</td>
                                        <td>
                                            @if ($item->status == 1)
                                                <span class="badges bg-lightgreen">AKTIF</span>
                                            @else
                                                <span class="badges bg-lightred">TIDAK AKTIF</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="me-3" href="employee/{{ $item->id }}">
                                                <img src="{{ asset('assets') }}/img/icons/edit.svg" alt="img"
                                                    data-toggle="tooltip" data-placement="top" title="EDIT DATA">
                                            </a>
                                            <a class="me-3" href="#">
                                                <img src="{{ asset('assets') }}/img/icons/lock.svg" alt="img"
                                                    data-bs-toggle="modal" data-bs-target="#addUsers{{ $item->id }}"
                                                    data-toggle="tooltip" data-placement="top" title="USERS DATA">
                                            </a>
                                            <a class="confirm-text" href="javascript:void(0);"
                                                onclick="confirm_modal('employee/{{ $item->id }}');">
                                                <img src="{{ asset('assets') }}/img/icons/delete.svg" alt="img"
                                                    data-toggle="tooltip" data-placement="top" title="DELETE DATA">
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- MODAL ADD USERS -->
                                    {{-- @include('admin.pages.users-karyawan') --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /product list -->
        </div>
    </div>

    <!-- MODAL -->
    <div class="modal custom-modal fade" id="addEmployee">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">EMPLOYEE INPUT FORM</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form action="employee" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Employee Name</label>
                                    <input type="text" class="form-control form-white"
                                        placeholder="Masukan Nama Karyawan" type="text" name="employeename" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Employee Contact</label>
                                    <input type="text" class="form-control form-white"
                                        placeholder="Masukan Kontak Karyawan" name="employeecontact" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Employee Profession</label>
                                    <select class="select form-control form-white" data-placeholder="Choose a color..."
                                        name="employeeprofession" required>
                                        @foreach ($listprofession as $itemprofession)
                                            <option value="{{ $itemprofession->id }}"> {{ $itemprofession->profession }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="select form-control form-white" name="status" required>
                                        <option value="1"> AKTIF</option>
                                        <option value="2"> TIDAK AKTIF</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Employee Address</label>
                            <textarea class="form-control form-white" name="employeeaddress" placeholder="Masukan Alamat Karyawan" required></textarea>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label> Employee Signature</label>
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Signature(PNG/JPG) <a href="javascript:void(0)"
                                            class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file">
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
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary save-category submit-btn"
                                data-dismiss="modal">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Popup untuk delete-->
    <div class="modal custom-modal fade" id="modal_delete">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="text-align: center"><b>APAKAH ANDA YAKIN AKAN MENGHAPUS DATA
                            INI ?</b></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="submit-section">
                        <a id="delete_link" class="btn btn-danger save-category submit-btn"
                            data-dismiss="modal">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascript untuk popup modal Delete-->
    <script type="text/javascript">
        function confirm_modal(delete_url) {
            $('#modal_delete').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('delete_link').setAttribute('href', delete_url);
        }
    </script>

@endsection

@extends('admin.components.index')

@section('title', 'Purchase')

@section('content')
    <div class="page-wrapper cardhead">
        <div class="content">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Sales Transaction</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Purchase</li>
                        </ul>
                    </div>
                </div>
                <div class="page-btn">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#addPurchase" class="btn btn-added"><img
                            src="assets/img/icons/plus.svg" alt="img" class="me-1">Add Purchase</a>
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
                                    <th>ID Purchase</th>
                                    <th>Product Name</th>
                                    <th>Weight Product </th>
                                    <th>Purchase Date </th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listpurchase as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $item->idpurchase }}</td>
                                        <td><strong>{{ $item->productname }}</strong></td>
                                        <td>{{ $item->weightproduct }}</td>
                                        <td>{{ $item->purchasedate }}</td>
                                        <td>
                                            @if ($item->status == 1)
                                                <span class="badges bg-lightgreen">AKTIF</span>
                                            @else
                                                <span class="badges bg-lightred">TIDAK AKTIF</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="me-3" href="/edit-purchase/{{ $item->id }}">
                                                <img src="{{ asset('assets') }}/img/icons/edit.svg" alt="img"
                                                    data-toggle="tooltip" data-placement="top" title="EDIT DATA">
                                            </a>
                                            <a class="confirm-text me-3" href="javascript:void(0);"
                                                onclick="confirm_update('update-purchase/{{ $item->id }}');">
                                                <img src="{{ asset('assets') }}/img/icons/recycle.svg" alt="img"
                                                    data-toggle="tooltip" data-placement="top" title="UPDATE STATUS">
                                            </a>
                                            <a class="confirm-text me-3" href="javascript:void(0);"
                                                onclick="confirm_modal('delete-purchase/{{ $item->id }}');">
                                                <img src="{{ asset('assets') }}/img/icons/delete.svg" alt="img"
                                                    data-toggle="tooltip" data-placement="top" title="DELETE DATA">
                                            </a>
                                        </td>
                                    </tr>
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
    <div class="modal custom-modal fade" id="addPurchase">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">PURCHASE INPUT FORM</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form action="purchase" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>ID Purchase</label>
                            <input type="text" class="form-control form-white" placeholder="Masukan Nama Customer"
                                value="{{ $idpurchase }}" type="text" name="idpurchase" readonly>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Code Product</label>
                                    <input type="text" class="form-control form-white"
                                        placeholder="Masukan Nama Customer" value="{{ $codeproduct }}" type="text"
                                        name="codeproduct" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" class="form-control form-white"
                                        placeholder="Masukan Nama Produk" name="productname" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Weight Product</label>
                                    <input type="text" class="form-control form-white"
                                        placeholder="Masukan Berat Produk" type="text" name="weightproduct" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Carat Product</label>
                                    <input type="text" class="form-control form-white"
                                        placeholder="Masukan Karat Produk" name="caratproduct" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Purchase Price</label>
                                    <input type="text" class="form-control form-white"
                                        placeholder="Masukan Harga Beli Produk" type="text" name="purchaseprice"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Purchase Date</label>
                                    <input type="date" class="form-control form-white"
                                        placeholder="Masukan Tanggal Beli Produk" value="{{ $purchasedate }}"
                                        name="purchasedate" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Condition Product</label>
                                    <select class="select form-control form-white" name="conditionproduct" required>
                                        <option value="1"> REPARASI</option>
                                        <option value="2"> NON REPARASI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Type Product</label>
                                    <select class="select form-control form-white" name="typeproduct" required>
                                        <option disabled selected hidden> Pilih Tipe</option>
                                        @foreach ($typeproduct as $itemtypeproduct)
                                            <option value="{{ $itemtypeproduct->id }}">
                                                {{ $itemtypeproduct->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Categories Product</label>
                            <select class="select form-control form-white" name="categoriesproduct" required>
                                <option disabled selected hidden> Pilih Kategori</option>
                                @foreach ($listcategories as $itemcategories)
                                    <option value="{{ $itemcategories->id }}">
                                        {{ $itemcategories->categories }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label> Product Image</label>
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Foto Produk(PNG/JPG) <a href="javascript:void(0)"
                                            class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file">
                                        <input type="file"
                                            class="custom-file-container__custom-file__custom-file-input"
                                            name="photoproduct" accept="image/*">
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

    <!-- Modal Popup untuk update status-->
    <div class="modal custom-modal fade" id="modal_update">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="text-align: center"><b>UPDATE THIS DATA ?</b></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="submit-section">
                        <a id="update_link" class="btn btn-warning save-category submit-btn"
                            data-dismiss="modal">UPDATE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascript untuk popup modal Delete-->
    <script type="text/javascript">
        function confirm_update(delete_url) {
            $('#modal_update').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('update_link').setAttribute('href', delete_url);
        }
    </script>

    <!-- Modal Popup untuk delete-->
    <div class="modal custom-modal fade" id="modal_delete">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="text-align: center"><b>DELETE THIS DATA ?</b></h4>
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

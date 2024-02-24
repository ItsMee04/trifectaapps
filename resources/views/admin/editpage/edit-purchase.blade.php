@extends('admin.components.index')

@section('title', 'Product Edit')

@section('content')
    <div class="page-wrapper cardhead">
        <div class="content">

            <!-- Page Header -->
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="col">
                        <h3 class="page-title">PURCHASE</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/purchase">Purchase</a></li>
                            <li class="breadcrumb-item active">Edit Purchase</li>
                        </ul>
                    </div>
                </div>
                <ul class="table-top-head">
                    <li>
                        <div class="page-btn">
                            <a href="/purchase" class="btn btn-outline-dark"><i data-feather="arrow-left"
                                    class="me-2"></i>Back
                                to
                                Purchase</a>
                        </div>
                    </li>
                </ul>
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
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">PURCHASE EDIT FORM</h5>
                        </div>
                        <div class="card-body">
                            <form action="/edit-purchase/{{ $listpurchase->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>ID Purchase</label>
                                        <input type="text" class="form-control is-valid" name="codeproduct"
                                            value="{{ $listpurchase->idpurchase }}" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Code Product</label>
                                            <input type="text" class="form-control form-white"
                                                placeholder="Masukan Nama Customer" value="{{ $listpurchase->codeproduct }}"
                                                type="text" name="codeproduct" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text" class="form-control form-white"
                                                placeholder="Masukan Nama Produk" name="productname"
                                                value="{{ $listpurchase->productname }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Weight Product</label>
                                            <input type="text" class="form-control form-white"
                                                placeholder="Masukan Berat Produk" type="text"
                                                value="{{ $listpurchase->weightproduct }}" name="weightproduct" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Carat Product</label>
                                            <input type="text" class="form-control form-white"
                                                placeholder="Masukan Karat Produk" value="{{ $listpurchase->caratproduct }}"
                                                name="caratproduct" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Purchase Price</label>
                                            <input type="text" class="form-control form-white"
                                                placeholder="Masukan Harga Beli Produk"
                                                value="{{ $listpurchase->purchaseprice }}" type="text"
                                                name="purchaseprice" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Purchase Date</label>
                                            <input type="date" class="form-control form-white"
                                                placeholder="Masukan Tanggal Beli Produk"
                                                value="{{ $listpurchase->purchasedate }}" name="purchasedate" required>
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
                                                    <option value="{{ $itemtypeproduct->id }}"
                                                        @if ($listpurchase->typeproduct == $itemtypeproduct->id) selected="selected" @endif>
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
                                            <option value="{{ $itemcategories->id }}"
                                                @if ($listpurchase->categoriesproduct == $itemcategories->id) selected="selected" @endif>
                                                {{ $itemcategories->categories }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label> Photo Product</label>
                                        <div class="custom-file-container" data-upload-id="myFirstImage">
                                            <label>Photo Product(PNG/JPG) <a href="javascript:void(0)"
                                                    class="custom-file-container__image-clear"
                                                    title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                    class="custom-file-container__custom-file__custom-file-input"
                                                    name="photoproduct" accept="image/*">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="product-list">
                                        <ul class="row">
                                            <li>
                                                <div class="productviews">
                                                    <div class="productviewsimg">
                                                        <img src="{{ asset('storage/photoproduct/' . $listpurchase->photoproduct) }}"
                                                            alt="product">
                                                    </div>
                                                    <div class="productviewscontent">
                                                        <div class="productviewsname">
                                                        </div>
                                                        <a href="javascript:void(0);" class="hideset">x</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@extends('admin.components.index')

@section('title', 'Product Edit')

@section('content')
    <div class="page-wrapper cardhead">
        <div class="content">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Sales Transaction</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/purchase">Purchase</a></li>
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
                            <form action="/purchase/{{ $listpurchase->id }}" method="POST" enctype="multipart/form-data">
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
                                            <label>Name Product</label>
                                            <input type="text" name="nameproduct"
                                                value="{{ $listpurchase->productname }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Purchase Price</label>
                                            <input type="text" class="form-control"
                                                value="{{ $listpurchase->purchaseprice }}" name="priceproduct" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Type Product</label>
                                            <select class="select" name="typeproduct" required>
                                                @foreach ($typeproduct as $itemtype)
                                                    <option value="{{ $itemtype->id }}"
                                                        @if ($listpurchase->typeproduct == $itemtype->id) selected="selected" @endif>
                                                        {{ $itemtype->type }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Weight Product</label>
                                            <input type="text" name="weightproduct"
                                                value="{{ $listpurchase->weightproduct }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Carat Product</label>
                                            <input type="text" name="caratproduct"
                                                value="{{ $listpurchase->caratproduct }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="select" name="status" required>
                                                <option value="1"
                                                    @if ($listpurchase->status == '1') selected="selected" @endif> AKTIF
                                                </option>
                                                <option value="2"
                                                    @if ($listpurchase->status == '2') selected="selected" @endif> TIDAK
                                                    AKTIF</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Description Product</label>
                                        <textarea class="form-control" name="descriptionproduct" required>{{ $listpurchase->descriptionproduct }}</textarea>
                                    </div>
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

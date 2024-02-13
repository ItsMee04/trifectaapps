@extends('admin.components.index')

@section('title', 'Product Details')

@section('content')
    <div class="page-wrapper cardhead">
        <div class="content">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">PRODUCT DETAILS</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/product">Product</a></li>
                            <li class="breadcrumb-item active">Item Product</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="bar-code-view">
                                {!! DNS2D::getBarcodeSVG($listproduct->codeproduct, 'QRCODE') !!}
                            </div>
                            <div class="productdetails">
                                <ul class="product-bar">
                                    <li>
                                        <h4>Name Product</h4>
                                        <h6>{{ $listproduct->nameproduct }}</h6>
                                    </li>
                                    <li>
                                        <h4>Price Product</h4>
                                        <h6>{{ 'Rp.' . ' ' . number_format($listproduct->priceproduct, 2) }}</h6>
                                    </li>
                                    <li>
                                        <h4>Description Product</h4>
                                        <h6>{{ $listproduct->descriptionproduct }}</h6>
                                    </li>
                                    <li>
                                        <h4>Type Product</h4>
                                        <h6>{{ $listproduct->typeproduct }}</h6>
                                    </li>
                                    <li>
                                        <h4>Weight Product</h4>
                                        <h6>{{ $listproduct->weightproduct }} gram</h6>
                                    </li>
                                    <li>
                                        <h4>Karat Produk</h4>
                                        <h6>{{ $listproduct->caratproduct }}</h6>
                                    </li>
                                </ul>
                                <br>
                                <ul>
                                    <a class="printimg" href="/printbarcode/{{ $listproduct->codeproduct }}">
                                        <button type="button" class="btn btn-rounded btn-submit" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Print Barcode"><i class="fas fa-print"> Print
                                                Barcode</i></button>
                                    </a>

                                    <a class="printimg" href="/add-to-cart/{{ $listproduct->codeproduct }}">
                                        <button type="button" class="btn btn-rounded btn-cancel" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Add To Cart"><i class="fas fa-shopping-cart"> Add
                                                To Cart</i></button>
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="slider-product-details">
                                <div class="owl-carousel owl-theme product-slide">
                                    <div class="slider-product">
                                        <img src="{{ asset('storage/photoproduct/' . $listproduct->photoproduct) }}"
                                            alt="product">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

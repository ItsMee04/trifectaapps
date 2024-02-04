@extends('admin.components.index')

@section('title', 'Scan Product Barcodes')

@section('content')
    <div class="page-wrapper cardhead">
        <div class="content">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">SCAN PRODUCT BARCODES</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/product">Product</a></li>
                            <li class="breadcrumb-item active">Scan Barcode</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- /product list -->
            <section class="comp-section comp-cards">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 d-flex">
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 d-flex">
                        <div class="card flex-fill bg-white">
                            <div id="reader"></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 d-flex">
                    </div>
                </div>
            </section>
            <!-- /product list -->
        </div>
    </div>

@endsection

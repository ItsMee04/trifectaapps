@extends('admin.components.index')

@section('title', 'Shooping Cart')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 col-sm-12 tabs_wrapper">
                    <div class="page-header ">
                        <div class="page-title">
                            <h4>Shopping Cart</h4>
                            <h6>Manage your purchases</h6>
                        </div>
                    </div>
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
                    <ul class=" tabs owl-carousel owl-theme owl-product  border-0 ">
                        <li id="cincin">
                            <div class="product-details ">
                                <img src="{{ asset('assets') }}/img/product/cincin.png" alt="img">
                                <h6>Cincin</h6>
                            </div>
                        </li>
                        <li id="anting">
                            <div class="product-details ">
                                <img src="{{ asset('assets') }}/img/product/anting.png" alt="img">
                                <h6>Anting</h6>
                            </div>
                        </li>
                        <li id="gelang">
                            <div class="product-details">
                                <img src="{{ asset('assets') }}/img/product/gelang.png" alt="img">
                                <h6>Gelang</h6>
                            </div>
                        </li>
                        <li id="kalung">
                            <a class="product-details">
                                <img src="{{ asset('assets') }}/img/product/kalung.png" alt="img">
                                <h6>Kalung</h6>
                            </a>
                        </li>
                    </ul>
                    <div class="tabs_container">
                        <div class="tab_content active" data-tab="cincin">
                            <div class="row ">
                                @foreach ($listproductcincin as $itemcincin)
                                    <div class="col-lg-3 col-sm-6 d-flex ">
                                        <div class="productset flex-fill">
                                            <div class="productsetimg">
                                                <img src="{{ asset('storage/photoproduct/' . $itemcincin->photoproduct) }}">
                                                <h6>Weight: {{ $itemcincin->weightproduct }} / grams</h6>
                                                <div class="check-product">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                            </div>
                                            <div class="productsetcontent">
                                                <h5>{{ $itemcincin->nameproduct }}</h5>
                                                <h4>{{ $itemcincin->descriptionproduct }}</h4>
                                                <h6>{{ 'Rp' . ' ' . number_format($itemcincin->priceproduct) }}</h6>
                                                <a href="/add-to-cart/{{ $itemcincin->codeproduct }}"
                                                    class="btn btn-sm btn-outline-primary ms-1">Add To Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab_content" data-tab="anting">
                            <div class="row ">
                                @foreach ($listproductanting as $itemanting)
                                    <div class="col-lg-3 col-sm-6 d-flex ">
                                        <div class="productset flex-fill">
                                            <div class="productsetimg">
                                                <img
                                                    src="{{ asset('storage/photoproduct/' . $itemanting->photoproduct) }}">
                                                <div class="check-product">
                                                    <i class="fa fa-check"></i>
                                                    <h6>Weight: {{ $itemanting->weightproduct }}</h6>
                                                </div>
                                            </div>
                                            <div class="productsetcontent">
                                                <h5>{{ $itemanting->nameproduct }}</h5>
                                                <h4>{{ $itemanting->descriptionproduct }}</h4>
                                                <h6>{{ 'Rp' . ' ' . number_format($itemanting->priceproduct) }}</h6>
                                                <a href="/add-to-cart/{{ $itemanting->codeproduct }}"
                                                    class="btn btn-sm btn-outline-primary ms-1">Add To Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab_content" data-tab="gelang">
                            <div class="row">
                                @foreach ($listproductgelang as $itemgelang)
                                    <div class="col-lg-3 col-sm-6 d-flex ">
                                        <div class="productset flex-fill">
                                            <div class="productsetimg">
                                                <img
                                                    src="{{ asset('storage/photoproduct/' . $itemgelang->photoproduct) }}">
                                                <div class="check-product">
                                                    <i class="fa fa-check"></i>
                                                    <h6>Weight: {{ $itemgelang->weightproduct }}</h6>
                                                </div>
                                            </div>
                                            <div class="productsetcontent">
                                                <h5>{{ $itemgelang->nameproduct }}</h5>
                                                <h4>{{ $itemgelang->descriptionproduct }}</h4>
                                                <h6>{{ 'Rp' . ' ' . number_format($itemgelang->priceproduct) }}</h6>
                                                <a href="/add-to-cart/{{ $itemgelang->codeproduct }}"
                                                    class="btn btn-sm btn-outline-primary ms-1">Add To Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab_content" data-tab="kalung">
                            <div class="row">
                                @foreach ($listproductkalung as $itemkalung)
                                    <div class="col-lg-3 col-sm-6 d-flex ">
                                        <div class="productset flex-fill">
                                            <div class="productsetimg">
                                                <img
                                                    src="{{ asset('storage/photoproduct/' . $itemkalung->photoproduct) }}">
                                                <div class="check-product">
                                                    <i class="fa fa-check"></i>
                                                    <h6>Weight: {{ $itemkalung->weightproduct }}</h6>
                                                </div>
                                            </div>
                                            <div class="productsetcontent">
                                                <h5>{{ $itemkalung->nameproduct }}</h5>
                                                <h4>{{ $itemkalung->descriptionproduct }}</h4>
                                                <h6>{{ 'Rp' . ' ' . number_format($itemkalung->priceproduct) }}</h6>
                                                <a href="/add-to-cart/{{ $itemkalung->codeproduct }}"
                                                    class="btn btn-sm btn-outline-primary ms-1">Add To Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 ">
                    <div class="order-list">
                        <div class="orderid">
                            <h4>Order List</h4>
                            <h5>Transaction id : #{{ $idshoppingcart }}</h5>
                        </div>
                    </div>
                    <div class="card card-order">
                        <form action="checkout" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="javascript:void(0);" class="btn btn-adds" data-bs-toggle="modal"
                                            data-bs-target="#create"><i class="fa fa-plus me-2"></i>Add Customer</a>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="select-split ">
                                            <div class="select-group w-100">
                                                <select class="select" name="namacustomer" required>
                                                    <option disabled selected hidden> Pilih Customer</option>
                                                    @foreach ($listcustomer as $itemcustomer)
                                                        <option value="{{ $itemcustomer->id }}">
                                                            {{ $itemcustomer->customername }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="split-card">
                            </div>
                            <div class="card-body pt-0">
                                <div class="totalitem">
                                    <h4>Total items : {{ $countshoppingcart }}</h4>
                                    @if ($listshoppingcartactive == null)
                                    @else
                                        <a href="#"
                                            onclick="confirm_modal('delete-all-shoppingcart/{{ $listshoppingcartactive->idshoppingcart }}');">Clear
                                            all</a>
                                    @endif
                                </div>
                                <div class="product-table">
                                    @foreach ($listshoppingcart as $itemcart)
                                        <ul class="product-lists">
                                            <li>
                                                <div class="productimg">

                                                    <div class="productimgs">
                                                        <img
                                                            src="{{ asset('storage/photoproduct/' . $itemcart->photoproduct) }}">
                                                    </div>
                                                    <div class="productcontet">
                                                        <h4>{{ $itemcart->nameproduct }}
                                                            <a href="javascript:void(0);" class="ms-2"
                                                                data-bs-toggle="modal" data-bs-target="#edit"><img
                                                                    src="{{ asset('assets') }}/img/icons/edit-5.svg"
                                                                    alt="img"></a>
                                                        </h4>
                                                        <div class="productlinkset">
                                                            <h5>{{ $itemcart->idshoppingcart }}</h5>
                                                        </div>
                                                    </div>

                                                </div>
                                            </li>
                                            <li>{{ 'Rp.' . ' ' . number_format($itemcart->priceproduct) }}</li>
                                            <li>
                                                <a class="confirm-text" href="javascript:void(0);"
                                                    onclick="confirm_modal('delete-shoppingcart/{{ $itemcart->idcart }}');">
                                                    <img src="{{ asset('assets') }}/img/icons/delete.svg" alt="img"
                                                        data-toggle="tooltip" data-placement="top" title="DELETE DATA">
                                                </a>
                                            </li>
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-body pt-0 pb-0">
                                <div class="setvalue">
                                    <ul>
                                        <li class="total-value">
                                            <h5>Total </h5>
                                            <h6>{{ 'Rp.' . ' ' . number_format($subtotal) }}</h6>
                                        </li>
                                    </ul>
                                </div>
                                <div class="btn-totallabel">
                                    <button type="submit" class="btn btn-rounded text-white">
                                        <h5>Checkout</h5>
                                    </button>
                                    <h6>{{ 'Rp.' . ' ' . number_format($subtotal) }}</h6>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="calculator" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Define Quantity</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="calculator-set">
                        <div class="calculatortotal">
                            <h4>0</h4>
                        </div>
                        <ul>
                            <li>
                                <a href="javascript:void(0);">1</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">2</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">3</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">4</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">5</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">6</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">7</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">8</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">9</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="btn btn-closes"><img
                                        src="assets/img/icons/close-circle.svg" alt="img"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">0</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="btn btn-reverse"><img
                                        src="assets/img/icons/reverse.svg" alt="img"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="holdsales" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hold order</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="hold-order">
                        <h2>4500.00</h2>
                    </div>
                    <div class="form-group">
                        <label>Order Reference</label>
                        <input type="text">
                    </div>
                    <div class="para-set">
                        <p>The current order will be set on hold. You can retreive this order from the pending order
                            button. Providing a reference to it might help you to identify the order more quickly.</p>
                    </div>
                    <div class="col-lg-12">
                        <a class="btn btn-submit me-2">Submit</a>
                        <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Order</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Product Price</label>
                                <input type="text" value="20">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Product Price</label>
                                <select class="select">
                                    <option>Exclusive</option>
                                    <option>Inclusive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label> Tax</label>
                                <div class="input-group">
                                    <input type="text">
                                    <a class="scanner-set input-group-text">
                                        %
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Discount Type</label>
                                <select class="select">
                                    <option>Fixed</option>
                                    <option>Percentage</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Discount</label>
                                <input type="text" value="20">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Sales Unit</label>
                                <select class="select">
                                    <option>Kilogram</option>
                                    <option>Grams</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <a class="btn btn-submit me-2">Submit</a>
                        <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Customer Name</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Country</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <a class="btn btn-submit me-2">Submit</a>
                        <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Order Deletion</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="delete-order">
                        <img src="assets/img/icons/close-circle1.svg" alt="img">
                    </div>
                    <div class="para-set text-center">
                        <p>The current order will be deleted as no payment has been <br> made so far.</p>
                    </div>
                    <div class="col-lg-12 text-center">
                        <a class="btn btn-danger me-2">Yes</a>
                        <a class="btn btn-cancel" data-bs-dismiss="modal">No</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="recents" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Recent Transactions</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tabs-sets">
                        <ul class="nav nav-tabs" id="myTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="purchase-tab" data-bs-toggle="tab"
                                    data-bs-target="#purchase" type="button" aria-controls="purchase"
                                    aria-selected="true" role="tab">Purchase</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment"
                                    type="button" aria-controls="payment" aria-selected="false"
                                    role="tab">Payment</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="return-tab" data-bs-toggle="tab" data-bs-target="#return"
                                    type="button" aria-controls="return" aria-selected="false"
                                    role="tab">Return</button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="purchase" role="tabpanel"
                                aria-labelledby="purchase-tab">
                                <div class="table-top">
                                    <div class="search-set">
                                        <div class="search-input">
                                            <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg"
                                                    alt="img"></a>
                                        </div>
                                    </div>
                                    <div class="wordset">
                                        <ul>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                                        src="assets/img/icons/pdf.svg" alt="img"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                                        src="assets/img/icons/excel.svg" alt="img"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                                        src="assets/img/icons/printer.svg" alt="img"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table datanew">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Reference</th>
                                                <th>Customer</th>
                                                <th>Amount </th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/eye.svg" alt="img">
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/edit.svg" alt="img">
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="assets/img/icons/delete.svg" alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/eye.svg" alt="img">
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/edit.svg" alt="img">
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="assets/img/icons/delete.svg" alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/eye.svg" alt="img">
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/edit.svg" alt="img">
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="assets/img/icons/delete.svg" alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/eye.svg" alt="img">
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/edit.svg" alt="img">
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="assets/img/icons/delete.svg" alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/eye.svg" alt="img">
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/edit.svg" alt="img">
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="assets/img/icons/delete.svg" alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/eye.svg" alt="img">
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/edit.svg" alt="img">
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="assets/img/icons/delete.svg" alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>INV/SL0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/eye.svg" alt="img">
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/edit.svg" alt="img">
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="assets/img/icons/delete.svg" alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="payment" role="tabpanel">
                                <div class="table-top">
                                    <div class="search-set">
                                        <div class="search-input">
                                            <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg"
                                                    alt="img"></a>
                                        </div>
                                    </div>
                                    <div class="wordset">
                                        <ul>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                                        src="assets/img/icons/pdf.svg" alt="img"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                                        src="assets/img/icons/excel.svg" alt="img"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                                        src="assets/img/icons/printer.svg" alt="img"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table datanew">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Reference</th>
                                                <th>Customer</th>
                                                <th>Amount </th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/eye.svg" alt="img">
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/edit.svg" alt="img">
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="assets/img/icons/delete.svg" alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>0102</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/eye.svg" alt="img">
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/edit.svg" alt="img">
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="assets/img/icons/delete.svg" alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>0103</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/eye.svg" alt="img">
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/edit.svg" alt="img">
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="assets/img/icons/delete.svg" alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>0104</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/eye.svg" alt="img">
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/edit.svg" alt="img">
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="assets/img/icons/delete.svg" alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>0105</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/eye.svg" alt="img">
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/edit.svg" alt="img">
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="assets/img/icons/delete.svg" alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>0106</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/eye.svg" alt="img">
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/edit.svg" alt="img">
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="assets/img/icons/delete.svg" alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>0107</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/eye.svg" alt="img">
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/edit.svg" alt="img">
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="assets/img/icons/delete.svg" alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="return" role="tabpanel">
                                <div class="table-top">
                                    <div class="search-set">
                                        <div class="search-input">
                                            <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg"
                                                    alt="img"></a>
                                        </div>
                                    </div>
                                    <div class="wordset">
                                        <ul>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                                        src="assets/img/icons/pdf.svg" alt="img"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                                        src="assets/img/icons/excel.svg" alt="img"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                                        src="assets/img/icons/printer.svg" alt="img"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table datanew">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Reference</th>
                                                <th>Customer</th>
                                                <th>Amount </th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>0101</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/eye.svg" alt="img">
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/edit.svg" alt="img">
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="assets/img/icons/delete.svg" alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>0102</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/eye.svg" alt="img">
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/edit.svg" alt="img">
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="assets/img/icons/delete.svg" alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>0103</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/eye.svg" alt="img">
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/edit.svg" alt="img">
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="assets/img/icons/delete.svg" alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>0104</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/eye.svg" alt="img">
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/edit.svg" alt="img">
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="assets/img/icons/delete.svg" alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>0105</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/eye.svg" alt="img">
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/edit.svg" alt="img">
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="assets/img/icons/delete.svg" alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>0106</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/eye.svg" alt="img">
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/edit.svg" alt="img">
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="assets/img/icons/delete.svg" alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2022-03-07 </td>
                                                <td>0107</td>
                                                <td>Walk-in Customer</td>
                                                <td>$ 1500.00</td>
                                                <td>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/eye.svg" alt="img">
                                                    </a>
                                                    <a class="me-3" href="javascript:void(0);">
                                                        <img src="assets/img/icons/edit.svg" alt="img">
                                                    </a>
                                                    <a class="me-3 confirm-text" href="javascript:void(0);">
                                                        <img src="assets/img/icons/delete.svg" alt="img">
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Popup untuk delete-->
    <div class="modal custom-modal fade" id="modal_delete">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center"><strong>DELETE THIS PRODUCT ?</strong></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form action="identitas" method="POST">
                        <div class="submit-section">
                            <a id="delete_link" class="btn btn-danger save-category submit-btn"
                                data-dismiss="modal">Delete</a>
                        </div>
                    </form>
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

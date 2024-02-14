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

    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">CUSTOMER INPUT FORM</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="customer" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Customer Name</label>
                                    <input type="text" class="form-control form-white"
                                        placeholder="Masukan Nama Customer" type="text" name="customername" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Customer Contact</label>
                                    <input type="text" class="form-control form-white"
                                        placeholder="Masukan Kontak Customer" name="customercontact" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Customer Identity</label>
                                    <input type="text" class="form-control form-white"
                                        placeholder="Masukan NIK Customer" type="text" name="customeridentity"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Customer Date of Birth</label>
                                    <input type="date" class="form-control form-white"
                                        placeholder="Masukan Kontak Karyawan" name="customerdateofbirth" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="select form-control form-white" name="status" required>
                                <option value="1"> AKTIF</option>
                                <option value="2"> TIDAK AKTIF</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Customer Address</label>
                            <textarea class="form-control form-white" name="customeraddress" placeholder="Masukan Alamat Customer" required></textarea>
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

@extends('admin.components.index')

@section('title', 'Orders')

@section('content')
    <div class="page-wrapper cardhead">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>PURCHASE LIST</h4>
                    <h6>Manage your purchases</h6>
                </div>
            </div>

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
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                            src="{{ asset('assets') }}/img/icons/pdf.svg" alt="img"></a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                            src="{{ asset('assets') }}/img/icons/excel.svg" alt="img"></a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                            src="{{ asset('assets') }}/img/icons/printer.svg" alt="img"></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ID Transaction</th>
                                    <th>ID Shopping Cart</th>
                                    <th>Customer</th>
                                    <th>Grand Total</th>
                                    <th>Payment Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listorders as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-bolds">{{ $item->idtransaction }}</td>
                                        <td><a
                                                href="orders-details/{{ $item->idshoppingcart }}">{{ $item->idshoppingcart }}</a>
                                        </td>
                                        <td>{{ $item->customername }}</td>
                                        <td>{{ 'Rp.' . ' ' . number_format($item->total) }}</td>
                                        <td>
                                            @if ($item->status == 2)
                                                <span class="badges bg-lightgreen"> Paid</span>
                                            @else
                                                <span class="badges bg-lightred"> Un Paid</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="confirm-text" href="javascript:void(0);"
                                                onclick="confirm_modal('confirm-payment/{{ $item->idtransaction }}');">
                                                <img src="{{ asset('assets') }}/img/icons/dash2.svg" alt="img"
                                                    data-toggle="tooltip" data-placement="top" title="CONFIRM PAYMENT">
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- MODAL -->
    <div class="modal custom-modal fade" id="addSupplier">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">SUPPLIER INPUT FOTM</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form action="supplier" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Supplier Name</label>
                                    <input type="text" class="form-control form-white"
                                        placeholder="Masukan Nama Supplier" type="text" name="suppliername" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Supplier Contact</label>
                                    <input type="text" class="form-control form-white" name="suppliercontact"
                                        placeholder="Masukan Kontak Supplier" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Supplier Address</label>
                            <textarea class="form-control form-white" name="supplieraddress" placeholder="Masukan Alamat Supplier" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="select form-control form-white" name="status" required>
                                <option value="1"> AKTIF</option>
                                <option value="2"> TIDAK AKTIF</option>
                            </select>
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
                    <h4 class="modal-title text-center"><b> CONFIRM PAYMENTS ?</b></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form action="identitas" method="POST">
                        <div class="submit-section">
                            <a id="delete_link" class="btn btn-success save-category submit-btn"
                                data-dismiss="modal">CONFIRM</a>
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

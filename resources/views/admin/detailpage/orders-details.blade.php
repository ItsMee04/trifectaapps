@extends('admin.components.index')

@section('title', 'Orders Details')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Transaction Details</h4>
                    <h6>View transaction details</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-sales-split">
                        <h2>Sale Detail : {{ $idshoppingcart }}</h2>
                    </div>
                    <div class="invoice-box table-height"
                        style="max-width: 1600px;width:100%;overflow: auto;margin:15px auto;padding: 0;font-size: 14px;line-height: 24px;color: #555;">
                        <table cellpadding="0" cellspacing="0" style="width: 100%;line-height: inherit;text-align: left;">
                            <tbody>
                                <tr class="top">
                                    <td colspan="6" style="padding: 5px;vertical-align: top;">
                                        <table style="width: 100%;line-height: inherit;text-align: left;">
                                            <tbody>
                                                @foreach ($orders as $itemlistorders)
                                                    <tr>
                                                        <td
                                                            style="padding:5px;vertical-align:top;text-align:left;padding-bottom:20px">
                                                            <font style="vertical-align: inherit;margin-bottom:25px;">
                                                                <font
                                                                    style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">
                                                                    Customer Info</font>
                                                            </font><br>
                                                            <font style="vertical-align: inherit;">
                                                                <font
                                                                    style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">
                                                                    {{ $itemlistorders->customername }}</font>
                                                            </font><br>
                                                            <font style="vertical-align: inherit;">
                                                                <font
                                                                    style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">
                                                                    {{ $itemlistorders->customercontact }}</font>
                                                            </font><br>
                                                            <font style="vertical-align: inherit;">
                                                                <font
                                                                    style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">
                                                                    {{ $itemlistorders->customeraddress }}</font>
                                                            </font><br>
                                                        </td>
                                                        <td
                                                            style="padding:5px;vertical-align:top;text-align:left;padding-bottom:20px">
                                                            <font style="vertical-align: inherit;margin-bottom:25px;">
                                                                <font
                                                                    style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">
                                                                    Invoice Info</font>
                                                            </font><br>
                                                            <font style="vertical-align: inherit;">
                                                                <font
                                                                    style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">
                                                                    Reference </font>
                                                            </font><br>
                                                            <font style="vertical-align: inherit;">
                                                                <font
                                                                    style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">
                                                                    Payment Status</font>
                                                            </font><br>
                                                        </td>
                                                        <td
                                                            style="padding:5px;vertical-align:top;text-align:right;padding-bottom:20px">
                                                            <font style="vertical-align: inherit;margin-bottom:25px;">
                                                                <font
                                                                    style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">
                                                                    &nbsp;</font>
                                                            </font><br>
                                                            <font style="vertical-align: inherit;">
                                                                <font
                                                                    style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">
                                                                    {{ $itemlistorders->idtransaction }} </font>
                                                            </font><br>
                                                            @if ($itemlistorders->status == 2)
                                                                <font style="vertical-align: inherit;">
                                                                    <font
                                                                        style="vertical-align: inherit;font-size: 14px;color:#2E7D32;font-weight: 400;">
                                                                        Paid</font>
                                                                </font><br>
                                                            @else
                                                                <font style="vertical-align: inherit;">
                                                                    <font
                                                                        style="vertical-align: inherit;font-size: 14px;color:#f11000;font-weight: 400;">
                                                                        Un Paid</font>
                                                                </font><br>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr class="heading " style="background: #F3F2F7;">
                                    <td
                                        style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                                        Product Name
                                    </td>
                                    <td
                                        style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                                        QTY
                                    </td>
                                    <td
                                        style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                                        Price
                                    </td>
                                    <td
                                        style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                                        Subtotal
                                    </td>
                                </tr>
                                @foreach ($listorders as $itemorders)
                                    <tr class="details" style="border-bottom:1px solid #E9ECEF ;">
                                        <td style="padding: 10px;vertical-align: top; display: flex;align-items: center;">
                                            <img src="{{ asset('storage/photoproduct/' . $itemorders->photoproduct) }}"
                                                alt="img" class="me-2" style="width:40px;height:40px;">
                                            {{ $itemorders->nameproduct }}
                                        </td>
                                        <td style="padding: 10px;vertical-align: top; ">
                                            1.00
                                        </td>
                                        <td style="padding: 10px;vertical-align: top; ">
                                            {{ 'Rp.' . ' ' . number_format($itemorders->priceproduct) }}
                                        </td>
                                        <td style="padding: 10px;vertical-align: top; ">
                                            {{ 'Rp.' . ' ' . number_format($itemorders->priceproduct) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="col-lg-6 ">
                                <div class="total-order w-100 max-widthauto m-auto mb-4">
                                    <ul>
                                        <li class="total">
                                            <h4>Grand Total</h4>
                                            <h5>$ 0.00</h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
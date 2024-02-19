<html xmlns='https://www.w3.org/1999/xhtml'>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />

<body style='font-family:Tahoma;font-size:12px;color: #333333;background-color:#FFFFFF;'>
    <table align='center' border='0' cellpadding='0' cellspacing='0' style='height:842px; width:595px;font-size:12px;'>
        <tr>
            <td valign='top'>
                <table width='100%' cellspacing='0' cellpadding='0'>
                    <tr>
                        <td valign='bottom' width='50%' height='50'>
                            <div align='left'><img src='{{ asset('assets') }}/img/logo.png' width='50%'
                                    height='50' />
                            </div><br />
                        </td>

                        <td width='50%'>
                            <div align='right' style='font-size: 14px;font-weight: bold;'>Invoice
                                #{{ $reference }} </div>
                        </td>
                    </tr>
                </table>Customer Info: <br /><br />
                <table width='100%' cellspacing='0' cellpadding='0'>
                    <tr>
                        <td valign='top' width='35%' style='font-size:12px;'>
                            <strong>{{ $customer }}</strong><br />
                            {{ $customeraddress }} <br /> {{ $customercontact }} <br />

                        </td>
                        <td valign='top' width='35%'>
                        </td>
                        <td valign='top' width='30%' style='font-size:12px;' align='right'>Tanggal:
                            {{ $year }}<br />
                            Dibuat Oleh: {{ $sales }} <br />
                        </td>
                    </tr>
                </table>
                <table width='100%' height='20' cellspacing='0' cellpadding='0'>
                    <tr>
                        <td></td>
                    </tr>
                </table>
                <table width='100%' cellspacing='0' cellpadding='2' border='1' bordercolor='#CCCCCC'>
                    <tr>

                        <td width='35%' bordercolor='#ccc' bgcolor='#f6b94e' style='font-size:12px;'><strong> Product
                            </strong></td>
                        <td bordercolor='#ccc' bgcolor='#f6b94e' style='font-size:12px;'><strong>Product Name</strong>
                        </td>
                        <td bordercolor='#ccc' bgcolor='#f6b94e' style='font-size:12px;'><strong>Kadar/Karat</strong>
                        </td>
                        <td bordercolor='#ccc' bgcolor='#f6b94e' style='font-size:12px;'><strong>Berat</strong></td>
                        <td bordercolor='#ccc' bgcolor='#f6b94e' style='font-size:12px;'><strong>Harga</strong></td>

                    </tr>
                    @foreach ($listorders as $itemorders)
                        <tr style="display:none;">
                            <td colspan="*">
                        <tr>

                            <td valign='top' style='font-size:12px;' align="center"><img style="max-width: 50%;"
                                    src='{{ asset('storage/photoproduct/' . $itemorders->photoproduct) }}' />
                            </td>
                            <td valign='top' style='font-size:12px;' align="center">{{ $itemorders->nameproduct }}
                            </td>
                            <td valign='top' style='font-size:12px;' align="center">{{ $itemorders->caratproduct }}
                            </td>
                            <td valign='top' style='font-size:12px;' align="center">{{ $itemorders->weightproduct }}
                            </td>
                            <td valign='top' style='font-size:12px;' align="center">
                                {{ 'Rp.' . ' ' . number_format($itemorders->priceproduct) }} </td>

                        </tr>
            </td>
        </tr>
        @endforeach
    </table>
    <table width='100%' cellspacing='0' cellpadding='2' border='0'>
        <tr>
            <td style='font-size:12px;width:50%;'><strong> </strong></td>
            <td>
                <table width='100%' cellspacing='0' cellpadding='2' border='0'>
                    <tr>
                        <td align='right' style='font-size:12px;'>Sub total</td>
                        <td align='right' style='font-size:12px;'>{{ 'Rp.' . ' ' . number_format($total) }}
                        <td>
                    </tr>
                    <tr>
                        <td align='right' style='font-size:12px;'>PPN</td>
                        <td align='right' style='font-size:12px;'>Rp 0</td>
                    </tr>
                    <tr>

                        <td align='right' style='font-size:12px;'><b>Total</b></td>
                        <td align='right' style='font-size:12px;'><b>{{ 'Rp.' . ' ' . number_format($total) }}</b>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table width='100%' height='50'>
        <tr>
            <td style='font-size:12px;text-align:justify;'></td>
        </tr>
    </table>
    <table width='100%' cellspacing='0' cellpadding='2'>
        <tr>
            <td width='33%' style='border-top:double medium #CCCCCC;font-size:12px;' valign='top'><b
                    style="font-size: medium;">Mohon Diperhatikan</b><br />
                Barang telah diperiksa dengan betul, jika dijual kembali <b>potong harga mata dan ongkos bikin</b>
                hilang & <b>dibeli menurut harga pasaran.</b>

            </td>
        </tr>
    </table>
    </td>
    </tr>
    </table>
</body>
<script>
    window.print()
</script>

</html>

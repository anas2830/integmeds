@php 
    $shipping_address = $order->shipping_address;
@endphp 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title> Integmeds :: Order Invoice </title>
        <meta name="robots" content="noindex,nofollow" />
        <meta name="viewport" content="width=device-width; initial-scale=1.0;" />
        <style type="text/css">
            @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
        </style>
        <style>
            body {
                margin: 0;
                padding: 0;
                background: #e1e1e1;
            }

            div, p, a, li, td { -webkit-text-size-adjust: none; }
            body {
                width: 100%;
                height: 100%;
                background-color: #e1e1e1;
                margin: 0;
                padding: 0;
                -webkit-font-smoothing: antialiased;
            }
            html {
                width: 100%;
            }
            p {
                padding: 0 !important;
                margin-top: 0 !important;
                margin-right: 0 !important;
                margin-bottom: 0 !important;
                margin-left: 0 !important;
            }

            @media only screen and (max-width: 600px) {
                .container {
                    width: auto !important;
                    overflow-x: scroll;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
                bgcolor="#e1e1e1">
                <tr>
                    <td height="20"></td>
                </tr>
                <tr>
                    <td>
                        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
                            bgcolor="#ffffff" style="border-radius: 10px 10px 0 0; padding:40px 0 20px 0">
                            <tr>
                                <td>
                                    <table width="520" border="0" cellpadding="0" cellspacing="0" align="center"
                                        class="fullPadding">
                                        <tbody>
                                            <tr>
                                                <td class="table-top">
                                                    <table width="250" border="0" cellpadding="0" cellspacing="0"
                                                        align="left" class="col" style="">
                                                        <tbody>
                                                            <tr>
                                                                <td align="left" style="padding-bottom:10px" ;>
                                                                    <img class=" img-fluid" src="{{asset('assets/images/logo-light.png')}}" width="180" height="auto" alt="logo" border="0" title="">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table width="135" border="0" cellpadding="0" cellspacing="0"
                                                        align="right" class="col" style="">
                                                        <tbody>
                                                            <tr class="invoceId">
                                                                <td style="font-size: 13px; color: #414141; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: right; border-right:
                                                                2px solid #e4f0bd; padding-right:5px;">
                                                                    <strong style="font-size:28px;">INVOICE</strong>
                                                                    <br>#{{$order->order_number}}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
                bgcolor="#e1e1e1">
                <tr>
                    <td>
                        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
                            bgcolor="#ffffff" style="padding:10px 0 30px 0;">
                            <tr>
                                <td>
                                    <table  style="padding:10px;background:#f9fafc;" width="520" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <table width="140" border="0" cellpadding="0" cellspacing="0"
                                                        align="left" class="col"
                                                        style="display: flex;justify-content: start;">
                                                        <tbody>
                                                            <tr>
                                                                <td
                                                                    style="font-size: 13px; color: #414141; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: left;">
                                                                    <strong style="font-size:14px;">Issued</strong>
                                                                    <br>{{ date('F d, Y', strtotime($order->created_at)) }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table width="180" border="0" cellpadding="0" cellspacing="0"
                                                        align="right" class="col"
                                                        style="display: flex;justify-content: end;">
                                                        <tbody>
                                                            <tr>
                                                                <td
                                                                    style="font-size: 13px; color: #414141; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: left;">
                                                                    <strong style="font-size:14px;"> From:</strong>
                                                                    <br>Integmeds  
                                                                    <br>12727 Featherwood Drive Suite 104 
                                                                    <br>Houston, TX 77034  
                                                                    <br>United States  
                                                                    <br>+1 (346) 346-0732
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table width="180" border="0" cellpadding="0" cellspacing="0"
                                                        align="right" class="col"
                                                        style="display: flex;justify-content: start;">
                                                        <tbody>
                                                            <tr>
                                                                <td
                                                                    style="font-size: 13px; color: #414141; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: left;">
                                                                    <strong style="font-size:14px;"> Billed to:</strong>
                                                                        <br> {{$shipping_address['first_name'] ?? ''}} {{$shipping_address['last_name'] ?? ''}}
                                                                        <br> {{$shipping_address['address_line1'] ?? ''}}
                                                                        <br> {{$shipping_address['address_line2'] ?? ''}}
                                                                        <br> {{$shipping_address['state'] ?? ''}}, {{$shipping_address['city'] ?? ''}}, {{$shipping_address['postal_code'] ?? ''}}  
                                                                        <br> {{$shipping_address['phone'] ?? ''}} , {{$shipping_address['country'] ?? ''}}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
                bgcolor="#e1e1e1">
                <tbody>
                    <tr>
                        <td>
                            <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
                                bgcolor="#ffffff">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table width="520" border="0" cellpadding="0" cellspacing="0" align="center"
                                                class="fullPadding">
                                                <tbody>
                                                    <tr style="background:#01703A;">
                                                        <th style=" font-size: 13px; font-family: 'Open Sans' , sans-serif;
                                                    color: #fff; font-weight: 600; line-height: 1; vertical-align: top;
                                                    padding: 10px 10px 10px 4px;" width="52%" align="left">
                                                            Item
                                                        </th>
                                                        <th style="font-size: 13px; font-family: 'Open Sans', sans-serif; color: #fff; font-weight: 600; line-height: 1; vertical-align: top; padding: 8px 0 8px;"
                                                            align="center">
                                                            Quantity
                                                        </th>
                                                        <th style="font-size: 13px; font-family: 'Open Sans', sans-serif; color: #fff; font-weight: 600; line-height: 1; vertical-align: top; padding: 8px 0 8px;"
                                                            align="center">
                                                            Price
                                                        </th>
                                                    
                                                        <th style="font-size: 13px; font-family: 'Open Sans', sans-serif; color: #fff; font-weight: 600; line-height: 1; vertical-align: top; padding: 8px 4px 8px 0;"
                                                            align="right">
                                                            Subtotal
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td height="1" style="background: #bebebe;" colspan="4"></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="10" colspan="4"></td>
                                                    </tr>

                                                    @foreach ($order->items as $item)
                                                        <tr>
                                                            <td style="font-size: 13px; font-family: 'Open Sans', sans-serif; color: #414141; font-weight: 500; line-height: 18px;  vertical-align: top; padding:10px 0;" class="article"> {{$item->product?->product_name ?? ''}} </td>
                                                            <td style="font-size: 13px; font-family: 'Open Sans', sans-serif; color: #414141;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="center">{{$item->quantity ?? 0}}</td>
                                                            <td style="font-size: 13px; font-family: 'Open Sans', sans-serif; color: #414141;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="center"> {{config('app.currency_symbol')}}{{$item->price ?? 0}} </td>
                                                            <td style="font-size: 13px; font-family: 'Open Sans', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="right"> {{config('app.currency_symbol')}}{{$item->price * $item->quantity ?? 0}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"> </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>


            
            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
                bgcolor="#e1e1e1">
                <tbody>
                    <tr>
                        <td>
                            <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
                                bgcolor="#ffffff" style=" padding-bottom:20px">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table width="520" border="0" cellpadding="0" cellspacing="0" align="center"
                                                class="fullPadding">
                                                <tbody>
                                                    <tr>
                                                        <td class="invoceTotal">
                                                            <table width="340" border="0" cellpadding="" cellspacing=""
                                                                align="right" class="col"
                                                                style="display: flex;justify-content: end;">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="font-size: 13px; font-family: 'Open Sans', sans-serif; color: #414141; line-height: 22px; vertical-align: top; text-align:right; padding:8px 0;"> Subtotal </td>
                                                                        <td style="font-size: 13px; font-family: 'Open Sans', sans-serif; color: #414141; line-height: 22px; vertical-align: top; text-align:right; white-space:nowrap;padding:8px 0;" width="180"> {{config('app.currency_symbol')}}{{$order->subtotal ?? 0}} </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                                                                    </tr>
                                                                    @if($order->discount && $order->discount > 0)
                                                                    <tr>
                                                                        <td style="font-size: 13px; font-family: 'Open Sans', sans-serif; color: #414141; line-height: 22px; vertical-align: top; text-align:right; padding:8px 0;"> Discount</td>
                                                                        <td style="font-size: 13px; font-family: 'Open Sans', sans-serif; color: #414141; line-height: 22px; vertical-align: top; text-align:right; white-space:nowrap;padding:8px 0;" width="180"> - {{config('app.currency_symbol')}}{{$order->discount ?? 0}} </td>
                                                                    </tr>
                                                                    @endif
                                                                    @if($order->shipping_cost && $order->shipping_cost > 0)
                                                                        <tr>
                                                                            <td style="font-size: 13px; font-family: 'Open Sans', sans-serif; color: #414141; line-height: 22px; vertical-align: top; text-align:right; padding:8px 0;"> Shipping Cost</td>
                                                                            <td style="font-size: 13px; font-family: 'Open Sans', sans-serif; color: #414141; line-height: 22px; vertical-align: top; text-align:right; white-space:nowrap;padding:8px 0;" width="180"> + ${{$order->shipping_cost ?? 0}} </td>
                                                                        </tr>
                                                                    @endif
                                                                    <tr style="background:#01703A;display: flex;justify-content: space-between;">
                                                                        <td style="font-size: 13px; font-family: 'Open Sans', sans-serif; color: #fff; line-height: 22px; vertical-align: top; text-align:right; padding:8px 0 8px 5px;"> <strong>Grand Total</strong> </td>
                                                                        <td
                                                                            style="font-size: 13px; font-family: 'Open Sans', sans-serif; color: #fff; line-height: 22px; vertical-align: top; text-align:right; padding:8px 5px 8px 0;">
                                                                            <strong>{{config('app.currency_symbol')}}{{ $order->total_amount ?? 0 }}</strong>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
                bgcolor="#e1e1e1">
                <tr>
                    <td>
                        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
                            bgcolor="#ffffff" style="border-radius: 0 0 10px 10px; padding:20px 0 40px 0">
                            <tr>
                                <td>
                                    <table width="520" border="0" cellpadding="0" cellspacing="0" align="center"
                                        class="fullPadding">
                                        <tbody>
                                            <tr>
                                                <td
                                                    style="font-size: 13px; color: #414141; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: left;">

                                                    <strong style="font-size:14px;">Terms and conditions</strong> <br>
                                                    Writing down payment terms helps clients process payments faster, which
                                                    in
                                                    turn, results in better cash flow for the billing party.
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td height="20"></td>
                </tr>
            </table>
        </div>
    </body>
</html>
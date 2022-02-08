@extends('_template.layout')

@section('title', 'Durian Online: guarantee premeime grade')

@section('content')
<section class="page-section">
    <div class="container">
        <div class="product-item">
            <div class="product-item-title d-flex">
                <div class="bg-faded p-5 d-flex ml-auto rounded">
                    <h2 class="section-heading mb-0">
                        <span class="section-heading-upper"></span>
                        <td><a class="btn btn-success" href="/">กลับหน้าหลัก</a></td>

                    </h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="page-section">
    <div class="container">
        <div class="about-heading-content">
            <div class="bg-faded rounded p-5">
                <div class="text-right">

                </div>
                <table class="table table-striped table-hover table-reflow">

                    <thead>
                        <tr>
                            <th><strong> เลขที่คำสั่งซื้อ </strong></th>
                            <th><strong> วันที่สั่ง </strong></th>
                            <th><strong> ยอดสั่งสินค้า </strong></th>
                            <th><strong> ราคาสินค้า </strong></th>
                            <th><strong>รวมราคา </strong></th>

                            <th><strong> ลูกค้าที่สั่งสินค้า </strong></th>
                            <th><strong> สินค้า </strong></th>
                            <th><strong> ผู้ผลิต </strong></th>
                            <th style="width:100px;" class="text-center"></th>

                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        @foreach ( $supplier_order as $supplier_order)
                        <?php

                        $num1 =  $supplier_order->sup_order_total;

                        $num2 =  $supplier_order->sup_price;

                        $totalraw = $num1 * $num2;
                        ?>
                        <tr>
                            <td class="text-center"> {{$supplier_order->order_id}} </td>
                            <td class="text-center"> {{formatDateThat($supplier_order->sup_order_date)}} </td>
                            <td class="text-center"> {{$supplier_order->sup_order_total}} </td>
                            <td class="text-center"> {{$supplier_order->sup_price}} </td>
                            <td class="text-center"> {{$totalraw}} </td>

                            <td class="text-center"> {{$supplier_order->User->name}} </td>
                            <td class="text-center"> {{$supplier_order->Product->Type->product_tpye}} </td>
                            <td class="text-center"> {{$supplier_order->Supplier->sup_name}} </td>
                            <td class="text-center"><a class="btn btn-primary d-print-none -" href="/report_sup/{{$supplier_order->id}}">รายละเอียด</a></td>
                        </tr>


                        @endforeach
                    </tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


@endsection
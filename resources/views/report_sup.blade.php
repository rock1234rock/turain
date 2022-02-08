@extends('_template.layout')

@section('title', 'Durian Online: guarantee premeime grade')

@section('content')
<section class="page-section">
    <div class="container">
        <div class="about-heading-content">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif


            <form class="bg-faded2 rounded p-5">
                @csrf

                <div class="text-center">


                    <div class="text-right">
                        <h1 class="site-heading text-center text-red ">
                            <span class="site-heading-upper text-primary mb-3">Durian guarantee premeime grade</span>
                            <span class="site-heading-upper">ทุเรียนออนไลน์การัตรีเกรดพรีเมี่ยม</span>
                        </h1>
                        <div class="text-right">
                            <button class="btn btn-success d-print-none " onClick="window.print ()">พิมพ์รายงาน</button>
                        </div>
                    </div>
                    <h2 class="site-heading text-right text-red ">

                        <span class="site-heading-upper">รายละเอียดการสั่งสินค้า</span>
                    </h2>
                    <div class="text-left">
                        <label><strong>เลขที่การสั่งซื้อ</strong></label>
                        <label><strong>{{$supplier_order->id}}</strong></label>
                    </div>
                    <div class="text-left">
                        <label><strong>ชื่อลูกค้า</strong></label>
                        <label><strong>{{$supplier_order->User->name}}</strong></label>
                    </div>
                    <div class="text-right">
                        <label>วันที่สั่งสินค้า</label>
                        <label>{{formatDateThat($supplier_order->sup_order_date)}}</label>
                    </div>
                    <table class="table table-bordered ">

                        <thead class="thead-dark">
                            <tr>
                                <th><strong> เลขที่คำสั่งซื้อของลูกค้า</strong></th>
                                <th><strong> วันที่สั่ง </strong></th>
                                
                                
                                <th><strong> สินค้า </strong></th>
                                <th><strong> ยอดสั่งสินค้า </strong></th>
                                <th><strong> ราคาสินค้า </strong></th>
                                <th><strong>รวมราคา </strong></th>


                            <th><strong> ลูกค้าที่สั่งสินค้า </strong></th>
                                <th><strong> ผู้ผลิต </strong></th>


                            </tr>
                        </thead>
                        <tbody>
                        <tbody>

                            <?php

                            $num1 =  $supplier_order->sup_order_total;

                            $num2 =  $supplier_order->sup_price;

                            $totalraw = $num1 * $num2;
                            ?>
                            <tr>
                                <td class="text-center"> {{$supplier_order->order_id}} </td>
                                <td class="text-center"> {{formatDateThat($supplier_order->sup_order_date)}} </td>
                                <td class="text-center"> {{$supplier_order->Product->Type->product_tpye}} </td>


                                <td class="text-center"> {{$supplier_order->sup_order_total}} </td>
                                <td class="text-center"> {{$supplier_order->sup_price}} </td>
                                <td class="text-center"> {{$totalraw}} </td>


                                <td class="text-center"> {{$supplier_order->User->name}} </td>
                                <td class="text-center"> {{$supplier_order->Supplier->sup_name}} </td>

                            </tr>


                        </tbody>


                    </table>


            </form>



</section>




@endsection
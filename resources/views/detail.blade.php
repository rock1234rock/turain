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

                    </div>
                    <div class="text-right">
                        <button class="btn btn-success d-print-none " onClick="window.print ()">พิมพ์รายงาน</button>
                    </div>
                    <h2 class="site-heading text-right text-red ">

                        <span class="site-heading-upper">รายละเอียดการขาย</span>
                    </h2>
                    <div class="text-left">
                        <label><strong>เลขที่การชำระเงิน</strong></label>
                        <label><strong>: {{$orders->id}}</strong></label>
                    </div>
                    <div class="text-left">
                        <label>ชื่อลูกค้า</label>
                        <label>{{$orders->User->name}}</label>
                    </div>
                    <div class="text-left">
                        <label>ที่รับสินค้า</label>
                        <label>{{$orders->add2}}</label>
                    </div>
                    <div class="text-right">
                        <label>วันที่สั่งสินค้า</label>
                        <label>{{formatDateThat($orders->created_at)}}</label>
                    </div>
                    <div class="text-right">
                        <label>วันที่ชำระเงิน</label>
                        <label>{{formatDateThat($orders->created_at)}}</label>
                    </div>
                    <div class="text-right">
                        <label>วันที่ส่งสินค้า</label>
                        <label>{{formatDateThat($orders->send)}}</label>
                    </div>
                    <div class="text-right">
                        <label>วันที่รับสินค้า</label>
                        <label>{{formatDateThat($orders->receiv)}}</label>
                    </div>
            </form>
            <table class="table table-bordered ">

                <thead class="thead-dark">
                    <tr>
                        <th class="test-center"><strong>สินค้า</strong></th>
                        <th class="test-center"><strong>ต้นทุน</strong></th>
                        <th class="test-center"><strong>ราคาขาย</strong></th>
                        <th class="text-center"><strong>จำนวน</strong></th>
                        <th class="test-center"><strong>ต้นทุนรวม</strong></th>
                        <th class="test-center"><strong>ราคาขายรวม</strong></th>
                        <th class="test-center"><strong>รายได้</strong></th>


                    </tr>
                </thead>
                <tbody>
                <tbody>
                    <?php
                    $totalraw2 = 0;
                    $totalcost2 = 0;
                    $Netincome = 0;

                    ?>
                    @foreach ($Orderdetail as $Orderdetail)
                    <?php

                    $num1 =  $Orderdetail->prod_price;

                    $num2 =  $Orderdetail->amount;

                    $totalraw = $num1 * $num2;
                    $totalraw2 = $totalraw2 + $totalraw;
                    $num3 = $Orderdetail->SupplierOrder->sup_price;
                    $totalcost = $num3 * $num2;
                    $totalcost2 = $totalcost2 + $totalcost;
                    $Netincome = $totalraw2 - $totalcost2;
                    $income = $totalraw - $totalcost;
                    ?>
                    <tr>
                        <td class="text-center">{{$Orderdetail->Product->Type->product_tpye}}</td>
                        <td class="text-right">{{number_format($Orderdetail->SupplierOrder->sup_price),2}} </td>
                        <td class="text-right">{{number_format($Orderdetail->prod_price),2}} </td>
                        <td class="text-right">{{$Orderdetail->amount}} </td>
                        <td class="text-right"> {{number_format($totalcost2,2)}}</td>
                        <td class="text-right"> {{number_format($totalraw,2)}}</td>
                        <td class="text-right"> {{number_format($income,2)}}</td>


                    </tr>

                    @endforeach
                    <td class="text-center" colspan="4"> <strong>รายได้รวม</strong> </td>

                    <td class="text-center" colspan="3">{{number_format($Netincome,2)}}</td>
                </tbody>


            </table>


</section>

@endsection
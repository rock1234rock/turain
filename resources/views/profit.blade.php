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
                        <span class="section-heading-lower">รายงานกำไรขาดทุน</span>
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
                    <form method="GET" action="/profit/">

                        <div class="row d-print-none " >
                           
                            <div class="col-4">
                                <input type="date" name="search" class="form-control" placeholder="เลือกวันที่เริ่ม">
                            </div>
                            <div class="col-4">
                                <input type="date" name="to" class="form-control" placeholder="เลือกวันที่เริ่ม">
                            </div>
                            <div class=" text-right">
                                <button class="btn btn-success">ค้นหา</button>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="text-right">
                <button class="btn btn-success d-print-none " onClick="window.print ()">พิมพ์รายงาน</button>
                </div>
                <table class="table table-striped table-hover table-reflow">
                    <thead>
                        <tr>
                            <th style="width:150px;" class="text-center"><strong> เลขที่ชำระเงิน</strong></th>
                            <th style="width:150px;" class="text-center"><strong> วันที่สั่งซื้อ </strong></th>
                            <th  class="text-center"><strong> ชื่อผู้สั่ง </strong></th>

                            <th style="width:150px;" class="text-center"><strong> ราคาขายรวม </strong></th>
                            <th style="width:150px;" class="text-center"><strong> ต้นทุนรวม </strong></th>
                            <th style="width:150px;" class="text-center"><strong> รายได้สุทธิ </strong></th>
        
                            <th style="width:150px;" class="text-center"><strong> สถานะการจ่ายเงิน </strong></th>
                            

                            
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $totalprofit = 0;
                            $totalcost =0 ;
                            $totalsell = 0 ; 
                        ?>
                        @foreach ($orders as $order)
                        <?php
                        $cost = 0;
                         
                        foreach ($order->supplier_order as $supplier) {
                            $cost += $supplier->sup_price * $supplier->sup_order_total;
                            

                        }
                        $profit = $order->total_price - $cost;
                        $totalprofit = $totalprofit + $profit ;
                        $totalcost = $totalcost+$cost;
                        $totalsell = $totalsell + $order->total_price ;
                        ?>
                        @if($order->status != 'รอการยืนยันการชำระเงิน')
                        <tr>
                            <td class="text-center">{{$order->id}} </td>
                            <td class="text-center">{{formatDateThat($order->created_at)}} </td>
                            <td class="text-center">{{$order->User->name}}</td>
                            

                            <td class="text-right">{{number_format($order->total_price)}}</td>
                            <td class="text-right">{{number_format($cost)}}</td>
                            <td class="text-right">{{number_format($profit)}}</td>
                            <td class="text-center">{{$order->status}}</td>
                            <td class="text-center"><a class="btn btn-primary d-print-none -" href="/detail/{{$order->id}}">รายละเอียด</a></td>
                            
                         
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-right"><strong>รวม</strong></td>
                            <td class="text-right">{{number_format($totalsell),2}}</td>
                            <td class="text-right">{{number_format($totalcost)}}</td>
                            <td class="text-right">{{number_format($totalprofit)}}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>




@endsection
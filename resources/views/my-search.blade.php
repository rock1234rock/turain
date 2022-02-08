@extends('_template.layout')

@section('title', 'Durian Online: guarantee premeime grade')

@section('content')
<section class="page-section">
	<div class="container">
		<div class="about-heading-content">
			<div class="bg-faded rounded p-5">
				<div class="text-right">
					<form method="GET" action="{{ url('my-search') }}">

						<div class="row">
						<div class="text-left">
								<label>ค้นหา</label>
							</div>
							<div class="col-7">
								<input type="text" name="search" class="form-control" placeholder="กรอกรหัสผู้ใช้หรือรหัสสินค้า" value="{{ old('search') }}">
							</div>
							<div class="text-right">
								<button class="btn btn-success">ค้นหา</button>
							</div>
						</div>

					</form>
				</div>
				<table class="table table-striped table-hover table-reflow">
					<thead>
						<tr>
							<th class="text-center"><strong>ผู้สั่งสินค้า</strong></th>
							<th class="text-center"><strong>สินค้า</strong></th>
							<th class="text-center"><strong>จำนวน</strong></th>
							<th class="test-center"><strong>ราคา</strong></th>
							<th class="test-center"><strong>วันที่ชำระเงิน</strong></th>
							<th class="text-center" style="width:100px;"></th>
						</tr>
					</thead>
					<tbody>
						@if($order_detail->count())
						@foreach($order_detail as $order_detail)
						<tr>
							<td class="text-center">{{$order_detail->User->name}}</td>
							<td class="text-center">{{$order_detail->Product->Type->product_tpye}}</td>
							<td class="text-center">{{$order_detail->amount}}</td>
							<td class="text-center">{{$order_detail->prod_price}} </td>
							<td class="text-center">{{date_format($order_detail->created_at,"Y/m/d ")}}</td>
						</tr>
						@endforeach
						@else
						<tr>
							<td style="width: 100px" >ไม่พบรายการ</td>
						</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>


@endsection
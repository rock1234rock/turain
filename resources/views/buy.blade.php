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


            <td class="text-center"> <a class="btn btn-primary" href="/Orderdetail">กลับยังตระกร้าสินค้า</a> </td>
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
            <h2 class="section-heading mb-0">
              <span class="section-heading-upper"></span>
              <span class="section-heading-lower text-center ">รายการชำระเงิน</span>

            </h2>
            <tr>
              <th style="width:150px;" class="text-center"><strong> เลขที่ชำระเงิน</strong></th>
              <th style="width:150px;" class="text-center"><strong> ชื่อผู้สั่ง </strong></th>
              <th style="width:150px;" class="text-center"><strong> จำนวน </strong></th>
              <th style="width:150px;" class="text-center"><strong> ยอดชำระ </strong></th>
              <th style="width:150px;" class="text-center"><strong> สลิปโอนเงิน </strong></th>


              <th style="width:150px;" class="text-center"><strong> สถานะการจ่ายเงิน </strong></th>
              <th style="width:150px;" class="text-center"><strong> วันที่รับของและบริการขนส่ง </strong></th>
              <th style="width:150px;" class="text-center"><strong> เลขติดตามสินค้า </strong></th>

            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $order)
            <tr>
              <td class="text-center">{{$order->id}} </td>
              <td class="text-center">{{$order->User->name}}</td>
              <td class="text-center">{{$order->total}}</td>
              <td class="text-center">{{number_format($order->total_price)}}</td>
              <td class="text-center"><button data-toggle="modal" data-target="#showModal" data-id="{{$order->id}}" data-receipt="{{$order->receipt}}">
                  <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="receipts/{{$order->receipt}}"></button></a></td>


              <td class="text-center">{{$order->status}} </td>
              <td class="text-center">{{formatDateThat($order->receiv)}} {{$order->delivery}}</td>
              <td class="text-center">
                @if($order->tag == 'รอรับเลขติดตามพัสดุ')
                รอรับเลขติดตามพัสดุ
                @else
                <a href="https://kerryexpress.thaiware.com/{{$order->tag}}" target="_blank">{{$order->tag}}</a>
                @endif
              </td>

              <div>
                <td class="text-center">
                  <label>@if($order->status != 'รอการยืนยันการชำระเงิน') <a class="btn btn-primary" href="/slip/{{$order->id}}">ใบเสร็จ</a> <label>
                      @endif
                      <label></label>
                      <label> @if(auth()->user()->admin())
                        <button class="btn btn-success" data-toggle="modal" data-target="#addtagModal" data-id="{{$order->id}}" data-user_name="{{$order->User->name}}" data-total="{{$order->total}}" data-price="{{number_format($order->total_price)}}" data-receipt="{{$order->receipt}}" data-status="{{$order->status}}" data-tag="{{$order->tag}}">Tag</button>
                        @endif </label>
                </td>
              </div>



            </tr>

            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<!-- Modal -->
<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="modal-content" method="POST" action="/Order/">
      @csrf @method('put')
      <div class="modal-header">
        <h5 class="modal-title" id="showModalLabel">หลักฐารการชำระเงิน</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">

          <label><img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="receipts/{{$order->receipt}}"></label>
          <label hidden>หมายเลขTag</label>
          <input type="text" value="รอรับเลขติดตามพัสดุ" id="tag" name="tag" class="form-control" hidden>
        </div>
        <div class="col-7">

          <label><input type="text" value="ชำระเงินแล้ว" id="status" name="status" readonly hidden /></label>
        </div>
      </div>
      @if(auth()->user()->admin())
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="submit" class="btn btn-primary">ยืนยันการชำระเงิน</button>
      </div>
      @endif
    </form>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addtagModal" tabindex="-1" role="dialog" aria-labelledby="addtagModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="modal-content" method="POST" action="/Order/">
      @csrf @method('put')
      <div class="modal-header">
        <h5 class="modal-title" id="addtagModalLabel">Tag</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>เลขที่ชำระเงินที </label>
          <label id="modalid"></label>
        </div>
        <div class="form-group">
          <label>สั่งซื้อโดยคุณ</label>
          <label id="modaluser_name"></label>
        </div>
        <div class="form-group">
          <label>สินค้าจำนวนทั้งหมด</label>
          <label id="modaltotal"></label>
          <label>ชิ้น</label>
        </div>
        <div class="form-group" hidden>
          <label id="modalprice"></label>
          <label id="modalreceipt"></label>
          <label id="modalstatus"></label>
        </div>
        <div class="form-group">
          <label>หมายเลขTag</label>
          <input type="text" id="tag" name="tag" class="form-control">
        </div>
        <div class="form-group">
          <label>วันที่ส่ง</label>
          <input type="date" name="send" id="send" class="form-control" required>
        </div>
        <div class="col-7">

          <label><input type="text" value="กำลังจัดส่ง" id="status" name="status" readonly hidden /></label>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
          <button type="submit" class="btn btn-primary">ยืนยัน</button>
        </div>
    </form>
  </div>
</div>
@endsection

@section('script')
<script>
  $('#addtagModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var user_name = button.data('user_name') // Extract info from data-* attributes
    var total = button.data('total')
    var price = button.data('price')
    var receipt = button.data('receipt')
    var status = button.data('status')
    var tag = button.data('tag')
    var modal = $(this)
    modal.find('.modal-title').text('เพิ่มการติดตามสินค้าตามเลขที่ชำระเงินที่: ' + id);
    modal.find('.modal-body label#modalid').text(id)
    modal.find('.modal-body label#modaluser_name').text(user_name)
    modal.find('.modal-body label#modaltotal').text(total)
    modal.find('.modal-body label#modalprice').text(price)
    modal.find('.modal-body label#modalreceipt').text(receipt)
    modal.find('.modal-body label#modalstatus').text(status)
    modal.find('.modal-content').attr('action', '/Order/' + id);
    modal.find('.modal-body input#tag').val(tag)


  });
</script>

<script>
  $('#showModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes

    var receipt = button.data('receipt')

    var modal = $(this)
    modal.find('.modal-title').text('หลักฐารการชำระเงิน: ' + id);
    modal.find('.modal-body label#modalid').text(id)

    modal.find('.modal-body label#modalreceipt').text(receipt)

    modal.find('.modal-content').attr('action', '/Order/' + id);


  });
</script>
@endsection ('script')
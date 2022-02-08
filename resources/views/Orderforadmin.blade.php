@extends('_template.layout')

@section('title', 'Durian Online: guarantee premeime grade')

@section('content')


<section class="page-section">
  <div class="container">

    <div class="about-heading-content">
      <div class="bg-faded rounded p-5">

        <table class="table table-striped table-hover table-reflow">
          <thead>
            
            <br><h2 class="section-heading mb-0">
              <span class="section-heading-upper"></span>
              <span class="section-heading-lower text-center ">สั่งสินค้าตามรายการสั่งสินค้าของลูกค้า</span>

            </h2> </br>
            

            <br> <div class="text-right">
              <form method="GET" action="{{ url('my-search') }}">

                <div class="row right">
                  
                  <div class="col-7">
                    <input type="text-right" name="search" class="form-control" placeholder="กรอกรหัสหรือชื่อผู้ใช้" value="{{ old('search') }}">
                  </div>
                  <div class="text-right">
                    <button class="btn btn-success">ค้นหา</button>
                  </div>
                </div>

              </form>
            </div> </br>
            <tr>
              <th class="text-center"><strong>ผู้สั่งสินค้า</strong></th>
              <th class="text-center"><strong>สินค้า</strong></th>
              <th class="text-center"><strong>ราคา</strong></th>
              <th class="test-center"><strong>จำนวน</strong></th>
              <th class="test-center"><strong>ราคารวม</strong></th>
              <th class="test-center"><strong>วันที่ชำระเงิน</strong></th>
              <th class="text-center" style="width:100px;"></th>
            </tr>
          </thead>
          <tbody>
          <tbody>
            @if($order_detail->count() > 0)

            @foreach ($order_detail as $order_detail)
            <?php

            $num1 =  $order_detail->prod_price;

            $num2 =  $order_detail->amount;

            $totalraw = $num1 * $num2;
            ?>
            <tr>
              <td class="text-center">{{$order_detail->User->name}}</td>
              <td class="text-center">{{$order_detail->Product->Type->product_tpye}}</td>
              <td class="text-center">{{$order_detail->prod_price}} </td>
              <td class="text-center">{{$order_detail->amount}}</td>
              <td class="text-center"><?php echo number_format($totalraw) ?> </td>
              <td class="text-center">{{formatDateThat($order_detail->created_at)}}</td>
              <td class="text-center"><button class="btn btn-success" data-toggle="modal" data-target="#addModal" data-id="{{$order_detail->order_id}}" data-user_name="{{$order_detail->User->name}}" data-prod="{{$order_detail->Product->Type->product_tpye}}" data-prod_id="{{$order_detail->prod_id}}" data-amount="{{$order_detail->amount}}" data-user_id="{{$order_detail->user_id}}" data-order_detail_id="{{$order_detail->id}}">สั่งสินค้า</button></td>
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan="8" class="text-center">ไม่พบรายการ</td>
            </tr>
            @endif
          </tbody>
        </table>
        </tr>
        </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="modal-content" method="POST" action="/supplier_order/">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">สต็อกสินค้า</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-7">
          <label>สินค้าที่ต้องการสั่ง</label>
        </div>
        <div class="col-7">
          <label id="modalprod"></label>
          <input type="text" name="prod_id" id="modalprod_id" class="form-control" hidden>
        </div>
        <div class="col-7">
          <label>จำนวนสินค้า</label>
          <input type="number" name="sup_order_total" id="modalamount" class="form-control" readonly>
        </div>
        <div class="col-7">
          <label>ต้นทุน</label>
          <input type="number" name="sup_price" class="form-control" required>

        </div>
        <div class="col-7">
          <label>ตามราการสั่งสินค้าเลขที่ : </label>
          <label id="modalid"></label>
          <input type="text" name="order_id" id="modalid" class="form-control" hidden>
        </div>
        <div class="col-7">
          <label>ชื่อลูกค้า</label>
        </div>
        <div class="col-7">
          <label id="modaluser_name"></label>
          <input type="text" name="user_id" id="modaluser_id" class="form-control" hidden>
        </div>
        <div class="col-7">
          <label>ชื่อผู้ผลิต</label>
          <select name="sup_id" class="form-control" required>
          <option value="" selected> เลือกผู้ผลิต </option>
          @foreach ($Supplier as $supplier )
            <option value="{{$supplier->id}}">{{$supplier->sup_name}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-7">
          <label>วันที่รับสินค้า</label>
          <input type="date" name="sup_order_date" class="form-control" required>
        </div>
        <div class="col-7">
        <label></label>
          <input name="order_detail_id" id="modalorder_detail_id" value="0"  hidden />
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="submit" class="btn btn-primary">บันทึก</button>
       
      </div>
    </form>
  </div>
</div>
@endsection
@section('script')
<script>
  $('#addModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var user_name = button.data('user_name') // Extract info from data-* attributes
    var prod = button.data('prod')
    var prod_id = button.data('prod_id')
    var amount = button.data('amount')
    var user_id = button.data('user_id')
    var order_detail_id = button.data('order_detail_id')

    var modal = $(this)
    modal.find('.modal-title').text('สั่งสินตามออร์เดอร์ลูกค้า: ' + id);
    modal.find('.modal-body label#modalid').text(id)
    modal.find('.modal-body input#modalid').val(id)
    modal.find('.modal-body label#modaluser_name').text(user_name)
    modal.find('.modal-body label#modalprod').text(prod)
    modal.find('.modal-body input#modalprod_id').val(prod_id)
    modal.find('.modal-body input#modalamount').val(amount)
    modal.find('.modal-body input#modaluser_id').val(user_id)
    modal.find('.modal-body input#modalorder_detail_id').val(order_detail_id)
  });
</script>



@endsection
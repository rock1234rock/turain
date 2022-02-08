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

            <td class="text-center"> <a class="btn btn-primary" href="/Order">สั่งสินค้าเพิ่มเติม</a> </td>

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
        <form method="POST" action="/Order" enctype="multipart/form-data">
          @csrf
          <table class="table table-striped table-hover table-reflow">
            <thead>
              <h2 class="section-heading mb-0">
                <span class="section-heading-upper"></span>
                <span class="section-heading-lower text-center ">ตระกร้าสินค้า</span>
              </h2>
              <tr>
                <th class="text-center" style="width:90px;"><strong>เลือกรายการ</strong></th>

                <th class="text-center"><strong>ผู้สั่งสินค้า</strong></th>
                <th class="text-center"><strong>สินค้า</strong></th>

                <th class="test-center"><strong>ราคา</strong></th>
                <th class="text-center"><strong>จำนวน</strong></th>
                <th class="test-center"><strong>ราคารวม</strong></th>
                <th class="text-center" style="width:100px;"></th>
              </tr>
            </thead>

            <tbody>
              @if($Orderdetail->isNotEmpty())
              @foreach ($Orderdetail as $Orderdetail)
              <?php
              $num1 =  $Orderdetail->prod_price;
              $num2 =  $Orderdetail->amount;
              $totalraw = $num1 * $num2;
              ?>
              <tr>
                <td class="text-center">
                  <input name="pay[]" value="{{$Orderdetail->id}}" type="checkbox" onclick="amounts()" />
                  <input type="text" name="amount" value="{{$Orderdetail->amount}}" hidden>
                  <input type="text" name="total" value="{{$totalraw}}" hidden>
                </td>
                <td class="text-center">{{$Orderdetail->User->name}}</td>
                <td class="text-center">{{$Orderdetail->Product->Type->product_tpye}}</td>
                <td class="text-center">{{$Orderdetail->prod_price}} </td>
                <td class="text-center">{{$Orderdetail->amount}} </td>
                <td class="text-center"><?php echo number_format($totalraw) ?> </td>
                <td class="text-center">
                  <button class="btn btn-success" data-toggle="modal" data-target="#addModal" data-id="{{$Orderdetail->id}}" data-user_name="{{$Orderdetail->User->name}}" data-prod="{{$Orderdetail->Product->Type->product_tpye}}" data-prod_id="{{$Orderdetail->prod_id}}" data-amount="{{$Orderdetail->amount}}" data-user_id="{{$Orderdetail->user_id}}">ลบ</button>
                </td>
              </tr>
              @endforeach
              @else
              <tr>
                <td  class="text-center"colspan="7">กรุณาเลือกสินค้า</td>
              </tr>
              @endif
            </tbody>

          </table>


          <div class="form-row">

            <div class="col-7">
              <label><strong>สรุปรายการสั่งซื้อ</strong></label>
            </div>
            <div class="form-group col-md-6">
              <label>ยอดสินค้า</label>
              <label><input value="" readonly="readonly" type="text" id="amount" name="order_amount" class="form-control" required /></label>
            </div>
            <div class="form-group col-md-6">
              <label>ยอดชำระ</label>
              <label><input value="" readonly="readonly" type="text" id="total" name="total_price" class="form-control" required /></label>
            </div>

            <div class="form-group col-md-6">
              <label>เลือกบริการส่งสินค้า</label>
              <select name="delivery" class="form-control" required>
                <option value="" selected> เลือกบริการขนส่ง </option>
                <option value="ไปรษณีย์">ไปรษณีย์</option>
                <option value="เคอร์รี่ ">เคอร์รี่ </option>
                <option value="อื่นๆ">อื่นๆ</option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label>วันรับสินค้า</label>
              <input type="date" name="receiv" id="receiv" class="form-control" placeholder="<?php echo date('d-m-y '); ?>" required>
            </div>

            <div class="form-group col-md-12">
              <label>ที่รับสินค้า</label>
              <textarea name="add2" id="add2" class="form-control"></textarea>
            </div>

            <div class="form-group col-md-6">
              <label>จังหวัด</label>
              <select name="city" class="form-control" required>
                <option value="" selected> เลือกจังหวัด </option>
                @foreach ($citylist as $city )
                <option value="{{$city->city}}">{{$city->city}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group col-md-6">
              <label>รหัสไปรษณย์</label>
              <input type="text" name="zip" id="zip" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
              <label>สลิปโอนเงิน</label>
              <input type="file" id="receipt" name="receipt" required />
            </div>

            <div class="center">
              <label></label>
              <button type="submit" class="btn btn-primary">ยืนยันการชำระเงิน</button>
            </div>

            <div class="row">
              <div class="col-xl-9 col-lg-10 mx-auto">
                <div class="bg-faded rounded p-5">
                  <h2 class="section-heading mb-4">
                    <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="img/Automotive.png" alt="">
                  </h2>
                </div>
              </div>
            </div>

          </div>
        </form>

      </div>
    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <form class="modal-content" method="POST">
      @csrf
      @method('DELETE')
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">ยกเลิก</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-7">
          <label>ต้องการลบสินค้า</label>
        </div>

        <div class="col-7">
          <label id="modalprod"></label>
          <input type="text" name="prod_id" id="modalprod_id" class="form-control" hidden>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
          <button type="submit" class="btn btn-primary">บันทึก</button>
        </div>
      </div>

    </form>
  </div>
  @endsection

  @section('script')
  <script>
    function amounts() {
      var pay = document.getElementsByName("pay[]");
      var am = document.getElementsByName("amount");
      var amount = 0;
      for (var i = 0; i < pay.length; i++) {
        if (pay[i].checked) {
          amount += parseFloat(am[i].value);
        }
      }
      document.getElementById("amount").value = "" + amount + "";

      var pay = document.getElementsByName("pay[]");
      var tl = document.getElementsByName("total");
      var total = 0;
      for (var i = 0; i < pay.length; i++) {
        if (pay[i].checked) {
          total += parseFloat(tl[i].value);
        }
      }
      document.getElementById("total").value = "" + total + "";

    }
  </script>
  <script>
    $('#addModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('id') // Extract info from data-* attributes
      var user_name = button.data('user_name') // Extract info from data-* attributes
      var prod = button.data('prod')
      var prod_id = button.data('prod_id')
      var amount = button.data('amount')
      var user_id = button.data('user_id')

      var modal = $(this)
      modal.find('.modal-title').text('ยกเลิก: ' + prod);
      
      modal.find('.modal-content').attr('action', '/Orderdetail/'+id);

      modal.find('.modal-body label#modalid').text(id)
      modal.find('.modal-body input#modalid').val(id)
      modal.find('.modal-body label#modaluser_name').text(user_name)
      modal.find('.modal-body label#modalprod').text(prod)
      modal.find('.modal-body input#modalprod_id').val(prod_id)
      modal.find('.modal-body input#modalamount').val(amount)
      modal.find('.modal-body input#modaluser_id').val(user_id)
    });
  </script>

  @endsection
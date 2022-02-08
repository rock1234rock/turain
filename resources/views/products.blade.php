@extends('_template.layout')

@section('title', 'Durian Online: guarantee premeime grade')

@section('content')
<section class="page-section">
  <div class="container">
    <div class="product-item">
      <div class="product-item-title d-flex">
        <div class="bg-faded p-5 d-flex ml-auto rounded">
          <h2 class="section-heading mb-0">
            <span class="section-heading-upper">สินค้าของเรา</span>
            <span class="section-heading-lower">ยังคงมีแค่ทุเรียน</span>
          </h2>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="page-section">
  <div class="container">
    <div class="product-item">

</section>
<section class="page-section">
  <div class="container">
    <div class="about-heading-content">
      <div class="bg-faded rounded p-5">
        <div class="text-right">
          <button class="btn btn-success" data-toggle="modal" data-target="#addModal">Add</button>
        </div>
        <table class="table table-striped table-hover table-reflow">
          <thead>
            <tr>
              <th class="text-center" style="width:100px;"><strong> เลขที่ </strong></th>

              <th class="text-center"><strong>ประเภทสินค้า</strong></th>
              <th class="text-center"><strong>เกรด</strong></th>
              <th class="text-center"><strong>ราคา</strong></th>
              <th class="text-center"><strong>รูปสินค้า</strong></th>
              <th class="text-center"><strong>ราคา ณ วันที่ </strong></th>
              <th class="text-center" style="width:100px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
            <tr>
              <td class="text-center"> {{ $product->id}} </td>
              <td class="text-center">{{ $product->Type->product_tpye}}</td>
              <td class="text-center">{{ $product->Grade->grade}}</td>
              <td class="text-center">{{number_format($product->price)}} บาท </td>
              <td class="text-center"><button>
                  <img src="pics/{{$product->pic}}" width="200"></button></a></td>
              <td class="text-center"> {{formatDateThat($product->updated_at)}}</td>
              <td class="text-center"> <a class="btn btn-primary" href="/Product/{{$product->id}}/edit">แก้ไข</a> </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="modal-content" method="POST" action="/Product/" enctype="multipart/form-data">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">สินค้า</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <div class="form-group">
          <label>ประเภทสินค้า</label>
          <select name="product_type" class="form-control">
            @foreach ($product_types as $product_type )
            <option value="{{$product_type->id}}">{{$product_type->product_tpye}} </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>เกรด</label>
          <select name="grade" class="form-control">
            @foreach ($grades as $grade )
            <option value="{{$grade->id}}">{{$grade->grade}} </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>ราคา</label>
          <input type="number" name="price" class="form-control">
        </div>

        <div class="col-7">
          <label>รูปสินค้า</label>
          <input type="file" id="pic" name="pic" class="form-control">
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
@extends('_template.layout')

@section('title', 'Durian Online: guarantee premeime grade')

@section('content')
<section class="page-section">
    <div class="container">
        <div class="product-item">
            <div class="product-item-title d-flex">
                <div class="bg-faded p-5 d-flex ml-auto rounded">
                    <h2 class="section-heading mb-0">
                        <span class="section-heading-lower">สั่งสินค้า</span>

                        
                        <td class="text-center"> <a class="btn btn-primary" href="/Orderdetail">ตระกร้าสินค้า</a> </td>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</section>

@foreach ($products as $products)
<section class="page-section clearfix">



    <div class="container">
        <div class="intro">
            <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="pics/{{$products->pic}}" alt="">
            <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                <h2 class="section-heading mb-4">
                    <span class="section-heading-upper">ทุเรียนพันธ์ุ</span>
                    <span class="section-heading-lower">{{$products->Type->product_tpye}}</span>
                    <span class="section-heading-lower"> {{$products->Grade->grade}}</span>
                </h2>
                <p class="mb-3" size="1000">ราคา {{$products->price}} บาท </p>
                <button class="btn btn-success" data-toggle="modal" data-target="#addModal" data-id="{{$products->id}}" data-prod_name="{{$products->Type->product_tpye}}" data-prod_grade="{{$products->Grade->grade}}" data-prod_price="{{$products->price}}">สั่งสินค้า</button>

                </ul>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content" method="POST" action="/Orderdetail">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">สั่งซื้อสินค้า</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>ทุเรียนพันธ์ุ</label>

                        <label id="modalproduct"></label>
                        <label id="modalprod_grade"></label>
                        <input type="text" name="prod_id" id="modalprod_id" class="form-control" hidden>
                    </div>
                    <div class="form-group">
                        <label>ราคา</label>
                        <label id="modalprod_price"></label>
                        <label>บาท</label>
                    </div>
                    <div class="form-group">
                        <label>จำนวน</label>
                        <input type="number" name="amount" class="form-control" required min="1">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-primary">ยืนยัน</button>
                    </div>
            </form>
        </div>
    </div>
</section>
@endforeach
@endsection



@section('script')
<script>
    $('#addModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var prod_name = button.data('prod_name') // Extract info from data-* attributes
        var prod_grade = button.data('prod_grade')
        var prod_price = button.data('prod_price')
        var modal = $(this)
        modal.find('.modal-title').text('สั่ง: ' + prod_name);
        modal.find('.modal-body label#modalproduct').text(prod_name)
        modal.find('.modal-body input#modalprod_id').val(id)
        modal.find('.modal-body label#modalprod_grade').text(prod_grade)
        modal.find('.modal-body label#modalprod_price').text(prod_price)

    });
</script>
@endsection
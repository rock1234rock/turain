@extends('_template.layout')

@section('title', 'Durian Online: guarantee premeime grade')

@section('content')
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
                            <th style="width:150px;" class="text-center"><strong> เลขที่ </strong></th>
                            <th><strong> ชื่อชนิด </strong></th>
                            <th style="width:100px;" class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product_type as $product_type)
                        <tr>
                            <td class="text-center"> {{ $product_type->id }} </td>
                            <td> {{ $product_type->product_tpye }}</td>
                            <td class="text-center">
                                <a class="btn btn-primary" data-toggle="modal" data-target="#editModal" href="#" data-id="{{ $product_type->id }}" data-product_tpye="{{ $product_type->product_tpye }}">แก้ไข</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" method="POST" action="/ProductType">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">เพิ่มประเภทสินค้า</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>ประเภทสินค้า</label>
                <input type="text" name="product_tpye" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                <button type="submit" class="btn btn-primary">บันทึก</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" method="POST" action="/ProductType">
            @csrf @method('put')
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">แก้ไขประเภทสินค้า</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>ประเภทสินค้า</label>
                <!-- <input type="text" id="id" name="id" class="form-control"> -->
                <input type="text" id="product_tpye" name="product_tpye" class="form-control">
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
    $('#editModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var product_tpye = button.data('product_tpye') // Extract info from data-* attributes
        var modal = $(this)
        modal.find('.modal-title').text('แก้ไขประเภทสินค้า: ' + product_tpye);
        modal.find('.modal-content').attr('action', '/ProductType/'+id);
        modal.find('.modal-body input#product_tpye').val(product_tpye)
    });
</script>
@endsection
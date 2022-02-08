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
              <th class="text-center" style="width:100px;"><strong> รหัสผู้ผลิต </strong></th>
              <th class="text-center"><strong>ชื่อบริษัท</strong></th>

              <th class="text-center"><strong>ที่อยู่</strong></th>
              <th class="text-center"><strong>เบอร์โทร</strong></th>
              <th class="text-center"><strong>รหัสผู้ใช้</strong>
              <th class="text-center" style="width:100px;"></th>
            </tr>
          </thead>
          <tbody>
          <tbody>
            @foreach ($supplier as $supplier)
            <tr>
              <td class="text-center"> {{ $supplier->id}} </td>
              <td class="test-right">{{$supplier->sup_name}}</td>

              <td class="text-center"> {{ $supplier->address}}</td>
              <td class="text-center"> {{ $supplier->phone}}</td>
              <td class="text-center">{{ $supplier->user->fullname()}}</td>
              <td class="text-center">
                <a class="btn btn-primary" data-toggle="modal" data-target="#editModal" href="#" 
                  data-id="{{$supplier->id}}" data-sup_name="{{ $supplier->sup_name }}">แก้ไข</a>
              </td>

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
    <form class="modal-content" method="POST" action="/supplier/">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">เพิ่มผู้ผลิต</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>ชื่อบริษัท</label>
          <input type="text" name="sup_name" class="form-control">
        </div>
        <div class="form-group">
          <label>ที่อยู่</label>
          <input type="text" name="adress" class="form-control">
        </div>
        <div class="form-group">
          <label>เบอร์โทร</label>
          <input type="text" name="phone" class="form-control">
        </div>
        <div class="form-group">
          <label>ผู้ใช้</label>
            <select name="user_id" class="form-control">
            @foreach ($user_list as $user )
          <option value="{{$user->id}}">{{$user->name}} </option>
            @endforeach
        </select>
        </div>
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
    <form class="modal-content" method="POST" action="/supplier">
      @csrf @method('put')
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">แก้ไขผู้ผลิต</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label>ชื่อบริษัท</label>
        <input type="text" id="sup_name" name="sup_name" class="form-control">
      </div>
      <div class="modal-body">
        <label>ที่อยู่</label>
        <input type="text" id="adress" name="adress" class="form-control">
      </div>
      <div class="modal-body">
        <label>เบอร์โทร</label>
        <input type="text" id="phone" name="phone" class="form-control">
      </div>
      <div class="modal-body" >
      <label>ผู้ใช้</label>
      <select name="user_id" class="form-control">
        @foreach ($user_list as $user )
        <option value="{{$user->id}}">{{$user->name}} </option>
        @endforeach
      </select>
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
    var sup_name = button.data('sup_name') // Extract info from data-* attributes
    var modal = $(this)
    modal.find('.modal-title').text('แก้ไขผู้ผลิต: ' + sup_name);
    modal.find('form.modal-content').attr('action', '/supplier/' + id);
    modal.find('.modal-body input#supplier').val(sup_name)
  });
</script>
@endsection


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
                            <th><strong> เกรด </strong></th>
                            <th style="width:100px;" class="text-center"></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grade as $grade)
                        <tr>
                            <td class="text-center"> {{ $grade->id }} </td>
                            <td> {{ $grade->grade }}</td>
                            <td class="text-center">
                            <a class="btn btn-primary" data-toggle="modal" data-target="#editModal" href="#" data-id="{{$grade->id}}" 
                                data-grade="{{$grade->grade}}">แก้ไข</a>
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
        <form class="modal-content" method="POST" action="/grade">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">เพิ่มเกรด</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-7">
                    <label>เกรด</label>
                    <input type="text" name="grade" class="form-control">
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
        <form class="modal-content"  method="POST" action="/grade">
            @csrf @method('put')
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">แก้ไขเกรด</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>เกรด</label>
                <!-- <input type="text" id="id" name="id" class="form-control"> -->
                <input type="text" id="grade" name="grade" class="form-control" >
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
        var grade = button.data('grade') // Extract info from data-* attributes
        var modal = $(this)
        modal.find('.modal-title').text('แก้ไขเกรด: ' + grade);
        modal.find('.modal-content').attr('action', '/grade/'+id);
        modal.find('.modal-body input#grade').val(grade)
    });
</script>
@endsection
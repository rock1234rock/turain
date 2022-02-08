@extends('_template.layout')

@section('title', 'Durian Online: guarantee premeime grade')

@section('content')
<section class="page-section">
    <div class="container">
        <div class="about-heading-content">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="POST" action="/user/{{$user->id}}" class="bg-faded rounded p-5">
                @csrf
                @method('put')

                <div class="row form-group">
                    <div class="col-7">
                        <label>User Name </label>
                        <input type="text" name="name" class="form-control" value="{{$user->name}}" readonly>
                    </div>
                    <div class="col-5">
                        <label>Email </label>
                        <input type="email" name="email" class="form-control" value="{{$user->email}}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-2">
                        <label>คำนำหน้า </label>
                        <input type="text" name="preface" class="form-control" value="{{$profile->preface}}">
                    </div>
                    <div class="col-5">
                        <label>ชื่อ</label>
                        <input type="text" name="fristname" class="form-control" value="{{$profile->fristname}}">
                    </div>
                    <div class="col-5">
                        <label>นามสกุล</label>
                        <input type="text" name="lastname" class="form-control" value="{{$profile->lastname}}">
                    </div>
                </div>

                <div class="form-group">
                    <label>ที่อยู่</label>
                    <textarea name="address" id="address" class="form-control">{{$profile->address}}</textarea>
                </div>

                <div class="row form-group">
                    <div class="col-7">
                        <label>จังหวัด</label>
                        <input type="text" name="province" class="form-control" value="{{$profile->province}}">
                    </div>
                    <div class="col-5">
                        <label>รหัสไปรษณีย์</label>
                        <input type="text" name="zipcode" class="form-control" value="{{$profile->zipcode}}">
                    </div>
                </div>

                <div class="form-group">
                    <label>เบอร์โทรศัพท์</label>
                    <input type="text" name="phone" class="form-control" value="{{$profile->phone}}">
                </div>
                <div class="intro-button mx-auto">
                    <button class="btn btn-primary btn-xl">Edit</button>
                </div>

            </form>
        </div>
</section>
@endsection
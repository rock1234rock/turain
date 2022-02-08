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
            <form method="POST" action="/Product/{{$product->id}}" class="bg-faded rounded p-5">
                @csrf
                @method('put')
                <div class="row form-group">

                  
                    <div class="col-7">
                        <label>ประเภทสินค้า</label>
                        <select name="product_type" class="form-control">
                            @foreach ($product_types as $product_type )
                            <option value="{{$product_type->id}}" {{ $product_type->id === $product->product_type? 'selected': ''}}>{{$product_type->product_tpye}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-7">
                        <label>เกรด</label>
                        <select name="grade" class="form-control">
                            @foreach ($grades as $grade )
                            <option value="{{$grade->id}}" {{ $grade->id === $product->grade? 'selected': ''}}>{{$grade->grade}} </option>
                            @endforeach
                        </select>
                    </div>  
                    <div class="col-7">
                        <label>ราคา</label>
                        <input type="text" name="price" class="form-control" value="{{$product->price}}">
                    </div>
                    <div class = "col-7">
                        <label>รูปสินค้า</label>
                        <input type = "file" name="pic" class="form-control">
                    </div>
                    <div class="intro-button mx-auto">
                        <button class="btn btn-primary btn-xl">Edit</button>
                    </div>



            </form>
        </div>
</section>






@endsection
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
            <form method="POST" action="/grade/{{$grade->id}}" class="bg-faded rounded p-5">
                @csrf
                @method('put')
                <div class="row form-group">
                    <div class="col-7">
                        <label>เกรด</label>
                        <input type="text" name="grade" class="form-control" value="{{$grade->grade}}" >
                    </div>
                    
                <div class="intro-button mx-auto">
                    <button class="btn btn-primary btn-xl">Edit</button>
                </div>

            

                 </form>
        </div>
</section>
@endsection
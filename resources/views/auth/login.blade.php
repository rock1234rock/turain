@extends('_template.layout')

@section('title', 'Durian Online: guarantee premeime grade')

@section('content')
<section class="page-section clearfix">
    <div class="container">
      <div class="intro">
        <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="img/24207.jpg" alt="">
        <form method="POST" action="/login" class="intro-text left-0 text-center bg-faded p-5 rounded">
            @csrf
          <h2 class="section-heading mb-4">
            <span class="section-heading-upper">Welcom to </span>
            <span class="section-heading-lower">Login</span>
          </h2>
          <div>
            <label for="">email</label>
            <input type="email" name="email" class="form-control">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control">
          </div>
          <div class="intro-button mx-auto">
            <button class="btn btn-primary btn-xl">Login</button>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
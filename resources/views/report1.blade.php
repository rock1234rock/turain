@extends('_template.layout')

@section('title', 'Durian Online: guarantee premeime grade')

@section('content')
<section class="page-section">
    <div class="container">
        <div class="about-heading-content">
            <div class="bg-faded rounded p-5">
                <div class="text-right">
                    <div class="card-header">
                        <center>
                            <h1> กำไร-ขาดทุน </h1>
                        </center>
                    </div>
                </div>
                <form role="form" action="" autocomplete="off" method="POST">
                    {{csrf_field()}}
                    <div class="form-group-attached">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group form-group-default required">
                                    <label>From</label>
                                    <input type="date" class="form-control" name="from" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group form-group-default required">
                                    <label>To</label>
                                    <input type="date" class="form-control" name="to" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <button class="btn alt-btn-black btn-sm alt-btn pull-right" type="submit">Filter Date</button>
                </form>
            </div>
        </div>
    </div>
</section>







@endsection
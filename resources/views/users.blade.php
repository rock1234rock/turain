@extends('_template.layout')

@section('title', 'Durian Online: guarantee premeime grade')

@section('content')
<section class="page-section">
    <div class="container">
        <div class="about-heading-content">
            <div class="bg-faded rounded p-5">
            <table class="table table-striped table-hover table-reflow">
                <thead>
                    <tr>
                        <th><strong> Id: </strong></th>
                        <th><strong> Name: </strong></th>
                        <th><strong> Email: </strong></th>
                        <th><storong>User type</storong></th>
                        <th><strong>Edit</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td> {{ $user->id }} </td>
                        <td> {{ $user->name }}</td>
                        <td> {{ $user->email }} </td>
                        <td> {{ $user->usertype->typename}} </td>
                        <td> <a class="nav-link text-uppercase text-expanded" href="user/{{$user->id}}/edit">edit</a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
</section>
@endsection
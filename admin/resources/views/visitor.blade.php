@extends('layout.app')

@section('content')




<div class="container my-5">
    <table class="table table-bordered table-striped" id="visitorTable">
        <thead>
            <tr>
                <th>NO</th>
                <th>IP</th>
                <th>Data and Time</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($visitors as $items)

            <tr>
                <td>{{$items->id}}</td>
                <td>{{$items->ip_address}}</td>
                <td>{{$items->visit_time}}</td>
            </tr>
            @endforeach









        </tbody>
    </table>
</div>

@endsection

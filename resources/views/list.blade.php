@extends('layouts.app')

@section('content')



<div class="content">
    <form method="POST" action="{{ action('MLogController@update') }}">
        @csrf
        <label class="form-inline">
            <input class="btn btn-default form-control" type="submit" name="btnMode" value="CSV">
            <input class="btn btn-default form-control" type="submit" name="btnMode" value="Delete">
        </label>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Check</th>
                    <th scope="col">Date and Time</th>
                    <th scope="col">Price</th>
                    <th scope="col">Currency</th>
                    <th scope="col">Method</th>
                    <th scope="col">Statement</th>
                    <th scope="col">Place</th>
                    <th scope="col">Address</th>
                    <th scope="col">Location</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $data)
                    <tr>
                        <td>{{ Form::checkbox('edit[]', $data->id) }}</td>
                        <td>{{ $data->usedTime }}</td>
                        <td>{{ $data->price }}</td>
                        <td>{{ $data->currency }}</td>
                        <td>{{ $data->method }}</td>
                        <td>{{ $data->statement }}</td>
                        <td>{{ $data->place }}</td>
                        <td>{{ $data->address }}</td>
                        <td>{{ $data->location }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </form>
</div>
@endsection


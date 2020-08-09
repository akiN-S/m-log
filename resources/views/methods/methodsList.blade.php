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
                    <th scope="col">Methods</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $data)
                    <tr>
                        <td>{{ Form::checkbox('edit[]', $data->id) }}</td>
                        <td>{{ $data->method }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </form>
</div>
@endsection


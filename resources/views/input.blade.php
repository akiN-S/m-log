@extends('layouts.app')
<script src="{{ asset('/js/inputView.js') }}"></script>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Input</div>

                <div class="card-body">
                    <form method="POST" action="{{ action('MLogController@input') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="timestampStr" class="col-md-4 col-form-label text-md-right">Date and Time</label>

                            <div class="col-md-4">
                                <input id="timestampStr" type="text" class="form-control @error('timestampStr') is-invalid @enderror" name="timestampStr" value="{{ old('timestampStr') }}" required autofocus>
                                
                                @error('timestampStr')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2 form-inline">
                                <button value="△" onclick="onclickUpCount()">△</button>
                                <button value="▽" onclick="onclickDownCount()">▽</button>
                            </div>

                            <input id="timestamp" name="timestamp" type="hidden" value="">
                        </div>
                        <div class="form-group row">
                            <label for="currency" class="col-md-4 col-form-label text-md-right">currency</label>

                            <div class="col-md-6">
                                <input id="currency" type="text" class="form-control @error('currency') is-invalid @enderror" name="currency" value="{{ old('currency') }}" required>

                                @error('currency')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">price</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" required>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Input!</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

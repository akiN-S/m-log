@extends('layouts.app')
<script src="{{ asset('/js/inputView.js') }}"></script>

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Input</div>

                <div class="card-body">
                    <form method="POST" action="{{ action('MLogController@input') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="timestampStr" class="col-md-4 col-12 col-form-label text-md-right">Date and Time</label>

                            <div class="col-md-4 col-7">
                                <input id="timestampStr" type="text" class="form-control @error('timestampStr') is-invalid @enderror" name="timestampStr" value="{{ old('timestampStr') }}" required>
                                
                                @error('timestampStr')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-2 col-5 form-inline">
                                <button type="button" class="btn btn-secondary" onclick="onclickUpCount()">△</button>
                                <button type="button" class="btn btn-secondary" onclick="onclickDownCount()">▽</button>
                            </div>

                            <input id="timestamp" name="timestamp" type="hidden" value="">
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-12 col-form-label text-md-right">Price</label>

                            <div class="col-md-2 col-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" required>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-2 col-3">
                                <select name="currency" class=" custom-select" required>
                                    @foreach(config('input.currency') as $key => $currency)
                                    <option value="{{ $key }}" class="text-sm-right">{{ $currency['label'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2 col-3">
                                <select name="method" class=" custom-select" required>
                                    @foreach(config('input.currency') as $key => $currency)
                                    <option value="{{ $key }}" class="text-sm-right">{{ $currency['label'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="statement" class="col-md-4 col-12 col-form-label text-md-right">Statement</label>

                            <div class="col-md-6">
                                <input id="statement" type="text" class="form-control @error('statement') is-invalid @enderror" name="statement" value="{{ old('statement') }}" >
                                
                                @error('statement')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            
                        </div>
                        
                        <div class="form-group row">
                            <label for="store" class="col-md-4 col-12 col-form-label text-md-right">Store</label>

                            <div class="col-md-3 col-6">
                                <input id="store" type="text" class="form-control @error('store') is-invalid @enderror" name="store" value="{{ old('store') }}" >
                                
                                @error('store')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3 col-6">
                                <input id="storeBranch" type="text" class="form-control @error('storeBranch') is-invalid @enderror" name="storeBranch" value="{{ old('storeBranch') }}" >
                                
                                @error('storeBranch')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="location" class="col-md-4 col-12 col-form-label text-md-right">Location</label>
                            
                            <div class="col-md-6 col-12">
                                <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" >
                                    
                                    @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4 col-8 offset-1">
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

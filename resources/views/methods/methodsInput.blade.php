@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Method Input</div>

                <div class="card-body">
                    <form method="POST" action="{{ action('MethodsController@register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="method" class="col-md-4 col-12 col-form-label text-md-right">Method Name</label>

                            <div class="col-md-4 col-7">
                                <input id="method" type="text" class="form-control @error('method') is-invalid @enderror" name="method" value="{{ old('method') }}" required>
                                
                                @error('method')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4 col-8 offset-1">
                                <button type="submit" class="btn btn-primary">Register!</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>


</div>
@endsection

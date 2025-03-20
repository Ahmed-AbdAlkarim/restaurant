@extends('layouts.master')
@section('content')
    <form  method="POST" class="ms-4 mt-4">
        @csrf
        <div class="mb-3">
            <label for="name">{{trans('site.name')}}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $menu->name }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price">{{trans('site.price')}}</label>
            <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $menu->price }}" required autocomplete="price">
            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category">{{trans('site.category')}}</label>
            <input id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ $menu->category }}" required autocomplete="category">
            @error('category')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@stop

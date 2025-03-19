@extends('layouts.master')
@section('content')
<div class="container">
<form action="{{ route('admin.menu.submit') }}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name">{{trans('site.name')}}</label>
            <input type="text" name="name" id="name" class="form-control" required>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price">{{trans('site.price')}}</label>
            <input type="number" name="price" id="price" class="form-control" required>
            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category">{{trans('site.category')}}</label>
            <select name="category" id="category" class="form-select" required>
                <option value="Main Course">Main Course</option>
                <option value="Drink">Drink</option>
                <option value="Dessert">Dessert</option>
            </select>
            @error('category')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image">صورة الطبق:</label>
            <input type="file" name="image" required>
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>    

        <button type="submit" class="btn btn-primary">{{trans('site.create')}}</button>
    </form>
</div>
@stop

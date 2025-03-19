@extends('layouts.master')
@section('content')
<div class="container">
    <form action="{{ route('admin.tables.submit') }}" method="POST">
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
            <label for="capacity">{{trans('site.capacity')}}</label>
            <input type="number" name="capacity" id="capacity" class="form-control" required>
            @error('capacity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status">{{trans('site.status')}}</label>
            <select name="status" id="status" class="form-select" required>
                <option value="available">Available</option>
                <option value="reserved">Reserved</option>
                <option value="occupied">Occupied</option>
            </select>
            @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{trans('site.create')}}</button>
    </form>
</div>
@stop

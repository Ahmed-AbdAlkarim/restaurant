@extends('layouts.master')
@section('content')
    <form  method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">{{trans('site.name')}}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $table->name }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="capacity">{{trans('site.capacity')}}</label>
            <input id="capacity" type="text" class="form-control @error('capacity') is-invalid @enderror" name="capacity" value="{{ $table->capacity }}" required autocomplete="capacity">
            @error('capacity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>



        <div class="mb-3">
            <label for="status">{{trans('site.status')}}</label>
            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ $table->status }}" required autocomplete="status" required>
                <option value="Available">Available</option>
                <option value="Reserved">Reserved</option>
                <option value="Occupied">Occupied</option>
            </select>
            @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@stop

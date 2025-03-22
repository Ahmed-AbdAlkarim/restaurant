@extends('layouts.master')

@section('content')
<div class="container">
    <h1>{{ trans('site.aboutusedit') }}</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.abouts.update' , $about->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>{{ trans('site.title') }}</label>
            <input type="text" name="title" class="form-control" value="{{ $about->title ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label>{{ trans('site.restaurantname') }}</label>
            <input type="text" name="subtitle" class="form-control" value="{{ $about->subtitle ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label>{{ trans('site.fdescription') }}</label>
            <textarea name="description_1" class="form-control" required>{{ $about->description_1 ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label>{{ trans('site.sdescription') }}</label>
            <textarea name="description_2" class="form-control" required>{{ $about->description_2 ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label>{{ trans('site.yearnumber') }}</label>
            <input type="number" name="years_experience" class="form-control" value="{{ $about->years_experience ?? 0 }}" required>
        </div>

        <div class="mb-3">
            <label>{{ trans('site.chefnumber') }}</label>
            <input type="number" name="master_chefs" class="form-control" value="{{ $about->master_chefs ?? 0 }}" required>
        </div>

        <button type="submit" class="btn btn-primary">{{ trans('site.save') }}</button>
    </form>
</div>
@endsection

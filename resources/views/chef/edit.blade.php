@extends('layouts.master')

@section('content')
<div class="container">
    <h1>{{ trans('site.chefedit')}}</h1>
    <form action="{{ route('admin.chefs.update', $chef->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>الاسم:</label>
            <input type="text" name="name" class="form-control" value="{{ $chef->name }}" required>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label>التخصص:</label>
            <input type="text" name="specialty" class="form-control" value="{{ $chef->specialty }}" required>
            @error('specialty')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label>رابط فيسبوك:</label>
            <input type="url" name="facebook" class="form-control" value="{{ $chef->facebook }}">
            @error('facebook')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label>رابط إنستجرام:</label>
            <input type="url" name="instagram" class="form-control" value="{{ $chef->instagram }}">
            @error('instagram')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label>رابط تويتر:</label>
            <input type="url" name="twitter" class="form-control" value="{{ $chef->twitter }}">
            @error('twitter')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label>الصورة الحالية:</label><br>
            <img src="{{ asset('storage/' . $chef->image) }}" width="100">
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label>رفع صورة جديدة:</label>
            <input type="file" name="image" class="form-control">
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">حفظ التعديلات</button>
    </form>
</div>
@endsection

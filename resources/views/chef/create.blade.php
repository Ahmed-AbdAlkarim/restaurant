@extends('layouts.master')

@section('content')
<div class="container">
    <h1>إضافة شيف جديد</h1>
    <form action="{{ route('admin.chefs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>الاسم:</label>
            <input type="text" name="name" class="form-control" required>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label>التخصص:</label>
            <input type="text" name="specialty" class="form-control" required>
            @error('specialty')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label>رابط فيسبوك:</label>
            <input type="url" name="facebook" class="form-control">
            @error('facebook')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label>رابط إنستجرام:</label>
            <input type="url" name="instagram" class="form-control">
            @error('instagram')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label>رابط تويتر:</label>
            <input type="url" name="twitter" class="form-control">
            @error('twitter')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label>رفع صورة:</label>
            <input type="file" name="image" class="form-control" required>
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">إضافة الشيف</button>
    </form>
</div>
@endsection

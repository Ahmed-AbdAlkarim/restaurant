@extends('layouts.master')

@section('content')
<div class="container">
    <h1>تعديل بيانات "من نحن"</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.abouts.update' , $about->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>العنوان الرئيسي:</label>
            <input type="text" name="title" class="form-control" value="{{ $about->title ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label>اسم المطعم:</label>
            <input type="text" name="subtitle" class="form-control" value="{{ $about->subtitle ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label>الوصف الأول:</label>
            <textarea name="description_1" class="form-control" required>{{ $about->description_1 ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label>الوصف الثاني:</label>
            <textarea name="description_2" class="form-control" required>{{ $about->description_2 ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label>عدد سنوات الخبرة:</label>
            <input type="number" name="years_experience" class="form-control" value="{{ $about->years_experience ?? 0 }}" required>
        </div>

        <div class="mb-3">
            <label>عدد الطهاة:</label>
            <input type="number" name="master_chefs" class="form-control" value="{{ $about->master_chefs ?? 0 }}" required>
        </div>

        <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
</div>
@endsection

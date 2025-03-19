@extends('layouts.master')

@section('content')
<div class="container">
    <h1>إدارة بيانات "من نحن"</h1>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>العنوان الرئيسي</th>
                <th>اسم المطعم</th>
                <th>الوصف الأول</th>
                <th>الوصف الثاني</th>
                <th>عدد سنوات الخبرة</th>
                <th>عدد الطهاة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($about as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->subtitle }}</td>
                    <td class="mb-4 text-wrap text-break w-75">{{ Str::limit($item->description_1, 50) }}</td>
                    <td class="mb-4 text-wrap text-break w-75">{{ Str::limit($item->description_2, 50) }}</td>
                    <td>{{ $item->years_experience }}</td>
                    <td>{{ $item->master_chefs }}</td>
                    <td>
                        <a href="{{ route('admin.abouts.edit', $item->id) }}" class="btn btn-primary btn-sm">تعديل</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

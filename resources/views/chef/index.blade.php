@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="mb-4 text-center">{{trans('site.chefmanagement')}}</h1>
    <a href="{{ route('admin.chefs.create') }}" class="btn btn-primary mb-3">{{trans('site.newchef')}}</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>{{trans('site.image')}}</th>
                <th>{{trans('site.name')}}</th>
                <th>{{trans('site.speciality')}}</th>
                <th>{{trans('site.action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($chefs as $chef)
            <tr>
                <td><img src="{{ asset('storage/' . $chef->image) }}" width="50"></td>
                <td>{{ $chef->name }}</td>
                <td>{{ $chef->specialty }}</td>
                <td>
                    <a href="{{ route('admin.chefs.edit', $chef->id) }}" class="btn btn-warning btn-sm">{{trans('site.edit')}}</a>
                    <form action="{{ route('admin.chefs.delete', $chef->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد؟')">{{trans('site.delete')}}</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@extends('layouts.master')

@section('content')
<div class="container">
    <h1>{{ trans('site.about') }}</h1>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>{{ trans('site.title') }}</th>
                <th>{{ trans('site.restaurantname') }}</th>
                <th>{{ trans('site.fdescription') }}</th>
                <th>{{ trans('site.sdescription') }}</th>
                <th>{{ trans('site.yearnumber') }}</th>
                <th>{{ trans('site.chefnumber') }}</th>
                <th>{{ trans('site.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($about as $item)
                <tr>
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


@extends('layouts.master')
@section('content')

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <!-- Users List Table -->

    <div class="col-12">
        <a href="{{route('admin.menu.create')}}" class="btn btn-primary">
        {{trans('site.addnewitem')}}
        </a>
    </div>
    <div class="card-datatable table-responsive">
        <table class="datatables-users table border-top">
            <thead>
                <tr>
                <th>{{trans('site.id')}}</th>
                <th>{{trans('site.name')}}</th>
                <th>{{trans('site.price')}}</th>
                <th>{{trans('site.image')}}</th>
                <th>{{trans('site.action')}}</th>
                </tr>
            </thead>
            <tbody>
            @foreach($menus as $menu)
                <tr>
                    <td>{{ $menu->id }}</td>
                    <td>{{ $menu->name }}</td>
                    <td>{{ $menu->price }}</td>
                    <td>@if($menu->image)
                        <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" width="95px">
                    @endif</td>
                    <td>
                        <a href="{{route('admin.menu.edit',['id'=>$menu->id])}}" class="btn btn-warning btn-sm">
                        {{trans('site.edit')}}
                        </a>
                        <a href="{{route('admin.menu.delete',['id'=>$menu->id])}}" class="btn btn-danger btn-sm">
                        {{trans('site.delete')}}
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>


</div>
</div>
<!-- / Content -->
@stop

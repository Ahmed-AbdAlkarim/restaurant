@extends('layouts.master')
@section('content')

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <!-- Users List Table -->

    <div class="col-12">
        <a href="{{route('admin.tables.create')}}" class="btn btn-primary  mb-4">
        {{trans('site.addnewtable')}}
        </a>
    </div>
    <div class="card-datatable table-responsive">
        <table class="table table-bordered table-striped">
        <thead class="table-dark">
                <tr>
                <th>{{trans('site.name')}}</th>
                <th>{{trans('site.capacity')}}</th>
                <th>{{trans('site.status')}}</th>
                <th>{{trans('site.action')}}</th>
                </tr>
            </thead>
            <tbody>
            @foreach($tables as $table)
                <tr>
                    <td>{{ $table->name }}</td>
                    <td>{{ $table->capacity }}</td>
                    <td>{{ $table->status }}</td>
                    <td>
                        <a href="{{route('admin.tables.edit',['id'=>$table->id])}}" class="btn btn-warning btn-sm">
                        {{trans('site.edit')}}
                        </a>
                        <a href="{{route('admin.tables.delete',['id'=>$table->id])}}" class="btn btn-danger btn-sm">
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

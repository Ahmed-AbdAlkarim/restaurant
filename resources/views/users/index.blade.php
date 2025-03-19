@extends('layouts.master')
@section('content')

<!-- Content -->

<div class="container">
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Session</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">21,459</h4>
                                <span class="text-success">(+29%)</span>
                            </div>
                            <span>Total Users</span>
                        </div>
                        <span class="badge bg-label-primary rounded p-2">
                            <i class="ti ti-user ti-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Paid Users</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">4,567</h4>
                                <span class="text-success">(+18%)</span>
                            </div>
                            <span>Last week analytics </span>
                        </div>
                        <span class="badge bg-label-danger rounded p-2">
                            <i class="ti ti-user-plus ti-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Active Users</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">19,860</h4>
                                <span class="text-danger">(-14%)</span>
                            </div>
                            <span>Last week analytics</span>
                        </div>
                        <span class="badge bg-label-success rounded p-2">
                            <i class="ti ti-user-check ti-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Pending Users</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">237</h4>
                                <span class="text-success">(+42%)</span>
                            </div>
                            <span>Last week analytics</span>
                        </div>
                        <span class="badge bg-label-warning rounded p-2">
                            <i class="ti ti-user-exclamation ti-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Users List Table -->

    <div class="col-12">
        <a href="{{route('admin.users.create')}}" class="btn btn-primary">
        {{trans('site.addnewuser')}}
        </a>
    </div>
    <div class="card-datatable table-responsive">
        <table class="datatables-users table border-top">
            <thead>
                <tr>
                    <th>{{trans('site.id')}}</th>
                    <th>{{trans('site.name')}}</th>
                    <th>{{trans('site.email')}}</th>
                    <th>{{trans('site.contact')}}</th>
                    <!-- <th>Country</th> -->
                    <th>{{trans('site.role')}}</th>
                    <!-- <th>Plan</th> -->
                    <th>{{trans('site.status')}}</th>
                    <!-- <th>passeword</th> -->
                    <th>{{trans('site.action')}}</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->contact }}</td>
                    <!-- <td>{{ $user->country }}</td> -->
                    <td>{{ $user->role }}</td>
                    <!-- <td>{{ $user->plan }}</td> -->
                    <td>{{ $user->status }}</td>
                    <!-- <td>{{ $user->password }}</td> -->
                    <td>
                        <a href="{{route('admin.users.edit',['id'=>$user->id])}}" class="btn btn-warning btn-sm">
                        {{trans('site.edit')}}
                        </a>
                        <a href="{{route('admin.users.delete',['id'=>$user->id])}}" class="btn btn-danger btn-sm">
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

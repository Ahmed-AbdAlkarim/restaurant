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

    <div class="col-12 mb-4">
        <a href="{{route('admin.users.create')}}" class="btn btn-primary">
        {{trans('site.addnewuser')}}
        </a>
    </div>
    <div class="card-datatable table-responsive">
        <input type="text" id="search" placeholder="ابحث عن اسم أو إيميل">
        <div id="results">
            @include('users.partials.table', ['users' => $users])
        </div>
        
       
    </div>


</div>
</div>
<!-- / Content -->
@stop
@section('scripts')
<script>
    $('#search').on('keyup', function () {
        let value = $(this).val(); // جاب اللي مكتوب في مربع البحث

        $.ajax({
            url: '{{ route("users.index") }}', // نفس صفحة اليوزر
            data: {
                search: value // بعتنا النص اللي المستخدم كتبه
            },
            success: function (data) {
                $('#results').html(data); // غيرنا الجدول بالنتائج الجديدة
            }
        });
    });
</script>
@stop


@extends('layouts.master')
@section('content')

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <!-- Users List Table -->

    <div class="col-12">
        <a href="{{route('admin.orders.create')}}" class="btn btn-primary">
        {{trans('site.addneworder')}}
        </a>
    </div>
    <div class="card-datatable table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>{{trans('site.id')}}</th>
                <th>{{trans('site.name')}}</th>
                <th>{{trans('site.contact')}}</th>
                <th>{{trans('site.status')}}</th>
                <th>{{trans('site.totalprice')}}</th>
                <th>{{trans('site.items')}}</th>
                <th>{{trans('site.action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user ? $order->user->name : 'مجهول' }}</td>
                <td>{{ $order->user ? $order->user->contact : 'غير متوفر' }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->total_price }}</td>
                <td>
                    @foreach ($order->orderItems as $item)
                        @if ($item->menu)
                        <div>{{ $item->menu->name }} - Quantity: {{ $item->quantity }} - ${{ $item->price }}</div>
                        @else
                            <div>Menu item not found - Quantity: {{ $item->quantity }}</div>
                        @endif
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-warning btn-sm">{{trans('site.edit')}}</a>
                    <a href="{{route('admin.orders.delete',['id'=>$order->id])}}" class="btn btn-danger btn-sm ">
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

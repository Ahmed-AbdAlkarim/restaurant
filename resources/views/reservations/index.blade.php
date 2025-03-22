@extends('layouts.master')

@section('content')
<div class="container">
    <h1 class="my-4">{{trans('site.resrevation')}}</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>{{trans('site.name')}}</th>
                <th>{{trans('site.contact')}}</th>
                <th>{{trans('site.tablename')}}</th>
                <th>{{trans('site.date')}}</th>
                <th>{{trans('site.time')}}</th>
                <th>{{trans('site.guests')}}</th>
                <th>{{trans('site.specialrequest')}}</th>
                <th>{{trans('site.action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $reservation->name }}</td>
                <td>{{ $reservation->phone }}</td>
                <td>{{ $reservation->table->name }} ({{ $reservation->table->capacity }} People)</td>
                <td>{{ $reservation->date }}</td>
                <td>{{ \Carbon\Carbon::parse($reservation->time)->format('h:i A') }}</td>
                <td>{{ $reservation->guests }}</td>
                <td>{{ $reservation->special_request }}</td>
                <td>
                    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">{{trans('site.delete')}}</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $reservations->links() }}
</div>
@endsection
@extends('layouts.master')
@section('content')
<div class="container">
    <h4>{{ trans('site.createorder') }}</h4>
    <form action="{{ route('admin.orders.submit') }}" method="POST">
        @csrf
        <div class="row g-3">
            <div id="items">
                <div class="form-group item-group">
                    <select name="items[0][menu_id]" class="form-control my-2" required>
                        @foreach($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="items[0][quantity]" class="form-control my-2" placeholder="Quantity" required min="1">
                </div>
            </div>
                        
            <div class="col-12">
                <button type="button" class="btn btn-primary w-100 py-3 my-3" onclick="addItem()">{{ trans('site.createitems') }}</button>
                <button class="btn btn-primary w-100 py-3" type="submit">{{ trans('site.createorder') }}</button>
            </div>
        </div>
    </form>
</div>
@stop
<script>
function addItem() {
    const itemsDiv = document.getElementById('items');
    const index = Date.now(); // ✅ استخدام معرف فريد لكل عنصر جديد
    const newItem = `
        <div class="form-group item-group">
            <select name="items[${index}][menu_id]" class="form-control my-2" required>
                @foreach($menus as $menu)
                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                @endforeach
            </select>
            <input type="number" name="items[${index}][quantity]" class="form-control my-2" placeholder="Quantity" required min="1">
        </div>
    `;
    itemsDiv.insertAdjacentHTML('beforeend', newItem);
}
</script>



@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Edit Order #{{ $order->id }}</h1>

    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="status">{{trans('site.status')}}</label>
            <select name="status" id="status" class="form-select" required>
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>pending</option>
                <option value="preparing" {{ $order->status == 'preparing' ? 'selected' : '' }}>preparing</option>
                <option value="served" {{ $order->status == 'served' ? 'selected' : '' }}>served</option>
                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>completed</option>
                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>cancelled</option>
            </select>
        </div>
        <h4>Items</h4>
        <div id="items">
            @foreach($order->orderItems as $index => $item)
                <div class="form-group" id="item-{{ $index }}">
                    <select name="items[{{ $index }}][menu_id]" class="form-control" required>
                        @foreach($menuItems as $menu)
                            <option value="{{ $menu->id }}" {{ $menu->id == $item->menu_id ? 'selected' : '' }}>{{ $menu->name }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="items[{{ $index }}][quantity]" class="form-control" value="{{ $item->quantity }}" required min="1">
                    <button type="button" class="btn btn-danger" onclick="removeItem('{{$index}}')">حذف</button>
                </div>
            @endforeach
        </div>
        <button type="button" onclick="addItem()">Add Item</button>
        <button type="submit" class="btn btn-success">Update Order</button>
    </form>
</div>

<script>
function addItem() {
    const itemsDiv = document.getElementById('items');
    const index = itemsDiv.children.length;
    itemsDiv.insertAdjacentHTML('beforeend', `
        <div class="form-group" id="item-${index}">
            <select name="items[${index}][menu_id]" class="form-control" required>
                @foreach($menuItems as $menu)
                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                @endforeach
            </select>
            <input type="number" name="items[${index}][quantity]" class="form-control" placeholder="Quantity" required min="1">
            <button type="button" class="btn btn-danger" onclick="removeItem(${index})">حذف</button>
        </div>
    `);
}

function removeItem(index) {
    const itemDiv = document.getElementById('item-' + index);
    if (itemDiv) {
        itemDiv.remove(); // إزالة العنصر من العرض
    }
}
</script>
@stop

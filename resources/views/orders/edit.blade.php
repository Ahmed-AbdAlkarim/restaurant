@extends('layouts.master')

@section('content')
<div class="container ms-4 mt-4">
    <h1 class="mb-4">{{trans('site.editorder')}} #{{ $order->id }}</h1>

    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="status" class="form-label">{{ trans('site.status') }}</label>
            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="preparing" {{ $order->status == 'preparing' ? 'selected' : '' }}>Preparing</option>
                <option value="served" {{ $order->status == 'served' ? 'selected' : '' }}>Served</option>
                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
            @error('status')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <h4 class="mb-3">Items</h4>
        <div id="items">
            @foreach($order->orderItems as $index => $item)
                <div class="mb-3 d-flex gap-2 align-items-center" id="item-{{ $index }}">
                    <select name="items[{{ $index }}][menu_id]" class="form-control" required>
                        @foreach($menuItems as $menu)
                            <option value="{{ $menu->id }}" {{ $menu->id == $item->menu_id ? 'selected' : '' }}>{{ $menu->name }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="items[{{ $index }}][quantity]" class="form-control" value="{{ $item->quantity }}" required min="1">
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeItem('{{ $index }}')">حذف</button>
                </div>
            @endforeach
        </div>

        <button type="button" class="btn btn-secondary mb-3" onclick="addItem()">Add Item</button>
        <button type="submit" class="btn btn-success mb-3">Update Order</button>
    </form>
</div>

<script>
function addItem() {
    const itemsDiv = document.getElementById('items');
    const index = itemsDiv.children.length;
    itemsDiv.insertAdjacentHTML('beforeend', `
        <div class="mb-3 d-flex gap-2 align-items-center" id="item-${index}">
            <select name="items[${index}][menu_id]" class="form-control" required>
                @foreach($menuItems as $menu)
                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                @endforeach
            </select>
            <input type="number" name="items[${index}][quantity]" class="form-control" placeholder="Quantity" required min="1">
            <button type="button" class="btn btn-danger btn-sm" onclick="removeItem(${index})">حذف</button>
        </div>
    `);
}

function removeItem(index) {
    document.getElementById('item-' + index)?.remove();
}
</script>
@stop

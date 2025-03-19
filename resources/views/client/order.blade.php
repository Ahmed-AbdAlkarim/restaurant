@extends('client_layouts.master')
@section('content')
<!-- Order Form Start -->
<div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
    <div class="row g-0">
        <div class="col-md-6">
            <div class="video">
                <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                    <span></span>
                </button>
            </div>
        </div>
        <div class="col-md-6 bg-dark d-flex align-items-center">
            <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">create an order</h5>
                <h1 class="text-white mb-4">create An order</h1>
                <form action="{{ route('client.order.submit') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div id="items">
                            <div class="form-group">
                                <select name="items[${index}][menu_id]" class="form-control my-2" required>
                                    @foreach($menus as $menu)
                                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                    @endforeach
                                </select>
                                <input type="number" name="items[${index}][quantity]" class="form-control my-2" placeholder="Quantity" required min="1">
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <button type="button" class="btn btn-primary w-100 py-3 my-3" onclick="addItem()">{{ trans('site.createitems') }}</button>
                            <button class="btn btn-primary w-100 py-3" type="submit">{{ trans('site.createorder') }}</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- Video Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                        allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Order Form End -->
<script>
function addItem() {
    const itemsDiv = document.getElementById('items');
    const index = itemsDiv.children.length;
    itemsDiv.insertAdjacentHTML('beforeend', `
        <div class="form-group">
            <select name="items[${index}][menu_id]" class="form-control my-2" required>
                @foreach($menus as $menu)
                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                @endforeach
            </select>
            <input type="number" name="items[${index}][quantity]" class="form-control my-2" placeholder="Quantity" required min="1">
        </div>
    `);
}
</script>


@stop
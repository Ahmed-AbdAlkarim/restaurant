@extends('client_layouts.master')
@section('content')
    <!-- Reservation Start -->
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
                    <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
                    <h1 class="text-white mb-4">Book A Table Online</h1>
                    
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <!-- القائمة المنسدلة لعرض الخطأ -->
<div class="dropdown d-none" id="errorDropdown">
    <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown">
        خطأ في الحجز
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item text-danger" id="errorMessage"></a></li>
    </ul>
</div>

                    <form action="{{ route('reservations.store') }}" method="POST" >
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                                    <label for="name">Your Name</label>
                                </div>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Your Phone" required>
                                    <label for="phone">Your Phone</label>
                                </div>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="date" name="date" required>
                                    <label for="date">Select Date</label>
                                </div>
                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="time" class="form-control" id="time" name="time" required>
                                    <label for="time">Select Time</label>
                                </div>
                                @error('time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="table_id" name="table_id" required>
                                        @foreach($tables as $table)
                                            <option value="{{ $table->id }}">{{ $table->name }} ({{ $table->capacity }} People)</option>
                                        @endforeach
                                    </select>
                                    <label for="table_id">Select Table</label>
                                    @error('table_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="guests" name="guests" min="1" required>
                                    <label for="guests">No Of People</label>
                                </div>
                                @error('people')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Special Request" id="special_request" name="special_request" style="height: 100px"></textarea>
                                    <label for="special_request">Special Request</label>
                                </div>
                                @error('special_request')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Book Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Reservation End -->
@endsection
<script>
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('reservationForm').addEventListener('submit', function(e) {
        e.preventDefault(); // منع إعادة تحميل الصفحة

        let formData = new FormData(this);

        fetch('{{ route('reservations.store') }}', { // إرسال الطلب إلى الكنترولر
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'error') {
                document.getElementById('errorDropdown').classList.remove('d-none');
                document.getElementById('errorMessage').innerText = data.message;
            } else {
                alert('تم الحجز بنجاح!');
                location.reload(); // تحديث الصفحة بعد الحجز الناجح
            }
        })
        .catch(error => console.error('Error:', error));
    });
});
</script>

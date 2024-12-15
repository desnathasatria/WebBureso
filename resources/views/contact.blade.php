@extends('layouts.app')

@section('title', 'Kontak - Warung Bu Reso')

@section('content')

<!-- Contact Start -->
<div class="container-fluid contact bg-light py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Kontak</h4>
            <h1 class="display-4 mb-4">Jika ada pertanyaan silahkan kirim pesan sekarang</h1>
        </div>
        <div class="row g-5">
            <!-- Contact Form Section -->
            <div class="col-12 col-md-6 wow fadeInRight" data-wow-delay="0.4s">
                <div>
                    <h4 class="text-primary">Kirim pesan anda</h4>
                    <form id="contactForm" action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" id="nama_pengirim" name="nama_pengirim" placeholder="Nama Lengkap" value="{{ old('nama_pengirim') }}">
                                    <label for="nama_pengirim">Nama Lengkap</label>
                                </div>
                                @error('nama_pengirim')
                                    <small class="text-danger pl-1 mb-1">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control border-0" id="email_pengirim" name="email_pengirim" placeholder="Email" value="{{ old('email_pengirim') }}">
                                    <label for="email_pengirim">Email</label>
                                </div>
                                @error('email_pengirim')
                                    <small class="text-danger pl-1 mb-1">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control border-0" placeholder="Leave a message here" id="pesan" name="pesan" style="height: 120px">{{ old('pesan') }}</textarea>
                                    <label for="pesan">Pesan</label>
                                </div>
                                @error('pesan')
                                    <small class="text-danger pl-1 mb-1">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="image">Gambar (Optional)</label>
                                    <input type="file" class="form-control border-0" id="image" name="image" accept="image/*">
                                    <small class="text-muted">Format yang diizinkan: JPG, JPEG, PNG. Max size: 2MB</small>
                                </div>
                                @error('image')
                                    <small class="text-danger pl-1 mb-1">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100 py-3">Kirim Pesan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Kritik dan Saran Display Section -->
            <div class="col-12 col-md-6" id="data_kritik_saran">
                @if($kritik_saran->isEmpty())
                    <p>Tidak ada kritik dan saran.</p>
                @else
                    @foreach($kritik_saran as $item)
                        <div class="col-12 mb-4">
                            <div class="p-4 bg-light rounded">
                                <h5>{{ $item->name }}</h5>
                                @if (!empty($item->image))
                                    <div class="message-image mb-3 text-center">
                                        <img src="{{ asset('uploads/messages/' . $item->image) }}" class="img-fluid rounded" alt="Uploaded Image" style="max-width: 150px; max-height: 150px;">
                                    </div>
                                @endif
                                <p class="mb-1">{{ $item->message }}</p>
                                <p class="text-muted">Tanggal: {{ $item->date_send }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

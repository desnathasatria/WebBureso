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

<script>
    function delete_form() {
    $("[name='nama_pengirim']").val("");
    $("[name='email_pengirim']").val("");
    $("[name='pesan']").val("");
    $("[name='image']").val("");
}

function delete_error() {
    $("#error-nama_pengirim").html("");
    $("#error-email_pengirim").html("");
    $("#error-pesan").html("");
}

var limit = 10;
var offset = 0;
var total_count = 0;

$(document).ready(function () {
    get_kritik_saran();

    $("#btn_tampil_data").on("click", function () {
        offset += limit;
        get_kritik_saran(true);
    });
});

function get_kritik_saran(append = false) {
    $.ajax({
        url: base_url + "/get_data_message",
        method: "GET",
        data: {
            limit: limit,
            offset: offset
        },
        dataType: "json",
        success: function (response) {
            if (!append) {
                $("#data_kritik_saran").empty();
            }

            var data = response.data;
            total_count = response.total_count;

            if (data.length === 0 && offset === 0) {
                $("#data_kritik_saran").html("<p>Tidak ada kritik dan saran.</p>");
                $("#btn_tampil_data").hide();
            } else {
                data.forEach(function (item) {
                    var status_kritik = "";
                    if (item.status == 3) {
                        status_kritik = "Sudah dibalas";
                    } else if (item.status == 2) {
                        status_kritik = "Telah dibaca oleh admin";
                    } else if (item.status == 1) {
                        status_kritik = "Belum dicek oleh admin";
                    }

                    var imageHtml = item.image
                        ? `<div class="message-image mb-3">
                             <img src="${base_url}/uploads/messages/${item.image}" 
                                  class="img-fluid rounded" 
                                  alt="Uploaded Image"
                                  style="max-width: 100%; height: auto;">
                           </div>`
                        : '';

                    var list = `
                        <div class="col-lg-6 mb-4">
                            <div class="p-4 bg-light rounded">
                                <h5>${item.name}</h5>
                                ${imageHtml}
                                <p class="mb-1">${item.message}</p>
                                <p class="text-muted">Tanggal: ${item.created_at}</p>
                                <p class="text-muted">Status: ${status_kritik}</p>
                            </div>
                        </div>
                    `;

                    $("#data_kritik_saran").append(list);
                });

                if ($("#data_kritik_saran").children().length >= total_count) {
                    $("#btn_tampil_data").hide();
                } else {
                    $("#btn_tampil_data").show();
                }
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", error);
            $("#data_kritik_saran").html("<p>Terjadi kesalahan saat memuat data. Silakan coba lagi nanti.</p>");
        }
    });
}

function insert_message() {
    var formData = new FormData($("#contactForm")[0]);

    $.ajax({
        type: "POST",
        url: base_url + "/insert_message",
        data: formData,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (response) {
            delete_error();
            if (response.errors) {
                for (var fieldName in response.errors) {
                    $("#error-" + fieldName).html(response.errors[fieldName]);
                }
            } else if (response.success) {
                delete_error();
                delete_form();
                alertify.success("Berhasil menambah kritik dan saran");
                get_kritik_saran(); // Refresh kritik dan saran display
            } else if (response.error) {
                alertify.error(response.error);
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error: " + error);
        },
    });
}

</script>

@endsection

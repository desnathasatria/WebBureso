function delete_form() {
    $("[name='nama_pengirim']").val("");
    $("[name='email_pengirim']").val("");
    $("[name='pesan']").val("");
}

function delete_error() {
    $("#error-nama_pengirim").html("");
    $("#error-email_pengirim").html("");
    $("#error-pesan").text("");
}

var limit = 10; // Increased for testing
var offset = 0;
var total_count = 0;

$(document).ready(function () {
    get_kritik_saran();

    $("#btn_tampil_data").on("click", function() {
        offset += limit;
        get_kritik_saran(true);
    });
});

var limit = 10;
var offset = 0;
var total_count = 0;

function get_kritik_saran(append = false) {
    $.ajax({
        url: base_url + _controller + "/get_data_message",
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
                             <img src="${base_url}uploads/messages/${item.image}" 
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
                                <p class="text-muted">Tanggal: ${item.date_send}</p>
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
    var formData = new FormData();
    formData.append("nama_pengirim", $("[name='nama_pengirim']").val());
    formData.append("email_pengirim", $("[name='email_pengirim']").val());
    formData.append("pesan", $("[name='pesan']").val());

    $.ajax({
        type: "POST",
        url: base_url + "/" + _controller + "/insert_message",
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
                get_kritik_saran(); // Refresh the kritik dan saran display
            } else if (response.error) {
                alertify.error(response.error);
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error: " + error);
        },
    });
}
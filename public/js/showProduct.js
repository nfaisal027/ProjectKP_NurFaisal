/* function spek(id) {
    $.ajax({
        method: "get",
        type: "json",
        url: "/produk/" + id,
    }).done(function (data) {
        $("#load-update").html(data);
        $("#showModal").modal("show");
    });
} */
function change(img) {
    let image = document.getElementById("changeimage");
    let newImageUrl = "/storage/" + img; // Ganti dengan URL gambar baru yang ingin ditampilkan

    image.src = newImageUrl;
}

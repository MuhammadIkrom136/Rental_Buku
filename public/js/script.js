function convert(slug) {
    var words = slug.split("-");

    for (var i = 0; i < words.length; i++) {
        var word = words[i];
        words[i] = word.charAt(0).toUpperCase() + word.slice(1);
    }

    return words.join(" ");
}

var modalDelete = document.getElementById("deleteModal");
modalDelete.addEventListener("show.bs.modal", function (event) {
    // Button that triggered the modal
    var button = event.relatedTarget;
    // Extract info from data-bs-* attributes
    var slug = button.getAttribute("data-bs-whatever");
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    var input = modalDelete.querySelector("#slugInput");
    var textKateg = modalDelete.querySelector(".textCategEdit");
    var textUser = modalDelete.querySelector(".textUserEdit");
    var textBook = modalDelete.querySelector(".textBookEdit");
    if (textKateg) {
        textKateg.textContent =
            "Apakah anda yakin ingin menghapus kategori '" +
            convert(slug) +
            "' ?";
    } else if (textUser) {
        textUser.textContent =
            "Apakah anda yakin ingin memblokir '" + convert(slug) + "' ?";
    } else if (textBook) {
        textBook.textContent =
            "Apakah anda yakin ingin menghapus buku '" + convert(slug) + "' ?";
    }

    input.value = slug;
});

var modalEdit = document.getElementById("editModal");
modalEdit.addEventListener("show.bs.modal", function (event) {
    // Button that triggered the modal
    var button = event.relatedTarget;
    // Extract info from data-bs-* attributes
    var slug = button.getAttribute("data-bs-whatever");
    var nama =
        button.parentElement.parentElement.querySelector("#nama").textContent;
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    var input = modalEdit.querySelector(".slug");
    var namaInput = modalEdit.querySelector("#nama");

    input.value = slug;
    namaInput.value = nama;
});

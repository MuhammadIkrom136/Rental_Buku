{{-- edit --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/category-edit" method="POST">
            @csrf
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                </div>
                <div class="modal-body">
                    <input type="text" class="slug" name="slug" readonly hidden>
                    <input type="text" name="name" id="nama" class="form-control" autocomplete="off"
                        style="width: 100%">
                </div>
                <div class="modal-footer">
                    <div class="but">
                        <button class="btn btn-secondary mr-1" data-bs-dismiss="modal" type="button"
                            style="width: 80px">Batal</button>
                        <button class="btn btn-primary" type="submit" style="width: 80px">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- add --}}
<div class="modal fade" id="addModal"


tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog add-modal">
        <form action="/category-add" method="post">
            @csrf
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                </div>
                <div class="modal-body">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nama Kategori"
                        autocomplete="off">
                </div>
                <div class="modal-footer">
                    <div class="but">
                        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button"
                            style="width: 80px">Batal</button>
                        <button class="btn btn-primary" type="submit" style="width: 80px">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- delete --}}
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/category-destroy" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori</h5>
                </div>
                <div class="modal-body">
                    <input type="text" name="slug" id="slugInput" readonly hidden>
                    <p class="textCategEdit"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        style="width: 80px">Batal</button>
                    <button type="submit" class="btn btn-danger" style="width: 80px">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- delete --}}
<div class="modal fade" id="deleteModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/user-destroy" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Blokir Pengguna</h5>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="text" name="slug" id="slugInput" readonly hidden>
                    <p class="textUserEdit"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="width: 80px">Batal</button>
                    <button type="submit" class="btn btn-danger" style="width: 80px">Blokir</button>
                </div>
            </form>
        </div>
    </div>
</div>
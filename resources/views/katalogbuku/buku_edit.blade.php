<div class="modal-header">
    <h5 class="modal-title">Edit Data</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button>
</div>
<form action="javascript:formSubmit('modal_edit')" id="modal_edit" 
    url="{{ route('') }}"
    method="post">
<div class="modal-body">
    @csrf
    <input type="hidden" name="id" value="{{ $data_buku->id }}">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" placeholder="JUDUL BUKU" value="{{ $data_buku->judul }}" required>
            </div>
            <div class="form-group">
                <label>penulis</label>
                <input type="text" class="form-control" name="penulis" placeholder="PENULIS  BUKU" value="{{ $data_buku->penulis }}" required>
            </div>
            <div class="form-group">
                <label>Penerbit</label>
                <input type="text" class="form-control"  name="penerbit" value="{{ $data_buku->penerbit }}" placeholder="Penerbit">
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" onclick="formSubmit('modal_edit')" class="btn btn-primary"><i id="msg_modal_edit"></i>  Save changes</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</form>
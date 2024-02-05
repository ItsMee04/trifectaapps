<div class="modal custom-modal fade" id="editSupplier{{ $item->id }}">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">SUPPLIER FORM EDIT</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form action="/supplier/{{$item->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Supplier Name</label>
                                <input type="text" class="form-control form-white" placeholder="Masukan Nama Supplier"
                                    type="text" value="{{$item->suppliername}}" name="suppliername" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Supplier Contact</label>
                                <input type="text" class="form-control form-white" value="{{$item->suppliercontact}}" name="suppliercontact" placeholder="Masukan Kontak Supplier" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Supplier Address</label>
                        <textarea class="form-control form-white" name="supplieraddress" placeholder="Masukan Alamat Supplier" required>{{$item->supplieraddress}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="select form-control form-white" name="status" required>
                            <option value="1" @if ($item->status == '1') selected="selected" @endif> AKTIF
                            </option>
                            <option value="2" @if ($item->status == '2') selected="selected" @endif> TIDAK
                                AKTIF</option>
                        </select>
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary save-category submit-btn"
                            data-dismiss="modal">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

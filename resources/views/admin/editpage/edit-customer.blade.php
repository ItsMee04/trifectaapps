<div class="modal custom-modal fade" id="editCustomer{{ $item->id }}">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">CUSTOMER EDIT FORM</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form action="/customer/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Customer Name</label>
                                <input type="text" class="form-control form-white"
                                    placeholder="Masukan Nama Customer" type="text" value="{{ $item->customername }}"
                                    name="customername" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Customer Contact</label>
                                <input type="text" class="form-control form-white"
                                    placeholder="Masukan Kontak Customer" name="customercontact"
                                    value="{{ $item->customercontact }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Customer Identity</label>
                                <input type="text" class="form-control form-white" placeholder="Masukan NIK Customer"
                                    type="text" name="customeridentity" value="{{ $item->customeridentity }}" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Customer Date of Birth</label>
                                <input type="date" class="form-control form-white"
                                    placeholder="Masukan Tanggal Lahir Customer" value="{{ $item->customerdateofbirth }}"
                                    name="customerdateofbirth" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Customer Point</label>
                                <input type="text" class="form-control form-white" placeholder="Masukan Point Customer"
                                    type="text" name="customerpoint" value="{{ $item->customerpoint }}" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="select form-control form-white" name="status" required>
                                    <option value="1" @if ($item->status == '1') selected="selected" @endif>
                                        AKTIF
                                    </option>
                                    <option value="2" @if ($item->status == '2') selected="selected" @endif>
                                        TIDAK
                                        AKTIF</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Customer Address</label>
                        <textarea class="form-control form-white" name="customeraddress" required> {{ $item->customeraddress }}</textarea>
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

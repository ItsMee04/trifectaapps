<div class="modal custom-modal fade" id="editCategories{{ $item->id }}">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">CATEGORIES EDIT FORM</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form action="/categories/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="editcategories">Categories</label>
                        <input type="text" class="form-control form-white" placeholder="Masukan Jenis Kategori"
                            value="{{ $item->categories }}" type="text" name="categories" id="editcategories"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="editdescription">Description</label>
                        <textarea class="form-control form-white" name="description" id="editdescription" required>{{ $item->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="editstatus">Status</label>
                        <select class="select form-control form-white" name="status" id="editstatus" required>
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

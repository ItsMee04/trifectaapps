<div class="modal custom-modal fade" id="addUsers{{ $item->id }}">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">EMPLOYEE USER INPUT FORM</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form action="/add-users/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Employee Name</label>
                        <input type="text" class="form-control form-white" placeholder="Masukan Nama Karyawan"
                            value="{{ $item->employeename }}" type="text" name="namakaryawan" readonly>
                        <input type="hidden" class="form-control form-white" value="{{ $item->id }}" type="text"
                            name="id" readonly>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control form-white" placeholder="Masukan Kontak Karyawan"
                            name="username" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control form-white" placeholder="Masukan Kontak Karyawan"
                            name="password" required>
                    </div>
                    <div class="form-group">
                        <label>Access Role</label>
                        <select class="select form-control form-white" data-placeholder="Choose a color..."
                            name="role" required>
                            @foreach ($listrole as $itemrole)
                                <option value="{{ $itemrole->id }}"> {{ $itemrole->role }}</option>
                            @endforeach
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

<div class="modal custom-modal fade" id="editUsers{{ $item->id }}">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">EMPLOYEE USERS EDIT FORM</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form action="/users/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Employee Name</label>
                        <input type="text" class="form-control form-white" placeholder="Masukan Nama Karyawan"
                            value="{{ $item->employeename }}" type="text" name="employeename" readonly>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control form-white" value="{{ $item->username }}"
                            placeholder="Masukan Username Karyawan" name="username" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control form-white" placeholder="Masukan Password Karyawan"
                            name="password">
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

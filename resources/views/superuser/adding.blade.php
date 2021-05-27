<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Menambah Akun Baru</h5>
        </div>
        <div class="modal-body">
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="mb-3">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                            id="name" placeholder="Masukkan nama">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('nip') is-invalid @enderror" name="nip" value="{{ old('nip') }}"
                            id="nip" placeholder="Masukkan NIP">
                        @error('nip')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password"
                            id="password" placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" name="password_confirmation"
                            id="password_confirmation" placeholder="Password Confirmation">
                    </div>
                    <div class="text-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="role" id="inlineRadio1" value="sales">
                            <label class="form-check-label" for="inlineRadio1">Sales</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="role" id="inlineRadio2" value="activator">
                            <label class="form-check-label" for="inlineRadio2">Activator</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="role" id="inlineRadio2" value="maintainer">
                            <label class="form-check-label" for="inlineRadio2">Maintainer</label>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">Buat Akun</button></div>
            </form>
        </div>
    </div>
</div>
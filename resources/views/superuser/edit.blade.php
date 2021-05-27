<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Akun Baru</h5>
        </div>
        <div class="modal-body">
            <form action="{{ route('user.update', [$user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="mb-3">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}"
                            id="name" placeholder="Masukkan nama">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('nip') is-invalid @enderror" name="nip" value="{{ $user->nip }}"
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
                    <div class="text-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="role" id="inlineRadio1" value="sales" @if($user->hasRole('sales')) checked @endif)>
                            <label class="form-check-label" for="inlineRadio1">Sales</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="role" id="inlineRadio2" value="activator" @if($user->hasRole('activator')) checked @endif>
                            <label class="form-check-label" for="inlineRadio2">Activator</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="role" id="inlineRadio2" value="maintainer" @if($user->hasRole('maintainer')) checked @endif>
                            <label class="form-check-label" for="inlineRadio2">Maintainer</label>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">Edit Akun</button></div>
            </form>
        </div>
    </div>
</div>
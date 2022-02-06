@extends('layouts.auth')

@section('content')
<div class="row justify-content-center">

    <div class="col-xl-5 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="card o-hidden border-0">
                                <h5 class="text-center font-weight-bold">Serah Terima Dokumen Aktivasi</h5>
                            </div>
                            <br>
                            <form class="user" method="POST" action="{{ route('login') }}">
                            @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user @error('nip') is-invalid @enderror" name="nip" value="{{ old('nip') }}"
                                        id="exampleInputEmail" aria-describedby="emailHelp"
                                        placeholder="Enter NIP">
                                        @error('nip')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"
                                        id="exampleInputPassword" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                            </form>
                                <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
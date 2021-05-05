@extends('layouts.app')
@section('title')
    Dashboard
@endsection
 
@section('content')

    <div class="card">
        
        <div class="w3-bar w3-black">
            <button class="btn btn-light" onclick="openCity('London')">Register</button>
            <button class="btn btn-light" onclick="openCity('Paris')">user</button>
        </div>

        <div id="London" class="city">
            <div class="card-body">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">ICON+</h1>
                </div>
                <form class="user" method="POST" action="{{ route('register') }}">
                    @csrf
                    <input type="hidden" name="role" value="superuser">
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
                    <br>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Daftar
                    </button>
            </div>
        </div>

          
          <div id="Paris" class="city" style="display:none">
            <div class="table-responsive">
                <table class="table table-bordered" id="datatable data-table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            </tr>
                    </tbody>
                </table>
            </div>
          </div>
          
          
          <script>
              function openCity(cityName) {
                var i;
                var x = document.getElementsByClassName("city");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                document.getElementById(cityName).style.display = "block";
                }
          </script>
    </div>
@endsection



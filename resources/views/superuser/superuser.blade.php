@extends('layouts.app')
@section('title')
    Pelanggan
@endsection
@section('content')
@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Akun</h6>
    </div>
    <div class="card-body">
        <!-- Button trigger modal -->
        <div class="float-right mb-2">
            <button class="btn btn-primary btn-modal" data-href="{{ route('user.index') }}" data-container=".my-modal">Tambah Akun</button>
        </div>

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
                    @foreach ($users as $key => $value)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$value->nip ?? ''}}</td>
                        <td>{{$value->name ?? ''}}</td>
                        <td>
                            <form action="{{route('user.destroy', [$value->id])}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-primary btn-sm btn-modal" data-href="{{ route('user.edit', [$value->id]) }}" data-container=".my-modal">edit</button>
                                <button class="btn btn-danger btn-sm btn-delete" type="submit">delete</button>
                              </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade my-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
@endsection
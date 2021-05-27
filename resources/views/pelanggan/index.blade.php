@extends('layouts.app')
@section('title')
    Pelanggan
@endsection
@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{session('status')}}
    </div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pelanggan @role('maintainer') @if($uncheck == 0)| Seluruh pelanggan telah dicek! @else| Ada {{$uncheck}} pelanggan yang belum dicek! @endif @endrole</h6>
    </div>
    <div class="card-body">
        <!-- Button trigger modal -->
        @role('activator|superuser')
        <div class="float-right mb-2">
            <button class="btn btn-primary btn-modal" data-href="{{ route('pelanggan.create') }}" data-container=".my-modal">Tambah Pelanggan</button>
        </div>
        @endrole
        <div class="table-responsive">
            <table class="table table-bordered" id="datatable data-table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        @role('activator|maintainer')
                        <th>Mark as read?</th>
                        @endrole
                        <th>Nomor SO</th>
                        <th>Pelanggan</th>
                        <th>Status</th>
                        <th>Alamat</th>
                        <th>Tanggal Upload</th>
                        <th>Pelaksana</th>
                        @role('activator|maintainer|superuser')
                        <th>Aksi</th>
                        <th>files?</th>
                        @endrole
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggan as $key => $value)
                    <tr>
                        @role('activator|maintainer')
                        <td>
                            <input id="readable" name="readable" data-id="{{ $value->id }}" type="checkbox" aria-label="Checkbox for following text input" @if($value->readable == 'check') checked @endif disabled="disabled"> 
                        </td>
                        @endrole
                        <td>{{ $value->nomor_so ?? '' }}</td>
                        <td>{{ $value->nama }}</td>
                        <td><span class="badge badge-{{ $value->status == 'AKTIF' ? 'success' : 'warning' }}">{{ $value->status }}</span></td>
                        <td>{{ $value->alamat }}</td>
                        <td>{{ $value->updated_at->format('d-M-Y') }}</td>
                        <td>{{ $value->ptl }}</td>
                        @role('activator|maintainer|superuser')
                        <td>
                            @role('activator|maintainer|superuser')
                            <form action="{{route('pelanggan.destroy', [$value->id])}}" method="POST">
                                @csrf
                                @method('delete')
                                @role('activator|superuser')
                                <button class="btn btn-primary btn-sm btn-modal" data-href="{{ route('pelanggan.edit', [$value->id]) }}" data-container=".my-modal">edit</button>
                                <button class="btn btn-danger btn-sm btn-delete" type="submit">delete</button>
                                @endrole
                                @role('activator|maintainer')
                                @if($value->file1 != null)
                                <a onclick="reload('{{route('pelanggan.download', [$value->id])}}')" href="#" class="btn btn-info btn-sm">download</a>
                                @endif
                                @endrole
                              </form>
                            @endrole
                        </td>
                        <td>
                            @if($value->file1)
                                @foreach (json_decode($value->file1) as $pdf)
                                    <a href="{{asset('asset/file/'.$pdf)}}" target="_blank">{{ $pdf }}</a>
                                @endforeach
                            @endif
                        </td>
                        @endrole
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
<script>
    function reload(url)
    {
      window.open(url, '_blank');
      window.focus();
      location.reload();
    }
    </script>
@endsection
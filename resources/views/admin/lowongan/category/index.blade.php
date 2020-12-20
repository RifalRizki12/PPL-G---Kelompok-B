@extends('layouts.admin')


@section('content')

<div class="container-fluid mt-5">
    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">
      <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-2 mb-sm-0 pt-1">
          <span>Lowongan</span>
          <span>/</span>
          <span>Kategori</span>
          <a href="{{ url('kategori-terhapus') }}" class="btn btn-primary py-2 px-2 ml-2">Kategori yg dihapus</a>
          <a href="{{ url('kategori-baru') }}" class="btn btn-primary py-2 px-2">Tambah Kategori</a>
        </h4>
      </div>
    </div>
    <!-- Heading -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Ditampilkan</th>
                            <th>Edit</th>
                        </thead>
                        <tbody>
                            @foreach ($category as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->descrip }}</td>
                                <td>
                                    <input type="checkbox" {{ $item->status == '1' ? 'checked' : ' ' }}>
                                </td>
                                <td>
                                    <a href="{{ url('edit-kategori/'.$item->id) }}" class="badge btn-primary">Edit</a>
                                    <a href="{{ url('hapus-kategori/'.$item->id) }}" class="badge btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection

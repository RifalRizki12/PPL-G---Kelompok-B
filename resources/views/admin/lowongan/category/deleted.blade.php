@extends('layouts.admin')


@section('content')

<div class="container-fluid mt-5">
    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">
      <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-2 mb-sm-0 pt-1">
          <a href="{{ url('category') }}" >Kategori</a>
          <a>/</a>
          <a>Kategori Terhapus</a>
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
                                    <a href="{{ url('kembalikan-kategori/'.$item->id) }}" class="badge btn-info py-2 px-2">Kembalikan</a>
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

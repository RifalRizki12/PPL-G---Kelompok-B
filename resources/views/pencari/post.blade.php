@extends('layouts.pencari')


@section('content')

<section class="" style="padding-top: 130px; padding-bottom: 125px;">
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Pengalaman Kerja</th>
                                <th>Bidang Pekerjaan</th>
                                <th>Gambar</th>
                                <th>Ditampilkan</th>
                                <th>Edit</th>
                            </thead>
                            <tbody>
                                @foreach ($worker as $witem)
                                <tr>
                                    <td>{{ $witem->id }}</td>
                                    <td>{{ !empty($witem->user) ? $witem->user->name:'' }}</td>
                                    <td>{{ !empty($witem->category) ? $witem->category->name:'' }}</td>
                                    <td>{{ $witem->work_experience }}</td>
                                    <td>{{ $witem->field_work }} Orang</td>
                                    <td>
                                        <img src="{{ asset('uploads/worker/'.$witem->img_thumb) }}" width="100px">
                                    </td>
                                    <td>
                                        <input type="checkbox" {{ $witem->status == '1' ? 'checked' : ' ' }}>
                                    </td>
                                    <td>
                                        <a href="{{ url('edit-post-pencari/'.$witem->id) }}" class="badge btn btn-primary">Edit
                                        </a>
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
</section>

@endsection

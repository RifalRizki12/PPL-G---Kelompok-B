@extends('layouts.pemilik')

@section('content')

<div class="container-fluid mt-5" style="padding-top: 50px; padding-bottom: 125px;">
    <div class="row">
        <div class="col-md-12 py-3">
            <div class="card">
                <div class="card-body">
                    <h6>
                        <a href="{{ url('lowongan-pemilik') }}">Lowongan</a>
                        <a href="">/</a>
                        <a href="">Edit Lowongan</a>
                    </h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ url('update-lowongan-pemilik/'.$job->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <select name="category_id" class="form-control">
                                        <option value="{{ $job->category_id }}">{{ $job->category->name }}</option>
                                        @foreach ($category as $citem)
                                            <option value="{{ $citem->id }}">{{ $citem->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama lowongan</label>
                                    <input type="text" name="job_name" class="form-control" value="{{ $job->job_name }}" placeholder="Nama" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Custom URL (Slug)</label>
                                    <input type="text" name="url" class="form-control" value="{{ $job->url }}" placeholder='Isi URL' required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Deskripsi</label>
                                    <textarea rows="4" name="job_descrip" class="form-control" placeholder="Deskripsi" required>{{ $job->job_descrip }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Kapasitas Pekerja</label>
                                    <input type="integer" name="job_capacity" class="form-control" value="{{ $job->job_capacity }}" placeholder="Kapasitas" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Gambar</label>
                                    <input type="file" name="job_image" class="form-control">
                                    <img src="{{ asset('uploads/jobimage/'.$job->job_image) }}" width="100px" >
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Requirement</label>
                                    <textarea rows="4" name="job_req" class="form-control" placeholder="Requirement" required>{{ $job->job_req }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Gaji</label>
                                    <input type="integer" name="job_salary" class="form-control" value="{{ $job->job_salary }}" placeholder="Gaji" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Tampilkan / Sembunyikan</label>
                                    <input type="checkbox" name="job_status" {{ $job->job_status == '1' ? 'checked':'' }}>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

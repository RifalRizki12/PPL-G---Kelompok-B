@extends('layouts.pencari')

@section('content')

<section class="py-5" style="margin-top: 150px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ url('update-post-pencari/'.$worker->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Kategori</label>
                                        <select name="category_id" class="form-control">
                                            <option value="{{ $worker->category_id }}">
                                                {{ !empty($worker->category) ? $worker->category->name:'' }}</option>
                                            @foreach ($category as $citem)
                                            <option value="{{ $citem->id }}">{{ $citem->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Custom URL (Slug)</label>
                                        <input type="text" name="url" class="form-control" value="{{ $worker->url }}"
                                            placeholder="url (slug)" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Pengalaman Kerja</label>
                                        <textarea rows="4" name="work_experience" class="form-control"
                                            placeholder="Pengalaman Kerja" required>{{ $worker->work_experience }}</textarea>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Bidang Pekerjaan</label>
                                        <input type="integer" name="field_work" class="form-control"
                                            value="{{ $worker->field_work }}" placeholder="Bidang Pekerjaan" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Gambar</label>
                                        <input type="file" name="img_thumb" class="form-control">
                                        <img src="{{ asset('uploads/worker/'.$worker->img_thumb) }}" width="100px">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Tampilkan / Sembunyikan</label>
                                        <input type="checkbox" name="status"
                                            {{ $worker->status == '1' ? 'checked':'' }}>
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
</section>

@endsection

@extends('layouts.pencari')

@section('title')
    Profil
@endsection

@section('content')

<section class="py-5" style="margin-top: 150px">
    <div class="container" >
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Profilku</h4>
                        <hr>
                        <form action="{{ url('profil-pencari-update') }}" method="POST" enctype="multipart/form-data" >
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nama Depan</label>
                                        <input type="text" name="fname" class="form-control" value="{{ Auth::user()->name }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nama Belakang</label>
                                        <input type="text" name="lname" class="form-control" value="{{ Auth::user()->lname }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Foto</label> <br>
                                        <input type="file" name="foto" class="form-control">
                                        <img width="500px" src="{{ asset('uploads/profile/'.Auth::user()->picture) }}" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <input type="text" name="address" class="form-control" value="{{ Auth::user()->address }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nomor Telepon</label>
                                        <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Resume</label> <br>
                                        <input type="file" name="resume" class="form-control">
                                        <img width="500px" src="{{ asset('uploads/resume/'.Auth::user()->resume) }}" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" readonly value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nomor Rekening</label>
                                        <input type="text" name="no_rek" class="form-control" value="{{ Auth::user()->no_rek }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update Profil</button>
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

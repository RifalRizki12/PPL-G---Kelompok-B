@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-5">

    <div class="card mb-4 wow fadeIn">
        <div class="card-body d-sm-flex justify-content-between">

            <h4 class="mb-2 mb-sm-0 pt-1">
                <a href="/daftar-user">Daftar User</a>
                <span> / </span>
                <span>Edit Role</span>
            </h4>

        </div>

    </div>
    <!-- Heading -->

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h4>{{ $user_roles->role_as }}</h4>
                    <h5>
                        Status :
                        @if($user_roles->isverified == '0')
                        <label class="py-2 px-3 badge btn-primary">Sudah Diverifikasi</label>
                        @elseif($user_roles->isverified == '1')
                        <label class="py-2 px-3 badge btn-danger">Belum Diverifikasi</label>
                        @endif
                    </h5>
                    <form action="{{ url('role-update/'.$user_roles->id)}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PUT')

                        <div class="form-group">
                            <input type="text" name="name" class="form-control" value="{{ $user_roles->name }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" readonly value="{{ $user_roles->email }}">
                        </div>
                        <div class="form-group">
                            <label for="">Resume</label> <br>
                            <input type="file" name="resume" class="form-control">
                            <img width="500px" src="{{ asset('uploads/resume/'.$user_roles->resume) }}" alt="">
                        </div>
                        <div class="form-group">
                            <select name="roles" class="form-control">
                                <option value="{{ $user_roles->role_as }}">
                                    @if($user_roles->role_as == 'pencari')
                                    <label class="py-2 px-3 badge btn-primary">Pencari Kerja</label>
                                    @elseif($user_roles->role_as == 'admin')
                                    <label class="py-2 px-3 badge btn-danger">Admin</label>
                                    @elseif($user_roles->role_as == 'pemilik')
                                    <label class="py-2 px-3 badge btn-danger">Pemilik Usaha</label>
                                    @elseif($user_roles->role_as == '')
                                    <label class="py-2 px-3 badge btn-danger">--Select Role--</label>
                                    @endif
                                </option>
                                <option value="pencari">Pencari Kerja</option>
                                <option value="admin">Admin</option>
                                <option value="pemilik">Pemilik Usaha</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="isverified" class="form-control">
                                <option value="{{ $user_roles->isverified }}">
                                    @if($user_roles->isverified == '0')
                                    <label class="py-2 px-3 badge btn-primary">Sudah Diverifikasi</label>
                                    @elseif($user_roles->isverified == '1')
                                    <label class="py-2 px-3 badge btn-danger">Belum Diverifikasi</label>
                                    @endif
                                </option>
                                <option value="0">Verifikasi User</option>
                                <option value="1">Jangan Verifikasi User</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    @endsection

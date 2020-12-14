@extends('layouts.admin')


@section('content')

<div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="https://mdbootstrap.com/docs/jquery/" target="_blank">Home Page</a>
          <span>/</span>
          <span>Daftar User</span>
        </h4>

      </div>

    </div>
    <!-- Heading -->

    <div class="row">

        <div class="col-md-6">
            <form action="{{ url('daftar-user') }}" method="GET">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <select name="peran" class="form-control">
                                @if (isset($_GET['peran']))
                                    <option value="{{ $_GET['peran'] }}">{{ $_GET['peran'] }}</option>
                                    <option value="">User</option>
                                    <option value="pencari">Pencari</option>
                                    <option value="admin">Admin</option>
                                    <option value="pemilik">Pemilik</option>
                                @else
                                    <option value="">User</option>
                                    <option value="pencari">Pencari</option>
                                    <option value="admin">Admin</option>
                                    <option value="pemilik">Pemilik</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="com-md-4">
                        <button type="submit" class="btn btn-primary py-2">Filter</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Peran</th>
                                <th class="text-center">Aktifitas</th>
                                <th class="text-center">Verifikasi</th>
                                <th class="text-center">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->role_as }}</td>
                                <td class="text-center">
                                    @if($item->isUserOnline())
                                        <label class="py-2 px-3 badge btn-success">Online</label>
                                    @else
                                        <label class="py-2 px-3 badge btn-warning">Offline</label>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($item->isverified == '0')
                                        <label class="py-2 px-3 badge btn-primary">Sudah Diverifikasi</label>
                                    @elseif($item->isverified == '1')
                                        <label class="py-2 px-3 badge btn-danger">Belum Diverifikasi</label>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('role-edit/'.$item->id)}}" class="badge badge-pill btn-primary px-3 py-2">edit</a>
                                    <a href="" class="badge badge-pill btn-danger px-3 py-2">delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div class="float-right">
                        {{ $users->links()}}
                    </div> --}}
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#datatable1').DataTable();
    } );
</script>
@endsection

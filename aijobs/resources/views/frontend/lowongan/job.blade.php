@extends('layouts.frontend')


@section('title')
    Kategori - Lowongan
@endsection

@section('content')

<div class="card mb-5 card py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <label class="mb-0" for="">Lowongan / {{ $category->name }}</label>
            </div>
        </div>
    </div>
</div>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @foreach ($job as $jitem)
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="">
                                            <img src="{{ asset('uploads/jobimage/'.$jitem->job_image) }}" style="height: 100px" class="w-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-7 border-right border-left">
                                        <a href="{{ asset('lowongan/'.$jitem->category->url.'/'.$jitem->url) }}" class="text-left font-weight-bold">
                                            <h5 class="mb-2">{{ $jitem->job_name }}</h5>
                                        </a>
                                        <div class="">
                                            <h6 class="text-dark mb-0">{!! $jitem->job_descrip !!}</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="text-right">
                                            <h6 class="text-dark"> Pemilik Usaha :{{ $jitem->owner->name }}</h6>
                                            <h6 class="font-italic font-weight-bold">Gaji Rp {{ number_format($jitem->job_salary) }} </h6>
                                        </div>
                                        <div class="text-right">
                                            <a href="{{ asset('lowongan/'.$jitem->category->url.'/'.$jitem->url) }}" class="btn btn-outline-primary py-1 px-2">
                                                Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

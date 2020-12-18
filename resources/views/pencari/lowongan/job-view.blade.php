@extends('layouts.frontend')


@section('title')
    Kategori - Lowongan - Detail Lowongan
@endsection

@section('content')

<section class="py-5" style="margin-top: 125px">

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="border">
                                <img src="{{ asset('uploads/jobimage/'.$job->job_image) }}" class="w-100" alt="">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="py-2">
                                <small class="text-gray mb-0">Lowongan > {{ $job->category->name }} > {{ $job->job_name }} </small>
                            </div>
                            <div class="product-heading py-2 border-top">
                                <h5 class="mb-0 font-weight-bold" >{{ $job->job_name }} || {{ $job->owner->name }}</h5>
                            </div>
                            <div class="py-2">
                                {{-- <small>
                                    Rating :
                                    @for($i=1; $i<5; $i++)
                                        <i class="fa fa-star text-warning"></i>
                                    @endfor
                                </small>
                                <h5 class="font-italic badge badge-primary ml-3 px-2"> {{ $job->job_salary }} </h5> --}}
                            </div>
                            <div class="product-price">
                                <h5>
                                    <span class="offer-price">Rp {{ number_format($job->job_salary) }}</span>
                                </h5>
                            </div>

                            <div class="py-3">
                                <div class="row">
                                    <div class="col-md-6 col-3">
                                        <button type="button" class="add-to-cart btn btn-danger m-0 py-2 px-3">Kirim Lamaran</button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-small-description py-2 border-top">
                                {!! $job->job_descrip !!}
                            </div>
                        </div>

                        <div class="col-md-12">

                            <div class="product-highlights py-2 border-top">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="highlights-heading mb-0 font-weight-bold">Persyaratan</h6>
                                    </div>
                                    <div class="card-body">
                                        {!! $job->job_req !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</section>

@endsection

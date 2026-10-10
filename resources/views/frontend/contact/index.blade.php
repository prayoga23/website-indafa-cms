@extends('frontend.layouts.app')

@section('title','Kontak')

@section('content')

<section class="page-header">

    <div class="container">

        <h1>Kontak Kami</h1>

    </div>

</section>

<section class="py-5">

    <div class="container">

        <div class="row">

            <div class="col-lg-5">

                <div class="card shadow-sm">

                    <div class="card-body">

                        <h4>

                            Informasi Kampus

                        </h4>

                        <hr>

                        <p>

                            <strong>Alamat :</strong><br>

                            {{ $setting->address }}

                        </p>

                        <p>

                            <strong>Telepon :</strong><br>

                            {{ $setting->phone }}

                        </p>

                        <p>

                            <strong>Email :</strong><br>

                            {{ $setting->email }}

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-lg-7">

                <div class="card shadow-sm">

                    <div class="card-body">

                        {!! $setting->google_maps !!}

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection

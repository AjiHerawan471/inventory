@extends('layouts.app')

@section('css')
<style>
    .card-body {
        padding: 0;
    }

    .btn-dark {
        width: 100%;
    }

    .center {
        margin-top: 60px;
    }
    
    .center-form{
    margin-top: 140px;
    }
</style>
@endsection

@section('title', 'Halaman Login')
@section('content')
<div class="row justify-content-center center">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <img src="{{ asset('images/buk.jpg') }}" alt="" width="350">
                    </div>
                    <div class="col-lg-8">
                        <div class="row justify-content-center center">
                            <div class="col-lg-6">
                                <h2>Inventaris</h2>
                                <p>Silahkan Masuk Terlebih Dahulu</p>
                                <form action="{{ route('masuk.proses') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Password"
                                            class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-dark mt-3">Masuk</button>
                                </form>
                                <p class="text-center mt-3">Belum Punya Akun? <a href="{{ route('daftar') }}">Daftar</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')
<body style="background-image: url('https://wallpaperaccess.com/full/2748602.jpg'); background-position: center; background-repeat: no-repeat; background-size: cover;">
    <div class="container" style="margin-top: 5rem">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('DURUM') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Kullanıcı Girişi Yapıldı!') }}
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-12">
                                <a class="btn btn-info btn-rounded col-12" href="{{route('gamePlay')}}">Oyuna Başla</a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
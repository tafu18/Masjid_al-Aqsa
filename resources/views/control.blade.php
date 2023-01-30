@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İlk Kıblemizin Özgürlüğü İçin...</title>
</head>
<body style="background-image: url('https://wallpaperaccess.com/full/2748602.jpg'); background-repeat: no-repeat; background-size: cover;">
    <div class="container mt-5" >
        <div class="container mb-3">
            <div class="row mb-3">
                <div class="container mt-5">
                    @if($message == 'Tebrikler! Doğru Cevap Verdiniz.')
                        <div class="alert alert-success text-center" role="alert">
                            {{$message}}
                        </div>
                    @elseif ($message != 'Tebrikler! Doğru Cevap Verdiniz.')
                        <div class="alert alert-danger text-center" role="alert">
                            {{$message}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row" style="margin-bottom: 20rem">
                <div class="col-12">
                    <a class="btn btn-info btn-rounded col-12" href="{{route('gamePlay')}}">Oyuna Devam Et</a> 
                </div>
            </div>
        </div>
    </div>
</body>
</html>
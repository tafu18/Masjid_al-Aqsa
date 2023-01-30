@extends('layouts.app')
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İlk Kıblemizin Özgürlüğü İçin...</title>
</head>
<body style="background-image: url('https://www.diyanetvakfiyayin.com.tr/images/selcuklu-bg.png'); background-position: center; background-repeat: no-repeat; background-size: cover;">
    <div class="container mt-5 p-3">
        <div class="row">
            <div class="justify-content-center mt-5">
                <div class="alert alert-info text-center" role="alert">
                    Genç Kardeşim! İlk Kıblemizin Özgürlüğü İçin...<br>
                    Soruları Doğru Yanıtladıkça Fotoğraf Sana Kendini Gösterecek
                </div>
            </div>
            @if ($success != '')
            <div class="justify-content-center">
                <div class="alert alert-info text-center" role="alert">
                    {{$success}}
                </div>
            </div>
            @endif
        </div>
        <div class="row d-flex">
            <div class="col-lg-8">
                <img class="shadow rounded col-12" src="../images/score/{{auth()->user()->score}}.png" alt="">
                <div class="row d-flex justify-content-center mt-3 mb-5">
                    @if($success == '')
                        <button type="button" class="btn btn-info btn-rounded col-12" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Soru Gelsin
                        </button>
                    @endif 
                </div>
            </div>
            <div class="col-lg-4 mt-3">
                <div class="row justify-content-center">
                    <button type="button" class="btn btn-info position-relative col-12">
                        Bilgiler
                    </button>
                </div>
                <ol class="list-group list-group-light list-group-numbered">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">İsim:</div>
                        {{ auth()->user()->name }}
                        </div>
                        <span class="badge badge-primary rounded-pill"></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">Skor:</div>
                        {{ auth()->user()->score }}
                        </div>
                        <span class="badge badge-primary rounded-pill"></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">Kayıt Tarihi:</div>
                        {{ auth()->user()->created_at }}
                        </div>
                        <span class="badge badge-primary rounded-pill"></span>
                    </li>
                </ol>
                <div class="col-12 mt-3">
                    <div class="row justify-content-center">
                        <button type="button" class="btn btn-info position-relative col-8">
                            Skor / Toplam Soru => {{auth()->user()->score}} / {{$counter}}
                            <span class="position-absolute top-0 start-100 translate-middle p-2 bg-info border border-light rounded-circle">
                                <span class="visually-hidden"></span>
                            </span>
                        </button>
                    </div>
                </div> 
                <div class="col-lg-12 mt-3">

                    <div class="row justify-content-center">
                        <button type="button" class="btn btn-info position-relative col-12">
                            Top List
                        </button>
                    </div>
                    <ol class="list-group list-group-light">
                        @foreach ($topList as $top)
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">{{$top->name}}</div>
                                    Kayıt Tarihi: {{$top->created_at}}
                                </div>
                                <span class="badge badge-info text-info rounded-pill">{{$top->score}}</span>
                            </li>
                        @endforeach
                    </ol>
                </div>              
            </div>
        </div>
    </div>
    @if ($success == '')
          <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="staticBackdropLabel">Soru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ $content }}
                    </div>
                    <div class="modal-footer justify-content-center">
                        <div class="row col-12">
                            <div class="col-6">
                                <a class="btn btn-info btn-rounded col-12" href="{{ route('isCorrect', [$id, $choiseA]) }}">{{ $choiseA }}</a> 
                            </div>
                            <div class="col-6">
                                <a class="btn btn-info btn-rounded col-12" href="{{ route('isCorrect', [$id, $choiseB]) }}">{{ $choiseB }}</a> 
                            </div>
                        </div>
                        <div class="row col-12">
                            <div class="col-6">
                                <a class="btn btn-info btn-rounded col-12" href="{{ route('isCorrect', [$id, $choiseC]) }}">{{ $choiseC }}</a> 
                            </div>
                            <div class="col-6">
                                <a class="btn btn-info btn-rounded col-12" href="{{ route('isCorrect', [$id, $choiseD]) }}">{{ $choiseD }}</a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@extends('layouts.footer')
</body>
</html>
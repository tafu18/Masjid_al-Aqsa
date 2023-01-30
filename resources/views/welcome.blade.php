@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İlk Kıblemizin Özgürlüğü İçin...</title>
</head>
<body style="background-image: url('https://wallpaperaccess.com/full/2748602.jpg'); background-position: center; background-repeat: no-repeat; background-size: cover;">
    <div class="container mt-5">
        <div class="row">
            <div class="justify-content-center mt-5">
                <div class="alert alert-info text-center" role="alert">
                    Genç Kardeşim! İlk Kıblemizin Özgürlüğü İçin...<br>
                    Önce Tanıtım Videosunu İzle Ardından Sorulara Geç
                </div>
            </div>
        </div>
        <div class="container mb-3">
            <div class="row mb-3">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-center mt-3">
                        <iframe class="rounded shadow"
                            width="1120" height="630" src="https://www.youtube.com/embed/LaT6tj78QJA" 
                            title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; 
                            clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 20rem">
                <div class="col-12">
                    <a class="btn btn-info btn-rounded col-12" href="{{route('login')}}">Haydi Sorulara Geçelim</a> 
                </div>
            </div>
        </div>
    </div>
@extends('layouts.footer')
</body>
</html>
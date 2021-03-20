<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ラーメン広場</title>
        <meta name="description" content="ラーメンを共有しよう ラーメン広場は食べたラーメンの写真と感想を共有できるサイトです">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="https://ramenhiroba.s3-ap-northeast-1.amazonaws.com/favicon.ico" type="image/x-icon">
        <link rel="icon" href="https://ramenhiroba.s3-ap-northeast-1.amazonaws.com/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/css/lightbox.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/js/lightbox.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="wrapper bg-light">

            {{-- ナビゲーションバー --}}
            @include('commons.navbar')
    
            <div class="container">
                {{-- エラーメッセージ --}}
                @include('commons.error_messages')
    
                @yield('content')
            </div>
            
            @include('commons.footer')
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>

    </body>
</html>
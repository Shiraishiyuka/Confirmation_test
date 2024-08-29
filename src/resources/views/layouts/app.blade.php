<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}"/>
    @yield('css')
    <!--書体（Inika）の追加-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
    font-family: "Inika", serif;
}

/*ヘッダーの内容と文字の内容*/


.header {
    width: 1512px;
    height: 100px;
    color: #887969;
    gap: 0px;
    border: 1px 0px 0px 0px;
    opacity: 0px;
    border: 1px solid #E0DFDE;
    display: flex;
    align-items: center;
}

.header_inner {
    font-size: 40px;
    font-weight: 400;
    margin-left: 580px
}

main {
    width: 1512px;
}
    </style>
</head>
<body>
    <header class="header">
            <p class="header_inner">FashionablyLate</p>
            @yield('route')
    </header>
    
    <main>
        @yield('content')
    </main>
</body>
</html>
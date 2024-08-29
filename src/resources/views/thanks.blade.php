<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}"/>
    <!--書体（Inika）の追加-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
</head>
    <body>
    <div class="content">
        <div class="text1"></div>
        <div class="text2">お問合せありがとうございました</div>
        <form action="/" method="post">
            @csrf
            <div class="button">
            <button class="form__button-submit" type="submit">HOME</button>
            </div>
        </form>
    </div>
</body>
</html>

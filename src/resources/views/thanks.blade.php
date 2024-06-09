<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>FashionablyLate - サンクスページ</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}" />
    <link rel="stylesheet" href="{{asset('css/thanks.css')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="backgraound-text">Thank you</div>
        <div class="front-text">お問い合わせありがとうございました</div>
         <form action="/" method="get">
             @csrf
            <button type="submit" class="thanks-button">HOME</button>
        </form>
    </div>
</body>
</html>



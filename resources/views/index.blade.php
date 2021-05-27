<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог лекарственных средств</title>
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        @include('parts.header')
        <section class="input__supplies">
            @include('parts.form')
        </section>
        <section class="category">
            <div class="content__card">
                <h2 class="content__card--title">Действующие вещества</h2>
                <div class="content__card--body">

                    <span class="content__card--count"></span>
                </div>
            </div>
            <div class="content__card">
                <h2 class="content__card--title">Производитель</h2>
                <div class="content__card--body">

                    <span class="content__card--count"></span>
                </div>
            </div>
            <div class="content__card">
                <h2 class="content__card--title">Лекарственное средство</h2>
                <div class="content__card--body">
                    <span class="content__card--count"></span>
                </div>
            </div>
        </section>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('/js/index.js') }}"></script>
</body>

</html>
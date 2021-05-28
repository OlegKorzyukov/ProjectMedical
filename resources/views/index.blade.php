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
            <div class="content__card" data-card-name='substance'>
                <h2 class="content__card--title">Действующие вещества</h2>
                <div class="content__card--body">

                    <span class="content__card--count"></span>
                </div>
            </div>
            <div class="content__card" data-card-name='manufacturer'>
                <h2 class="content__card--title">Производитель</h2>
                <div class="content__card--body">

                    <span class="content__card--count"></span>
                </div>
            </div>
            <div class="content__card" data-card-name='medicine'>
                <h2 class="content__card--title">Лекарственное средство</h2>
                <div class="content__card--body">
                    <span class="content__card--count"></span>
                </div>
            </div>
        </section>
        <section id="content">
            <div id="substance" class='content__card'>
                @foreach($AllSubstance as $key => $value)
                <div class="content__table hidden">
                    <div class="content__table--row">
                        <div class="content__table--index">
                            {{++$key}}
                        </div>
                        <div class="content__table--value">
                            {{$value->name}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div id="manufacturer" class='content__card'>
                @foreach($AllManufacture as $key => $value)
                <div class="content__table hidden">
                    <div class="content__table--row">
                        <div class="content__table--index">
                            {{++$key}}
                        </div>
                        <div class="content__table--value">
                            {{$value->name}}
                        </div>
                        <div class="content__table--value">
                            <a href="{{$value->link}}">{{strip_string($value->link)}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div id="medicine" class='content__card'>
                @foreach($AllMedicine as $key => $value)
                <div class="content__table hidden">
                    <div class="content__table--row">
                        <div class="content__table--index">
                            {{++$key}}
                        </div>
                        <div class="content__table--value">
                            {{$value->name}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('/js/index.js') }}"></script>
</body>

</html>
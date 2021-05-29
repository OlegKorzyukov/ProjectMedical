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
                <div class="content__table hidden">
                    @foreach($AllSubstance as $key => $value)
                    <div class="content__table--row" data-substance-id={{ $value->id }}>
                        <div class="content__table--index">
                            {{++$key}}
                        </div>
                        <div class="content__table--value">
                            <div class="content__table-edit-text" data-substance-name={{ $value->name }}>{{$value->name}}</div>
                            <span class="table-edit-value hidden">Изменить</span>
                        </div>
                        <div class="content__table--delete">
                            <form method="POST" action="{{ route('substance.destroy') }}">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="substanceId" value="{{ $value->id }}">
                                <a href="#" onclick="this.closest('form').submit();return false;">X</a>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div id="manufacturer" class='content__card'>
                <div class="content__table hidden">
                    @foreach($AllManufacture as $key => $value)
                    <div class="content__table--row" data-manufacturer-id={{ $value->id }}>
                        <div class="content__table--index">
                            {{++$key}}
                        </div>
                        <div class="content__table--value">
                            <div class="content__table-edit-text" data-manufacturer-name={{ $value->name }}>{{$value->name}}</div>
                            <span class="table-edit-value hidden">Изменить</span>
                        </div>
                        <div class="content__table--value table-link">
                            <a href="{{$value->link}}" data-manufacturer-link={{ $value->name }}>{{ $value->link }}</a>
                            <span class="table-edit-value hidden">Изменить</span>
                        </div>
                        <div class="content__table--delete">
                            <form method="POST" action="{{ route('manufacture.destroy') }}">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="manufactureId" value="{{ $value->id }}">
                                <a href="#" onclick="this.closest('form').submit();return false;">X</a>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div id="medicine" class='content__card'>
                <div class="content__table hidden">
                    @foreach($AllMedicine as $key => $value)
                    <div class="content__table--row" data-medicine-id={{ $value->id }}>
                        <div class="content__table--index">
                            {{++$key}}
                        </div>
                        <div class="content__table--value">
                            <div class="content__table-edit-text" data-medicine-name={{ $value->name }}>{{$value->name}}</div>
                            <span class="table-edit-value hidden">Изменить</span>
                        </div>
                        <div class="content__table--value">
                            <div class="content__table-edit-text">{{$SuppliesService->getNameById($value->substance_id, 'substance')}}</div>
                            <span class="table-edit-value hidden">Изменить</span>
                        </div>
                        <div class="content__table--value">
                            <div class="content__table-edit-text">{{$SuppliesService->getNameById($value->manufacturer_id, 'manufacturer')}}</div>
                            <span class="table-edit-value hidden">Изменить</span>
                        </div>
                        <div class="content__table--value">
                            <div class="content__table-edit-text" data-medicine-price={{ $value->price }}>{{$value->price}}</div>
                            <span class="table-edit-value hidden">Изменить</span>
                        </div>
                        <div class="content__table--delete">
                            <form method="POST" action="{{ route('medicine.destroy') }}">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="medicineId" value="{{ $value->id }}">
                                <a href="#" onclick="this.closest('form').submit();return false;">X</a>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('/js/index.js') }}"></script>
</body>

</html>
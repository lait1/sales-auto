@extends('layout')

@section('content')

    <section class="filter">
        <form action="/search" method="get">

        <div class="filter__row">
            <div class="filter__select">
                <select class="form-control" name="city">
                    <option disabled selected>Город</option>
                    @foreach($cities as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="filter__select">
                <select class="form-control" name="category">
                    <option disabled selected>Категория</option>
                    @foreach($categories as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="filter__select">
                <input class="form-control price" type="text" name="price_from" placeholder="Цена от,">
                <input class="form-control price" type="text" name="price_to" placeholder="до">
            </div>
            <div class="filter__search">
                <input class="form-control search" type="text" name="search_text" placeholder="Поиск по объявлениям">
                <button type="submit" class="filter__search-link"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </div>

    <a href="#" class="filter__show-all">Все фильтры ></a>
        <div class="filter__row">
            <div class="filter__select">
                <select class="form-control" name="fuel">
                    <option disabled selected="selected">Топливо</option>
                    <option value="1">Дизель</option>
                    <option value="2">Бензин</option>
                </select>
            </div>
            <div class="filter__select">
                <select class="form-control" name="transmission">
                    <option disabled selected>Коробка передач</option>
                    <option value="1">Механическая</option>
                    <option value="2">Автомат</option>
                </select>
            </div>
            <div class="filter__select">
                <select class="form-control" name="drive">
                    <option disabled selected>Привод</option>
                    <option value="1">Передний</option>
                    <option value="2">Задний</option>
                    <option value="3">Полный</option>

                </select>
            </div>
            <div class="filter__select">
                <select class="form-control status" name="status">
                    <option disabled selected>Статус</option>
                    @foreach($status as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="filter__select">
                <input class="form-control price" type="text" name="year_from" placeholder="Год от,">
                <input class="form-control price" type="text" name="year_to" placeholder="до">
            </div>
        </div>
        <div class="filter__row">
            <input class="btn btn-secondary" type="reset" value="Сброс">
            <input class="btn btn-success" type="submit" value="Показать">
        </div>
        {{--<div class="filter__search">--}}
        {{--<input class="form-control search" type="text" placeholder="Поиск по объявлениям">--}}
        {{--<a href="#" class="filter__search-link"><i class="fa fa-search" aria-hidden="true"></i></a>--}}
        {{--</div>--}}
        </form>
    </section>
    <section class="brand">
        <h2 class="brand__title">Марки авто</h2>
        <div class="brand__list">
            @foreach($brands as $item)
                <a href="#" class="brand__item">
                    <span class="brand__item-name">{{$item->name}}</span>
                    <span class="brand__item-count">{{$item->countAuto()}}</span>
                </a>
            @endforeach
            <a href="#" class="brand__item">
                <span class="brand__item-all">Все марки <i class="fa fa-caret-down" aria-hidden="true"></i></span>
            </a>
        </div>
    </section>
    <section class="new-sales">
        <div class="new-sales__header">
            <h2 class="new-sales__title">Новые объявления</h2>
            <div class="new-sales__arrow">
                <a href="#" class="left"><i class="fa fa-angle-left fa-lg" aria-hidden="true"></i></a>
                <a href="#" class="right"><i class="fa fa-angle-right fa-lg" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="new-sales__list">
            @foreach($recentAuto as $item)
                <div class="new-sales__auto">
                    <a href="/auto/{{$item->slug}}" class="new-sales__auto-img">
                        <img src="img/car-example.jpg" alt="TACHKA">
                    </a>
                    <a href="/auto/{{$item->slug}}" class="new-sales__auto-name">{{$item->name}}</a>
                    <div class="new-sales__auto-price"><span>{{$item->getPrice()}} <i class="fa fa-rub"
                                                                                      aria-hidden="true"></i></span>
                    </div>
                    <div class="new-sales__auto-description">{{$item->getMileage()}} км, {{$item->getYear()}}
                        год, {{$item->getTransmission()}}, {{$item->getDrive()}}, {{$item->getFuel()}}
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="article">
        <h2 class="article__header">Советы</h2>
        <div class="article__content">
            @foreach($recentPost as $item)
                @if ($loop->first)
                    <a href="/post/{{$item->slug}}" class="article__block big"
                       style='background-image: url("/upload/post/{{$item->image}}")'>
                        <span class="article__block-title">{{$item->title}}</span>
                    </a>
                    @continue
                @endif
                <a href="/post/{{$item->slug}}" class="article__block "
                   style='background-image: url("/upload/post/{{$item->image}}")'>
                    <span class="article__block-title">{{$item->title}}</span>
                </a>
            @endforeach
        </div>
    </section>

@endsection

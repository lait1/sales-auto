@extends('layout')

@section('content')

    <section class="filter">
        <div class="filter__select">
            <select class="form-control city">
                <option selected>Город</option>
                @foreach($cities as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="filter__select">
            <select class="form-control category">
                <option selected>Категория</option>
                @foreach($categories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="filter__select">
            <select class="form-control status">
                <option selected>Статус</option>
                @foreach($status as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="filter__select">
            <select class="form-control price">
                <option selected>Цена</option>
                <option>2</option>
            </select>
        </div>
        <div class="filter__search">
            <input class="form-control search" type="text" placeholder="Поиск по объявлениям">
            <a href="#" class="filter__search-link"><i class="fa fa-search" aria-hidden="true"></i></a>
        </div>

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
                    <div class="new-sales__auto-price"><span>{{$item->getPrice()}} <i class="fa fa-rub" aria-hidden="true"></i></span></div>
                    <div class="new-sales__auto-description">{{$item->mileage}} км, {{$item->year}} год, {{$item->transmission}}, {{$item->drive}}, {{$item->fuel}}
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
                <a href="/post/{{$item->slug}}" class="article__block big" style='background-image: url("/upload/post/{{$item->image}}")'>
                    <span class="article__block-title">{{$item->title}}</span>
                </a>
                    @continue
                @endif
                <a href="/post/{{$item->slug}}" class="article__block " style='background-image: url("/upload/post/{{$item->image}}")'>
                    <span class="article__block-title">{{$item->title}}</span>
                </a>
                @endforeach
        </div>
    </section>

@endsection

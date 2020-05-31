@extends('layout')

@section('content')
    <section class="car">
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        <div class="car-header">
            <div class="car-header__main">
                <div class="car-header__main-name">{{$auto->name}}</div>
                <div class="car-header__main-price">{{$auto->getPrice()}} <i class="fa fa-rub" aria-hidden="true"></i></div>
            </div>
            <div class="car-header__subtitle">
                <div class="car-header__subtitle-count">
                    <span class="date">{{$auto->getDate()}}</span>
                    {{--<span class="views"><i class="fa fa-eye" aria-hidden="true"></i> 59 (59 сегодня)</span>--}}
                </div>
                <a href="#" class="car-header__subtitle-favorite">
                    Добавить в избранное
                    <i class="fa fa-heart" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="car-content">
            <div class="car-slider">
                <div class="slider-for">
                    @foreach($auto->image as $item)
                        <img class="car-slider__main" src="/upload/{{$item->name}}" alt="">
                    @endforeach
                </div>
                <div class="slider-nav">
                    @foreach($auto->image as $item)
                        <img class="car-slider__small" src="/upload/thumbnail/{{$item->name}}" alt="">
                    @endforeach
                </div>
            </div>
            <div class="car-info">
                <div class="car-tabs">
                    <div class="car-tabs__nav nav" role="tablist">
                        <a href="#specification" class="car-tabs__nav-item active" data-toggle="tab" role="tab">Характеристики</a>
                        <a href="#description" class="car-tabs__nav-item " data-toggle="tab" role="tab">Описание</a>
                    </div>
                    <div class="car-tabs__content tab-content">
                        <div class="car-tabs__specification tab-pane fade show active" id="specification"
                             role="tabpanel">
                            <div class="car-tabs__specification-item">
                                <span class="name">Номер лота</span> <span class="value">{{$auto->id}}</span>
                            </div>
                            <div class="car-tabs__specification-item">
                                <span class="name">Категория</span> <span class="value">{{$auto->getType()}}</span>
                            </div>
                            <div class="car-tabs__specification-item">
                                <span class="name">Статус</span> <span class="value">{{$auto->getStatus()}}</span>
                            </div>
                            <div class="car-tabs__specification-item">
                                <span class="name">Пробег</span> <span class="value">{{$auto->getMileage()}}</span>
                            </div>
                            <div class="car-tabs__specification-item">
                                <span class="name">Коробка передач</span> <span
                                        class="value">{{$auto->getTransmission()}}</span>
                            </div>
                            <div class="car-tabs__specification-item">
                                <span class="name">Привод</span> <span class="value">{{$auto->getDrive()}}</span>
                            </div>
                            <div class="car-tabs__specification-item">
                                <span class="name">Топливо</span> <span class="value">{{$auto->getFuel()}}</span>
                            </div>
                            <div class="car-tabs__specification-item">
                                <span class="name">Год выпуска</span> <span class="value">{{$auto->getYear()}}</span>
                            </div>
                        </div>
                        <div class="car-tabs__description tab-pane fade" id="description" role="tabpanel">

                            {{$auto->description}}
                        </div>
                    </div>
                </div>
                <a href="/buy/{{$auto->id}}" class="car__button">Купить</a>
            </div>
        </div>
    </section>
    <section class="new-sales">
        <div class="new-sales__header">
            <h2 class="new-sales__title">Похожие объявления</h2>
            <!--<div class="new-sales__arrow">-->
            <!--<a href="#" class="left"><i class="fa fa-angle-left fa-lg" aria-hidden="true"></i></a>-->
            <!--<a href="#" class="right"><i class="fa fa-angle-right fa-lg" aria-hidden="true"></i></a>-->
            <!--</div>-->
        </div>
        <div class="new-sales__list">
            @foreach($recentAuto as $item)
                <div class="new-sales__auto">
                    <a href="/auto/{{$item->slug}}" class="new-sales__auto-img">
                        <img src="/img/car-example.jpg" alt="TACHKA">
                    </a>
                    <a href="/auto/{{$item->slug}}" class="new-sales__auto-name">{{$item->name}}</a>
                    <div class="new-sales__auto-price"><span>{{$item->getPrice()}} <i class="fa fa-rub" aria-hidden="true"></i></span></div>
                    <div class="new-sales__auto-description">{{$item->mileage}} км, {{$item->year}} год, {{$item->transmission}}, {{$item->drive}}, {{$item->fuel}}
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
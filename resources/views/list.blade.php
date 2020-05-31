@extends('layout')

@section('content')
    <section class="catalog">
        @foreach($auto as $item)
        <div class="catalog-item">
            <div class="catalog-item__image">
                <a href="/auto/{{$item->slug}}"><img src="img/car-example.jpg" alt=""></a>
            </div>
            <div class="catalog-item__desc">
                <div class="catalog-item__title">
                    <div class="catalog-item__title-name">{{$item->name}}</div>
                    <div class="catalog-item__title-lot">Лот № {{$item->id}}</div>
                </div>
                <div class="catalog-item__info">
                    <div class="catalog-item__info-name">Город</div>
                    <div class="catalog-item__info-value">{{$item->getCity()}}</div>
                </div>
                <div class="catalog-item__info">
                    <div class="catalog-item__info-name">Категория</div>
                    <div class="catalog-item__info-value">{{$item->getType()}}</div>
                </div>
                <div class="catalog-item__info">
                    <div class="catalog-item__info-name">Статус</div>
                    <div class="catalog-item__info-value">{{$item->getStatus()}}</div>
                </div>
                <div class="catalog-item__info">
                    <div class="catalog-item__info-name">Год</div>
                    <div class="catalog-item__info-value">{{$item->getYear()}}</div>
                </div>
            </div>
            <div class="catalog-item__action">
                {{--<a href="#" class="catalog-item__action-delete">Удалить <i class="fa fa-trash-o" aria-hidden="true"></i></a>--}}
                <div class="catalog-item__action-price">Стоимость</div>
                <div class="catalog-item__action-cost">{{$item->getPrice()}} <i class="fa fa-rub" aria-hidden="true"></i></div>
                <a href="/auto/{{$item->slug}}" class="catalog-item__action-details">Подробнее</a>
            </div>
        </div>

        @endforeach
            {{$auto->links()}}
    </section>
@endsection

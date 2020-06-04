@extends('layout')

@section('content')

    <section class="setting">
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        @include('error')
        <div class="setting__header">Настройки аккаунта</div>
        <form action="/profile" method="post" class="setting__form col-md-6">
            @csrf
            <div class="form-group ">
                <input type="text" class="form-control" placeholder="ФИО" name="fio" value="{{$client->fio}}">
            </div>
            <div class="form-group ">
                <select class="form-control" name="city">
                    <option disabled selected>Город:</option>
                    @foreach($cities as $item)
                        <option value="{{$item->id}}" {{$item->id == $client->city_id ? 'selected':null }}>{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group ">
                <input type="tel" class="form-control" placeholder="Телефон:" name="phone" value="{{$client->phone}}">
            </div>
            <div class="form-group ">
                <input type="email" class="form-control" placeholder="E-mail:" name="email" value="{{$client->email}}">
            </div>
            <div class="form-group ">
                <input type="password" class="form-control" placeholder="Новый пароль:" name="password">
            </div>
            <div class="form-group ">
                <input type="password" class="form-control" placeholder="Подтверждение пароля:" name="password_confirmation">
            </div>
            <div class="form-group setting__button ">
                <button type="submit" class="setting__button-save">Сохранить</button>
                <button type="submit" class="setting__button-cancel">Отменить</button>
            </div>
        </form>
    </section>
@endsection
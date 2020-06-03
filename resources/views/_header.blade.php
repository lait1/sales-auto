<header>
    <div class="header container">
        <div class="header__logo">
            <a href="/"><img src="/img/logo.png" alt="Уралсиб"></a>

        </div>
        <div class="header__menu">

            @foreach($categories as $category)
                {{--@if ($loop->first)--}}
                    {{--<a href="/auto" class="header__menu-link active">--}}
                        {{--Автомобили--}}
                    {{--</a>--}}
                    {{--@continue--}}
                {{--@endif--}}
            <a href="/category/{{$category->slug}}"
               class="header__menu-link {{request()->segment(2) == $category->slug ? 'active': null}}">
                {{$category->name}}
            </a>
            @endforeach
        </div>
        <div class="header__account">
            @if(Auth::check())
                <div class="header__account-favorite">
                    <a href="#" class="header__account-link"><i class="fa fa-user-circle" aria-hidden="true"></i>
                        {{Auth::user()->fio}}</a>
                </div>
                <div class="header__account-favorite">
                    <a href="/favorite" class="header__account-link"> <i class="fa fa-heart" aria-hidden="true"></i>
                        Избранное</a>
                </div>
                <div class="header__account-login">
                    <a href="/logout" class="header__account-link"> <i class="fa fa-sign-out" aria-hidden="true"></i>
                        Выйти</a>
                </div>
            @else
                <div class="header__account-login">
                    <a href="/login" class="header__account-link"> <i class="fa fa-sign-in" aria-hidden="true"></i>
                        Войти</a>
                </div>
                {{--<div class="header__account-login">--}}
                {{--<a href="/register" class="header__account-link"> <i class="fa fa-sign-in" aria-hidden="true"></i>--}}
                {{--Зарегистрироваться</a>--}}
                {{--</div>--}}
            @endif
        </div>
    </div>
</header>
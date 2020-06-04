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
        <div class="header__account dropdown">
            @if(Auth::check())

                    <a href="#" class="header__account-link dropdown-toggle" id="dropdownMenuLink" role="button"  data-toggle="dropdown" >
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                        {{Auth::user()->fio}}</a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a href="/favorite" class="dropdown-item">Избранное</a>
                    <a href="/profile" class="dropdown-item">Профиль</a>

                    <div class="dropdown-divider"></div>
                    <a href="/logout" class="dropdown-item">Выйти</a>
                </div>

                {{--<div class="header__account-favorite">--}}
                    {{--<a href="/favorite" class="header__account-link"> <i class="fa fa-heart" aria-hidden="true"></i>--}}
                        {{--Избранное</a>--}}
                {{--</div>--}}
                {{--<div class="header__account-login-out">--}}
                    {{--<a href="/logout" class="header__account-link"> <i class="fa fa-sign-out" aria-hidden="true"></i>--}}
                        {{--Выйти</a>--}}
                {{--</div>--}}
            @else
                <div class="header__account-login-in">
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
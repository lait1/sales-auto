<section class="filter">
    <form action="/category/{{request()->segment(2)}}/search" id="filter" method="get">
        {{--<input type="hidden" name="category" value="{{$category->id}}">--}}
        <div class="filter__row">
            <div class="filter__select">
                <select class="form-control" name="city">
                    <option disabled selected>Город</option>
                    @foreach($cities as $item)
                        <option value="{{$item->id}}" {{isset($request['city']) && $item->id == $request['city'] ? 'selected':null }}>{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="filter__select">
                <select class="form-control status" name="status">
                    <option disabled selected>Статус</option>
                    @foreach($status as $item)
                        <option value="{{$item->id}}" {{isset($request['status']) && $item->id ==$request['status'] ? 'selected':null }}>{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="filter__select">
                <select class="form-control" name="type">
                    <option disabled selected>Типы</option>
                    @foreach($types as $item)
                        <option value="{{$item->id}}" {{isset($request['type']) && $item->id ==$request['type'] ? 'selected':null }}>{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="filter__select">
                <input class="form-control price" type="number" name="price_from" placeholder="Цена от" value="{{ isset($request['price_from']) ? $request['price_from'] : null }}">
                <input class="form-control price" type="number" name="price_to" placeholder="до" value="{{  isset($request['price_to']) ? $request['price_to'] : null }}">
            </div>
            <div class="filter__search">
                <input class="form-control search" type="text" name="search_text" value="{{ isset($request['search_text']) ? $request['search_text'] : null }}" placeholder="Поиск по объявлениям">
                <button type="submit" class="filter__search-link"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </div>
        {{--<div class="filter__search">--}}
        {{--<input class="form-control search" type="text" placeholder="Поиск по объявлениям">--}}
        {{--<a href="#" class="filter__search-link"><i class="fa fa-search" aria-hidden="true"></i></a>--}}
        {{--</div>--}}
    </form>
</section>
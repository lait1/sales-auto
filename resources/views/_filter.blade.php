<section class="filter">
    <form action="/category/legkovye/search" id="filter" method="get">
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
                <select class="form-control" name="brand">
                    <option disabled selected>Марки</option>
                    @foreach($brands as $item)
                        <option value="{{$item->id}}" {{isset($request['brand']) && $item->id == $request['brand'] ? 'selected':null }}>{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="filter__select">
                <select class="form-control" name="model" disabled>
                    <option disabled selected>Модели</option>

                </select>
            </div>

            <div class="filter__search">
                <input class="form-control search" type="text" name="search_text" value="{{ isset($request['search_text']) ? $request['search_text'] : null }}" placeholder="Поиск по объявлениям">
                <button type="submit" class="filter__search-link"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </div>
        <div class="filter__row">
            <div class="filter__select">
                <select class="form-control" name="fuel">
                    <option disabled selected="selected">Топливо</option>
                    <option value="Дизель"{{isset($request['fuel']) && "Дизель" == $request['fuel'] ? 'selected':null }}>Дизель</option>
                    <option value="Бензин"{{isset($request['fuel']) && "Бензин" == $request['fuel'] ? 'selected':null }}>Бензин</option>
                </select>
            </div>
            <div class="filter__select">
                <select class="form-control" name="transmission">
                    <option disabled selected>Коробка передач</option>
                    <option value="Механическая" {{isset($request['transmission']) && "Механическая" == $request['transmission'] ? 'selected':null }}>Механическая</option>
                    <option value="Автомат" {{isset($request['transmission']) && "Автомат" == $request['transmission'] ? 'selected':null }}>Автомат</option>
                </select>
            </div>
            <div class="filter__select">
                <select class="form-control" name="drive">
                    <option disabled selected>Привод</option>
                    <option value="Передний" {{isset($request['drive']) && "Передний" == $request['drive'] ? 'selected':null }}>Передний</option>
                    <option value="Задний" {{isset($request['drive']) && "Задний" == $request['drive'] ? 'selected':null }}>Задний</option>
                    <option value="Полный" {{isset($request['drive']) && "Полный" == $request['drive'] ? 'selected':null }}>Полный</option>

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
                <input class="form-control price" type="number" name="price_from" placeholder="Цена от" value="{{ isset($request['price_from']) ? $request['price_from'] : null }}">
                <input class="form-control price" type="number" name="price_to" placeholder="до" value="{{  isset($request['price_to']) ? $request['price_to'] : null }}">
            </div>
            <div class="filter__select">
                <input class="form-control price" type="number" name="year_from" placeholder="Год от" value="{{ isset($request['year_from']) ? $request['year_from'] : null }}">
                <input class="form-control price" type="number" name="year_to" placeholder="до" value="{{ isset($request['year_to']) ? $request['year_to'] : null }}">
            </div>
        </div>
    </form>
</section>
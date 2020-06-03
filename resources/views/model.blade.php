@if($models->isEmpty())
    <option>Нет моделей</option>
@else
    @foreach($models as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
    @endforeach
@endif
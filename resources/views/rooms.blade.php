@extends('layout')

@section('content')

    <main class="container box">

        <div class="box-body">
            <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th>№</th>
                        <th>Авто</th>
                        <th>Дата</th>
                        <th>Действие</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rooms as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->auto->name}}</td>
                            <td>{{$item->lastDateMessage()}}</td>
                            <td><a href="/profile/messenger/room/{{$item->id}}" class="catalog-item__action-details">Подробнее</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
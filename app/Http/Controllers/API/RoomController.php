<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Room::select('rooms.*', 'autos.name as auto', 'clients.fio as client')
            ->leftJoin('autos', 'autos.id', '=', 'rooms.auto_id')
            ->leftJoin('clients', 'clients.id', '=', 'rooms.client_id')
            ->get();
        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room $room
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Room::where('id', $id)
            ->with('auto')
            ->with('client')
            ->with('message')
            ->first();
        $data->message->map(function ($item) {
            $item->date = $item->created_at->format('H:i');
        });
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
//        return $room->message()->orderby('create_at', 'desc')->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Room $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}

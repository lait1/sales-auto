<?php

namespace App\Http\Controllers\API;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Log;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index()
    {
        $clients = Client::select('clients.id', 'fio', '.phone', 'email', 'blocked', 'cities.name as city')
        ->leftJoin('cities', 'cities.id', '=', 'clients.city_id')
        ->orderBy('clients.created_at', 'desc')
        ->paginate(10);
        return $clients;
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
     * @return Client|\Illuminate\Database\Eloquent\Model|\Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fio' => 'required',
            'phone' => 'required',
        ]);
        try {
            $client = Client::create($request->all());
            $client->setCity($request->get('city_id'));
            $client->setBlock($request->get('blocked'));
            return $client;
        } catch (\Throwable $e) {
            Log::error('Ошибка сохранения клиента', $e->getMessage());
            return response()->json('Ошибка сохранения', 404);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client $client
     * @return Client|\Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return $client;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Client $client
     * @return Client|\Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Client $client)
    {
        $this->validate($request, [
            'fio' => 'required',
            'phone' => 'required',
        ]);
        try {
            $client->update($request->all());
            $client->setCity($request->get('city_id'));
            $client->setBlock($request->get('blocked'));
            return $client;
        } catch (\Throwable $e) {
            Log::error('Ошибка обновления клиента', $e->getMessage());
            return response()->json('Ошибка обновления', 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client $client
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Client $client)
    {
        try {
            $client->delete();
            return response()->json('Client deleted');
        } catch (\Throwable $e) {
            Log::error('Ошибка удаления клиента', $e->getMessage());
            return response()->json('Ошибка удаления', 404);
        }
    }

    public function blocked($id)
    {
        $client = Client::findOrFail($id);
        $client->toggleStatus();
        return response()->json($client->blocked);
    }
}

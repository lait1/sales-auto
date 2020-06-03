<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Order::select('orders.*', 'autos.name as auto', 'clients.fio as client', 'users.name as username')
            ->leftJoin('users', 'users.id', '=', 'orders.user_id')
            ->leftJoin('clients', 'clients.id', '=', 'orders.client_id')
            ->leftJoin('autos', 'autos.id', '=', 'orders.auto_id')->orderBy('orders.created_at', 'desc')
            ->paginate(10);
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
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $result = Order::select('orders.*',
            'autos.name as auto',
            'autos.price as price',
            'clients.fio as client',
            'clients.phone as phone',
            'clients.email as email',
            'users.name as username'
        )
            ->leftJoin('users', 'users.id', '=', 'orders.user_id')
            ->leftJoin('clients', 'clients.id', '=', 'orders.client_id')
            ->leftJoin('autos', 'autos.id', '=', 'orders.auto_id')
            ->where('orders.id', $order->id)->first();
        return $result;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Order $order
     * @return Order
     */
    public function update(Request $request, Order $order)
    {
        try {

            $order->setComment($request->get('comment'));
            return $order;
        } catch (\Throwable $e) {
            Log::error('Ошибка обновления заказа', $e->getMessage());
            return response()->json('Ошибка обновления', 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        try {
            $order->delete();
            return response()->json('Order deleted');
        } catch (\Throwable $e) {
            Log::error('Ошибка удаления заказа', $e->getMessage());
            return response()->json('Ошибка удаления', 404);
        }
    }
    public function takeWork($id)
    {
        $order = Order::find($id);
        $order->setUser(Auth::guard('admin')->user()->id);
        return $order->user->name;
    }
}

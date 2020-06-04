<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 01.06.2020
 * Time: 0:16
 */

namespace App\Http\Controllers;


use App\City;
use App\Client;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        $client = Auth::user();
        $city = City::all();
        return view('setting', [
            'client' => $client,
            'cities' => $city
        ]);
    }

    public function edit(Request $request)
    {
        $this->validate($request, [
            'fio'=> 'required',
            'email'=> 'required|email',
            'phone'=> 'required',
            'password' => 'confirmed'
        ]);
        $client = Auth::user();
        $client->update($request->all());
        $client->setCity($request->city);
        $client->generatePassword($request->get('password'));
        return redirect()->back()->with('status', 'Данные обновлены');

    }
    public function buy($id)
    {
        $order = Order::where('auto_id', $id)->where('client_id', Auth::user()->id)->first();
        if ($order){
            return redirect()->back()->with('status', 'Заявка уже отправлена. Менеджер с вами свяжется');

        }else{
            $order = Order::add($id, Auth::user()->id);
            if ($order) {
                return redirect()->back()->with('status', 'Менеджер с вами свяжется');
            } else {
                return redirect()->back()->with('status', 'Что то пошло не так');
            }
        }

    }

}
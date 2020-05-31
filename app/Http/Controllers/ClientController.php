<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 01.06.2020
 * Time: 0:16
 */

namespace App\Http\Controllers;


use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function buy($id)
    {
        $order = Order::add($id, Auth::user()->id);
        if ($order) {
            return redirect()->back()->with('status', 'Менеджер с вами свяжется');
        } else {
            return redirect()->back()->with('status', 'Что то пошло не так');
        }
    }
}
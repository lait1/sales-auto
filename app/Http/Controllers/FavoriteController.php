<?php

namespace App\Http\Controllers;

use App\Auto;
use App\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $favotite = Favorite::where('client_id', Auth::user()->id)->pluck('auto_id');
        $auto = Auto::Draft(0)->whereIn('id', $favotite)->orderBy('created_at', 'desc')->get();
        return view('favorite', [
            'auto' => $auto,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $favorite = Favorite::where('auto_id', $id)->where('client_id', Auth::user()->id)->first();
        if($favorite){
            return redirect()->back()->with('status', 'Автомобиль уже добавлен в избранное');
        }else{
            $favorite = new Favorite();
            $favorite->client_id = Auth::user()->id;
            $favorite->auto_id = $id;
            If($favorite->save()){
                return redirect()->back()->with('status', 'Автомобиль добавлен в избранное');
            }else{
                return redirect()->back()->with('status', 'Что то пошло не так');
            }
        }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $favorite = Favorite::where('auto_id', $id)->where('client_id', Auth::user()->id)->first();
        $favorite->delete();
        return redirect()->back()->with('status', 'Автомобиль убран из избранного');
    }
}

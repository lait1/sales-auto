<?php

namespace App\Http\Controllers;

use App\Auto;
use App\Brand;
use App\Category;
use App\City;
use App\Post;
use App\Status;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $recentAuto = Auto::where('type_id', 1)->Draft(0)->orderBy('created_at','desc')->take(4)->get();
        $cities = City::all();
        $categories = Category::all();
        $status = Status::all();
        $brands = Brand::all();
        $recentPost = Post::where('draft', 0)->orderBy('created_at','desc')->take(3)->get();

        return view('home', [
            'recentAuto' => $recentAuto,
            'categories' => $categories,
            'cities' => $cities,
            'status' => $status,
            'brands' => $brands,
            'recentPost' => $recentPost,
        ]);
    }

    public function auto($slug)
    {
        $auto = Auto::where('slug', $slug)->Draft(0)->firstOrFail();
        $recentAuto = Auto::where('type_id', $auto->type_id)->Draft(0)->orderBy('created_at','desc')->take(4)->get();
        return view('auto', [
            'auto' => $auto,
            'recentAuto' => $recentAuto,
            ]);
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->where('draft', 0)->firstOrFail();
        return view('post', ['post' => $post]);
    }

}

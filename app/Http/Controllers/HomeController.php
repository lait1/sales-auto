<?php

namespace App\Http\Controllers;

use App\Auto;
use App\Brand;
use App\Category;
use App\City;
use App\ModelCar;
use App\Post;
use App\Status;
use App\Type;
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
        $recentAuto = Auto::where('type_id', 1)->Draft(0)->orderBy('created_at', 'desc')->take(4)->get();
//        $cities = City::all();
//        $categories = Category::all();
//        $status = Status::all();
        $brands = Brand::all();
        $recentPost = Post::where('draft', 0)->orderBy('created_at', 'desc')->take(3)->get();

        return view('home', [
            'recentAuto' => $recentAuto,
//            'categories' => $categories,
//            'cities' => $cities,
//            'status' => $status,
            'brands' => $brands,
            'recentPost' => $recentPost,
        ]);
    }

    public function autoShow($slug)
    {
        $auto = Auto::where('slug', $slug)->Draft(0)->firstOrFail();
        $recentAuto = Auto::where('type_id', $auto->type_id)->Draft(0)->orderBy('created_at', 'desc')->take(4)->get();
        return view('auto', [
            'auto' => $auto,
            'recentAuto' => $recentAuto,
        ]);
    }

    public function auto()
    {
        $auto = Auto::Category([1])->Draft(0)->paginate(1);
        return view('list', [
            'auto' => $auto,
        ]);
    }

    public function category(Request $request, $slug)
    {

        $type = Type::getCategoryTypes($slug);
        $auto = Auto::Category($type)->Draft(0)->paginate(1);
        return view('list', [
            'auto' => $auto,
            'type' => $type,
            'request' => $request->all()
        ]);
    }


    public function post($slug)
    {
        $post = Post::where('slug', $slug)->where('draft', 0)->firstOrFail();
        return view('post', ['post' => $post]);
    }


    public function filter(Request $request, $slug)
    {//TODO:Универсальный фильтр который будет отдавать ajax готовую таблицу

//       dd($request->all());
//        $type = Type::getCategoryTypes($request->category);
        $types = Type::getCategoryTypes($slug);
        $model = ModelCar::getBrandModel($request->brand);

        $auto = Auto::Draft(0)
            ->City($request->city)
            ->Category($types)
            ->Type($request->type)
            ->Brand($model)
            ->Model($request->model)
            ->Drive($request->drive)
            ->Transmission($request->transmission)
            ->Fuel($request->fuel)
            ->Status($request->status)
            ->Year($request->year_from, $request->year_to)
            ->Price($request->price_from, $request->price_to)
            ->TextSearch($request->search_text)
            ->paginate(1);
        return view('list', [
            'auto' => $auto,
            'type' => $types,
            'request' => $request->all()
        ]);
    }
    public function getModel(Request $request)
    {
        return view('model', [
            'models' => ModelCar::where('brand_id', $request->brand)->get()
        ]);
    }
}

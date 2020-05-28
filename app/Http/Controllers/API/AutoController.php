<?php

namespace App\Http\Controllers\API;

use App\Auto;
use App\Http\Controllers\Controller;
use App\Image;
use Auth;
use Illuminate\Http\Request;
use Log;

class AutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index()
    {
        $result = Auto::select('autos.id', 'autos.name', 'price', 'draft',
            'types.name as category',
            'cities.name as city')
            ->leftJoin('types', 'types.id', '=', 'autos.type_id')
            ->leftJoin('cities', 'cities.id', '=', 'autos.city_id')
            ->orderBy('autos.created_at', 'desc')
            ->paginate(10);
        return $result;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'type_id' => 'required',
        ]);
        $auto = Auto::create($request->all());
        $auto->setUser(Auth::guard('admin')->user()->id);
        return $auto->id;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Auto $auto
     * @return \Illuminate\Database\|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object
     */
    public function edit(Auto $auto)
    {
        $result = Auto::select('autos.*',
            'types.category_id as category_id',
            'model_cars.brand_id as brand_id'
        )
            ->leftJoin('types', 'types.id', '=', 'autos.type_id')
            ->leftJoin('model_cars', 'model_cars.id', '=', 'autos.model_car_id')
            ->where('autos.id', $auto->id)
            ->first();
        $result->image;
        return $result;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Auto $auto
     * @return Auto
     */
    public function update(Request $request, Auto $auto)
    {
        try {
            $auto->update($request->all());
            return $auto;
        } catch (\Throwable $e) {
            Log::error('Ошибка обновления объявления', $e->getMessage());
            return response()->json('Ошибка обновления', 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Auto $auto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auto $auto)
    {
        try {
            $auto->delete();
            return response()->json('Auto deleted');
        } catch (\Throwable $e) {
            Log::error('Ошибка удаления объявления', $e->getMessage());
            return response()->json('Ошибка удаления', 404);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function draft($id)
    {
        $auto = Auto::findOrFail($id);
        $auto->toggleDraft();
        return response()->json($auto->draft);
    }

    /**
     * @param Request $request
     * @param $id
     * @return array|\Illuminate\Http\UploadedFile|\Illuminate\Http\UploadedFile[]|null
     */
    public function createPhoto(Request $request, $id)
    {

        $photos = Image::addPhoto($request->file(), $id);
        return $photos;
    }

    public function removePhoto($id)
    {
        $image = Image::find($id);
        $filename = $image->name;

        $path = public_path() . '/upload/';
        unlink($path. $filename);
        unlink($path. '/thumbnail/' . $filename);

        $image->delete();

    }
}

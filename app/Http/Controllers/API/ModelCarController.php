<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\ModelCar;
use Illuminate\Http\Request;

class ModelCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ModelCar::all();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = ModelCar::create($request->all());
        $model->setBrand($request->get('brand_id'));
        return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ModelCar  $modelCar
     * @return \Illuminate\Http\Response
     */
    public function show(ModelCar $modelCar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModelCar  $modelCar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return ModelCar::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModelCar  $modelCar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = ModelCar::findOrFail($id);
        $model->update($request->all());
        $model->setBrand($request->get('brand_id'));
        return $model;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModelCar  $modelCar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = ModelCar::findOrFail($id);
        $model->delete();
        return response()->json('The model successfully deleted');

    }
}

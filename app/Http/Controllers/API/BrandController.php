<?php

namespace App\Http\Controllers\API;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Brand::all();
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
     * @return Brand|\Illuminate\Database\Eloquent\Model
     */
    public function store(Request $request)
    {
        $brand = Brand::create($request->all());
        $brand->setIcon($request->file('icon'));
        return $brand;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \App\ModelCar[]|\Illuminate\Database\Eloquent\Collection
     */
    public function show(Brand $brand)
    {

         return $brand->modelcar;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->modelcar;
        return response()->json($brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->update($request->all());
        $brand->setIcon($request->file('icon'));
        return $brand;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        $filename = $brand->icon;
        $path = public_path() . '/upload/';
        unlink($path. '/brand/' . $filename);

        $brand->delete();
        return response()->json('The brand successfully deleted');
    }
}

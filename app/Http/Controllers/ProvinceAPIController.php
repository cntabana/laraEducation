<?php

namespace App\Http\Controllers;

use App\Province;
use App\Http\Resources\ProvinceCollection;
use App\Http\Resources\ProvinceResource;
 
class ProvinceAPIController extends Controller
{
    public function index()
    {
        return new ProvinceCollection(Province::paginate());
    }
 
    public function show(Province $province)
    {
        return new ProvinceResource($province->load(['districts']));
    }

    public function store(Request $request)
    {
        return new ProvinceResource(Province::create($request->all()));
    }

    public function update(Request $request, Province $province)
    {
        $province->update($request->all());

        return new ProvinceResource($province);
    }

    public function destroy(Request $request, Province $province)
    {
        $province->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
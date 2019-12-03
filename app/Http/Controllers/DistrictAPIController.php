<?php

namespace App\Http\Controllers;

use App\District;
use App\Http\Resources\DistrictCollection;
use App\Http\Resources\DistrictResource;
 
class DistrictAPIController extends Controller
{
    public function index()
    {
        return new DistrictCollection(District::paginate());
    }
 
    public function show(District $district)
    {
        return new DistrictResource($district->load(['sectors', 'province']));
    }

    public function store(Request $request)
    {
        return new DistrictResource(District::create($request->all()));
    }

    public function update(Request $request, District $district)
    {
        $district->update($request->all());

        return new DistrictResource($district);
    }

    public function destroy(Request $request, District $district)
    {
        $district->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
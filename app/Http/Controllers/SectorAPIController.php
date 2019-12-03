<?php

namespace App\Http\Controllers;

use App\Sector;
use App\Http\Resources\SectorCollection;
use App\Http\Resources\SectorResource;
 
class SectorAPIController extends Controller
{
    public function index()
    {
        return new SectorCollection(Sector::paginate());
    }
 
    public function show(Sector $sector)
    {
        return new SectorResource($sector->load(['district']));
    }

    public function store(Request $request)
    {
        return new SectorResource(Sector::create($request->all()));
    }

    public function update(Request $request, Sector $sector)
    {
        $sector->update($request->all());

        return new SectorResource($sector);
    }

    public function destroy(Request $request, Sector $sector)
    {
        $sector->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssetRequest;
use App\Http\Resources\AssetResource;
use App\Models\Asset;

class AssetController extends Controller
{
    public function index()
    {
        return AssetResource::collection(Asset::all());
    }

    public function store(AssetRequest $request)
    {
        return new AssetResource(Asset::create($request->validated()));
    }

    public function show(Asset $asset)
    {
        return new AssetResource($asset);
    }

    public function update(AssetRequest $request, Asset $asset)
    {
        $asset->update($request->validated());

        return new AssetResource($asset);
    }

    public function destroy(Asset $asset)
    {
        $asset->delete();

        return response()->noContent();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttachAssetRequest;
use App\Http\Resources\ContractResource;
use App\Models\Asset;
use App\Models\Contract;

class ContractAssetController extends Controller
{
    public function store(AttachAssetRequest $request, Contract $contract)
    {
        $contract->assets()->attach($request->asset_id, ['serial_number' => $request->serial_number]);

        return (new ContractResource($contract->load('assets')))->response()->setStatusCode(201);
    }

    public function destroy(Contract $contract, Asset $asset)
    {
        if (! $contract->assets()->detach($asset)) {
            abort(404);
        }

        return response()->noContent();
    }
}

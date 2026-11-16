<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContractRequest;
use App\Http\Resources\ContractResource;
use App\Models\Contract;

class ContractController extends Controller
{
    // a listában nincsenek eszközök, csak a részletes nézetben
    public function index()
    {
        return ContractResource::collection(Contract::all());
    }

    public function store(ContractRequest $request)
    {
        return new ContractResource(Contract::create($request->validated()));
    }

    public function show(Contract $contract)
    {
        return new ContractResource($contract->load('assets'));
    }

    public function update(ContractRequest $request, Contract $contract)
    {
        $contract->update($request->validated());

        return new ContractResource($contract);
    }

    public function destroy(Contract $contract)
    {
        $contract->delete();

        return response()->noContent();
    }
}

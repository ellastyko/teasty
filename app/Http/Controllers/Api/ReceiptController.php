<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\ReceiptStoreRequest;
use App\Repositories\ReceiptRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Prettus\Repository\Exceptions\RepositoryException;

class ReceiptController extends Controller
{
    public function __construct(protected ReceiptRepository $receiptRepository)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     * @throws RepositoryException
     */
    public function index(): AnonymousResourceCollection
    {
//        return ReceiptResource::collection($this->receiptRepository
//                ->pushCriteria()
//        )
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ReceiptStoreRequest $request
     * @return Response
     */
    public function store(ReceiptStoreRequest $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

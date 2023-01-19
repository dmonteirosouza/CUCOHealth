<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $customers = Customer::all();

        return response()->json($customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $customer = new Customer;

        $customer->fill($request->all());

        $customer->save();

        return response()->json($customer, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param $search
     * @return JsonResponse
     */
    public function search(Request $request): JsonResponse
    {
        $document = preg_replace('/\D/', '', $request->document);

        $customers = Customer::findByNameOrCpf($request->name, $document);

        $statusCode = $customers ? Response::HTTP_OK : Response::HTTP_NOT_FOUND;

        return response()->json($customers, $statusCode);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        Customer::findOrFail($id)->update($request->all());

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Customer::findOrFail($id)->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

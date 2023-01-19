<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerSearchRequest;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Repositories\CustomerRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    public function __construct(private readonly CustomerRepository $customerRepository)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $customers = $this->customerRepository->all();

        return response()->json($customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CustomerStoreRequest $request
     * @return JsonResponse
     */
    public function store(CustomerStoreRequest $request): JsonResponse
    {
        $customer = $this->customerRepository->create($request);

        return response()->json($customer, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param CustomerSearchRequest $request
     * @return JsonResponse
     */
    public function search(CustomerSearchRequest $request): JsonResponse
    {
        $customers = $this->customerRepository->search($request);

        $statusCode = $customers ? Response::HTTP_OK : Response::HTTP_NOT_FOUND;

        return response()->json($customers, $statusCode);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CustomerUpdateRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(CustomerUpdateRequest $request, int $id): JsonResponse
    {
        $this->customerRepository->update($request, $id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $this->customerRepository->delete($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

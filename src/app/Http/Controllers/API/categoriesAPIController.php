<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatecategoriesAPIRequest;
use App\Http\Requests\API\UpdatecategoriesAPIRequest;
use App\Models\categories;
use App\Repositories\categoriesRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

class categoriesAPIController extends AppBaseController
{
    private categoriesRepository $categoriesRepository;

    public function __construct(categoriesRepository $categoriesRepo)
    {
        $this->categoriesRepository = $categoriesRepo;
    }

    public function index(Request $request): JsonResponse
    {
        $categories = $this->categoriesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($categories->toArray(), 'Categories retrieved successfully');
    }

    public function store(CreatecategoriesAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $categories = $this->categoriesRepository->create($input);

        return $this->sendResponse($categories->toArray(), 'Categories saved successfully');
    }

    public function show($id): JsonResponse
    {

        $categories = $this->categoriesRepository->find($id);

        if (empty($categories)) {
            return $this->sendError('Categories not found');
        }

        return $this->sendResponse($categories->toArray(), 'Categories retrieved successfully');
    }

    public function update($id, UpdatecategoriesAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $categories = $this->categoriesRepository->find($id);

        if (empty($categories)) {
            return $this->sendError('Categories not found');
        }

        $categories = $this->categoriesRepository->update($input, $id);

        return $this->sendResponse($categories->toArray(), 'categories updated successfully');
    }

    public function destroy($id): JsonResponse
    {

        $categories = $this->categoriesRepository->find($id);

        if (empty($categories)) {
            return $this->sendError('Categories not found');
        }

        $categories->delete();

        return $this->sendSuccess('Categories deleted successfully');
    }
}

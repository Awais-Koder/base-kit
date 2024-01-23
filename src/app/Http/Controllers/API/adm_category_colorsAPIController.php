<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createadm_category_colorsAPIRequest;
use App\Http\Requests\API\Updateadm_category_colorsAPIRequest;
use App\Models\adm_category_colors;
use App\Repositories\adm_category_colorsRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

class adm_category_colorsAPIController extends AppBaseController
{
    private adm_category_colorsRepository $admCategoryColorsRepository;

    public function __construct(adm_category_colorsRepository $admCategoryColorsRepo)
    {
        $this->admCategoryColorsRepository = $admCategoryColorsRepo;
    }

    public function index(Request $request): JsonResponse
    {
        $admCategoryColors = $this->admCategoryColorsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($admCategoryColors->toArray(), 'Adm Category Colors retrieved successfully');
    }

    public function store(Createadm_category_colorsAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $admCategoryColors = $this->admCategoryColorsRepository->create($input);

        return $this->sendResponse($admCategoryColors->toArray(), 'Adm Category Colors saved successfully');
    }

    public function show($id): JsonResponse
    {

        $admCategoryColors = $this->admCategoryColorsRepository->find($id);

        if (empty($admCategoryColors)) {
            return $this->sendError('Adm Category Colors not found');
        }

        return $this->sendResponse($admCategoryColors->toArray(), 'Adm Category Colors retrieved successfully');
    }

    public function update($id, Updateadm_category_colorsAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $admCategoryColors = $this->admCategoryColorsRepository->find($id);

        if (empty($admCategoryColors)) {
            return $this->sendError('Adm Category Colors not found');
        }

        $admCategoryColors = $this->admCategoryColorsRepository->update($input, $id);

        return $this->sendResponse($admCategoryColors->toArray(), 'adm_category_colors updated successfully');
    }

    public function destroy($id): JsonResponse
    {

        $admCategoryColors = $this->admCategoryColorsRepository->find($id);

        if (empty($admCategoryColors)) {
            return $this->sendError('Adm Category Colors not found');
        }

        $admCategoryColors->delete();

        return $this->sendSuccess('Adm Category Colors deleted successfully');
    }
}

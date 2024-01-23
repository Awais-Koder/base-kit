<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createadm_folder_colorsAPIRequest;
use App\Http\Requests\API\Updateadm_folder_colorsAPIRequest;
use App\Models\adm_folder_colors;
use App\Repositories\adm_folder_colorsRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

class adm_folder_colorsAPIController extends AppBaseController
{
    private adm_folder_colorsRepository $admFolderColorsRepository;

    public function __construct(adm_folder_colorsRepository $admFolderColorsRepo)
    {
        $this->admFolderColorsRepository = $admFolderColorsRepo;
    }

    public function index(Request $request): JsonResponse
    {
        $admFolderColors = $this->admFolderColorsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($admFolderColors->toArray(), 'Adm Folder Colors retrieved successfully');
    }

    public function store(Createadm_folder_colorsAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $admFolderColors = $this->admFolderColorsRepository->create($input);

        return $this->sendResponse($admFolderColors->toArray(), 'Adm Folder Colors saved successfully');
    }

    public function show($id): JsonResponse
    {

        $admFolderColors = $this->admFolderColorsRepository->find($id);

        if (empty($admFolderColors)) {
            return $this->sendError('Adm Folder Colors not found');
        }

        return $this->sendResponse($admFolderColors->toArray(), 'Adm Folder Colors retrieved successfully');
    }

    public function update($id, Updateadm_folder_colorsAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $admFolderColors = $this->admFolderColorsRepository->find($id);

        if (empty($admFolderColors)) {
            return $this->sendError('Adm Folder Colors not found');
        }

        $admFolderColors = $this->admFolderColorsRepository->update($input, $id);

        return $this->sendResponse($admFolderColors->toArray(), 'adm_folder_colors updated successfully');
    }

    public function destroy($id): JsonResponse
    {

        $admFolderColors = $this->admFolderColorsRepository->find($id);

        if (empty($admFolderColors)) {
            return $this->sendError('Adm Folder Colors not found');
        }

        $admFolderColors->delete();

        return $this->sendSuccess('Adm Folder Colors deleted successfully');
    }
}

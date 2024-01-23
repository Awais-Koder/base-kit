<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatefoldersAPIRequest;
use App\Http\Requests\API\UpdatefoldersAPIRequest;
use App\Models\folders;
use App\Repositories\foldersRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

class foldersAPIController extends AppBaseController
{
    private foldersRepository $foldersRepository;

    public function __construct(foldersRepository $foldersRepo)
    {
        $this->foldersRepository = $foldersRepo;
    }

    public function index(Request $request): JsonResponse
    {
        $folders = $this->foldersRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($folders->toArray(), 'Folders retrieved successfully');
    }

    public function store(CreatefoldersAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $folders = $this->foldersRepository->create($input);

        return $this->sendResponse($folders->toArray(), 'Folders saved successfully');
    }

    public function show($id): JsonResponse
    {

        $folders = $this->foldersRepository->find($id);

        if (empty($folders)) {
            return $this->sendError('Folders not found');
        }

        return $this->sendResponse($folders->toArray(), 'Folders retrieved successfully');
    }

    public function update($id, UpdatefoldersAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $folders = $this->foldersRepository->find($id);

        if (empty($folders)) {
            return $this->sendError('Folders not found');
        }

        $folders = $this->foldersRepository->update($input, $id);

        return $this->sendResponse($folders->toArray(), 'folders updated successfully');
    }

    public function destroy($id): JsonResponse
    {

        $folders = $this->foldersRepository->find($id);

        if (empty($folders)) {
            return $this->sendError('Folders not found');
        }

        $folders->delete();

        return $this->sendSuccess('Folders deleted successfully');
    }
}

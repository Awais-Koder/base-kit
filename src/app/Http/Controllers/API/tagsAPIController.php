<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetagsAPIRequest;
use App\Http\Requests\API\UpdatetagsAPIRequest;
use App\Models\tags;
use App\Repositories\tagsRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

class tagsAPIController extends AppBaseController
{
    private tagsRepository $tagsRepository;

    public function __construct(tagsRepository $tagsRepo)
    {
        $this->tagsRepository = $tagsRepo;
    }

    public function index(Request $request): JsonResponse
    {
        $tags = $this->tagsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tags->toArray(), 'Tags retrieved successfully');
    }

    public function store(CreatetagsAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $tags = $this->tagsRepository->create($input);

        return $this->sendResponse($tags->toArray(), 'Tags saved successfully');
    }

    public function show($id): JsonResponse
    {

        $tags = $this->tagsRepository->find($id);

        if (empty($tags)) {
            return $this->sendError('Tags not found');
        }

        return $this->sendResponse($tags->toArray(), 'Tags retrieved successfully');
    }

    public function update($id, UpdatetagsAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $tags = $this->tagsRepository->find($id);

        if (empty($tags)) {
            return $this->sendError('Tags not found');
        }

        $tags = $this->tagsRepository->update($input, $id);

        return $this->sendResponse($tags->toArray(), 'tags updated successfully');
    }

    public function destroy($id): JsonResponse
    {

        $tags = $this->tagsRepository->find($id);

        if (empty($tags)) {
            return $this->sendError('Tags not found');
        }

        $tags->delete();

        return $this->sendSuccess('Tags deleted successfully');
    }
}

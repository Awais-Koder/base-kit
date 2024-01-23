<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createpivot_users_flagsAPIRequest;
use App\Http\Requests\API\Updatepivot_users_flagsAPIRequest;
use App\Models\pivot_users_flags;
use App\Repositories\pivot_users_flagsRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

class pivot_users_flagsAPIController extends AppBaseController
{
    private pivot_users_flagsRepository $pivotUsersFlagsRepository;

    public function __construct(pivot_users_flagsRepository $pivotUsersFlagsRepo)
    {
        $this->pivotUsersFlagsRepository = $pivotUsersFlagsRepo;
    }

    public function index(Request $request): JsonResponse
    {
        $pivotUsersFlags = $this->pivotUsersFlagsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($pivotUsersFlags->toArray(), 'Pivot Users Flags retrieved successfully');
    }

    public function store(Createpivot_users_flagsAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $pivotUsersFlags = $this->pivotUsersFlagsRepository->create($input);

        return $this->sendResponse($pivotUsersFlags->toArray(), 'Pivot Users Flags saved successfully');
    }

    public function show($id): JsonResponse
    {

        $pivotUsersFlags = $this->pivotUsersFlagsRepository->find($id);

        if (empty($pivotUsersFlags)) {
            return $this->sendError('Pivot Users Flags not found');
        }

        return $this->sendResponse($pivotUsersFlags->toArray(), 'Pivot Users Flags retrieved successfully');
    }

    public function update($id, Updatepivot_users_flagsAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $pivotUsersFlags = $this->pivotUsersFlagsRepository->find($id);

        if (empty($pivotUsersFlags)) {
            return $this->sendError('Pivot Users Flags not found');
        }

        $pivotUsersFlags = $this->pivotUsersFlagsRepository->update($input, $id);

        return $this->sendResponse($pivotUsersFlags->toArray(), 'pivot_users_flags updated successfully');
    }

    public function destroy($id): JsonResponse
    {

        $pivotUsersFlags = $this->pivotUsersFlagsRepository->find($id);

        if (empty($pivotUsersFlags)) {
            return $this->sendError('Pivot Users Flags not found');
        }

        $pivotUsersFlags->delete();

        return $this->sendSuccess('Pivot Users Flags deleted successfully');
    }
}

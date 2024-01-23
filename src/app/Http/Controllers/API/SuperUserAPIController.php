<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSuperUserAPIRequest;
use App\Http\Requests\API\UpdateSuperUserAPIRequest;
use App\Models\SuperUser;
use App\Repositories\SuperUserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class SuperUserAPIController
 */
class SuperUserAPIController extends AppBaseController
{
    private SuperUserRepository $superUserRepository;

    public function __construct(SuperUserRepository $superUserRepo)
    {
        $this->superUserRepository = $superUserRepo;
    }

    /**
     * Display a listing of the SuperUsers.
     * GET|HEAD /super-users
     */
    public function index(Request $request): JsonResponse
    {
        $superUsers = $this->superUserRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($superUsers->toArray(), 'Super Users retrieved successfully');
    }

    /**
     * Store a newly created SuperUser in storage.
     * POST /super-users
     */
    public function store(CreateSuperUserAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $superUser = $this->superUserRepository->create($input);

        return $this->sendResponse($superUser->toArray(), 'Super User saved successfully');
    }

    /**
     * Display the specified SuperUser.
     * GET|HEAD /super-users/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var SuperUser $superUser */
        $superUser = $this->superUserRepository->find($id);

        if (empty($superUser)) {
            return $this->sendError('Super User not found');
        }

        return $this->sendResponse($superUser->toArray(), 'Super User retrieved successfully');
    }

    /**
     * Update the specified SuperUser in storage.
     * PUT/PATCH /super-users/{id}
     */
    public function update($id, UpdateSuperUserAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var SuperUser $superUser */
        $superUser = $this->superUserRepository->find($id);

        if (empty($superUser)) {
            return $this->sendError('Super User not found');
        }

        $superUser = $this->superUserRepository->update($input, $id);

        return $this->sendResponse($superUser->toArray(), 'SuperUser updated successfully');
    }

    /**
     * Remove the specified SuperUser from storage.
     * DELETE /super-users/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var SuperUser $superUser */
        $superUser = $this->superUserRepository->find($id);

        if (empty($superUser)) {
            return $this->sendError('Super User not found');
        }

        $superUser->delete();

        return $this->sendSuccess('Super User deleted successfully');
    }
}

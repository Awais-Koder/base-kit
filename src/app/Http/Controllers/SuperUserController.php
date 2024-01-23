<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSuperUserRequest;
use App\Http\Requests\UpdateSuperUserRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\SuperUserRepository;
use Illuminate\Http\Request;
use Flash;

class SuperUserController extends AppBaseController
{
    /** @var SuperUserRepository $superUserRepository*/
    private $superUserRepository;

    public function __construct(SuperUserRepository $superUserRepo)
    {
        $this->superUserRepository = $superUserRepo;
    }

    /**
     * Display a listing of the SuperUser.
     */
    public function index(Request $request)
    {
        $superUsers = $this->superUserRepository->paginate(10);

        return view('super_users.index')
            ->with('superUsers', $superUsers);
    }

    /**
     * Show the form for creating a new SuperUser.
     */
    public function create()
    {
        return view('super_users.create');
    }

    /**
     * Store a newly created SuperUser in storage.
     */
    public function store(CreateSuperUserRequest $request)
    {
        $input = $request->all();

        $superUser = $this->superUserRepository->create($input);

        Flash::success('Super User saved successfully.');

        return redirect(route('superUsers.index'));
    }

    /**
     * Display the specified SuperUser.
     */
    public function show($id)
    {
        $superUser = $this->superUserRepository->find($id);

        if (empty($superUser)) {
            Flash::error('Super User not found');

            return redirect(route('superUsers.index'));
        }

        return view('super_users.show')->with('superUser', $superUser);
    }

    /**
     * Show the form for editing the specified SuperUser.
     */
    public function edit($id)
    {
        $superUser = $this->superUserRepository->find($id);

        if (empty($superUser)) {
            Flash::error('Super User not found');

            return redirect(route('superUsers.index'));
        }

        return view('super_users.edit')->with('superUser', $superUser);
    }

    /**
     * Update the specified SuperUser in storage.
     */
    public function update($id, UpdateSuperUserRequest $request)
    {
        $superUser = $this->superUserRepository->find($id);

        if (empty($superUser)) {
            Flash::error('Super User not found');

            return redirect(route('superUsers.index'));
        }

        $superUser = $this->superUserRepository->update($request->all(), $id);

        Flash::success('Super User updated successfully.');

        return redirect(route('superUsers.index'));
    }

    /**
     * Remove the specified SuperUser from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $superUser = $this->superUserRepository->find($id);

        if (empty($superUser)) {
            Flash::error('Super User not found');

            return redirect(route('superUsers.index'));
        }

        $this->superUserRepository->delete($id);

        Flash::success('Super User deleted successfully.');

        return redirect(route('superUsers.index'));
    }
}

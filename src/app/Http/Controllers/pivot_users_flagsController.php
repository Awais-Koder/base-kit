<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createpivot_users_flagsRequest;
use App\Http\Requests\Updatepivot_users_flagsRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\pivot_users_flagsRepository;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class pivot_users_flagsController extends AppBaseController
{

    private $pivotUsersFlagsRepository;

    public function __construct(pivot_users_flagsRepository $pivotUsersFlagsRepo)
    {
        $this->pivotUsersFlagsRepository = $pivotUsersFlagsRepo;
    }

    public function index(Request $request)
    {
        // $pivotUsersFlags = $this->pivotUsersFlagsRepository->paginate(10);

        // return view('pivot_users_flags.index')
        //     ->with('pivotUsersFlags', $pivotUsersFlags);

        if (Auth::check()) { 
                return redirect('/');
        } else {
            return redirect('/login');
        }
    }

    public function create()
    {
        return view('pivot_users_flags.create');
    }


    // public function store(Createpivot_users_flagsRequest $request)
    // {
    //     $userId = Auth::id();
    //     $this->pivotUsersFlagsRepository->createOrUpdate($userId);
    
    //     Flash::success('Pivot Users Flags saved successfully.');
    //     return redirect(route('pivot_users_flags.index'));
        
    // }
    


    public function store(Createpivot_users_flagsRequest $request)
    {
        if (Auth::check()) { 
            if ($request->ajax()) {
                $userId = Auth::id();
                $this->pivotUsersFlagsRepository->createOrUpdate($userId);
            
                // Flash::success('Pivot Users Flags saved successfully.');
                return redirect(route('pivot_users_flags.index'));
        
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/login');
        }
        
    }



    public function show($id)
    {
        $pivotUsersFlags = $this->pivotUsersFlagsRepository->find($id);

        if (empty($pivotUsersFlags)) {
            // Flash::error('Pivot Users Flags not found');

            return redirect(route('pivot_users_flags.index'));
        }

        return view('pivot_users_flags.show')->with('pivotUsersFlags', $pivotUsersFlags);
    }

    public function edit($id)
    {
        $pivotUsersFlags = $this->pivotUsersFlagsRepository->find($id);

        if (empty($pivotUsersFlags)) {
            // Flash::error('Pivot Users Flags not found');

            return redirect(route('pivot_users_flags.index'));
        }

        return view('pivot_users_flags.edit')->with('pivotUsersFlags', $pivotUsersFlags);
    }

    // public function update($id, Updatepivot_users_flagsRequest $request)
    // {
    //     $userId = Auth::id();
    //     $this->pivotUsersFlagsRepository->createOrUpdate($userId);
    
    //     Flash::success('Pivot Users Flags updated successfully.');
    //     return redirect(route('pivot_users_flags.index'));
    // }
    


    public function update($id, Updatepivot_users_flagsRequest $request)
    {


        if (Auth::check()) {
            if ($request->ajax()) {

                $userId = Auth::id();
                $this->pivotUsersFlagsRepository->createOrUpdate($userId);
            
                // Flash::success('Pivot Users Flags updated successfully.');
                return redirect(route('pivot_users_flags.index'));

            } else {
                return redirect('/');
            }
        } else {
            return redirect('/login');
        }

    }
    
    public function destroy()
    {
        $userId = Auth::id();
        $this->pivotUsersFlagsRepository->destroyIfExists($userId);
    
        // Flash::success('Pivot Users Flags deleted successfully.');
        return response()->json(['message' => 'Deleted successfully'], 200);
    }
    

}

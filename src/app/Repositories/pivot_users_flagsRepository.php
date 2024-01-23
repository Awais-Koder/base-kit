<?php

namespace App\Repositories;

use App\Models\pivot_users_flags;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;




class pivot_users_flagsRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'user_id',
        'isOpenRightSidebar'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return pivot_users_flags::class;
    }


    public function createOrUpdate($user_id)
    {
        $record = $this->model()::updateOrCreate(
            ['user_id' => $user_id],
            ['isOpenRightSidebar' => 1]
        );
    
        if ($record->wasRecentlyCreated) {
            // Invalidate cache only if a new record was created
            // Log::info('Updated dform here : 1' );
            $cacheKey = 'user_'.$user_id.'_isOpenRightSidebar';
            Cache::forget($cacheKey);
        }
    }
    


    public function destroyIfExists($user_id)
    {
        $record = $this->model()::where('user_id', $user_id)
            //    ->where('flag', 'isOpenRightSidebar')
            ->first();

        if ($record) {
            $record->delete();
            $cacheKey = 'user_'.$user_id.'_isOpenRightSidebar';
            Cache::forget($cacheKey);
        }
    }

    // function isSiderbarOpenForUser($user_id)
    // {
    //     $record = $this->model()::where('user_id', $user_id)
    //                             ->first();

    //     if ($record) {
    //         return $record->isOpenRightSidebar;
    //     }
    //     return null;

    // }


    public function isSiderbarOpenForUser()
    {

        $user_id = Auth::id();
        // Log::info('Usewr id ' . $user_id);
        $cacheKey = 'user_' . $user_id . '_isOpenRightSidebar';
        $isOpenRightSidebar = Cache::get($cacheKey);
        // Log::info('Cache before DB fetch: ' . $isOpenRightSidebar);
    
        if ($isOpenRightSidebar === null) {
            // Log::info('Cache Miss is null: ' . $isOpenRightSidebar);
            // Log::info('Fetching from DB for user: ' . $user_id);
            $record = $this->model()::where('user_id', $user_id)->first();
    
            if ($record) {
                $isOpenRightSidebar = (string) $record->isOpenRightSidebar;
            } else {
                $isOpenRightSidebar = '0'; // Representing 'null' as a string
            }
            
    
            Cache::put($cacheKey, $isOpenRightSidebar, 60);
            // Log::info('Cache after DB fetch: ' . $isOpenRightSidebar);
        }else{
            // Log::info('Cache hit: ' . $isOpenRightSidebar);
        }
    
        return $isOpenRightSidebar;
    }
    
}    
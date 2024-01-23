<?php

namespace App\Repositories;

use App\Models\SuperUser;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Cache;



class SuperUserRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'user_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return SuperUser::class;
    }

    public function isSuperUser($userId): bool
    {
        return Cache::remember("user.{$userId}.isSuperUser", 60, function () use ($userId) {
            return $this->model()::where('user_id', $userId)->exists();
        });
    }

}

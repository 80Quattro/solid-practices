<?php
declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Models\Instructor;
use App\Repositories\InstructorRepository as InstructorRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class InstructorRepository implements InstructorRepositoryInterface
{
    public function getActice(int $limit = 8): Collection
    {
        return Instructor::join('users', 'users.id', '=', 'instructors.user_id')
            ->where('users.is_active',1)
            ->groupBy('instructors.id')
            ->limit($limit)
            ->get();
    }
}
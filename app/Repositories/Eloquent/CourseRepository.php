<?php
declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Models\Course;
use App\Repositories\CourseRepository as CourseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CourseRepository implements CourseRepositoryInterface
{
    public function getRecent(int $limit = 8): Collection
    {
        return Course::where('is_active', true)
                ->groupBy('id')
                ->orderBy('updated_at', 'desc')
                ->limit($limit)
                ->get();
    }

    public function getFree(int $limit = 8): Collection
    {
        return Course::where('is_active', true)
            ->where('price', 0)
            ->groupBy('id')
            ->orderBy('updated_at', 'desc')
            ->limit($limit)
            ->get();
    }

    public function getDiscounted(int $limit = 8): Collection
    {
        return Course::where('is_active', true)
            ->where('strike_out_price', '<>', 0)
            ->groupBy('id')
            ->orderBy('updated_at', 'desc')
            ->limit($limit)
            ->get();
    }
}
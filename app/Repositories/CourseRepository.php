<?php
declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface CourseRepository
{
    public function getRecent(int $limit = 8): Collection;

    public function getFree(int $limit = 8): Collection;

    public function getDiscounted(int $limit = 8): Collection;
}
<?php
declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface InstructorRepository
{
    public function getActice(int $limit = 8): Collection;
}
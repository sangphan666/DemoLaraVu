<?php

namespace JPTech\Slug\Repository;

use JPTech\Slug\Models\Slug;
use Illuminate\Support\Collection;
use App\Repositories\Interfaces\BaseRepositoryInterface;

interface SlugRepositoryInterface extends BaseRepositoryInterface
{
    public function getByModule($module);
}

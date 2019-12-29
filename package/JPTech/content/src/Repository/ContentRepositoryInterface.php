<?php

namespace JPTech\Content\Repository;

use JPTech\Content\Models\Content;
use Illuminate\Support\Collection;
use App\Repositories\Interfaces\BaseRepositoryInterface;

interface ContentRepositoryInterface extends BaseRepositoryInterface
{
    public function getByModule($module);
}

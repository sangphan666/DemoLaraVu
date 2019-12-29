<?php

namespace JPTech\Category\Repository;

use JPTech\Category\Models\Category;
use Illuminate\Support\Collection;
use App\Repositories\Interfaces\BaseRepositoryInterface;

interface CategoriesRepositoryInterface extends BaseRepositoryInterface
{
    public function getByModule($module);

    public function listByModuleStatus($module, $status);
    
    public function getByModuleTree($module);

    public function getByModuleTreePaginate($module, $id = null);

    public function getByIdJoin($module = null, $id);

    public function getTreeByModule($module, $id = null, $status = null);

    public function writeFile($disk, $file, $content = array());
}

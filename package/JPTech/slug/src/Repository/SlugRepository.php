<?php

namespace JPTech\Slug\Repository;

use JPTech\Slug\Models\Slug;
use App\Repositories\BaseRepository;
use JPTech\Category\Repository\Requests\CreateSlugRequest;

class SlugRepository extends BaseRepository implements SlugRepositoryInterface
{
    /**
     * @var Slug
     */
    protected $model;

    /**
     * SlugRepository constructor.
     * @param Slug $slug
     */
    public function __construct(Slug $model)
    {
        $this->model = $model;
    }

    public function getList($module = null, $id = null, $status = null, $level = 0)
    {
        try {
            return $this->model->where('deleted_at', '!=', null)->where(function ($query) use ($id ,$status, $level) {
            })->get();
        } catch (Exception $e) {
            return false;
        }
    }

    public function getByModule($module, $id = null, $status = null, $level = 0)
    {
        try {
            return $this->model->where('module', $module)->where(function ($query) use ($id ,$status, $level) {
                if (!empty($id) && $id !== 0) {
                    $query->where('id', $id);
                } else {
                    $query->where('level', $level);
                }
                if (!empty($status) && $status !== 0) {
                    if (is_array($status)) {
                        $query->whereIn('status', $status);
                    } else {
                        $query->where('status', '>=', $status);
                    }
                }
            })->get();
        } catch (Exception $e) {
            return false;
        }
    }

    public function save($array, $module = null, $id = null)
    {
        try {
            if (!empty($id)) {
                return $this->model->update($array, $id);
            }
            return $this->model->create($array);
        } catch (Exception $e) {
            return false;
        }
    }

    public function converInsertSlug($array, $modules, $id_entity = null)
    {
        $request = array(
            'name' => $array->category_name,
            'id_entity' => !empty($id_entity) ? $id_entity : '',
            'slug' => $array->slug,
            'module' => $modules,
            'meta_title' => !empty($array->meta_title) ? $array->meta_title : '' ,
            'meta_description' => !empty($array->meta_description) ? $array->meta_description : '' ,
            'meta_keywords' => !empty($array->meta_keywords) ? $array->meta_keywords : '' ,
            'social_title' => !empty($array->social_title) ? $array->social_title : '' ,
            'social_description' => !empty($array->social_description) ? $array->social_description : '' ,
            'social_ogImage' => !empty($array->social_ogImage) ? $array->social_ogImage : '' ,
            'type' => !empty($array->type) ? $array->type : ''
        );
        return $request;
    }
}

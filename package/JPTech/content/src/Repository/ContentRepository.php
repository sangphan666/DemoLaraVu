<?php

namespace JPTech\Content\Repository;

use JPTech\Content\Models\Content;
use App\Repositories\BaseRepository;

class ContentRepository extends BaseRepository implements ContentRepositoryInterface
{
    /**
     * @var AttributePage
     */
    protected $model;

    /**
     * AttributeRepository constructor.
     * @param AttributePage $attribute
     */
    public function __construct(Content $model)
    {
        $this->model = $model;
    }

    public function getList($module = null, $id = null, $status = null, $level = 0)
    {
        try {
            return $this->model->where('deleted_at', '!=', null)->where(function ($query) use ($id ,$status, $level) {
                /*if(!empty($id) && $id !== 0){
                    $query->where('id', $id);
                }else{
                    $query->where('level', $level);
                }
                if(!empty($status) && $status !== 0){
                    if(is_array($status)){
                        $query->whereIn('status', $status);
                    }else{
                        $query->where('status', '>=', $status);
                    }
                }*/
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

    public function save($array, $id = null, $status = null)
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

    public function converInsertContent($array, $modules, $id_entity = null)
    {
        $request = array(
            'content' => $array->content,
            'id_entity' =>  !empty($id_entity) ? $id_entity :'' ,
            'content_type' => $modules
        );
        
        return $request;
    }
}

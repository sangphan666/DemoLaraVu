<?php

namespace JPTech\Media\Repository;

use JPTech\Media\Models\Media;
use JPTech\Slug\Models\Slug;
use JPTech\Content\Models\Content;
use JPTech\Media\Repository\Requests\CreateMediaRequest;
use App\Repositories\BaseRepository;
use JPTech\Slug\Repository\SlugRepositoryInterface;
use JPTech\Content\Repository\ContentRepositoryInterface;

use Validator;
use Redirect;
use Response;

class CategoriesRepository extends BaseRepository implements CategoriesRepositoryInterface
{
    /**
     * @var CategoriesPage
     */
    protected $model;

    protected $modules;
    /**
     * CategoriesRepository constructor.
     * @param CategoriesPage $attribute
     */
    public function __construct(Media $model, Slug $model_slug, Content $model_content, SlugRepositoryInterface $slugsRepository, ContentRepositoryInterface $contentRepository)
    {
        $this->modules = 'Media';
        $this->model = $model;
        $this->model_slug = $model_slug;
        $this->model_content = $model_content;
        $this->slugsRepository = $slugsRepository;
        $this->contentRepository = $contentRepository;
    }


    private function checkValidation($Media)
    {
        $rules= [
                'Media_name' => 'required',
                'slug' => 'required',
                'content' => 'required',
                'status' => 'required'
            ];

        $messages = [
                'required' => 'trường đang rỗng',
                'numeric'  => 'nhập kiểu số'
            ];

        $validator = Validator::make($Media->all(), $rules, $messages);
        return $validator ;
    }

    public function getByIdJoin($module = null,$id, $status = null, $level = 0)
    {
        try {
            return $this->getByModule($module,$id)->first();
        } catch (Exception $e) {
            return false;
        }
    }

    public function getByListJoin($module = null, $status = null, $level = 0)
    {
        try {
            return $this->getByModule($module)->get();
        } catch (Exception $e) {
            return false;
        }
    }

    public function getByModule($module = null, $id = null, $status = null, $level = 0)
    {
        try {
            return $this->model->with(['content','slug'])
                ->where('deleted_at', null)
                ->where(function ($query) use ($id ,$status, $level) {
                if (!empty($id) && $id !== 0) {
                    $query->where('id', $id);
                }
                if (!empty($module)) {
                    $query->where('module', $module);
                }
                /*else {
                    $query->where('level', $level);
                }*/
                if (!empty($status) && $status !== 0) {
                    if (is_array($status)) {
                        $query->whereIn('status', $status);
                    } else {
                        $query->where('status', '>=', $status);
                    }
                }
            });
        } catch (Exception $e) {
            return false;
        }
    }

    public function save($array, $id = null, $status = null)
    {
        if (!empty($this->checkValidation($array)->fails())) {
            return $validator;
        }

        try {
            if (!empty($id)) {
                $cate = $this->model->find($id);
                if(!empty($cate))
                {
                    $cate->save();
                    $cate->slug()->update($this->slugsRepository->converInsertSlug($array, $this->modules, $id), ['id_entity' => $id]);
                    $cate->content()->update($this->contentRepository->converInsertContent($array, $this->modules, $id), ['id_entity' => $id]);
                    return $cate;   
                }
                return false;
            }

            $cate = $this->model->create($array->all());
            $cate->slug()->create($this->slugsRepository->converInsertSlug($array, $this->modules, $cate->id));
            $cate->content()->create($this->contentRepository->converInsertContent($array, $this->modules,$cate->id));
            return $cate;
            
        } catch (Exception $e) {
            return false;
        }
    }

    public function listByModuleStatus($module, $status)
    {
        try {
            if (!empty(modules_config($module, 'categories_show')) && is_array(modules_config($module, 'categories_show'))) {
                if ($status > 0) {
                    return $this->model->where('module', $module)->where(function ($query) use ($status) {
                        if (!empty($status) && $status !== 0) {
                            if (is_array($status)) {
                                $query->whereIn('status', $status);
                            } else {
                                $query->where('status', '>=', $status);
                            }
                        }
                    })->whereIn('id', modules_config($module, 'categories_show'))->get();
                } else {
                    return $this->model->where('module', $module)->where(function ($query) use ($status) {
                        if (!empty($status) && $status !== 0) {
                            $query->where('status', '=', $status);
                        }
                    })->whereNotIn('id', modules_config($module, 'categories_show'))->get();
                }
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function getByModuleTree($module, $id = null)
    {
        try {
            $result = collect();
            $root = $this->getByModule($module, $id);
            return $this->model->nestedModel($root);
        } catch (Exception $e) {
            return false;
        }
    }

    public function getByModuleTreePaginate($module, $id = null)
    {
        try {
            $result = collect();
            $root = $this->getByModule($module, $id);
            return $this->model->nestedModel($root);
        } catch (Exception $e) {
            return false;
        }
    }


    public function getTreeByModule($module, $id = null, $status = null)
    {
        try {
            $tree = collect();
            $list = $this->getByModule($module, $id, $status);
            $this->getNested($list, $tree, 0, $status);
            return $tree;
        } catch (Exception $e) {
            return false;
        }
    }

    private function fixNestedArray($list, &$array)
    {
        foreach ($list as $key => $value) {
            if (is_array($value)) {
                $array[$key] = \Arr::flatten($value);
                $this->fixNestedArray($value, $array);
            } else {
                $array[$key] = $value;
            }
        }
    }

    public function writeFile($disk, $file, $content = array())
    {
        ob_start();
        echo "<?php return ";
        var_export($content);
        echo ";";
        $out2 = ob_get_contents();
        ob_end_clean();
        \Storage::disk($disk)->put($file, $out2);
    }
}

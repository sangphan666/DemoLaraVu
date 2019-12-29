<?php
namespace JPTech\Category\Http\Controllers;

//use App\Http\Controllers\Controller;
use JPTech\Category\Models\Category;
use JPTech\Category\Traits\LoadDataTrait;
use App\Http\Controllers\BaseController;
//use App\Http\Controllers\Admin\AdminController as Controller;
use JPTech\Category\Repository\CategoriesRepositoryInterface;
use Illuminate\Http\Request;
//Validation
use Laravel\Passport\HasApiTokens;
use JPTech\Category\Repository\Requests\CreateSlugRequest;

class ApiCategoryController extends BaseController
{
    use LoadDataTrait;

    protected $module = 'category';

    public function __construct(CategoriesRepositoryInterface $categoriesRepository ){
        $this->categoriesRepository = $categoriesRepository;
    }
    
    //http://localhost/japana_backend.vn/public/api/category
    public function index(Request $request)
    {
        $module = $this->module;
        $category = $this->categoriesRepository->getByListJoin($module);
        $message = 'success';
        $responseCode = 01;
        return $this->responseJson(null , $responseCode, $message, $category);
    }

    public function show(Request $request, $id = null)
    {
        dd($request);
        $module = $this->module;
        $category = $this->categoriesRepository->getByListJoin($module);
        $message = 'success';
        $responseCode = 01;
        return $this->responseJson(null , $responseCode, $message, $category);
    }

    public function search(Request $request)
    {
        $module = $this->module;
        $category = $this->categoriesRepository->getByListJoin($module);
        $message = 'success';
        $responseCode = 01;
        return $this->responseJson(null , $responseCode, $message, $category);
    }

    //http://localhost/japana_backend.vn/public/api/category
    public function create(Request $request)
    {
        $module = $this->module;
        $message = 'success';
        $responseCode = 01;
        $category = $this->categoriesRepository->getByListJoin($module);
        return $this->responseJson(null , $responseCode, $message, $category);
    }

    // http://localhost/japana_backend.vn/public/api/category?category_name=Tên danh mục sản phẩm&name_ascii=Test key, value key, money key , category&image=https://japana.vn/uploads/product/2019/11/21/1574322056-su-nhu-y-mau-4-sieu-thi-nhat-ban-japana-0-(2).jpeg&description=giới thiệu ngắn&position=position&parent_id=1&status=0&slug=test-giao-dien&content=Nội dung dài&create_user=2&update_user=1&module=product

    public function store(Request $request)
    {
        $module = $this->module;
        $category = array();

        try {
            $category = $this->categoriesRepository->save($request);
        } catch (Exception $e) {
            $message = 'error';
            $responseCode = 00;
        }
        
        if(!empty($category)){
            $message = 'success';
            $responseCode = 01;
          return $this->responseJson(null , $responseCode, $message, $category);  
        }
        $message = 'error';
        $responseCode = 00;
        return $this->responseJson(null , $responseCode, $message, $category);
    }


    //demo : http://localhost/japana_backend.vn/public/api/category/2?category_name=Tên danh mục sản phẩm&name_ascii=Test key, value key, money key , category&image=https://japana.vn/uploads/product/2019/11/21/1574322056-su-nhu-y-mau-4-sieu-thi-nhat-ban-japana-0-(2).jpeg&description=giới thiệu ngắn&position=position&parent_id=1&status=0&slug=test-giao-dien&content=Nội dung dài&create_user=2&update_user=1&module=product

    public function update(Request $request, $id = null)
    {
        $module = $this->module;
        $category = array();

        try {
            if(!empty($id)){
                $category = $this->categoriesRepository->save($request, $id);  
            }
            
        } catch (Exception $e) {
            $message = 'error';
            $responseCode = 00;
        }
        
        if(!empty($category)){
            $message = 'success';
            $responseCode = 01;
          return $this->responseJson(null , $responseCode, $message, $category);  
        }

        $message = 'error';
        $responseCode = 00;
        return $this->responseJson(null , $responseCode, $message, $category);
        
    }

    public function delete(Request $request, $id = null)
    {
        $module = $this->module;
        $category = $this->categoriesRepository->detete($id);
        $message = 'success';
        $responseCode = 01;
        return $this->responseJson(null , $responseCode, $message, $category);
    }
}
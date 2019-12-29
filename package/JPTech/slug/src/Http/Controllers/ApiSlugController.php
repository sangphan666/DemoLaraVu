<?php
namespace JPTech\Slug\Http\Controllers;

//use App\Http\Controllers\Controller;
use JPTech\Slug\Models\Slug;
use JPTech\Slug\Traits\LoadDataTrait;
use App\Http\Controllers\BaseController;
//use App\Http\Controllers\Admin\AdminController as Controller;
use JPTech\Slug\Repository\SlugRepositoryInterface;
use Illuminate\Http\Request;

class ApiSlugController extends BaseController
{
    use LoadDataTrait;

    protected $module = 'slug';

    public function __construct(SlugRepositoryInterface $slugRepository){
        //$this->slugsRepository = $slugsRepository;
        $this->slugRepository = $slugRepository;
    }
    
    public function index(Request $request)
    {
        $module = $this->module;
        $slug = $this->slugRepository->all();
        $message = 'success';
        $responseCode = 01;
        return $this->responseJson(null , $responseCode, $message, $slug);
    }
}
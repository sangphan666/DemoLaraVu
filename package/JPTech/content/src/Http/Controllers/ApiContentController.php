<?php
namespace JPTech\Content\Http\Controllers;

//use App\Http\Controllers\Controller;
use JPTech\Content\Models\Content;
use JPTech\Content\Traits\LoadDataTrait;
use App\Http\Controllers\BaseController;
//use App\Http\Controllers\Admin\AdminController as Controller;
use JPTech\Content\Repository\ContentRepositoryInterface;
//use JPTech\content\Repository\SlugsRepositoryInterface;
use Illuminate\Http\Request;

class ApiContentController extends BaseController
{
    use LoadDataTrait;

    protected $module = 'content';

    public function __construct(ContentRepositoryInterface $contentRepository){
        //$this->slugsRepository = $slugsRepository;
        $this->contentRepository = $contentRepository;
    }
    
    public function index(Request $request)
    {
        $module = $this->module;
        $content = $this->contentRepository->all();
        $message = 'success';
        $responseCode = 01;
        return $this->responseJson(null , $responseCode, $message, $content);
    }

    public function update(Request $request)
    {
        $module = $this->module;
        $content = $this->contentRepository->update($id,$request);
        $message = 'success';
        $responseCode = 01;
        return $this->responseJson(null , $responseCode, $message, $content);
    }

    public function delete(Request $request)
    {
        $module = $this->module;
        $content = $this->contentRepository->detete($id);
        $message = 'success';
        $responseCode = 01;
        return $this->responseJson(null , $responseCode, $message, $content);
    }
}
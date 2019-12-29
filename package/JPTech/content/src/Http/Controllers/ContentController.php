<?php
namespace JPTech\Content\Http\Controllers;

//use App\Http\Controllers\Controller;
use JPTech\Content\Models\Content;
use JPTech\Content\Traits\LoadDataTrait;
use App\Http\Controllers\BaseController;
//use App\Http\Controllers\Admin\AdminController as Controller;
use JPTech\Content\Repository\ContentRepositoryInterface;
//use JPTech\Content\Repository\SlugsRepositoryInterface;
use Illuminate\Http\Request;

class ContentController extends BaseController
{
    use LoadDataTrait;

    protected $module = 'content';

    public function __construct(ContentRepositoryInterface $contentRepository){
        //$this->slugsRepository = $slugsRepository;
        $this->contentRepository = $contentRepository;
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $module = $this->module;
        $content = $this->contentRepository->all();
        return view('content::admin.'.$module.'.index', compact('content','request'));
    }
     public function update(Request $request)
    {
        $module = $this->module;
        $content = $this->contentRepository->all();
        return view('content::admin.'.$module.'.update', compact('content','request'));
    }
     public function deleted(Request $request)
    {
        $module = $this->module;
        $content = $this->contentRepository->all();
        return view('content::admin.'.$module.'.deleted', compact('content','request'));
    }

}
<?php
namespace JPTech\Slug\Http\Controllers;

//use App\Http\Controllers\Controller;
use JPTech\Slug\Models\Slug;
use JPTech\Slug\Traits\LoadDataTrait;
use App\Http\Controllers\BaseController;
//use App\Http\Controllers\Admin\AdminController as Controller;
use JPTech\Slug\Repository\SlugRepositoryInterface;
use Illuminate\Http\Request;

class SlugController extends BaseController
{
    use LoadDataTrait;

    protected $module = 'slug';

    public function __construct(SlugRepositoryInterface $slugRepository){
        $this->slugRepository = $slugRepository;
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $module = $this->module;
        $slug = $this->slugRepository->all();
        return view('slug::admin.'.$module.'.index', compact('slug','request'));
    }
}
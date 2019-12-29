<?php
namespace JPTech\Products\Http\Controllers;

//use App\Http\Controllers\Controller;
use JPTech\Category\Models\Category;
use JPTech\Category\Traits\LoadDataTrait;
use App\Http\Controllers\BaseController;
//use App\Http\Controllers\Admin\AdminController as Controller;
use JPTech\Category\Repository\CategoriesRepositoryInterface;
use JPTech\Slug\Repository\SlugRepositoryInterface;
use JPTech\Content\Repository\ContentRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    use LoadDataTrait;

    protected $module = 'product';

    public function __construct(CategoriesRepositoryInterface $categoriesRepository, SlugRepositoryInterface $slugsRepository , ContentRepositoryInterface $contentRepository ){
        $this->slugsRepository = $slugsRepository;
        $this->categoriesRepository = $categoriesRepository;
        $this->contentRepository = $contentRepository;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $module = $this->module;
        $category = $this->categoriesRepository->getByListJoin($module);
        return view('product::admin.'.$module.'.category.index', compact('category','request'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $module = $this->module;
        $category = $this->categoriesRepository->getByListJoin($module);
        $message = 'success';
        $responseCode = 01;
        return $this->responseJson(null , $responseCode, $message, $category);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $module = $this->module;
        $result = $this->categoriesRepository->save($request);
        if($result){
            $message = 'success';
            $responseCode = 01;
            return $this->responseJson(null , $responseCode, $message, $category);
        }else{
            return redirect()->back()->withErrors(_message(__FUNCTION__.'-errors', $this->module));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $module = $this->module;
        $category = $this->categoriesRepository->getByIdJoin($module, $id);
        $message = 'success';
        $responseCode = 01;
        return $this->responseJson(null , $responseCode, $message, $category);
    }

    /**
     * Display the specified resource show website.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        return $this->edit($id);
    }

    /**
     * Display the specified resource update.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id=null)
    {
        $module = $this->module;
        if(!empty($id)){
            $category = $this->categoriesRepository->save($request, $id);
            $message = 'success';
            $responseCode = 01;
            return $this->responseJson(null , $responseCode, $message, $category);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
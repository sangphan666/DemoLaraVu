<?php
namespace JPTech\Category\Http\Controllers;

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

    protected $module = 'category';

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
        $category = $this->categoriesRepository->all();
        return view('category::admin.'.$module.'.index', compact('category','request'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $module = $this->module;
        $category = $this->categoriesRepository->update($id,$request);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo 123;die;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //
    }


    /**
     * Display the specified resource.
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
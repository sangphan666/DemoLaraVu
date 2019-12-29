<?php
namespace JPTech\Media\Http\Controllers;

use JPTech\Media\Traits\LoadDataTrait;
use App\Http\Controllers\BaseController;
//use App\Http\Controllers\Admin\AdminController as Controller;
use JPTech\Media\Repository\MediaRepositoryInterface;
use Illuminate\Http\Request;

class MediaController extends BaseController
{
    use LoadDataTrait;

    protected $module = 'media';

    public function __construct(){
        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        echo 123;die;
        return view('media::admin.'.$module.'.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        echo 123;die;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo 123;die;
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
        echo 123;die;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id=null)
    {
        echo 123;die;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo 123;die;
    }
}
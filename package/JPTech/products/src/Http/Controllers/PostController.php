<?php
namespace JPTech\Post\Http\Controllers;

use App\Http\Controllers\Controller;
use JPTech\Post\Models\Post;
use JPTech\Post\Traits\LoadDataTrait;

class PostController extends Controller
{
    use LoadDataTrait;

    public function index()
    {
        $posts = Post::all();

        echo "Huong su dung:".$this->DemoTrait();

        return view("post::index", compact('posts'));
    }
}
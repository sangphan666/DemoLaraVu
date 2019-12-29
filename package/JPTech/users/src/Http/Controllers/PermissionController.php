<?php

namespace JPTech\Users\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * PermissionController constructor.
     */
    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $permissions = get_permissions();

        return response()->json([
            'message' => 201,
            'data' => $permissions
        ]);
    }
}

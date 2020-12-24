<?php

namespace App\Http\Controllers\admin_board;

use App\account_permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\account_type;
class viewController extends Controller
{
    public function list_account_type()
    {
        return response()->json(account_type::all());
    }
    public function list_permission()
    {
        return response()->json(account_permission::all());
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        if (!session('admin_login')) {
            return redirect('/admin/login');
        }

        $users = DB::table('users')->get();

        return view('admin.users.index', compact('users'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
       // $tasks = response()->json(Task::all());
  		$users = response()->json(User::with('user')->get());
        return $users;
    }
}

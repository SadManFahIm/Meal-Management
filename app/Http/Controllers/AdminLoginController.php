<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
  public function viewLogin()
  {
      return view('admin.login');
  }
}



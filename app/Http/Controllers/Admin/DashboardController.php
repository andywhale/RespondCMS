<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Content;

class DashboardController extends Controller
{
    public function index() {
      $contents = Content::latest()->get();
      return view('admin.dashboard', compact('contents'));
    }
}

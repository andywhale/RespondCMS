<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Content;

class ContentController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    public function index() {
      $contents = Content::latest()->get();
      return view('admin.content.index', compact('contents'));
    }

    public function show(Content $content) {
      return view('admin.content.show', compact('content'));
    }

    public function create() {
      return view('admin.content.create');
    }

    public function store() {
      $this->validate(request(), [
        'title' => 'required|min:3', 
        'body' => 'required|min:3'
      ]);
      Content::create([
        'title' => request('title'),
        'body' => request('body'),
        'user_id' => auth()->id(),
      ]);
      return redirect('/admin/content');
    }
}

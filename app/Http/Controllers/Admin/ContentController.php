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

    public function edit(Content $content) {
      return view('admin.content.edit', compact('content'));
    }

    public function create() {
      return view('admin.content.create');
    }

    public function store() {
      $this->validate(request(), [
        'title' => 'required|min:3', 
        'body' => 'required|min:3'
      ]);
      auth()->user()->publishContent(new Content(request(['title', 'body'])));
      return redirect('/admin/content');
    }

    public function update(Content $content) {
      $this->validate(request(), [
        'title' => 'required|min:3', 
        'body' => 'required|min:3'
      ]);
      $content->title = request('title');
      $content->body = request('body');
      $content->save();
      return redirect('/admin/content');
    }

    public function destroy(Content $content)
    {
        $content->delete();
        return redirect('/admin/content');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Content;
use App\Tag;
use App\Http\Requests\ContentFormRequest;

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
      $tags = Tag::all();
      return view('admin.content.edit', compact('content', 'tags'));
    }

    public function create() {
      $tags = Tag::all();
      return view('admin.content.create', compact('tags'));
    }

    public function store(ContentFormRequest $request) {
      $request->persist();
      return redirect('/admin/content');
    }

    public function update(ContentFormRequest $request, Content $content) {
      $request->persist($content);
      return redirect('/admin/content');
    }

    public function destroy(Content $content)
    {
        $content->delete();
        return redirect('/admin/content');
    }
}

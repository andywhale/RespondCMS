<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tree\TagTree;
use App\Tag;

class TagController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    public function index() {
      $tags = Tag::withDepth()->defaultOrder()->get();
      return view('admin.tag.index', compact('tags'));
    }

    public function show(Tag $tag) {
      return view('admin.tag.show', compact('tag'));
    }

    public function create() {
      $tags = TagTree::build();
      return view('admin.tag.create', compact('tags'));
    }

    public function store() {
      $this->validate(request(), [
        'name' => 'required|min:2'
      ]);
      $tag = new Tag(request(['name', 'parent_id']));
      $tag->save();
      return redirect('/admin/tags');
    }

    public function destroy(Tag $tag) {
      $tag->delete();
      return redirect('/admin/tags');
    }
}

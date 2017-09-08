<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;

class TagController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    public function index() {
      $tags = Tag::all();
      return view('admin.tag.index', compact('tags'));
    }

    public function show(Tag $tag) {
      return view('admin.tag.show', compact('tag'));
    }

    public function create() {
      return view('admin.tag.create');
    }

    public function store() {
      $this->validate(request(), [
        'name' => 'required|min:2'
      ]);
      $tag = new Tag(request(['name']));
      $tag->save();
      return redirect('/admin/tags');
    }
}

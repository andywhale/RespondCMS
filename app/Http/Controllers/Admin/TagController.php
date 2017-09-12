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
      $traverse = function ($tags, $prefix = '-') use (&$traverse) {
          $options = [];
          foreach ($tags as $tag) {
              $options[$tag->id] = $prefix . ' ' . $tag->name;
              $options = array_merge($options, $traverse($tag->children, $prefix . '-'));
          }
          return $options;
      };

      return view('admin.tag.create', ['tags' => $traverse(Tag::get()->toTree())]);
    }

    public function store() {
      $this->validate(request(), [
        'name' => 'required|min:2'
      ]);
      $tag = new Tag(request(['name']));
      $tag->save();
      return redirect('/admin/tags');
    }

    public function destroy(Tag $tag) {
      $tag->delete();
      return redirect('/admin/tags');
    }
}

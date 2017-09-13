<?php

namespace App\Tree;

use App\Tag;

class TagTree {
  
  public static function build() {
    return static::traverse(Tag::get()->toTree());
  }

  public static function traverse($tags, $prefix = '-') {
    $tree = [];
    foreach ($tags as $tag) {
        $tree[$tag->id] = $prefix . ' ' . $tag->name;
        $tree = $tree + static::traverse($tag->children, $prefix . '-');
    }
    return $tree;
  }

}
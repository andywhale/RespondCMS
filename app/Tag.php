<?php

namespace App;

class Tag extends Model
{
    public function contents() {
      return $this->belongsToMany(Content::class);
    }
}

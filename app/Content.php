<?php

namespace App;

class Content extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tags() {
      return $this->belongsToMany(Tag::class);
    }
}

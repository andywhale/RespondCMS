<?php

namespace App;

use App\Model;
use App\Content;

class ContentBlock extends Model
{
    public function content() {
      return $this->belongsIn(Content::class);
    }
}

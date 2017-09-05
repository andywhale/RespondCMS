<?php

namespace App;

class Content extends Model
{
    public function user() {
        $this->belongsTo(User::class);
    }
}

<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;

class Content extends Model
{
    use Sluggable;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tags() {
      return $this->belongsToMany(Tag::class);
    }

    public function contentBlocks() {
        return $this->hasMany(ContentBlock::class);
    }

    public function publishContentBlock(ContentBlock $block) {
        $this->contentBlocks()->save($block);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'unique' => true
            ]
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}

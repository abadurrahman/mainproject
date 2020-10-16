<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeaderAdvertise extends Model
{
    protected $fillable = [
        'title', 'image', 'source_link',
        'show_days', 'slug',
    ];
}

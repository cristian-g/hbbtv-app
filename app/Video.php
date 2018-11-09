<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'author', 'views', 'description_title', 'description',
    ];

    /**
     * The connected users.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}

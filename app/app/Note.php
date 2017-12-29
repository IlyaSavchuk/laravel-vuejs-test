<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['name', 'content', 'file_name'];

    public function comments()
    {
        return $this->hasMany(NoteComment::class, 'note_id');
    }
}

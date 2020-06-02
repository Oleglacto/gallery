<?php

namespace Gallery\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $primaryKey = 'file_id';

    protected $fillable = [
        'name',
        'type',
        'mime_type',
        'size',
        'relative_path',
        'temporary'
    ];
}

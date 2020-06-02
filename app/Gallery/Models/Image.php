<?php

namespace Gallery\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * @var {@inheritdoc}
     */
    protected $primaryKey = 'image_id';

    /**
     * @var {@inheritdoc}
     */
    protected $fillable = [
        'name',
        'image_size',
        'file_size',
    ];
}

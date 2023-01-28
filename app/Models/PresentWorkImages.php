<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresentWorkImages extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'presentWorkImages';

    protected $fillable = [
        'id',
        'img_src',
        'presentwork_id',
        'created_at',
        'updated_at',
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
}
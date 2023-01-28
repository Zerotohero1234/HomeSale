<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FutureWorkImages extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'futureWorkImages';

    protected $fillable = [
        'id',
        'img_src',
        'futurework_id',
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
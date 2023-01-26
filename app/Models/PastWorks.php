<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PastWorks extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pastWorks';

    protected $fillable = [
        'id',
        'name',
        'en_name',
        'cn_name',
        'th_name',
        'description',
        'thumbnail',
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
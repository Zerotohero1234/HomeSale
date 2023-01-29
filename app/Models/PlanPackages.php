<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanPackages extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'planPackages';

    protected $fillable = [
        'id',
        'name',
        'price',
        'en_name',
        'cn_name',
        'th_name',
        'plan_id',
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
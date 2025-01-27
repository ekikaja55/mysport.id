<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class course extends Model
{
    use SoftDeletes;
    protected $connection = "mysql";
    protected $table = "course";
    protected $primaryKey = "id_course";
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'name_course',
        'desc_course',
    ];

    public function materis()
    {
        return $this->hasMany(Materi::class, 'id_course', 'id_course');
    }
}

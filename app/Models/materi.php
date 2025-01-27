<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class materi extends Model
{
    use SoftDeletes;
    protected $connection = "mysql";
    protected $table = "materi";
    protected $primaryKey = "id_materi";
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'id_course',
        'name_materi',
        'desc_materi'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'id_course', 'id_course');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $primaryKey = 'project_id';

    protected $fillable = [
        'project_name',
        'project_description',
        'start_date',
        'end_date',
        'project_status_id',
        'created_by',
    ];

    public function ProjectStatus(){
        return $this->belongsTo('App\Models\ProjectStatus','project_status_id','status_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','created_by','id');
    }
}

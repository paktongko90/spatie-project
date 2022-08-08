<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectStatus extends Model
{
    use HasFactory;

    protected $table = 'project_status';

    protected $primaryKey = 'status_id';

    protected $fillable = [
        'status_name',
    ];

    public function project(){
        return $this->hasOne('App\Models\Projects');
    }
}

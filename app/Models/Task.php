<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;


    protected $fillable = [
        'responsible_person',
        'deadline',
        'status_id',
        'priority_id',
        'description'
    ];

    public function status(){
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    public function priority(){
        return $this->belongsTo(Priority::class, 'priority_id', 'id');
    }
}

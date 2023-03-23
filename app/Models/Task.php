<?php

namespace App\Models;

use App\Models\Workspace;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'workspace_id',
        'name',
        'datetime',
        'status'
    ];

    public function workspace()
    {
        return $this->hasOne(Workspace::class);
    }
}
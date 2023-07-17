<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class PermissionModule extends Model
{
    use HasFactory;

    protected $table = 'permission_modules';
    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
    ];

    public function permissions(){
        return $this->hasMany(Permission::class, 'module_id');
    }
}

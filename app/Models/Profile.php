<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'description'];


    /**
     * Get Permissions
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class/* , 'permission_profile' */); /* nome da tabela não é obrigatório, apenas quanto não atende o padrão */
    }

    /**
     * Permission not linked with this profile
     */
    public function permissonAvailable()
    {
        $permissions = permission::whereNotIn('id', function($query){
            $query->select('permission_profile.permission_id');
            $query->from('permission_profile');
            $query->whereRaw("permission_profile.profile_id={$this->id}");
        })
        ->toSql();

        dd($permissions);/* paginate(); */

        return $permissions;
    }
}

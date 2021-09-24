<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'description'];


    /**
     * Get Profiles
     */
    public function profiles()
    {
        return $this->belongsToMany(Profile::class/* , 'permission_profile' */); /* nome da tabela não é obrigatório, apenas quanto não atende o padrão */
    }

}

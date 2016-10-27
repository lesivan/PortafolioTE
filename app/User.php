<?php

namespace PortafolioTE;
use Carbon\Carbon;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image', 'id_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($valor){
        if(!empty($valor)){
            $this->attributes['password'] = \Hash::make($valor);
        }
    }

     public function setImageAttribute($image){
       
            $this->attributes['image'] = Carbon::now()->second.$image->getClientOriginalName();
            $name = Carbon::now()->second.$image->getClientOriginalName();
            \Storage::disk('local')->put($name,\File::get($image));
        
    }
}

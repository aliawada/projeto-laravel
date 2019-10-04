<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use App\Entities\Instituition;
use App\Entities\User;

class Group extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['name','user_id','instituition_id'];

    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function instituition() {
        return $this->belongsTo(Instituition::class);
    }

}

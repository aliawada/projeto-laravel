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

    protected $fillable = ['name', 'user_id', 'instituition_id'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_groups');
    }

    public function instituition()
    {
        return $this->belongsTo(Instituition::class);
    }

    public function movements()
    {
        return $this->hasMany(Movement::class);
    }

    public function getTotalValueAttribute() {
        return $this->movements()->inflows()->sum('value') - $this->movements()->outflows()->sum('value');
    }
}

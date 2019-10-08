<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Product extends Model implements Transformable
{
    use TransformableTrait;

    public $timestamps      = true;
    protected $table        = 'products';
    protected $fillable     = ['instituition_id', 'name', 'description', 'indexer', 'intereset_rate'];
    protected $hidden       = [];

    public function instituition()
    {
        return $this->belongsTo(Instituition::class);
    }

    public function valueFromUser(User $user)
    {
        // $total = $this->movements()->product($this)->applications()->sum('value');
        $inflows = $this->movements()->product($this)->inflows()->sum('value');
        $outflows = $this->movements()->product($this)->outflows()->sum('value');
        return $inflows - $outflows;
    }

    public function movements()
    {
        return $this->hasMany(Movement::class);
    }

}

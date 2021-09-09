<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Portfolio extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tecnology(){
        return $this->hasMany(Tecnology::class, 'portfolio_id');
    }
}

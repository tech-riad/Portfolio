<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function portcategory()
                {
                    return $this->belongsTo(PortfolioCategory::class, 'category_id' ,' id');
                }
}

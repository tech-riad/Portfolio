<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function portfolioCategory()
            {
                return $this->belongsTo(PortfolioCategory::class,'category_id');
            }


    public function portfolios()
            {
                return $this->hasMany(Portfolio::class, 'category_id');
            }
}

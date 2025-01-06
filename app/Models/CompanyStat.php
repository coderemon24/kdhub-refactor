<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyStat extends Model
{
    use HasFactory;
    protected $fillable = [
        'years_of_glory',
        'happy_clients',
        'ads_spend',
    ];
}

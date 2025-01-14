<?php

namespace App\Models;

use App\Models\Admin\Page;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceCategory extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'slug'
    ];
    
    public function page()
    {
        return $this->hasMany(Page::class, 'service_category_id');
    }
}

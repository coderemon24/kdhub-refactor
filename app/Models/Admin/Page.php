<?php

namespace App\Models\Admin;

use App\Models\ServiceCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;

    protected $table = 'pages';

    protected $fillable = [
        'service_category_id',
        'page_name',
        'slug',
        'meta_title',
        'meta_description',
        'order',
    ];

    public function serviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class);
    }
    
    public function content()
    {
        return $this->hasMany(Section::class, 'page_id');
    }
}

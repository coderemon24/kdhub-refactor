<?php

namespace App\Models\Admin;

use App\Models\ServiceCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;

    protected $table = 'sections';
    
    protected $fillable = [
        'section_name',
        'title',
        'slug',
        'description',
        'order',
        'status',
    ];
    
    public function service_category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }
}

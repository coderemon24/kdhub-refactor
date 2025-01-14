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
    
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
    
    public function content()
    {
        return $this->hasMany(SectionContent::class, 'section_id');
    }
}

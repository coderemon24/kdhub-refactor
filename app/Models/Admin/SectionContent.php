<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionContent extends Model
{
    use HasFactory;

    protected $table = 'section_contents';

    protected $fillable = [
        'section_id',
        'title',
        'subtitle',
        'description',
        'image',
        'multi_image',
    ];
    
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}

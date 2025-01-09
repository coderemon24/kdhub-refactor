<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}

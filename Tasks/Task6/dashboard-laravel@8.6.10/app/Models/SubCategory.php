<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = "subcategories";
    protected $fillable = ['name_ar', 'name_en', 'status', 'image', 'icon', 'color'];
}

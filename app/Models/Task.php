<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description','due_date','category_id'];

    // Relația cu modelul Category (O sarcină aparține unei categorii)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 'content', 'short_description',
        'category', 'image', 'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeByDate($query, $date)
    {
        return $query->whereDate('published_at', $date);
    }

    public function scopeSearch($query, $term)
    {
        return $query->where(function ($q) use ($term) {
            $q->where('title', 'like', "%{$term}%")
              ->orWhere('short_description', 'like', "%{$term}%")
              ->orWhere('content', 'like', "%{$term}%");
        });
    }

    public function getImageUrlAttribute()
    {
        if ($this->image && file_exists(public_path('uploads/' . $this->image))) {
            return asset('uploads/' . $this->image);
        }
        return 'https://picsum.photos/seed/' . $this->id . '/800/450';
    }

    public static function categories()
    {
        return ['Admit Card', 'Result', 'Syllabus', 'Answer Key', 'Recruitment', 'Exam Date', 'General'];
    }
}

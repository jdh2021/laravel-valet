<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    // add fillable properties to allow mass assignment
    // protected $fillable = ['title', 'company', 'location', 'website', 'email', 'description', 'tags'];

    // takes in query and array of filters
    public function scopeFilter($query, array $filters) {
        // if existence of tag is not false
        if($filters['tag'] ?? false) {
            // check tags column in database
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }
        // if existence of search entry is not false
        if($filters['search'] ?? false) {
            // check title, description, tags columns in database
            $query->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%')
            ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }
}

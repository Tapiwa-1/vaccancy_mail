<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, Sluggable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'jobTitle',
        'jobDescription',
        'dueDate',
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'jobTitle'
            ]
        ];
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}

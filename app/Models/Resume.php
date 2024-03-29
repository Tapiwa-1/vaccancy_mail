<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory, Sluggable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'jobTitle',
        'resumeDetails'
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

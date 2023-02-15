<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
        'jobSummary',
        'jobDescription',
        'dueDate',
        'user_id',
        'jobCategory'
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
    /**
     * Get the Job that owns the user.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class); //this job belongs to one user
    }

     public function category() :BelongsTo
    {
        return $this->belongsTo(Category::class, 'jobCategory'); //this category belongs to one job
    }


}

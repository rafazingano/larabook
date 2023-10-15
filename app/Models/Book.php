<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author_id',
        'genre',
        'synopsis',
        'cover',
        'publication_year'
    ];

    protected static function booted(): void
    {
        static::addGlobalScope('orderByTitle', function (Builder $builder) {
            $builder->orderBy('title', 'asc');
        });
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    protected function cover(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => (strpos($value, 'http') !== false || is_null($value)) ? $value : url((Storage::disk('public')->exists($value)) ? Storage::url($value) : NULL),
        );
    }

    protected function publicationYear(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => Carbon::parse($value)->format('Y-m-d'),
            set: fn (?string $value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }

    protected function publicationYearFormatted(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value, array $attributes) => Carbon::parse($attributes['publication_year'])->format('d/m/Y'),
        );
    }
}

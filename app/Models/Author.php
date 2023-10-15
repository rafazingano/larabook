<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'birthdate',
        'country',
        'biography'
    ];

    protected static function booted(): void
    {
        static::addGlobalScope('orderByFirstName', function (Builder $builder) {
            $builder->orderBy('first_name', 'asc');
        });
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    protected function birthdate(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => Carbon::parse($value)->format('Y-m-d'),
            set: fn (?string $value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }

    protected function birthdateFormatted(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value, array $attributes) => Carbon::parse($attributes['birthdate'])->format('d/m/Y'),
        );
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => ucwords($attributes['first_name'] . ' ' . $attributes['last_name']),
        );
    }
}

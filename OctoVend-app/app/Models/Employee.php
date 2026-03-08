<?php

namespace App\Models;

use App\Enums\EmployeeType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'dni',
        'file_id',
        'employee_type',
        'telephone_number',
        'birth_date',
        'age',
        'country_id',
        'state_id',
        'city_id',
        'address',
        'postal_code',
    ];

    protected function casts(): array
    {
        return [
            'employee_type' => EmployeeType::class,
        ];
    }
    protected function age(): Attribute
    {
        return Attribute::make(
            get: fn() => Carbon::parse($this->birth_date)->age,
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}

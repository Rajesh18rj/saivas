<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    protected $casts = [
        'dob' => 'date',
        'salary' => 'decimal:2',
    ];

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function star()
    {
        return $this->belongsTo(Star::class);
    }

    public function educationQualification()
    {
        return $this->belongsTo(EducationQualification::class);
    }

    public function occupation()
    {
        return $this->belongsTo(Occupation::class);
    }

    public function nativePlace()
    {
        return $this->belongsTo(NativePlace::class, 'native_place_id');
    }

    public function workingPlace()
    {
        return $this->belongsTo(WorkingPlace::class, 'working_place_id');
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}

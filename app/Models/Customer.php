<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'document',
        'birthdate',
        'phone',
    ];

    protected $casts = [
        'birthdate' => 'date',
    ];

    public function getDocumentAttribute($value)
    {
        return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $value);
    }

    public function setDocumentAttribute($value)
    {
        $this->attributes['document'] = preg_replace('/\D/', '', $value);
    }

    public function getBirthdateAttribute($value)
    {
        return $value ? date('d/m/Y', strtotime($value)) : null;
    }

    public function setBirthdateAttribute($value)
    {
        $this->attributes['birthdate'] = $value ? date('Y-m-d', strtotime($value)) : null;
    }

    public function getPhoneAttribute($value)
    {
        return preg_replace('/(\d{2})(\d{4,5})(\d{4})/', '($1) $2-$3', $value);
    }

    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = preg_replace('/\D/', '', $value);
    }
}

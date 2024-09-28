<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    public function prescriptionDocuments()
    {
        return $this->hasMany(PrescriptionDocuments::class, 'prescription_id');
    }
}

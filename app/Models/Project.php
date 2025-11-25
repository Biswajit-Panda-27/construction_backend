<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['contractor_name', 'contractor_number', 'contractor_email', 'contractor_image', 'building_image', 'spent_amount', 'location'];
}

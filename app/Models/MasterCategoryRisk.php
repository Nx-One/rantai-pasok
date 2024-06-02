<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterCategoryRisk extends Model
{
    use HasFactory;

    public function mitigation_headers()
    {
        return $this->hasMany(MitigationHeader::class);
    }

    public function mitigation_results()
    {
        return $this->hasMany(MitigationResult::class);
    }
}

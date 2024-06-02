<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MitigationResult extends Model
{
    use HasFactory;

    public function mitigation_headers()
    {
        return $this->belongsTo(MitigationHeader::class, 'mitigation_header_id', 'id');
    }

    public function master_category_risks()
    {
        return $this->belongsTo(MasterCategoryRisk::class);
    }

    public function mitigation_records()
    {
        return $this->belongsTo(MitigationRecord::class);
    }

}

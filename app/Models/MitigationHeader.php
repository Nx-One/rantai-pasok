<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MitigationHeader extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function master_category_risks()
    {
        return $this->belongsTo(MasterCategoryRisk::class);
    }

    public function mitigation_records()
    {
        return $this->belongsTo(MitigationRecord::class);
    }

    public function mitigation_connections()
    {
        return $this->hasMany(MitigationConnection::class);
    }

}

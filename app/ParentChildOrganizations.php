<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentChildOrganizations extends Model
{
    protected $fillable = [
        'parent_org_id',
        'child_org_id',
    ];

    public function organization() {
        return $this->belongsTo('App\Organization', 'child_org_id');
    }

    public function parentOrganization()
    {
        return $this->belongsTo('App\Organization', 'parent_org_id', 'id');
    }

    public function scopeActive($query)
    {
        return $query->whereHas('organization', function($query) {
        $query->where('active', 1);
    });
    }
}

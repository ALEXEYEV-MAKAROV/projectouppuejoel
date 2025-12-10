<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class InterestTopic extends Model
{
    protected $fillable = [
        'title',
        'icon_class',
        'description',
        'resource_url',
        'is_active',
        'sort_order',
        'created_by_user_id',
        'updated_by_user_id',
    ];

    // Relación: Un tema interesa a muchos miembros
    public function teamMembers(): BelongsToMany
    {
        return $this->belongsToMany(TeamMember::class, 'team_member_interest_topic');
    }
}
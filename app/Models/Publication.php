<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Publication extends Model
{
    protected $fillable = [
        'publication_year',
        'title',
        'authors',
        'publication_info',
        'issn',
        'description',
        'primary_link',
        'secondary_link',
        'is_active',
        'sort_order',
        'created_by_user_id',
        'updated_by_user_id',
    ];

    // Relación: Una publicación pertenece a muchos miembros (autores)
    public function teamMembers(): BelongsToMany
    {
        return $this->belongsToMany(TeamMember::class, 'team_member_publication');
    }
}
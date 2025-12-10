<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TeamMember extends Model
{
    // Habilitar asignación masiva para estos campos
    protected $fillable = [
        'name',
        'slug',
        'area',
        'institution',
        'excerpt',
        'photo_path',
        'email',
        'orcid_url',
        'researcher_id',
        'profile_body',
        'is_active',
        'sort_order',
        'created_by_user_id',
        'updated_by_user_id',
    ];

    // Relación: Un miembro tiene muchas publicaciones
    public function publications(): BelongsToMany
    {
        return $this->belongsToMany(Publication::class, 'team_member_publication');
    }

    // Relación: Un miembro tiene muchos temas de interés
    public function interestTopics(): BelongsToMany
    {
        return $this->belongsToMany(InterestTopic::class, 'team_member_interest_topic');
    }

    // (Opcional) Relación para saber qué usuario creó este registro
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }
}
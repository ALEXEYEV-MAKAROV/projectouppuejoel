<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

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
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'publication_year' => 'integer',
    ];

    /**
     * Scope para obtener solo publicaciones activas
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope para ordenar por año descendente y sort_order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('publication_year', 'desc')
                     ->orderBy('sort_order');
    }
}
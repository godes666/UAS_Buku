<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Buku extends Model
{
    protected $fillable = [
        'judul',
        'pengarang',
        'kategori'
    ];

    /**
     * Relationship with Penjualan model
     */
    public function penjualans(): HasMany
    {
        return $this->hasMany(Penjualan::class);
    }

    
    public function getTerjualAttribute(): int
    {
        return $this->penjualans()->sum('eksemplar');
    }
    public function scopeFiksi($query)
    {
        return $query->where('kategori', 'Fiksi');
    }

    public function scopeNonFiksi($query)
    {
        return $query->where('kategori', 'Non Fiksi');
    }
}

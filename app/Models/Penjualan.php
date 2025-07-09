<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penjualan extends Model
{
    protected $fillable = [
        'buku_id',
        'tanggal',
        'eksemplar'
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function buku(): BelongsTo
    {
        return $this->belongsTo(Buku::class);
    }
    public function scopePadaTanggal($query, $tanggal)
    {
        return $query->where('tanggal', $tanggal);
    }
    public function scopeBukuTerjual($query, $bukuId)
    {
        return $query->where('buku_id', $bukuId);
    }
}

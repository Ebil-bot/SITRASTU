<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdiModel extends Model
{
    use HasFactory;

    protected $table = 'prodi'; // Pastikan nama tabel sesuai
    protected $guarded = [];

    public static function getJenjangOptions()
    {
        return ['S1', 'S2'];
    }

    public function profils()
    {
        return $this->hasMany(ProfilModel::class, 'id_prodi');
    }

}

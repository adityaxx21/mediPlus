<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class Antrian extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'clinic_id',
        'tanggal',
        'kuota',
        'harga'
    ];

    public function Clinics() {
        return $this->hasMany(Clinic::class);
    }

    public function antrianUser($idUser)
    {
        return DB::table('antrian_user')
            ->join('antrians', 'antrian_user.antrian_id', '=', 'antrians.id')
            ->where('antrians.clinic_id', $this->id)
            ->where('antrian_user.user_id', $idUser)
            ->select('antrians.*');
    }

    public function antrianClinic()
    {
        return DB::table('antrian_user')
            ->join('antrians', 'antrian_user.antrian_id', '=', 'antrians.id')
            ->where('antrians.clinic_id', $this->id)
            ->select('antrians.*');
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: anggakes
 * Date: 6/28/17
 * Time: 10:18 AM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{

    const STATUS_BELUM_DIKERJAKAN = 'Belum Dikerjakan';
    const STATUS_SUDAH_DIKERJAKAN = 'Sudah Dikerjakan';

    protected $table = 'kegiatan';

    protected $fillable = [
        'name',
        'number',
        'date',
        'note',
        'pic',
        'team',
        'place',
        'status',
        'created_by',
        'kecamatan_code',
        'description',
        'is_received'
    ];


    public function kecamatan(){
        return $this->hasOne(Kecamatan::class, 'code', 'kecamatan_code');
    }

    public function laporan(){
        return $this->hasOne(Laporan::class);
    }


}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanImages extends Model
{
    //

    protected $table = 'laporan_images';

    protected $fillable = [
        'kegiatan_id',
        'url',
        'caption'
    ];
}

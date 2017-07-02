<?php
/**
 * Created by PhpStorm.
 * User: anggakes
 * Date: 6/26/17
 * Time: 5:45 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{

    protected $table = 'kecamatan';
    protected $fillable = ['name','code'];

}
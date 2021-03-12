<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    use HasFactory;
    protected $fillable=['nombre','hash','certificado_id'];
    public function certificado(){
        return$this->belongsTo(Certificado::class)->with('detalle');
    }
}

<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pacote_id',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pacote(){
        return $this->belongsTo(Pacote::class);
    }
   public function imagePackage() {
    return $this->belongsTo(ImagePackage::class);
    }
    // Helper para pegar imagens direto
    public function imagens() {
    return $this->hasOneThrough(Image::class, ImagePackage::class, 'id', 'image_package_id', 'image_package_id', 'id');
    }
}

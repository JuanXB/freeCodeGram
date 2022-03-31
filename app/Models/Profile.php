<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    use HasFactory;
    protected $guarded = [];


    //Establecer imagen de perfil.
    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'default/defaultProfileImage.png';

        return '/storage/' . $imagePath;
    }

    // Relación uno a uno con tabla user.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\VerifyMailAddress;
use App\Mail\PasswordReset;
use App\Models\Purchase;
use App\Helpers\Gender;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'profile_photo',
    ];
    
    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    
    public function getAvatarAttribute()
    {
        return empty($this->profile_photo) ?
            $this->genericAvatarFileName() :
            Storage::disk('avatars')->url($this->profile_photo);
    }

    private function genericAvatarFileName()
    {
        return Gender::forName($this->first_name) == 'female'
            ? Storage::disk('avatars')->url('generic_female.png')
            : Storage::disk('avatars')->url('generic_male.png');
    }
    
    public function sendEmailVerificationNotification()
    {
        $verifyLink = URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(60),
            [
                $this->id,
                sha1($this->email)
            ]
        );
        
        Mail::to($this)
        ->send(
            (new VerifyMailAddress($this, $verifyLink))
            ->subject('Verifica tu dirección de correo electrónico')
        );
    }

    public function sendPasswordResetNotification($token)
    {
        Mail::to($this)
        ->send(
            (new PasswordReset($this, $token))
            ->subject('Solicitud de cambio de contraseña')
        );
    }

    public function sendPurchaseDetails(Purchase $purchase)
    {
        // Enviar el mail con los detalles de la compra
    }
    
    public function createCart()
    {
        if (empty($this->cart))
            return $this->cart()->create();
        
        return $this->cart;
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
    
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}

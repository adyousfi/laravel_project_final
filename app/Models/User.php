<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'username',
        'birthday',
        'profile_picture',
        'about_me',
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function comments()
    {
    return $this->hasMany(Comment::class);
    }

    public function profileComments()
    {
    return $this->hasMany(Comment::class, 'profile_id');
    }

   
    public function sentMessages()
    {
    return $this->hasMany(Message::class, 'sender_id');
    }


    public function receivedMessages()
    {
    return $this->hasMany(Message::class, 'receiver_id');
        }



}

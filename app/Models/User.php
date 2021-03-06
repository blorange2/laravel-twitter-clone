<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     *
     */
    public function avatar()
    {
        return 'https://www.gravatar.com/avatar/' . md5($this->email) . '?d=mp';
    }

    /**
     * Retrieve all users that a user is following.
     *
     * SQL: "select * from `users` inner join `followers` on `users`.`id` = `followers`.`following_id` where `followers`.`user_id` = ?"
     */
    public function following()
    {
        return $this->belongsToMany(
            User::class,
            'followers',
            'user_id',
            'following_id'
        );
    }

    /**
     * Retrieve all users that are following this user.
     *
     * SQL: "select * from `users` inner join `followers` on `users`.`id` = `followers`.`user_id` where `followers`.`following_id` = ?"
     */
    public function followers()
    {
        return $this->belongsToMany(
            User::class,
            'followers',
            'following_id',
            'user_id'
        );
    }

    /**
     * Retrieve all tweets from users this user is following.
     *
     * SQL: "select * from `tweets` inner join `followers` on `followers`.`id` = `tweets`.`user_id` where `followers`.`user_id` is null"
     */
    public function tweetsFromFollowing()
    {
        return $this->hasManyThrough(
            Tweet::class,
            Follower::class,
            'user_id',
            'user_id',
            'id',
            'following_id'
        );
    }
}

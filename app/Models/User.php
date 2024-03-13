<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use ReflectionClass;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasUlids, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
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
        'password' => 'hashed',
    ];

    /**
     * Test for a relation between the current user and a supplied object
     */
    public function owns(Model $object, $foreignKey = null): bool
    {
        $foreignKey = $foreignKey ?: strtolower((new ReflectionClass($this))->getShortName()).'_id';

        if (isset($object->$foreignKey)) {
            if ($this->id == $object->$foreignKey) {
                return true;
            }
        }

        return false;
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn () => "{$this->firstname} {$this->lastname}"
        );
    }
}

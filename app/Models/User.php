<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use TCG\Voyager\Models\Role;
use App\Models\Profile;

class User extends \TCG\Voyager\Models\User
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
        'profile_id',
        'user_type',
        'firstname',
        'lastname',
        'employee_number',
        'job_title',
        'primary_responsibility',
        'supervisor',
        'assigned_shop',
        'associated_shops',
        'home_phone',
        'cell_phone',
        'preferred_method_of_contact',
        'landing_page',
        'department',
        'labor_item',
        'authorization_limit',
        'technician_pay_type',
        'technician_pay_rate',
        'technician_certificate_id',
        'employee_signature',
        'street_address',
        'street_address_2',
        'city',
        'country',
        'state',
        'postal_code',
        'roles'
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

    public function roles()
    {
        return $this->belongsTo(Role::class,'role_id');
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class,'profile_id');
    }
}

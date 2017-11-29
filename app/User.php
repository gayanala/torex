<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'user_name',
        'email',
        'password',
        'organization_id',
        'street_address1',
        'street_address2',
        'city',
        'zipcode',
        'state',
        'phone_number',
    ];

    protected $events =[
        'creating' => Events\NewBusiness::class
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // check if user is in a given role
    /*public function hasRole($roleId)
    {
        foreach ($this->roles()->get() as $role) {
            if ($role->id == $roleId) {
                return true;
            }
        }
        return false;
    }*/

    //user has many to many relationship with roles

    public function roles()
    {
        return $this->belongsToMany('App\Role')->withTimestamps();
    }

    public function roleuser()
    {
        return $this->hasOne('App\RoleUser', 'user_id');
    }

    //user has one to many(inverse) relationship with organizations

    public function organization() {
        return $this->belongsTo('App\Organization');
    }

    /**
     * @param string|array $roles
     */
    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) ||
                abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) ||
            abort(401, 'This action is unauthorized.');
    }

    /**
     * Check multiple roles
     * @param array $roles
     */
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    /**
     * Check one role
     * @param string $role
     */
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    /**
     * Get only active Users
     * @param $query
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}

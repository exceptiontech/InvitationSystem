<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\Admin\User;
use App\Models\UsersDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'string',  'max:25', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => $input['name'],
                'role_id' => isset($input['role_id'])? $input['role_id'] : 2,
                'email' => $input['email'],
                'mobile' => $input['mobile'],
                'password' => Hash::make($input['password']),
            ]), function (User $user) use ($input) {
                $this->createTeam($user);
                $this->createUserDetails($user,$input);
                $this->addPointReferral($user);

                $role2=Role::where('name','Company')->first();
                // add permissions
                $user->assignRole('Company');
                $permisson_c=Permission::where('name','Products')->first();
                //get all permissins under Products
                $permisson_c_sub=Permission::where('parent_id',$permisson_c->id)->get()->pluck('name');
                $role2->givePermissionTo('Products');
                $role2->givePermissionTo($permisson_c_sub);
                //dd($permisson_c_sub);
            });
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
    protected function createUserDetails(User $user, $input)
    {
        $user->ownedTeams()->save(UsersDetail::forceCreate([
            'user_id' => $user->id,
            'user_key' => randomString(40),
            'facility_name'=>$input['facility_name'],
            'balance' => 0,
            'user_points'=>0
        ]));
    }

    protected function addPointReferral(User $user)
    {
        if(Session::get('referral_user'))
        {
            //gt user det
            $gt_user=UsersDetail::where(['user_key'=>Session::get('referral_user')])->first();
            if(is_null($gt_user) == 0)
            {
                $gt_user->user_points +=1;
                $gt_user->save();
            }
        }
    }
}

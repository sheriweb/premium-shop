<?php

namespace App\Services;

use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Str;

class UserService
{

    private  $user , $address;

    public function __construct(User $user, Address $address)
    {

        $this->user = $user;
        $this->address = $address;
    }


    public function getOrCreateUser($request)
    {
        return $this->user->updateOrCreate(
            [
                'email' => $request->email
            ],
            [
                'password' => bcrypt(Str::random( 10 )),
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'contact_no' => $request->contact_no
            ]
        );
    }
    public function updateOrCreateAddress($request,$userId)
    {
        return $this->address->updateOrCreate(
            [
                'user_id' => $userId
            ],
            [
                'country'=> $request->country,
                'address'=> $request->address,
                'city'=> $request->city,
                'state'=> $request->state,
                'postal_code'=> $request->postal_code,
            ]
        );
    }
    public function getUserUsingEmail($email)
    {
      $user = $this->user->with('address')->where('email',$email)->first();
      if($user){
          return [
              'first_name' => $user->first_name,
              'last_name' => $user->last_name,
              'email' => $user->email,
              'contact_no' => $user->contact_no,
              'country' => $user->address->country,
              'address' => $user->address->address,
              'city' => $user->address->city,
              'state' => $user->address->state,
              'postal_code' => $user->address->postal_code,

          ];
      }
      return [
          'first_name' =>'',
          'last_name' => '',
          'email_temp' =>'',
          'contact_no' => '',
          'country' =>'',
          'address' => '',
          'city' => '',
          'state' => '',
          'postal_code' => '',
      ];

    }
}

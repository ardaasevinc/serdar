<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class FortifyServiceProvider extends ServiceProvider
{
   public function boot()
   {
      Fortify::authenticateUsing(function (Request $request) {
         $user = User::where('email', $request->email)->first();

         if ($user && Hash::check($request->password, $user->password)) {
            return $user;
         }

         return null;
      });
   }
}

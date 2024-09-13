<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Log;

class UserController extends Controller
{
    public function destroy(string $id)
    {
        try {
            $user = User::find($id);
            if ($user) {
                $user->delete();
                Auth::logout();
                return redirect()->route('auth.getSignin');
            }
        } catch (\Exception $e) {
            Log::error('Failed to signup: ', [
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ]);
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name' => ['sometimes', 'required', 'min:3'],
            'email' => ['sometimes', 'required', 'email:rfc,dns', 'unique:users,email,' . $id]
        ]);

        $user = User::find($id);

        if ($user) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
        }

        return redirect()->back();
    }
}

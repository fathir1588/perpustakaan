<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    /**
     * Tampilkan formulir registrasi.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('regis.registrasi');
    }

    /**
     * Tangani permintaan registrasi yang masuk.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'username' => ['required', 'string', 'max:250'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3'],
        ]);
        
        // Check if the username is available
        if (User::where('username', $request->username)->exists()) {
            return back()->withErrors(['username' => 'Username sudah digunakan.'])->withInput();
        }
        $request['role'] = 'peminjam';
        // Create the user
        $user =  User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=> $request->role,
        ]);
    
        // Assign the role "peminjam" to the user
        $user->assignRole('peminjam');
    
        // Redirect the user after registration
        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }
    
}

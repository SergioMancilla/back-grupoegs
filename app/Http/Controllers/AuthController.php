<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Services\PasswordEncryptionService;

class AuthController extends Controller
{

    protected $passwordEncryptionService;

    public function __construct(PasswordEncryptionService $passwordEncryptionService) {
        $this->passwordEncryptionService = $passwordEncryptionService;
    }

    public function login(Request $request) {
        $request->validate([
            'user' => 'required',
            'password' => 'required',
        ]);

        $person = Person::query()
            ->where('email', $request->user)
            ->orWhere('email', 'LIKE', "{$request->user}@%")
            ->first();
        $password = $request->password;

        if ($person && $this->passwordEncryptionService->checkPassword($password, $person->password)) {
            $data_return = [
                'message'=> 'Login ok!',
                'person'=> $person
            ];
            return $data_return;
        }

        return response()->json(['message' => 'Invalid credentials'], 404); 
    }
}

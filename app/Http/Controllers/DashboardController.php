<?php

namespace App\Http\Controllers;

use App\Entities\User;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Exception;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private $validator;
    private $repository;

    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function index()
    {
       return view('users.dashboard');
    }

    public function auth(Request $request)
    {
        $data = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];

        try {

            //Condition to hash password
            if (\env('PASSWORD_HASH')) {
                Auth::attempt($data, false); //Faz requisição pro banco de dados e criptografa
            } else {
                $user = $this->repository->findWhere(['email' => $request->get('email')])->first();

                if (!$user) {
                    throw new Exception('O e-mail do usuário é inválido!');
                }

                if ($user->password !== $request->get('password')) {
                    throw new Exception('A senha do usuário é inválida!');
                }

                Auth::login($user);
            }

            return redirect()->route('users.dashboard');
        } catch (Exception $ex) {
            return $ex->getMessage();
        }

        // dd($request->all()); //dump and die
    }
}

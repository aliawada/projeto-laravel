<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Exception;
use Illuminate\Database\QueryException;
use Prettus\Validator\Exceptions\ValidatorException;

class  UserService
{
    private $repository;
    private $validator;

    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function store($data)
    {
        try {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);

            $usuario = $this->repository->create($data);

            return [
                'success' => true,
                'message' => "Usuário cadastrado",
                'data' => $usuario
            ];
        } catch(Exception $ex) {

            switch(\get_class($ex)) {
                case QueryException::class      : return ['success' => false, 'message' => $ex->getMessage()];
                case ValidatorException::class  : return ['success' => false, 'message' => $ex->getMessageBag()];
                case Exception::class           : return ['success' => false, 'message' => $ex->getMessage()];
                default                         : return ['success' => false, 'message' => $ex->getMessage()];
            }
        }
    }

    public function update()
    { }

    public function delete()
    { }
}

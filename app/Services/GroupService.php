<?php

namespace App\Services;

use App\Repositories\GroupRepository;
use App\Validators\GroupValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Exception;
use Illuminate\Database\QueryException;
use Prettus\Validator\Exceptions\ValidatorException;

class  GroupService
{
    private $repository;
    private $validator;

    public function __construct(GroupRepository $repository, GroupValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function store(array $data)
    {
        try {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);

            $group = $this->repository->create($data);

            return [
                'success' => true,
                'message' => "Grupo cadastrado",
                'data' => $group
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

    public function update($data, $id)
    {
        try {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $group = $this->repository->update($data, $id);

            return [
                'success' => true,
                'message' => "Grupo atualizado",
                'data' => $group
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

    public function delete($group_id)
    {
        try {

            $this->repository->delete($group_id);

            return [
                'success' => true,
                'message' => "Grupo deletado",
                'data' => null
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

    public function userStore($data, $group_id)
    {
        try {
            $group = $this->repository->find($group_id);
            $user_id = $data['user_id'];

            $group->users()->attach($user_id);

            return [
                'success' => true,
                'message' => "Usuário relacionado com sucesso",
                'data' => $group
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
}

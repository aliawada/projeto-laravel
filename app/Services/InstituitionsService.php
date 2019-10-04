<?php

namespace App\Services;

use App\Repositories\InstituitionRepository;
use App\Validators\InstituitionValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Exception;
use Illuminate\Database\QueryException;
use Prettus\Validator\Exceptions\ValidatorException;

class  InstituitionsService
{
    private $repository;
    private $validator;

    public function __construct(InstituitionRepository $repository, InstituitionValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function store(array $data)
    {
        try {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);

            $instituition = $this->repository->create($data);

            return [
                'success' => true,
                'message' => "Instituição cadastrada",
                'data' => $instituition
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

    public function delete($instituition_id)
    {
        try {

            $this->repository->delete($instituition_id);

            return [
                'success' => true,
                'message' => "Instituição deletada",
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
}

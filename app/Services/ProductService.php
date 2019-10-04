<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Validators\ProductValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Exception;
use Illuminate\Database\QueryException;
use Prettus\Validator\Exceptions\ValidatorException;

class  ProductService
{
    private $repository;
    private $validator;

    public function __construct(ProductRepository $repository, ProductValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function store(array $data, $instituition_id)
    {
        try {
            $data['instituition_id'] = $instituition_id;

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);

            $product = $this->repository->create($data);

            return [
                'success' => true,
                'message' => "Produto cadastrado",
                'data' => $product
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

            $product = $this->repository->update($data, $id);

            return [
                'success' => true,
                'message' => "Produto atualizado",
                'data' => $product
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

    public function delete($product_id)
    {
        try {

            $this->repository->delete($product_id);

            return [
                'success' => true,
                'message' => "Produto deletado",
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

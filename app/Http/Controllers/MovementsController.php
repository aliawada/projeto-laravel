<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MovementCreateRequest;
use App\Http\Requests\MovementUpdateRequest;
use App\Repositories\MovementRepository;
use App\Validators\MovementValidator;

/**
 * Class MovementsController.
 *
 * @package namespace App\Http\Controllers;
 */
class MovementsController extends Controller
{
    /**
     * @var MovementRepository
     */
    protected $repository;

    /**
     * @var MovementValidator
     */
    protected $validator;

    /**
     * MovementsController constructor.
     *
     * @param MovementRepository $repository
     * @param MovementValidator $validator
     */
    public function __construct(MovementRepository $repository, MovementValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    public function application()
    {
        return view('movement.application');
    }

}

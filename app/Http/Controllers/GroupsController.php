<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\GroupCreateRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Repositories\GroupRepository;
use App\Repositories\InstituitionRepository;
use App\Repositories\UserRepository;
use App\Services\GroupService;

class GroupsController extends Controller
{

    protected $repository;
    protected $service;

    protected $userRepository;
    protected $instituitionRepository;

    public function __construct(GroupRepository $repository, GroupService $service, InstituitionRepository $instituitionRepository, UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->service  = $service;
        $this->instituitionRepository  = $instituitionRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = $this->repository->all();
        $user_list = $this->userRepository->selectBoxList('name', 'id');
        $intituition_list = $this->instituitionRepository->selectBoxList('name', 'id');

        return view('groups.index', [
            'groups' => $groups,
            'user_list' => $user_list,
            'instituition_list' => $intituition_list,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  GroupCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(GroupCreateRequest $request)
    {
        $request = $this->service->store($request->all());

        // $usuario = $request['success'] ? $request['data'] : null ;

        session()->flash('success', [
            'success' => $request['success'],
            'message' => $request['message']
        ]);

        return redirect()->route('group.index');
    }



    public function userStore(Request $request, $group_id)
    {
        $request = $this->service->userStore($request->all(), $group_id);

        session()->flash('success', [
            'success' => $request['success'],
            'message' => $request['message']
        ]);

        return redirect()->route('group.show', [
            'group_id' => $group_id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = $this->repository->find($id);
        $user_list = $this->userRepository->selectBoxList('name', 'id');

        return view('groups.show', [
            'group' => $group,
            'user_list' => $user_list,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = $this->repository->find($id);
        $user_list = $this->userRepository->selectBoxList('name', 'id');
        $intituition_list = $this->instituitionRepository->selectBoxList('name', 'id');

        return view('groups.edit', [
            'group' => $group,
            'user_list' => $user_list,
            'instituition_list' => $intituition_list
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  GroupUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(GroupUpdateRequest $request, $id)
    {
        $request = $this->service->update($request->all(), $id);

        // $usuario = $request['success'] ? $request['data'] : null ;

        session()->flash('success', [
            'success' => $request['success'],
            'message' => $request['message']
        ]);

        return redirect()->route('group.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request = $this->service->delete($id);

        session()->flash('success', [
            'success' => $request['success'],
            'message' => $request['message']
        ]);

        return redirect()->route('group.index');
    }
}

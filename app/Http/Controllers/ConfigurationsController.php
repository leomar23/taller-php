<?php

namespace Taller\Http\Controllers;

use Illuminate\Http\Request;

use Taller\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Taller\Http\Requests\ConfigurationCreateRequest;
use Taller\Http\Requests\ConfigurationUpdateRequest;
use Taller\Repositories\ConfigurationRepository;
use Taller\Validators\ConfigurationValidator;


class ConfigurationsController extends Controller
{

    /**
     * @var ConfigurationRepository
     */
    protected $repository;

    /**
     * @var ConfigurationValidator
     */
    protected $validator;

    public function __construct(ConfigurationRepository $repository, ConfigurationValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $configurations = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $configurations,
            ]);
        }

        return view('configurations.index', compact('configurations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ConfigurationCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ConfigurationCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $configuration = $this->repository->create($request->all());

            $response = [
                'message' => 'Configuration created.',
                'data'    => $configuration->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
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
        $configuration = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $configuration,
            ]);
        }

        return view('configurations.show', compact('configuration'));
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

        $configuration = $this->repository->find($id);

        return view('configurations.edit', compact('configuration'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ConfigurationUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ConfigurationUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $configuration = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Configuration updated.',
                'data'    => $configuration->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
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
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Configuration deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Configuration deleted.');
    }
}

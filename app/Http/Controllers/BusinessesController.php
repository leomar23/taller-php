<?php

namespace Taller\Http\Controllers;

use Illuminate\Http\Request;

use Taller\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Taller\Http\Requests\BusinessCreateRequest;
use Taller\Http\Requests\BusinessUpdateRequest;
use Taller\Repositories\BusinessRepository;
use Taller\Validators\BusinessValidator;


class BusinessesController extends Controller
{

    /**
     * @var BusinessRepository
     */
    protected $repository;

    /**
     * @var BusinessValidator
     */
    protected $validator;

    public function __construct(BusinessRepository $repository, BusinessValidator $validator)
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
        $businesses = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $businesses,
            ]);
        }

        return view('businesses.index', compact('businesses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BusinessCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BusinessCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $business = $this->repository->create($request->all());

            $response = [
                'message' => 'Business created.',
                'data'    => $business->toArray(),
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
        $business = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $business,
            ]);
        }

        return view('businesses.show', compact('business'));
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

        $business = $this->repository->find($id);

        return view('businesses.edit', compact('business'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  BusinessUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(BusinessUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $business = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Business updated.',
                'data'    => $business->toArray(),
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
                'message' => 'Business deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Business deleted.');
    }
}

<?php

namespace Taller\Http\Controllers;

use Illuminate\Http\Request;

use Taller\Entities\StatusProduct;
use Taller\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Taller\Http\Requests\StatusProductCreateRequest;
use Taller\Http\Requests\StatusProductUpdateRequest;
use Taller\Repositories\StatusProductRepository;
use Taller\Validators\StatusProductValidator;
use Illuminate\Support\Facades\Auth;

class StatusProductsController extends Controller
{

    /**
     * @var StatusProductRepository
     */
    protected $repository;

    /**
     * @var StatusProductValidator
     */
    protected $validator;

    public function __construct(StatusProductRepository $repository, StatusProductValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $statusProducts = $this->repository->paginate(5);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $statusProducts,
            ]);
        }

        return view('statusProduct.index', compact('statusProducts'));
    }

    public function create()
    {
        return view('statusProduct.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:status_products,name',
        ]);

        $status = new StatusProduct();
        $status->user_id = Auth::user()->id;
        $status->name = $request->input('name');
        $status->comment = $request->input('comment');
        $status->save();

        //$this->repository->create($request->toArray());

        return redirect()->route('statusProduct.index')
            ->with('success','StatusProduct created successfully');
/*        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $statusProduct = $this->repository->create($request->all());

            $response = [
                'message' => 'StatusProduct created.',
                'data'    => $statusProduct->toArray(),
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
        }*/
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
        $statusProduct = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $statusProduct,
            ]);
        }

        return view('statusProduct.show', compact('statusProduct'));
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

        $statusProduct = $this->repository->find($id);

        return view('statusProduct.edit', compact('statusProduct'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  StatusProductUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $status = $this->repository->update($request->toArray(),$id);

        return redirect()->route('statusProduct.index')
            ->with('success','StatusProduct updated successfully');
/*        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $statusProduct = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'StatusProduct updated.',
                'data'    => $statusProduct->toArray(),
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
        }*/
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
                'message' => 'StatusProduct deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'StatusProduct deleted.');
    }
}

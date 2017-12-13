<?php

namespace Taller\Http\Controllers;

use Illuminate\Http\Request;

use Taller\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Taller\Http\Requests\TypeProductCreateRequest;
use Taller\Http\Requests\TypeProductUpdateRequest;
use Taller\Repositories\TypeProductRepository;
use Taller\Validators\TypeProductValidator;
use Taller\Repositories\CategoryRepository;
use Taller\Entities\TypeProduct;
use Taller\Entities\Category;


class TypeProductsController extends Controller
{

    /**
     * @var TypeProductRepository
     */
    protected $repository;
    protected $repositoryCategory;

    /**
     * @var TypeProductValidator
     */
    protected $validator;

    public function __construct(TypeProductRepository $repository, TypeProductValidator $validator,CategoryRepository $repositoryCategory)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->repositoryCategory = $repositoryCategory;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $typeProducts = $this->repository->paginate(5);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $typeProducts,
            ]);
        }

        return view('typeProduct.index', compact('typeProducts'));
    }

    public function create()
    {
        $category = Category::pluck('name','id');
        return view('typeProduct.create', compact('category'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:type_products,name',
        ]);

        $type = new TypeProduct();
        $type->category_id = $request->input('category_id');
        $type->name = $request->input('name');
        $type->save();

        return redirect()->route('typeProduct.index')
            ->with('success','Type Product created successfully');
        /*try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $typeProduct = $this->repository->create($request->all());

            $response = [
                'message' => 'TypeProduct created.',
                'data'    => $typeProduct->toArray(),
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
        $typeProduct = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $typeProduct,
            ]);
        }

        return view('typeProduct.show', compact('typeProduct'));
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
        $category = Category::pluck('name','id');
        $typeProduct = $this->repository->find($id);

        return view('typeProduct.edit', compact('typeProduct','category'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $type = $this->repository->update($request->toArray(),$id);

        return redirect()->route('typeProduct.index')
            ->with('success','TypeProduct updated successfully');

        /*try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $typeProduct = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'TypeProduct updated.',
                'data'    => $typeProduct->toArray(),
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
                'message' => 'TypeProduct deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'TypeProduct deleted.');
    }
}

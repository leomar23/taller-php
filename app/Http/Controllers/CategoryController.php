<?php

namespace Taller\Http\Controllers;

use Illuminate\Http\Request;

use Taller\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Taller\Http\Requests\CategoryCreateRequest;
use Taller\Http\Requests\CategoryUpdateRequest;
use Taller\Repositories\CategoryRepository;
use Taller\Validators\CategoryValidator;
use Taller\Entities\Category;
use Lang;

class CategoryController extends Controller
{

    /**
     * @var CategoryRepository
     */
    protected $repository;

    /**
     * @var CategoryValidator
     */
    protected $validator;

    public function __construct(CategoryRepository $repository, CategoryValidator $validator)
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
        //$this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $categories = $this->repository->paginate(5);

        /*if (request()->wantsJson()) {
            return response()->json([
                'data' => $categories,
            ]);
        }*/

        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CategoryCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'name' => 'required|unique:categories,name',
            'description' => 'required'
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();

        /*$this->repository->create($request->toArray());*/

        $notification = array(
            'message' => 'Categoría creada satisfactoriamente',
            'alert-type' => 'success'
        );

        return redirect()->route('category.index')
            ->with($notification);
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

        $category = $this->repository->find($id);

        /*$category bien armado*/

        return view('category.edit', compact('category'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CategoryUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //dd($id, $request);
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        //dd($id, $request);

        //$category = $this->repository->update($id, $request->all());

        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();

        $notification = array(
            'message' => 'Categoría editada satisfactoriamente',
            'alert-type' => 'success'
        );

        return redirect()->route('category.index')
            ->with($notification);

        /*$notification = array(
            'message' => Lang::get('messages.edit_category'),
            'alert-type' => 'success'
        );*/

        /*return redirect()->route('category.index')
            ->with($notification);*/

    
        
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

        $notification = array(             
            'message' => ('Categoria eliminada satisfactoriamente'),             
            'alert-type' => 'success'         
        );
        
        return redirect()->route('category.index')
            ->with($notification);
    }
}

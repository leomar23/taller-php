<?php

namespace Taller\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use Taller\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Taller\Http\Requests\ProductCreateRequest;
use Taller\Http\Requests\ProductUpdateRequest;
use Taller\Repositories\ProductRepository;
use Taller\Repositories\StatusProductRepository;
use Taller\Validators\ProductValidator;
use Taller\Entities\Product;
use Taller\Entities\Category;
use Illuminate\Support\Facades\Auth;
use Taller\Entities\StatusProduct;
use Taller\Entities\Coin;
use Taller\Entities\TypeProduct;

//use Taller\Product;
//use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    protected $repository;
    protected $repositoryStatusProduct;
    protected $validator;

    public function __construct(ProductRepository $repository,
                                    ProductValidator $validator,
                                    StatusProductRepository $repositoryStatusProduct)
        {
            $this->repository = $repository;
            $this->repositoryStatusProduct = $repositoryStatusProduct;
            $this->validator  = $validator;
        }

    // public function index(Request $request)
    // {
    //     $data = $this->repository->findByField('active',true);
    //     return view('product.index',compact('data'));
    // }

    public function index(Request $request)
    {
        $data = $this->repository->paginate(5);
        return view('product.index',compact('data'));
        //->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = StatusProduct::pluck('name','id');
        $coin = Coin::pluck('symbol','id');
        $cat = Category::pluck('name','id');
        return view('product.create',compact('status','coin','cat'));
    }

    public function getTypeProject(Request $request, $id)
    {
        if($request->ajax()){
            $types = $this->repositoryStatusProduct->findByField('category_id',$id);
            return response()->json($types);
        }
        //return view('district.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:products,name',
            'title' => 'required',
            'address' => 'required',
            'description' => 'required',
            'price' => 'required',
            'cover_route' => 'required'
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->url = str_replace(" ","-",strtolower($request->input('name')));
        $url = $product->url;
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->tags = $request->input('tags');
        //$proyect->coin = "$";
        $product->price = $request->input('price');
        //$product->value_now = 0;
        //$request->user()->proyects()->save();
        $product->user_id = Auth::user()->id;
        $product->category_id = $request->input('category_id');;
        $product->coin_id = $request->input('coin_id');
        $product->status_project_id = $request->input('status_project_id');
        $product->type_project_id = $request->input('type_project_id');

        //STATUS
        $status = StatusProject::query()->where('id',$request->input('status_project_id'))->first();
        if($status->name == "Publicado"){
            $product->active = 1;
            $product->date_start = Carbon::now();
        }else if($status->name == "Rechazado" || $status->name == "Cerrado"){
            $product->active = 0;
            $pproduct->date_end = Carbon::now();
        }else{
            $product->active = 0;
        }
        //END STATUS

        //$product->client_id = Auth::user()->id;

        //IMAGEN PROJECT
        $name_product = $request->input('name');
        $file = $request->file('cover_route');
        $destinationPath = storage_path('app/public');
        //$fullname = $file->getClientOriginalName();
        $ext = $file->guessClientExtension();
        $name = Carbon::now()->timestamp.'-'.md5($name_product).'.'.$ext;
        $file->move($destinationPath, $name);
        //END IMAGEN PROJECT

        $product->cover_route = $name;
        $product->save();

        //$old = Project::query()->where('url', $url)->first();//$this->repository->create($proyect->attributesToArray());
/*      $financial = new Financial();
        $financial->project_id = $old->id;
        $financial->project_deadline = $request->input('project_deadline');
        $financial->date_first_return = $request->input('date_first_return');
        $financial->projected_profitability = $request->input('projected_profitability');
        $financial->save();*/

        return redirect()->route('product.admin')
            ->with('success','Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Taller\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $pro = $this->repository->find($id);
        return view('project.show',compact('pro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Taller\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $pro = $this->repository->find($id);
        return view('project.edit',compact('pro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Taller\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name' => 'required|unique:projects,name',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $this->repository->update($request->toArray(),$id);

        return redirect()->route('project.admin')
            ->with('success','Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Taller\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->repository->delete($id);
        return redirect()->route('project.admin')
            ->with('success','Project deleted successfully');
    }
}

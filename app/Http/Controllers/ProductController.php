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
use Lang;
use DB;

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

    public function getUserRole($userId)
    {
        $aux = DB::table('role_user')->select('role_id')->where('user_id', '=', $userId)->get()->toArray();
        return            
            $aux[0]->role_id;
    }

    public function getBusIdByUser($userId)
    {   
        return $aux = DB::table('businesses')->select('id')->where('owner_id', '=', $userId)->get()->toArray();        
    }

    public function getProdByOwner($ownerId)
    {
        $buses = $this->getBusIdByUser($ownerId);

        $aux2 = array();

        foreach ($buses as $key => $bus) {
            $arregloBus_Prod = DB::table('business_products')->where('business_id', '=', $bus->id)->get()->toArray();
            
            foreach ($arregloBus_Prod as $key => $value) {
                array_push($aux2, $value);
            }

            //array_push($aux2, DB::table('business_products')->where('business_id', '=', $bus->id)->get()->toArray());
        }
        return            
            $aux2;
    }

    public function index(Request $request)
    {
        $products = $this->repository->paginate(5);
        $categories = Category::pluck('name', 'id')->toArray();
        $rol = $this->getUserRole(Auth::user()->id);

        $arrayBus_Prod = ($this->getProdByOwner(Auth::user()->id));

        // EN LA VISTA RECIBE PAGINADO, DESDE ACÁ TENDRÍA QUE SALIR MASTICADO

        return view('product.index', compact('products', 'categories', 'rol', 'arrayBus_Prod'))
               ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->toArray();
        //$rol = $this->getUserRole(Auth::user()->id);
        return view('product.create',compact('categories', 'rol'));
    }

    public function getTypeProduct(Request $request, $id)
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

            'category_id' => 'required',
            //'status_product_id' => 'required', // porque se agrega más abajo
            'name' => 'required',
            'description' => 'required',
            'bar_code' => 'required',
            'image' => 'required',
            'price' => 'required'

        ]);

        $product = new Product();
        $product->category_id = $request->input('category_id');
        $product->status_product_id = 1;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->bar_code = $request->input('bar_code');
        $product->image = $request->input('image');
        $product->price = $request->input('price');
        $product->save();

        /*
        //IMAGEN PROJECT
        $name_product = $request->input('name');
        $file = $request->file('cover_route');
        $destinationPath = storage_path('app/public');
        //$fullname = $file->getClientOriginalName();
        $ext = $file->guessClientExtension();
        $name = Carbon::now()->timestamp.'-'.md5($name_product).'.'.$ext;
        $file->move($destinationPath, $name);
        //END IMAGEN PROJECT
        */

        $notification = array(             
            'message' => ('Producto creado satisfactoriamente'),             
            'alert-type' => 'success'         
        );
        
        return redirect()->route('product.index')
            ->with($notification);
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
    public function edit($id)
    {
        $product = $this->repository->find($id);
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Taller\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request, [
            
            //'category_id' => 'required',
            //'status_product_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            //'bar_code' => 'required',
            //'image' => 'required',
            'price' => 'required'
        
        ]);

        $product = Product::find($id);
        //$product->category_id = $request->input('category_id');
        //$product->status_product_id = $request->input(1);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        //$product->bar_code = $request->input('bar_code');
        //$product->image = $request->input('image');
        $product->price = $request->input('price');
        $product->save();

        $notification = array(             
            'message' => ('Producto actualizado satisfactoriamente'),             
            'alert-type' => 'success'         
        );
        
        return redirect()->route('product.index')
            ->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Taller\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);

        $notification = array(             
            'message' => ('Producto eliminado satisfactoriamente'),             
            'alert-type' => 'success'         
        );
        
        return redirect()->route('product.index')
            ->with($notification);
    }
}

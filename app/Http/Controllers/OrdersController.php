<?php

namespace Taller\Http\Controllers;

use Illuminate\Http\Request;

use Taller\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Taller\Http\Requests\OrderCreateRequest;
use Taller\Http\Requests\OrderUpdateRequest;
use Taller\Repositories\OrderRepository;
use Taller\Validators\OrderValidator;
use Taller\Entities\Order;
use Taller\User;
use Lang;



class OrdersController extends Controller
{

    /**
     * @var OrderRepository
     */
    protected $repository;

    /**
     * @var OrderValidator
     */
    protected $validator;

    public function __construct(OrderRepository $repository, OrderValidator $validator)
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
        $orders = $this->repository->paginate(5);
        $users = User::pluck('name','id')->toArray();
        return view('orders.index', compact('orders', 'users'));    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  OrderCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $users = User::pluck('name','id')->toArray();

        return view('orders.create', compact('users'));
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'user_id' => 'required|unique:orders,user_id',
            'shipping_place' => 'required',
        ]);

        $order = new Order();
        $order->user_id = $request->input('user_id');
        $order->shipping_place = $request->input('shipping_place');
        $order->save();

        return redirect()->route('orders.index')
            ->with('success','Orden editada correctamente');
            //->with($notification);
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

        $order = $this->repository->find($id);

        return view('orders.edit', compact('order'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  OrderUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {

       $this->validate($request, [
            'user_id' => 'required|unique:orders,user_id',
            'shipping_place' => 'required',
        ]);


        $order = new Order();
        $order->user_id = $request->input('user_id');
        $order->shipping_place = $request->input('shipping_place');
        $order->save();

        return redirect()->route('orders.index')
            ->with('success','Orden editada correctamente');
            //->with($notification);
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
                'message' => 'Order deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Order deleted.');
    }
}

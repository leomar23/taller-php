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
        return view('orders.index', compact('orders'));
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
        return view('orders.create');
    }


    public function store(OrderCreateRequest $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:orders,name',
        ]);

        $this->repository->create($request->toArray());
        
        $notification = array(
            'message' => Lang::get('messages.create_role'),
            'alert-type' => 'success'
        );

        return redirect()->route('orders.index')
            ->with($notification);
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
        $order = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $order,
            ]);
        }

        return view('orders.show', compact('order'));
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
    public function update(OrderUpdateRequest $request, $id)
    {

       $this->validate($request, [
            'name' => 'required|unique:orders,name'.$id,
        ]);

        $orders = $this->repository->update($id, $request->all());

        $notification = array(
            'message' => Lang::get('messages.edit_role'),
            'alert-type' => 'success'
        );

        return redirect()->route('orders.index')
            ->with($notification);
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

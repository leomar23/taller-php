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
use Taller\Entities\Business;
use Taller\User;
use DB;


class BusinessController extends Controller
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
        $businesses = $this->repository->paginate(5);

        return view('business.index', compact('businesses'));
    }

    public function create()
    {
        //$users = User::get(); // Llegan correctamente todos los Usuarios

        $users = User::pluck('name', 'id')->toArray();

        //dd($users); // toArray() porque sino viaja como Collection y no anda el select (Combo)

        return view('business.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BusinessCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:businesses,name',
            'owner_id' => 'required',            
            'location' => 'required'
        ]);

        $business = new Business();
        $business->name = $request->input('name');
        $business->owner_id = $request->input('owner_id');
        $business->location = $request->input('location');
        $business->save();

        $notification = array(
            'message' => 'Comercio creado satisfactoriamente',
            'alert-type' => 'success'
        );

        return redirect()->route('business.index')
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

        $business = $this->repository->find($id);

        return view('business.edit', compact('business'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BusinessUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'owner_id' => 'required',
            'location' => 'required'
        ]);

        //$business = $this->repository->update($id, $request->all());

        $business = Business::find($id);
        $business->name = $request->input('name');
        $business->owner_id = $request->input('owner_id');
        $business->location = $request->input('location');
        $business->save();

        $notification = array(
            'message' => 'Comercio editado satisfactoriamente',
            'alert-type' => 'success'
        );

        return redirect()->route('business.index')
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
                'message' => 'Business deleted.',
                'deleted' => $deleted,
            ]);
        }

        $notification = array(
            'message' => 'Comercio eliminado satisfactoriamente',
            'alert-type' => 'success'
        );

        return redirect()->route('business.index')
            ->with($notification);
    }
}

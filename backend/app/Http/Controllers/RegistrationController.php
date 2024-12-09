<?php

namespace App\Http\Controllers;

use App\Http\Resources\RegistrationResource;
use App\Models\Registration;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $orderBy = $request->query('orderBy');
        $order = $request->query('order');

        if (!in_array($orderBy, ['name', 'date'])) {
            $registrations = Registration::orderBy($orderBy, $order)->get();
        }

        if (!in_array($order, ['asc', 'desc'])) {
            $registrations = Registration::orderBy($orderBy, $order)->get();
        }

        $registrations = Registration::orderBy($orderBy, $order)->get();
        
        return RegistrationResource::collection($registrations);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Registration::findOrFail($id);
        return new RegistrationResource($item);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

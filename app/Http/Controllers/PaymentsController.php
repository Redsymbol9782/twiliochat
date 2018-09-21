<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentsRequest;
use App\Http\Requests\UpdatePaymentsRequest;

class PaymentsController extends Controller
{
    /**
     * Display a listing of Payment.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('payment_access')) {
            return abort(401);
        }

        $payments = Payment::all();

        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating new Payment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('payment_create')) {
            return abort(401);
        }
        return view('payments.create');
    }

    /**
     * Store a newly created Payment in storage.
     *
     * @param  \App\Http\Requests\StorePaymentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentsRequest $request)
    {
        if (! Gate::allows('payment_create')) {
            return abort(401);
        }
        $payment = Payment::create($request->all());



        return redirect()->route('payments.index');
    }


    /**
     * Display Payment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('payment_view')) {
            return abort(401);
        }
        $payment = Payment::findOrFail($id);

        return view('payments.show', compact('payment'));
    }

}

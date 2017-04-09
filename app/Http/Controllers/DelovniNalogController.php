<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DelovniNalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.nalog');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //preverjanje pravilnosti podatkov
        $this->validate($request, [
                'vezaniPacient' => 'required|numeric',
                'datumPrvegaObiska' => 'required|date_format:d/m/Y|after:yesterday',
                'koncniDatum' => 'date_format:d/m/Y|after:datumPrvegaObiska|required_without:casovniInterval',
                'casovniInterval' => 'required_without:koncniDatum',
                'steviloObiskov' => 'required|numeric|max:10',
                'nalogeObiska' => 'required_if:nalogeObiska,Aplikacija injekcij',
                'barvaEpruvete' => 'required_if:nalogeObiska,Odvzem krvi',
                'steviloEpruvet' => 'required_if:nalogeObiska,Odvzem krvi',
                'obveznoDrzanjeDatuma' => 'required'
            ]);


        /* ko bodo narejene migracije, je potrebno dodati podatke iz form v $nalog:
         * $nalog = new DelovniNalog;
         * $nalog->vrstaObiska = $request->nalogeObiska;
         * $nalog->pacient = $request->vezaniPacient;
         * ...
         *
         * $nalog->save();
         */

        return redirect('nalog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

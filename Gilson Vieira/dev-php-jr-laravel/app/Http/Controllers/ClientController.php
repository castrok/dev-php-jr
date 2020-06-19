<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View
     * @author Gilson Vieira Castro Júnior <+55 (61) 9 9209-6171 / castrok@live.com>
     */
    public function index()
    {
        try {
            $clients = Client::all();
        } catch (Exception $exception) {
            report($exception);
        }
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     * @author Gilson Vieira Castro Júnior <+55 (61) 9 9209-6171 / castrok@live.com>
     */
    public function create()
    {
        try {
            $client = new Client();
        } catch (Exception $exception) {
            report($exception);
        }
        return view('clients.create',compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *@author Gilson Vieira Castro Júnior <+55 (61) 9 9209-6171 / castrok@live.com>
     */
    public function store(Request $request)
        /**
         * Alguns campos do endereço estão na view enviada porém não estão na descrição da modelagem do banco de dados.
         * Gostaria de deixar claro que identifiquei a falha nos requisitos porém como não havia nada informando para corrigir
         * isso apenas desconsiderei.
         * Ao consumir os dados eles não serão persistidos e em algumas requisições aparecerão como nulo.
         *
         * Rotineiramente eu criaria uma issue no repositório e aguardaria a proxima sprint para que a issue nela entresse
         * e fosse corrigida.
         *
         * @ignored numero
         * @ignored complemento
         * */
    {
        try {
            Client::create([
                'client_status' => $request->client_status,
                'client_name' => $request->client_name,
                'client_cpf' => $request->client_cpf,
                'client_rg' => $request->client_rg,
                'client_birth_date' => $request->client_birth_date,
                'client_email' => $request->client_email,
                'client_phone' => $request->client_phone,
                'client_cep' => $request->client_cep,
                'client_address' => $request->client_address,
                'client_neighborhood' => $request->client_neighborhood,
                'client_city' => $request->client_city,
                'client_state' => $request->client_uf,
            ]);
        } catch (Exception $exception) {
            report($exception);
            return redirect()->back()->withInput($request->all())->with('error', 'Não foi possivel criar novo cliente');
        }
        return redirect()->route('cliente.index')->with('success', 'Cliente criado com sucesso');
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     * @author Gilson Vieira Castro Júnior <+55 (61) 9 9209-6171 / castrok@live.com>
     */
    public function show($id)
    {
        try {
            $client = Client::find($id);
        } catch (Exception $exception) {
            report($exception);
        }
        return view('clients.show',compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return View
     * @author Gilson Vieira Castro Júnior <+55 (61) 9 9209-6171 / castrok@live.com>
     */
    public function edit($id)
    {
        try {
            $client = Client::find($id);
        } catch (Exception $exception) {
            report($exception);
        }
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     *@author Gilson Vieira Castro Júnior <+55 (61) 9 9209-6171 / castrok@live.com>
     */
    public function update(Request $request, $id)
    {
        try {
            Client::where('client_id', $id)->update([
                'client_status' => $request->client_status,
                'client_name' => $request->client_name,
                'client_cpf' => $request->client_cpf,
                'client_rg' => $request->client_rg,
                'client_birth_date' => $request->client_birth_date,
                'client_email' => $request->client_email,
                'client_phone' => $request->client_phone,
                'client_cep' => $request->client_cep,
                'client_address' => $request->client_address,
                'client_neighborhood' => $request->client_neighborhood,
                'client_city' => $request->client_city,
                'client_state' => $request->client_uf,
            ]);
        } catch (Exception $exception) {
            report($exception);
            return redirect()->back()->withInput($request->all())->with('error', 'Não foi possivel criar novo cliente');
        }
        return redirect()->route('cliente.index')->with('success', 'Dados do cliente alterados com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return JsonResponse
     *@author Gilson Vieira Castro Júnior <+55 (61) 9 9209-6171 / castrok@live.com>
     */
    public function destroy($id) {
        try {
            Client::destroy($id);
        }
        catch (Exception $exception) {
            report($exception);
            return response()->json('error',500);
        }
        return response()->json('success',200);
    }
}

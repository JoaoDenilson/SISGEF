<?php

namespace App\Http\Controllers;

use App\Paciente;
use App\Endereco;

use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paciente = Paciente::all();
        return view('pacientes.listarTudo', ['pacientes'=>$paciente]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pacientes.inserirPaciente");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $endereco = new Endereco();

        $endereco->endereco_rua = $request->input('rua');
        $endereco->endereco_bairro = $request->input('bairro');
        $endereco->endereco_numero = $request->input('numero');
        $endereco->endereco_complemento = $request->input('complemento');

        $endereco->save();

        $paciente = new Paciente();

        $paciente->paciente_nome = $request->input('nome');
        $paciente->paciente_nome_mae = $request->input('nome_mae');
        $paciente->paciente_data_nascimento = $request->input('data_nascimento');
        $paciente->paciente_cartao_sus = $request->input('cartao_sus');
        $paciente->paciente_fone = $request->input('telefone');
        
        $endereco->pacientes()->save($paciente);

        return redirect()->route('pacientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paciente = Paciente::find($id);
        return view('pacientes.mostrarPacientes', ['pacientes'=>$paciente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente = Paciente::find($id);
        return view("pacientes.editarPaciente", ['pacientes'=>$paciente]);
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
        $paciente = Paciente::find($id);

        $paciente->endereco->endereco_rua = $request->input('rua');
        $paciente->endereco->endereco_bairro = $request->input('bairro');
        $paciente->endereco->endereco_numero = $request->input('numero');
        $paciente->endereco->endereco_complemento = $request->input('complemento');

        $paciente->endereco->save();

        $paciente->paciente_nome = $request->input('nome');
        $paciente->paciente_nome_mae = $request->input('nome_mae');
        $paciente->paciente_data_nascimento = $request->input('data_nascimento');
        $paciente->paciente_cartao_sus = $request->input('cartao_sus');
        $paciente->paciente_fone = $request->input('telefone');
        
        $paciente->save();

        return redirect()->route('pacientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paciente = Paciente::find($id);

        $paciente->delete();
        $paciente->endereco->delete();

        return redirect()->route('pacientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Falta implementar a rota corretamente e terminar a busca com Like
     public function search(Request $request)
    {   
        
        $paciente = Paciente::where('paciente_cartao_sus', $request->input('word') )->orWhere('paciente_nome', 'like', '%' . $request->input('word') . '%')->get();

        return view('pacientes.listarTudo', ['pacientes'=>$paciente]);
    }
}

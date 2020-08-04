<?php

namespace App\Http\Controllers;

use App\Consulta;

use App\Consultas_Tipo;
use App\Paciente;
use App\Pacientes_Contactado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultas = Consulta::all();
        $pacientes = Paciente::all();
        $tipos = Consultas_Tipo::all();
        $tentativas = Pacientes_Contactado::all();

        return view('consultas.index')->with(['consultas'=>$consultas,'pacientes'=>$pacientes,'tipos'=>$tipos,'tentativas'=>$tentativas]);
    }

    public function fila($filter)
    {
        $consultas = DB::select(
            "SELECT
                    c.id,
                    c.agendamento_confirmada,
                    c.agendamento_data,
                    c.agendamento_medico,
                    c.observacao,
                    c.prioridade,
                    c.tipo_id,
                    c.tipo_consulta,
                    p.paciente_nome,
                    ct.tipo_nome, 
                    (SELECT Count(*) FROM pacientes_contactados pc WHERE pc .agendamento_id = c.id) as tentativas
                    FROM consultas c
                    JOIN pacientes p ON p.id = c.paciente_id
                    JOIN consultas_tipos ct ON ct.id = c.tipo_id
                    WHERE c.agendamento_data = ? AND c.agendamento_confirmada = 1",[$filter]);

        return view('consultas.fila')->with(['consultas'=>$consultas]);
    }

    public function filafilter(Request $request)
    {
        if(empty($request->date)):
            return redirect()->back()->with(['message' => 'Informe uma data!!!','type' => 'danger']);
        endif;

        return redirect()->route('consultas.fila',['consultas.fila' => $request->date]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->action('ConsultaController@index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function creates($id)
    {
        $paciente = DB::select("SELECT * FROM pacientes WHERE id = ?",[$id]);

        if(!empty($paciente)):
            $tipos = Consultas_Tipo::all();
            return view('consultas.create')->with(['paciente' => $paciente,'tipos' => $tipos]);
        else:
            return redirect()->action('ConsultaController@index');
        endif;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $consulta = [
            'agendamento_medico' => $request->agendamento_medico,
            'agendamento_data' => $request->agendamento_data,
            'tipo_id' => $request->tipo_id,
            'agendamento_confirmada' => 0,
            'paciente_id' => $request->paciente_id,
            'tipo_consulta' => $request->tipo_consulta,
            'prioridade' => $request->prioridade,
            'observacao'=> $request->observacao
        ];
        $obrigatorios = $consulta;
        unset($obrigatorios['observacao'],$obrigatorios['agendamento_confirmada']);
        if(in_array("",$obrigatorios)):
            return redirect()->back()->with(['message' => 'Todos os campos com exceção da "Observação" são obrigatórios!!!','type' => 'danger']);
        endif;

        Consulta::create($consulta);

        return redirect()->action('ConsultaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consulta = DB::select(
            "SELECT
                    c.id,
                    c.agendamento_confirmada,
                    c.agendamento_data,
                    c.agendamento_medico,
                    c.observacao,
                    c.prioridade,
                    c.tipo_id,
                    c.tipo_consulta,
                    p.paciente_nome,
                    ct.tipo_nome, 
                    (SELECT Count(*) FROM pacientes_contactados pc WHERE pc .agendamento_id = c.id) as tentativas
                    FROM consultas c
                    JOIN pacientes p ON p.id = c.paciente_id
                    JOIN consultas_tipos ct ON ct.id = c.tipo_id
                    WHERE c.id = ?",[$id]);

        if(!empty($consulta)):
            return view('consultas.show')->with(['consultas'=>$consulta]);
        else:
            return redirect()->action('ConsultaController@index');
        endif;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consulta = DB::select("SELECT * FROM consultas WHERE id = ?",[$id]);
        if(!empty($consulta)):
            $tipos = Consultas_Tipo::all();
            return view('consultas.edit')->with(['consulta'=>$consulta,'tipos' => $tipos]);
        else:
            return redirect()->action('ConsultaController@index');
        endif;
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
        $obrigatorios = [
            'agendamento_medico' => $request->agendamento_medico,
            'agendamento_data' => $request->agendamento_data,
            'tipo_id' => $request->tipo_id,
            'tipo_consulta' => $request->tipo_consulta,
            'prioridade' => $request->prioridade
        ];

        if(in_array("",$obrigatorios)):
            return redirect()->back()->with(['message' => 'Todos os campos com exceção da "Observação" são obrigatórios!!!','type' => 'danger']);
        endif;

        $consulta = Consulta::find($id);
        $consulta->agendamento_medico = $request->agendamento_medico;
        $consulta->agendamento_data = $request->agendamento_data;
        $consulta->tipo_id = $request->tipo_id;
        $consulta->tipo_consulta = $request->tipo_consulta;
        $consulta->prioridade = $request->prioridade;
        $consulta->observacao = $request->observacao;

        $consulta->save();

        return redirect()->action('ConsultaController@index')->with(['message' => 'Consulta atualizada com sucesso!','type' => 'success']);
    }

    public function comfirm($id)
    {
        $consulta = DB::select("SELECT * FROM consultas WHERE id = ?",[$id]);
        if(!empty($consulta)):
            $consulta = Consulta::find($id);
            $consulta->agendamento_confirmada = 1;
            $consulta->save();

            return redirect()->action('ConsultaController@index')->with(['message' => 'Consulta confirmada com sucesso!','type' => 'success']);
        else:
            return redirect()->action('ConsultaController@index');
        endif;
    }

    public function tentarplus($id)
    {
        $tentativas = DB::select("SELECT * FROM pacientes_contactados WHERE agendamento_id = ?",[$id]);

        if(count($tentativas) >= 3):
            return redirect()->action('ConsultaController@index')->with(['message' => 'Numero máximo de tentativas alcançado!!! [3/3]','type' => 'danger']);
        endif;

        $tentar = [
            'contactado_data' => date("Y-m-d"),
            'agendamento_id' => $id
        ];

        Pacientes_Contactado::create($tentar);

        return redirect()->action('ConsultaController@index');
    }

    public function tentarless($id)
    {
        DB::delete("DELETE FROM pacientes_contactados WHERE agendamento_id = ? LIMIT 1",[$id]);

        return redirect()->action('ConsultaController@index');
    }

    public function descomfirm($id)
    {
        $consulta = DB::select("SELECT * FROM consultas WHERE id = ?",[$id]);
        if(!empty($consulta)):
            $consulta = Consulta::find($id);
            $consulta->agendamento_confirmada = 0;
            $consulta->save();

            return redirect()->action('ConsultaController@index')->with(['message' => 'Consulta confirmada com sucesso!','type' => 'success']);
        else:
            return redirect()->action('ConsultaController@index');
        endif;
    }

    public function search(Request $request)
    {
        $search = "";
        if($request->t != 'nada'):
            $search .= 'tipo_id = "'.$request->t.'" AND ';
        endif;

        if(!empty($request->p)):
            $search .= 'prioridade = "'.$request->p.'" AND ';
        endif;

        if(!empty($request->s)):
            $search .= 'paciente_nome LIKE "%'.$request->s.'%" AND ';
        endif;

        $consultas = DB::select(
            "SELECT
                    c.id,
                    c.agendamento_confirmada,
                    c.agendamento_data,
                    c.agendamento_medico,
                    c.observacao,
                    c.prioridade,
                    c.tipo_id,
                    c.tipo_consulta,
                    p.paciente_nome,
                    ct.tipo_nome, 
                    (SELECT Count(*) FROM pacientes_contactados pc WHERE pc .agendamento_id = c.id) as tentativas
                    FROM consultas c
                    JOIN pacientes p ON p.id = c.paciente_id
                    JOIN consultas_tipos ct ON ct.id = c.tipo_id
                    WHERE {$search} 1=1");


        if(empty($consultas)):
            return redirect()->action('ConsultaController@index')->with(['message' => 'Sem resultados para essa pesquisa!!!','type' => 'warning']);
        endif;

        $tipos = Consultas_Tipo::all();

        return view('consultas.search')->with(['consultas'=>$consultas, 'tipos' => $tipos]);
    }

    public function delete($id)
    {
        $consulta = DB::select("SELECT * FROM consultas WHERE id = ?",[$id]);
        if(!empty($consulta)):
            $mesage = 'Deseja realmente <b>DELETAR</b> essa consulta?
                <form action="'. url("consultas/".$id) . '" method="post" >
                '.csrf_field().'
                '.method_field('DELETE').'
                
                <button type="submit" class="btn btn-danger">Deletar</button>
                <a class="btn btn-primary" href="'.url("consultas").'" >Cancelar</a>
                </form>
            ';
            return redirect()->action('ConsultaController@index')->with(['message' => $mesage,'type' => 'success']);
        else:
            return redirect()->action('ConsultaController@index');
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consulta = DB::select("SELECT * FROM consultas WHERE id = ?",[$id]);

        if(!empty($consulta)):
            DB::delete("DELETE FROM pacientes_contactados WHERE agendamento_id = ?",[$id]);
            DB::delete("DELETE FROM consultas WHERE id = ?",[$id]);
        endif;

        return redirect()->action('ConsultaController@index')->with(['message' => 'Consulta deletada com sucesso!','type' => 'success']);
    }
}

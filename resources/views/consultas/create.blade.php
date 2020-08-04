@extends('master')

@section('content')
    <h1>Formulário de cadastro :: Consultas</h1>

    <?php $paciente = $paciente[0]; ?>

    @if(session()->has('message'))
        <div class="alert alert-{{session()->get('type')}}">
            {{ session()->get('message') }}
        </div>
    @endif

    <form action="<?= url("consultas") ?>" method="post">
        <?= csrf_field(); ?>

        <div class="form-group">
            <label id="tipo_consulta">Tipo de Atendimento</label>
            <select name="tipo_consulta" class="form-control">
                <option value="CONSULTA">Consulta</option>
                <option value="EXAME">Exame</option>
            </select>
        </div>

        <div class="form-group">
            <label id="tipo_id">Tipo</label>
            <select name="tipo_id" class="form-control">
                <?php foreach ($tipos as $t): ?>
                <option value="<?= $t->id ?>"><?= $t->tipo_nome ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label id="prioridade">Prioridade</label>
            <select  name="prioridade" class="form-control">
                <option value="ALTA">Alta</option>
                <option value="MEDIA">Média</option>
                <option value="BAIXA">Baixa</option>
            </select>
        </div>

        <div class="form-group">
            <label id="agendamento_data">Data </label>
            <input type="date" name="agendamento_data" class="form-control">
        </div>

        <div class="form-group">
            <label id="agendamento_medico">Médico</label>
            <input type="text" name="agendamento_medico" class="form-control">
        </div>

        <div class="form-group">
            <label id="observacao">Observações</label>
            <textarea name="observacao" class="form-control"></textarea>
        </div>

            <input type="hidden" name="paciente_id" value="<?= $paciente->id ?>">

        <a class="btn btn-danger" href="<?= url("consultas") ?>" >Cancelar</a>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
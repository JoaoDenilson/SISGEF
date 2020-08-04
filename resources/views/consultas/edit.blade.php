@extends('master')

@section('content')
    <h1>Formulário de Edição :: Consultas</h1>
    <?php $consulta = $consulta[0]; ?>

    @if(session()->has('message'))
        <div class="alert alert-{{session()->get('type')}}">
            {{ session()->get('message') }}
        </div>
    @endif

    <form action="<?= url("consultas/".$consulta->id) ?>" method="post">
        <?= csrf_field(); ?>
        <?= method_field('PUT'); ?>
        <div class="form-group">
            <label id="tipo_consulta">Tipo de Atendimento</label>
            <select name="tipo_consulta" class="form-control">
                <option value="CONSULTA" <?= ($consulta->tipo_consulta == "CONSULTA")?'selected':'' ?>>Consulta</option>
                <option value="EXAME" <?= ($consulta->tipo_consulta == "EXAME")?'selected':'' ?>>Exame</option>
            </select>
        </div>

        <div class="form-group">
            <label id="tipo_id">Tipo</label>
            <select name="tipo_id" class="form-control">
                <?php foreach ($tipos as $t): ?>
                <option value="<?= $t->id ?>"  <?= ($consulta->tipo_id == $t->id)?'selected':'' ?>><?= $t->tipo_nome ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label id="prioridade">Prioridade</label>
            <select  name="prioridade" class="form-control">
                <option value="ALTA" <?= ($consulta->prioridade == "ALTA")?'selected':'' ?>>Alta</option>
                <option value="MEDIA" <?= ($consulta->prioridade == "MEDIA")?'selected':'' ?>>Média</option>
                <option value="BAIXA" <?= ($consulta->prioridade == "BAIXA")?'selected':'' ?>>Baixa</option>
            </select>
        </div>

        <div class="form-group">
            <label id="agendamento_data">Data </label>
            <input type="date" name="agendamento_data" value="<?= $consulta->agendamento_data ?>" class="form-control">
        </div>

        <div class="form-group">
            <label id="agendamento_medico">Médico</label>
            <input type="text" name="agendamento_medico" value="<?= $consulta->agendamento_medico ?>" class="form-control">
        </div>

        <div class="form-group">
            <label id="observacao">Observações</label>
            <textarea name="observacao"  class="form-control"><?= $consulta->observacao ?></textarea>
        </div>

        <a class="btn btn-danger" href="<?= url("consultas") ?>" >Cancelar</a>
        <button type="submit" class="btn btn-success">Atualizar</button>
    </form>
@endsection
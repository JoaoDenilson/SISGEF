<?php $__env->startSection('content'); ?>
    <h1>Pesquisa de Consultas</h1>

    <a class="btn bg-success text-white mx-1" href="<?= url("/consultas") ?>">Voltar</a>
    <?php if(session()->has('message')): ?>
        <div class="alert alert-<?php echo e(session()->get('type')); ?>">
            <?php echo session()->get('message'); ?>

        </div>
    <?php endif; ?>

    <form class="my-3" action="<?= url("consultas/search") ?>" method="post">
        <?= csrf_field(); ?>
        <div class="form-row">
            <div class="col">
                <select class="form-control" name="t">
                    <option value="nada">Tipo</option>
                    <?php foreach ($tipos as $t): ?>
                    <option value="<?= $t->id ?>"><?= $t->tipo_nome ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col p-2 px-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="p" id="inlineRadio1" value="ALTA">
                    <label class="form-check-label" for="inlineRadio1">Alta</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="p" id="inlineRadio2" value="MEDIA">
                    <label class="form-check-label" for="inlineRadio2">Média</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="p" id="inlineRadio3" value="BAIXA">
                    <label class="form-check-label" for="inlineRadio2">Baixa</label>
                </div>
            </div>

            <div class="col-6">
                <input class="form-control" name="s" type="text" placeholder="Ex:joão">
            </div>

            <button type="submit" class="btn btn-success">Filtrar</button>
        </div>
    </form>

    <?php
    if(!empty($consultas)):
        echo '<table class="table table-striped table-hover">';
        echo "<thead class='bg-primary text-white'>";
        echo "<td></td>";
        echo "<td>Nome</td>";
        echo "<td>Tipo</td>";
        echo "<td>Médico</td>";
        echo "<td>Data Agendada</td>";
        echo "<td colspan='2' >Nº de Tentativas</td>";
        echo "<td>Ações</td>";
        echo "</thead>";
        foreach ($consultas as $consulta):
            echo  '<tr>';
            echo '<td><b>'.(($consulta->agendamento_confirmada === 0) ? '<sapn class="text-danger">X</sapn>':'<sapn class="text-success">OK</sapn>').'</b></td>';
            echo '<td>'.$consulta->paciente_nome.'</td>';
            echo '<td>'.$consulta->tipo_nome.'</td>';
            echo '<td>'.$consulta->agendamento_medico.'</td>';
            echo '<td>'.date('d/m/Y',strtotime($consulta->agendamento_data)).'</td>';
            echo '<td><sapn class="p-2">'.$consulta->tentativas.'</sapn></td>';
            echo '<td>';
            echo '<a class="btn bg-success p-1 text-dark" href="'.url("consultas/tentarplus/".$consulta->id).'">+</a>';
            echo '<a class="btn bg-danger  p-1 text-dark" href="'.url("consultas/tentarless/".$consulta->id).'">-</a>';
            echo'</td>';
            echo '<td>';
            if($consulta->agendamento_confirmada == 1):
                echo '<a class="btn bg-danger text-white mx-1" href="'.url("consultas/descomfim/".$consulta->id).'">Cancelar</a>';
            else:
                echo '<a class="btn bg-success text-white mx-1" href="'.url("consultas/comfim/".$consulta->id).'">Confirmar</a>';
            endif;
            echo '<a class="btn btn-info text-white mx-1" href="'.url("consultas/".$consulta->id).'">Ver</a>';
            
            echo '<a class="btn btn-secondary text-white mx-1" href="'.url("consultas/".$consulta->id."/edit").'">Editar</a>';

            echo '<a class="btn btn-dark text-white mx-1" href="'.url("consultas/delete/".$consulta->id).'">Deletar</a>';
            echo'</td>';
            echo  '<tr>';
        endforeach;
        echo '</table>';
    endif;
    ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
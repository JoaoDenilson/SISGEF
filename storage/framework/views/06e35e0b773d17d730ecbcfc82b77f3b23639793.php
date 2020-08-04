<?php $__env->startSection('content'); ?>
    <h1>Fila de Consultas</h1>

    <a href="<?= url("/home")?>">
        <button  title="Editar" type="button" class="btn btn-secondary"> Home 
        </button> 
    </a>
    <a class="btn bg-success text-white mx-1" href="<?= url("/consultas") ?>">Voltar</a>

    <?php if(session()->has('message')): ?>
        <div class="alert alert-<?php echo e(session()->get('type')); ?>">
            <?php echo session()->get('message'); ?>

        </div>
    <?php endif; ?>

    <form class="my-3" action="<?= url("consultas/fila") ?>" method="post">
        <?= csrf_field(); ?>
        <div class="form-row">
            <div class="col-3">
                <input class="form-control" name="date" type="date" value="<?php echo e(Request::segment(3)); ?>" required>
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
        echo "<td>Ações</td>";
        echo "</thead>";
        foreach ($consultas as $consulta):
            echo  '<tr>';
            echo '<td>'.$consulta->tipo_consulta.'</td>';
            echo '<td>'.$consulta->paciente_nome.'</td>';
            echo '<td>'.$consulta->tipo_nome.'</td>';
            echo '<td>'.$consulta->agendamento_medico.'</td>';
            echo '<td>'.date('d/m/Y',strtotime($consulta->agendamento_data)).'</td>';
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
    else:
        echo '<div class="alert alert-info">';
        echo 'Sem consultas agendadas para dia '.date('d/m/Y',strtotime(Request::segment(3)));
        echo '</div>';
    endif;
    ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
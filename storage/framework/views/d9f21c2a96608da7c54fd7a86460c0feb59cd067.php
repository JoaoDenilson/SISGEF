<?php $__env->startSection('content'); ?>
    <?php foreach ($consultas as $consulta); ?>
    <h1>Consultas :: <?= $consulta->paciente_nome ?></h1>
    <a class="btn bg-success text-white mx-1" href="<?= url("/consultas") ?>">Voltar</a>
    <div class="my-3">
        <p><b>NOME:</b> <?= $consulta->paciente_nome ?></p>
        <p><b>TIPO:</b> <?= $consulta->tipo_consulta ?></p>
        <p><b>DATA:</b> <?= date('d/m/Y',strtotime($consulta->agendamento_data)) ?></p>
        <p><b>MÉDICO:</b> <?= $consulta->agendamento_medico ?></p>
        <p><b>PRIORIDADE:</b> <?= $consulta->prioridade ?></p>
        <p><b>TIPO ATENDIMENTO:</b> <?= $consulta->tipo_nome ?></p>
        <p><b>OBSERVAÇÂO:</b> <?= $consulta->observacao ?></p>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
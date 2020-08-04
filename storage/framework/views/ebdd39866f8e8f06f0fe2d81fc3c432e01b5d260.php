<?php $__env->startSection('content'); ?>
  <link rel="stylesheet" href="<?= asset('css/styleCx.css'); ?>">
     
    <table class="table table-striped borda">
    	<tr>
    		<td>nome</td>
    		<td>Mãe</td>
        <td>Data de Nascimento</td>
    		<td>Cartão SUS</td>
            <td>Telefone</td>
    		<td>Rua</td>
            <td>Bairro</td>
            <td>Numero</td>
            <td>Complemento</td>
            <td>Editar </td>
    	</tr>

	    <tr>
	       <td><?php echo e($pacientes->paciente_nome); ?></td>
	       <td><?php echo e($pacientes->paciente_nome_mae); ?></td>
         <?php  
         $data = new DateTime("$pacientes->paciente_data_nascimento");
         $x=$data->format('d/m/Y');
          ?>
         <td><?php echo e($x); ?></td>
	       <td><?php echo e($pacientes->paciente_cartao_sus); ?></td>
        <td><?php echo e($pacientes->paciente_fone); ?></td>
	       <td><?php echo e($pacientes->endereco->endereco_rua); ?></td>
           <td><?php echo e($pacientes->endereco->endereco_bairro); ?></td>
           <td><?php echo e($pacientes->endereco->endereco_numero); ?></td>
           <td><?php echo e($pacientes->endereco->endereco_complemento); ?></td>
           <td><a href="<?php echo e(route('pacientes.edit', $pacientes->id)); ?>">
          <button type="button" class="btn btn-success"> Editar </button> </a></td>
	    </tr>
      
    </table>
    <a href="<?php echo e(route('pacientes.index')); ?>"> <button type="button" class="btn btn-primary"> Voltar </button> </a> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
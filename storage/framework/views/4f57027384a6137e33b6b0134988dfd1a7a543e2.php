<?php $__env->startSection('content'); ?>
  <link rel="stylesheet" href="<?= asset('css/styleCx.css'); ?>">

<script type="text/javascript">
  $(function(){
    $(".delpaciente").submit(function(){
      var teste = confirm("Deseja realmente excluir ?");
      if(!teste){
        return false;
      }
    });

  });
</script>

  <div class="title3">
    <form method="GET" action="<?php echo e(route('pacientes.busca')); ?>">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
      <input class="search" type="search" name="word" placeholder="Ex:João..." style=" width: 500px; height: 38px;"/>
          
    </form>
  </div>
  <div class="title4">
      <h1 > Lista de Pacientes </h1>
  </div>

  <a class=" btn bg-success text-white mx-1 " href="<?= url("/consultas") ?>">Consultas </a>
  
  <a href="<?= url("/home")?>">
    <button  title="Editar" type="button" class="btn btn-secondary"> Home 
    </button> 
  </a>

    <!-- border="1" -->
    <div <div style="overflow: auto; width: 1100px; height: 350px;"> 
      <table  class="table table-striped table-hover">
        <thead class='bg-primary text-white'>
        	<tr>
        		<td>Nome </td>
            <td>N° Cartão do SUS </td>
            <td>Data Nascimento </td>
        	</tr>
        </thead>
      	<?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aux): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      		<tr>
      			<td><a href="<?php echo e(route('pacientes.show', $aux->id)); ?>"> <?php echo e($aux->paciente_nome); ?></a></td>

            <td> <?php echo e($aux->paciente_cartao_sus); ?></td>

            <?php  
            $data = new DateTime("$aux->paciente_data_nascimento");
            $x =$data->format('d/m/Y');
            ?>
            <td><?php echo e($x); ?></td>

            <!-- Agendar -->
            <td class="tds">
             <a href="<?= url("consultas/create/".$aux->id); ?>">
              <button title="Agendar" type="button" class="btn btn-success"> Agendar </button> </a>
            </td>

            <!-- Editar -->
      			<td class="tds">
              
              <a href="<?php echo e(route('pacientes.edit', $aux->id)); ?>">
              <button  title="Editar" type="button" class="btn btn-secondary"> Editar </button> </a>
            </td>

            <!-- Excluir -->
            <td class="tds">
              <form class="delpaciente"  method="POST" action="<?php echo e(route('pacientes.destroy', $aux->id)); ?>">
                  <?php echo e(method_field('DELETE')); ?>

                  <?php echo csrf_field(); ?>
                   <input class="btn btn-danger " type="submit" value="Excluir" title="Excluir"/>
              </form>
            </td>
            
      		</tr>
      	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </table>
    </div>
    <a href="<?php echo e(route('pacientes.create')); ?>"> <button type="button" class="btn btn-primary"> Adicionar </button> </a> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
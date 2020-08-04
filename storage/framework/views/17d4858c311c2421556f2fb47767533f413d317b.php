<?php $__env->startSection('content'); ?>
<link rel="stylesheet" type="text/css" href="<?= asset('css/styleCx.css'); ?>">
  
    <script type="text/javascript" src="<?php echo e(asset('js/jquery.maskedinput.js')); ?>"></script>

    <!--Mascara de input -->
    <script type="text/javascript">
    $(document).ready(function(){
    $("input.data").mask("99/99/9999");
        $("input.cartao").mask("999 9999 9999 9999");
        $("input.fone").mask("(99)99999-9999");
    });
    </script>

  <form method="POST" action="<?php echo e(route('pacientes.store')); ?>">
    <h1 class="forms"> Cadastro Paciente</h1>
    <div class="box_2 p_small">
      Dados Paciente<br/>
      Nome: <br/>
      <input type="text" name="nome"/><br/>
      Nome da Mãe: <br/>
      <input type="text" name="nome_mae"/><br/> 
      Data de Nascimento: <br/>
      <input type="date" name="data_nascimento" /><br/>
      Cartão SUS: <br/>
      <input type="text" name="cartao_sus" class="cartao"/><br/>
      Telefone: <br/>
      <input type="text" name="telefone" class="fone"/><br/><br/>
    </div >

    <div class="box_2 p_small">
      Endereço<br/>
      Rua: <br/>
      <input type="text" name="rua"/><br/>
      Bairro: <br/>
      <input type="text" name="bairro"/><br/>
      Numero: <br/>
      <input type="text" name="numero"/><br/>
      Complemento: <br/>
      <input type="text" name="complemento"/><br/><br/>
      </div >

      <div style="clear: both;"></div>

      <div class="fl_right" style="width: 100%; margin-top: 10px;">
        <input class="btn btn-success" type="submit" value="Salvar" id="botao" style="width: auto;"/>
      <?php echo csrf_field(); ?>

      <a href="<?php echo e(route('pacientes.index')); ?>"> <button type="button" class="btn btn-danger"> Cancelar </button> </a> 

       </div >
    </form>    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
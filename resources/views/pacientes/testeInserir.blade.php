@extends('master')
    <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.maskedinput.js')}}"></script>

    <link rel="stylesheet" href="<?= asset('css/styleCx.css'); ?>">

<!--Mascara de input -->
<script type="text/javascript">
    $(document).ready(function(){
    $("input.data").mask("99/99/9999");
        $("input.cartao").mask("9999999-9");
        $("input.fone").mask("(99)99999-9999");
    });
    </script>
    
@section('content')
  <form method="POST" action="{{route('pacientes.store')}}">
    <div id="cxEsquerda">
      Dados Paciente<br/>
      Nome do Paciente: <br>
     <input type="text" name="nome"/><br/>
      Nome da Mãe: <br>
      <input type="text" name="nome_mae"/><br/> 
      Data de Nascimento: <br>
      <input type="date" name="data_nascimento" /><br/>
      Cartão SUS: <br>
      <input type="text" name="cartao_sus" class="cartao"/><br/>
      Telefone: <br>
      <input type="text" name="telefone" class="fone"/><br/><br/>
    </div >

    <div id="cxDireita">
      Endereço<br/>
      Rua: <br>
      <input type="text" name="rua"/><br/>
      Bairro: <br>
      <input type="text" name="bairro"/><br/>
      Numero: <br>
      <input type="text" name="numero"/><br/>
      Complemento: <br>
      <input type="text" name="complemento"/><br/>
      </div>

      <div id="enviar">
        <input class="btn btn-success" type="submit" value="Salvar"/><br/>
      </div>
      @csrf
      
      <div id="Cancelar">
      <a href="{{route('pacientes.index')}}">  <button type="button" class="btn btn-danger"> Cancelar </button> </a> 
      </div>
    </form>

@endsection

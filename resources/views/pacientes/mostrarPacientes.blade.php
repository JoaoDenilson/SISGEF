@extends('master')
@section('content')
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
	       <td>{{$pacientes->paciente_nome}}</td>
	       <td>{{$pacientes->paciente_nome_mae}}</td>
         <?php  
         $data = new DateTime("$pacientes->paciente_data_nascimento");
         $x=$data->format('d/m/Y');
          ?>
         <td>{{$x}}</td>
	       <td>{{$pacientes->paciente_cartao_sus}}</td>
        <td>{{$pacientes->paciente_fone}}</td>
	       <td>{{$pacientes->endereco->endereco_rua}}</td>
           <td>{{$pacientes->endereco->endereco_bairro}}</td>
           <td>{{$pacientes->endereco->endereco_numero}}</td>
           <td>{{$pacientes->endereco->endereco_complemento}}</td>
           <td><a href="{{route('pacientes.edit', $pacientes->id)}}">
          <button type="button" class="btn btn-success"> Editar </button> </a></td>
	    </tr>
      
    </table>
    <a href="{{route('pacientes.index')}}"> <button type="button" class="btn btn-primary"> Voltar </button> </a> 
@endsection
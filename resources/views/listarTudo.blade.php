@extends('master')

@section('content')
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
    <form method="GET" action="{{route('pacientes.busca')}}">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
      <input class="search" type="search" name="word" placeholder="Ex:João..." style=" width: 500px; height: 38px;"/>
    </form>
  </div>

  <div class="title4">
      <h1 > Lista de Pacientes </h1>
  </div>
    <a class="btn bg-success text-white mx-1" href="<?= url("/consultas") ?>">Pacientes</a>
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
      	@foreach($pacientes as $aux)
      		<tr>
      			<td><a href="{{route('pacientes.show', $aux->id)}}"> {{$aux->paciente_nome}}</a></td>

            <td> {{$aux->paciente_cartao_sus}}</td>

            <?php  
            $data = new DateTime("$aux->paciente_data_nascimento");
            $x =$data->format('d/m/Y');
            ?>
            <td>{{$x}}</td>

            <!-- Agendar -->
            <td class="tds">
             <a href="<?= url("consultas/create/".$aux->id); ?>">
              <button title="Agendar" type="button" class="btn btn-success"> Agendar </button> </a>
            </td>

            <!-- Editar -->
      			<td class="tds">
              
              <a href="{{route('pacientes.edit', $aux->id)}}">
              <button  title="Editar" type="button" class="btn btn-secondary"> Editar </button> </a>
            </td>

            <!-- Excluir -->
            <td class="tds">
              <form class="delpaciente"  method="POST" action="{{route('pacientes.destroy', $aux->id)}}">
                  {{method_field('DELETE')}}
                  @csrf
                   <input class="btn btn-danger " type="submit" value="Excluir" title="Excluir"/>
              </form>
            </td>
            
      		</tr>
      	@endforeach
      </table>
    </div>
    <a href="{{route('pacientes.create')}}"> <button type="button" class="btn btn-primary"> Adicionar </button> </a> 

@endsection
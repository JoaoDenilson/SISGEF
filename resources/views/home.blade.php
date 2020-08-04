@extends('layouts.app')

@section('content')

  <body>
    <div class="probootstrap-loader"></div>

  <section class="probootstrap-slider flexslider">
    <ul class="slides">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center">
              <div class="slides-text probootstrap-animate" data-animate-effect="fadeIn">

                <img id="logo" src="{{ asset('css/home/img/LogoSIGEF.png')}}">

                <a href="{{ route('pacientes.index')}}">Buscar Pacientes</a>
                <a href="{{ route('pacientes.create')}}">Cadastrar Paciente</a>
                <a href="{{ route('consultas.create')}}">Agendar</a>
                <a href="<?=url("/consultas/fila/.date('Y-m-d')")?>">Fila</a>

              </div>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </section>
  <!-- END: slider  -->
  
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 text-center-mobile">
          <h3 class="white">Instituto Federal de Educação, Ciência e Tecnologia do Ceará.</h3>
          <h5 class="light regular light-white">Bacharelado em Sistemas de Informação - 5° Semestre.</h5>
          </div>
      </div>
      <div class="row bottom-footer text-center-mobile">
        <div class="col-sm-8">
          <p>&copy; 2018 Todos os direitos reservados | <a href="https://ifce.edu.br/cedro" title="Ir para página do IFCE">IFCE Campus Cedro</a></p>
        </div>
      </div>
    </div>
  </footer>

  <div class="gototop js-top">
    <a href="#" title="Subir" class="js-gotop"><i class="icon-chevron-thin-up" style="background-color: #006400;"></i></a>
  </div>
</body>
  
  <script src="{{ asset('js/home/scripts.min.js')}}"></script>
  <script src="{{ asset('js/home/main.min.js')}}"></script>
  <script src="{{ asset('js/home/custom.js')}}"></script>


@endsection
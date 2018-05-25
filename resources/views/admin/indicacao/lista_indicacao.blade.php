 @extends('layouts.app')

 @section('content')

 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">
 <style type="text/css">
 tr{

  background: #00000000;
}
</style>
<div class="page-title">
  <div class="title">Indicações</div>
  <div class="sub-title">Listagem das indicações</div>
</div>
<div class="card bg-white">
  <div class="card-header">
    Ajuda
  </div>
  <div class="card-block">
    <div class="row">
      <div class="row"></div>
    </div>
  </div>
</div>
<div class="card bg-white">
  <div class="card-header">
    Indicações
  </div>
  <div class="card-block">
    <table id="tabela" class="table table-striped table-bordered display responsive nowrap" style="width:100%">
      <thead>
        <tr>
          <th data-priority="1">#</th>
          <th data-priority="3">Ementa</th>
          <th>Endereço</th>
          <th>Bairro</th>
          <th>Autor</th>
          <th>Protocolo</th>
          <th>Criado em</th>
          <th data-priority="4">Ultimo despacho</th>
          <th data-priority="2" >Status</th>
        </tr>
      </thead>
      <tbody>
        @forelse($lista_indicacaoes as $indicacao)
        <tr>
         <td>{{$indicacao->id_indicacao}}</td>
         <td>{{$indicacao->titulo_ementa}}</td>
         <td>{{$indicacao->endereco_indicacao}}</td>
         <td>{{$indicacao->bairro_indicacao}}</td>
         <td>{{$indicacao->name}}</td>
         <td>{{$indicacao->numero_protocolo_indicacao}}</td>
        <td>{{date( 'd/m/Y' , strtotime($indicacao->created_at))}}</td>
        <td>{{$indicacao->despacho}}</td>
        <td>
          <div class="btn-group">
            <button type="button" class="btn btn-default" data-toggle="dropdown" style="padding-left: 10px;padding-right: 10px;"><i class="icon-paper-clip"></i>
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li>
                <a href="{{route('ver_indicacao',['id_indicacao'=>$indicacao->id_indicacao,'tipo'=>'1'])}}">Baixar</a>
              </li>
              <li>
                <a href="{{route('ver_indicacao',['id_indicacao'=>$indicacao->id_indicacao,'tipo'=>'2'])}}" target="_blank">Visualizar</a>
              </li>
            </ul>
            <a href="{{route('ver_tramite',['id_indicacao'=>$indicacao->id_indicacao])}}" class="btn btn-default"><i class="icon-pencil"></i></a>
            <a href="{{route('ver_tramite',['id_indicacao'=>$indicacao->id_indicacao])}}" class="btn btn-default"><i class="icon-settings"></i></a>
            <a href="{{route('ver_tramite',['id_indicacao'=>$indicacao->id_indicacao])}}" class="btn btn-default"><i class="icon-trash"></i></a>
          </div>

        </td>
      </tr>
      @empty

      @endforelse
    </tbody>

  </table>
</div>
</div>
@stop

@section('scripts')
<script src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
    $('#tabela').DataTable({
      "language": {
        "lengthMenu": "Mostrar _MENU_ Indicações por Pagina",
        "zeroRecords": "Não há indicações",
        "info": "Mostrando de pagina _PAGE_ a _PAGES_",
        "infoEmpty": "Não há indicações",
        "infoFiltered": "",
        "search":"Pesquisar"
      },

      columnDefs: [
      { responsivePriority: 1, targets: 0 },
      { responsivePriority: 2, targets: -1 }
      ]
    });
  } );
</script>
@stop
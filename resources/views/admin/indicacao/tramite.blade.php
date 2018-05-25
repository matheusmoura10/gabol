 @extends('layouts.app')

 @section('content')
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">

 <style type="text/css">
 @import url('//cdn.datatables.net/1.10.2/css/jquery.dataTables.css');
 td.details-control {
  background: url('http://www.datatables.net/examples/resources/details_open.png') no-repeat center center;
  cursor: pointer;
}
tr.shown td.details-control {
  background: url('http://www.datatables.net/examples/resources/details_close.png') no-repeat center center;
}
#td {
 max-width: 25ch;
 overflow: hidden;
 text-overflow: ellipsis;
 white-space: nowrap;
}
</style>

<div class="page-title">
  <div class="title">Indicações</div>
  <div class="sub-title">Listagem das indicações</div>
</div>
<div class="card bg-white">
  <div class="card-header">
    Indicações
    <div class="card-controls">
      <a href="{{route('lista_indicacao')}}" class="btn btn-success btn-lg mr5">Voltar</a>
    </div>
  </div>
  <div class="card-block">
    <div class="row">
     <table class="table table-hover">
      <tr>
        <td colspan="6"  align="center"><h4><b>Informação sobre a indicação</b></h4></td>
      </tr>
      <tr>
       <td><h5>Indicação Número</h5></td>
       <td><h5>{{$lista_indicacaoes->numero_protocolo_indicacao}}</h5></td>

       <td><h5>Indicação ID</h5></td>
       <td><h5>{{$lista_indicacaoes->id_indicacao}}</h5></td>

       <td><h5>Criado por</h5></td>
       <td><h5>{{$lista_indicacaoes->name}}</h5></td>
     </tr>
     <tr>
       <td><h5>Ementa</h5></td>
       <td colspan="2"><h5>{{$lista_indicacaoes->titulo_ementa}}</h5></td>

       <td><h5>Bairro</h5></td>
       <td  colspan="2"><h5>{{$lista_indicacaoes->bairro_indicacao}}</h5></td>

     </tr>
     <tr>
       <td colspan="6"  align="center"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Nova tramitação</button></td>
     </tr>
   </table>
   <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Novo Tramite</h4>
        </div>
        <div class="modal-body">
          <form action="{{route('salva_tramite')}}" method="post">
            @csrf
            <div class="form-group" id="container1">
              <button class="add_form_field">Adicionar numero de protocolo &nbsp; <span style="font-size:16px; font-weight:bold;">+ </span></button>
            </div>

            <div class="form-group">
              <label for="pwd">Tramite:</label>
              <textarea class="form-control" name="texto_tramite" required></textarea>
            </div>
            <div class="form-group">
              <label>Selectione o Status:</label>
              <select class="form-control" name="despacho" required>
                <option value="">Selecione o despacho</option>
                @forelse($despachos as $despacho)
                <option value="{{$despacho->id_despacho}}">{{$despacho->despacho}}</option>
                @empty

                @endforelse
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <input type="hidden" name="id_indicacao" value="{{$lista_indicacaoes->id_indicacao}}">
            <input type="hidden" name="autor_id" value="{{Auth::user()->id}}">
            <input type="hidden" name="sistema_id" value="{{Auth::user()->id_dominio_users}}">
            <button type="submit" class="btn btn-default">Salvar tramite</button>
          </form>     
        </div>
      </div>

    </div>
  </div>

</div>
</div>
<div class="card-block">

 <table id="example" class="table table-striped table-bordered display responsive nowrap" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th></th>
      <th>Tramite ID</th>
      <th>Indicação ID</th>
      <th>Texto Indicação</th>
      <th>Despacho</th>
      <th>Criado por </th>
      <th>Criado em </th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    @forelse($ver_tramite_indicacao as $tramite)
    <tr data-child-value="{{$tramite->texto_tramite}}">
      <td class="details-control"></td>
      <td>{{$tramite->id_tramite}}</td>
      <td>{{$tramite->id_indicacao_tramite}}</td>
      <td><label id="td">{{$tramite->texto_tramite}}</label></td>
      <td><label id="td">{{$tramite->despacho}}</label></td>
      <td><label id="td">{{$tramite->name}}</label></td>
      <td>{{date( 'd/m/Y H:i:s' , strtotime($tramite->created_at))}}</td>
      <td>
        <a href="{{route('deleta_tramite',
        ['id_tramite'=>$tramite->id_tramite,'id_indicacao'=>$lista_indicacaoes->id_indicacao])}}" class="btn btn-default"><i class="icon-trash"></i></a>
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
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
 function format(value) {
  return '<div class="col-md-12"><b>Tramite :</b><br> ' + value + '</div>';
  
}
$(document).ready(function () {
  var table = $('#example').DataTable({
    "language": {
      "lengthMenu": "Mostrar _MENU_ Tramites por Pagina",
      "zeroRecords": "Não há Tramites",
      "info": "Mostrando de pagina _PAGE_ a _PAGES_",
      "infoEmpty": "Não há Tramites",
      "infoFiltered": "",
      "search":"Pesquisar"
    }
  });

      // Add event listener for opening and closing details
      $('#example').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row(tr);

        if (row.child.isShown()) {
              // This row is already open - close it
              row.child.hide();
              tr.removeClass('shown');
            } else {
              // Open this row
              row.child(format(tr.data('child-value'))).show();
              tr.addClass('shown');
            }
          });
    });

$(document).ready(function() {
  var max_fields      = 1;
  var wrapper         = $("#container1");
  var add_button      = $(".add_form_field");
  
  var x = 0;
  $(add_button).click(function(e){
    e.preventDefault();
    if(x < max_fields){
      x++;
            $(wrapper).append('<div><br><input type="text" class="form-control" name="numero_protocolo_tramite"/><a href="#" class="delete">Agora não</a></div>'); //add input box
          }
          else
          {

          }
        });
  
  $(wrapper).on("click",".delete", function(e){
    e.preventDefault(); $(this).parent('div').remove(); x--;

  })
});
</script>
@stop
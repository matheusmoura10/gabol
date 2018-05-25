@extends('layouts.app')

@section('content')
<style type="text/css">
#map_canvas {
	height: 100%;
}
#box{
	position: absolute;
	z-index: 9999; /* número máximo é 9999 */
}
.mapa_matheus{
	position: relative;
	width: 100%;
	height: 100% !important;
	min-height: 25rem; }
}

</style>

<div class="fill-container">
	<div class="row">
		<div class="world-map page-height-xs">
			<div>
				<div class="input-group m-b">
					<input id="address" type="text" class="form-control br0 input-lg" id="autocomplete" value="" placeholder="Informe o endereço da indicação" value="Rua Manoel Carvalho Guerra Júnior - Jardim das Bandeiras, Campinas - SP, Brasil">
					<span class="input-group-btn">
						<input type="button" class="btn btn-info btn-lg" value="Pesquisar" onclick="codeAddress()">
					</span>
				</div>
			</div>
			<div id="map_canvas" class="mapa_matheus">
			</div>

			<div class="col-md-12" id="box" style="display: none">
				<div class="card bg-white">
					<div class="card-header bg-success text-white">
						<div class="pull-left">Dados do local</div>
						<div class="card-controls"><a href="javascript:;"  class="card-remove" card-control-remove=""><i class="card-icon-remove"></i></a>
						</div>
					</div>
					<div class="card-block">
						<div class="row">
							<div class="col-md-6">
								<div class="table-responsive">
									<form method="post" action="{{route('salva_indicacao')}}"  enctype="multipart/form-data">
										@csrf
										<table class="table table-bordered table-striped m-b-0">
											<thead>
												<tr>
													<th colspan="5">Dados do endereço indicado</th>

												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Qual a ementa da indicação</td>
													<td id="ementa" colspan="4">
														<select class="form-control" name="tipo_texto_indicacao" required="required">
															<option value="">Selecione a ementa desejada</option>
															<option value="1">Em toda extensão da rua/Av</option>
															<option value="2">Com cruzamento</option>
															<option value="3">Com numero</option>
															<option value="4">No bairro</option>
														</select>
													</td>
												</tr>
												<tr id="tr_endereco">
													<td>Endereço</td>
													<td id="endereco" colspan="4"></td>
												</tr>
												<tr id="cruzamento_tr">
													<td>Cruzamento</td>
													<td class="field_wrapper_cruzamento" colspan="4"><div id="texto_cruzamento">Informe se há cruzamento <a href="#" class="add_button_cruzamento">Clique aqui</a></div></td>
												</tr>
												<tr id="numero_tr">
													<td>Numero</td>
													<td id="numero" colspan="2"></td>
													<td class="field_wrapper_numero" colspan="2"><div id="texto_numero">Não é esse numero? <a href="#" class="add_button_numero">Clique aqui</a></div></td>
												</tr>
												<tr>
													<td>Bairro</td>
													<td id="bairro" colspan="4"></td>
												</tr>
												<tr>
													<td>Cidade</td>
													<td id="cidade" colspan="4"></td>
												</tr>
												<tr>
													<td>Qual a ementa da indicação</td>
													<td id="ementa" colspan="4">
														<select class="form-control" name="ementa" required="required">
															<option value="">Selecione a ementa desejada</option>
															@foreach($ementas as $ementa)
															<option value="{{$ementa->id_ementa}}">{{$ementa->titulo_ementa}}</option>
															@endforeach
														</select>
													</td>
												</tr>
												<tr>
													<td colspan="4" class="field_wrapper_justificativa" colspan="2"><div id="texto_justificativa">Há justificativa ? <a href="#" class="add_button_justificativa">Clique aqui</a></div></td>
												</tr>
												<tr>
													<td colspan="4">
														<label class="col-sm-2 control-label">Deseja imagens do local?</label>
														<input type="file" name="images[]"  multiple="multiple" accept="image/jpg, image/jpeg" id="image"><p class="help-block">Somente .JPG.</p>
													</td>
												</tr>

											</tbody>
										</table>
										<input type="hidden" name="endereco" id="endereco_text" value="">
										<input type="hidden" name="numero" id="numero_text" value="">
										<input type="hidden" name="bairro" id="bairro_text" value="">
										<input type="hidden" name="cidade" id="cidade_text" value="">
										<input type="hidden" name="latlon" id="latlon" value="">
										<input type="hidden" name="autor_id" value="{{Auth::user()->id}}">
										<input type="hidden" name="sistema_id" value="{{Auth::user()->id_dominio_users}}">

									</div>
								</div>
								<div class="col-md-6">
									<div id="pano" style="height:300px"></div>
									<div class="col-md-12">
										<div class="btn-group">
											<input type="submit" class="btn btn-success" value="Criar indicação">
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="col-md-12" id="box_manual">
				<div class="card bg-white">
					<div class="card-header bg-success text-white">
						<div class="pull-left">Dados do local</div>
						<div class="card-controls"><a href="javascript:;"  class="card-remove" card-control-remove=""></a>
						</div>
					</div>
					<div class="card-block">
						<div class="scrollable" style="height: 230px;">
							<div class="row" style="margin-left: 1%">
								<p><h3>Bem vindo ao sistem de indicação georeferenciado</h3></p>

								<p>Utilile o menu superior conforme imagem a abaixo para escrever o endereço desejado, e clique em pesquisar</p>
								<img src="http://via.placeholder.com/350x150"/>									
								<p>Após solte o curso no local desejado</p>
								<img src="http://via.placeholder.com/350x150"/>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

</div>

@stop

@section('scripts')
<script src="http://maps.google.com/maps/api/js?key=AIzaSyByVAWQyPssGHcmuCTQypAfibVgDDszi4c&sensor=true&libraries=places"></script>
<script src="{{ asset('vendor/gmaps/gmaps.js')}}"></script>
<script src="{{ asset('scripts_proprios/maps.js')}}"></script>
<script src="{{ asset('scripts/helpers/smartresize.js')}}"></script>
<script type="text/javascript">
    $("#image").on("change", function() {
         if($("#image")[0].files.length > 3) {
                   alert("Você pode selecionar até 3 imagens");
                   document.getElementById("image").value = "";
         } else {
               
         }
    });
	$(document).ready(function(){

    var maxField_cruzamento = 1; //Input fields increment limitation
    var addButton_cruzamento = $('.add_button_cruzamento'); //Add button selector
    var wrapper_cruzamento = $('.field_wrapper_cruzamento'); //Input field wrapper
    var fieldHTML_cruzamento = '<div><input type="text" class="form-control" name="cruzamento" value=""/><a href="javascript:void(0);" required="required" class="remove_button_cruzamento" title="Remove field"> Remover</a></div>'; //New input field html 
    var x_cruzamento = 0; //Initial field counter is 1
    $(addButton_cruzamento).click(function(){ //Once add button is clicked
        if(x_cruzamento < maxField_cruzamento){ //Check maximum number of input fields
            x_cruzamento++; //Increment field counter
            
            $('#texto_cruzamento').hide();
            $('#numero_tr').hide();
            $(wrapper_cruzamento).append(fieldHTML_cruzamento); // Add field html
        }
    });
    $(wrapper_cruzamento).on('click', '.remove_button_cruzamento', function(e){ //Once remove button is clicked
    	e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x_cruzamento--; //Decrement field counter
        $('#texto_cruzamento').show();
        $('#numero_tr').show();
    });
    ///////////////////////////////////////////////////////////////
    var maxField_numero = 1; //Input fields increment limitation
    var addButton_numero = $('.add_button_numero'); //Add button selector
    var wrapper_numero = $('.field_wrapper_numero'); //Input field wrapper
    var fieldHTML_numero = '<div><input type="text" class="form-control" name="numero_alternativo" value=""/><a href="javascript:void(0);" required="required" class="remove_button_numero" title="Remove field"> Remover</a></div>'; //New input field html 
    var x_numero = 0; //Initial field counter is 1
    $(addButton_numero).click(function(){ //Once add button is clicked
        if(x_numero < maxField_numero){ //Check maximum number of input fields
            x_numero++; //Increment field counter
            
            $('#texto_numero').hide();
            $(wrapper_numero).append(fieldHTML_numero); // Add field html
        }
    });
    $(wrapper_numero).on('click', '.remove_button_numero', function(e){ //Once remove button is clicked
    	e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x_numero--; //Decrement field counter
        $('#texto_numero').show();
    });
     ///////////////////////////////////////////////////////////////
    var maxField_justificativa = 1; //Input fields increment limitation
    var addButton_justificativa = $('.add_button_justificativa'); //Add button selector
    var wrapper_justificativa = $('.field_wrapper_justificativa'); //Input field wrapper
    var fieldHTML_justificativa = '<div><textarea class="form-control" name="justificativa" rows="4" cols="50"></textarea><a href="javascript:void(0);" required="required" class="remove_button_justificativa" title="Remove field"> Remover</a></div>'; //New input field html 
    var x_justificativa = 0; //Initial field counter is 1
    $(addButton_justificativa).click(function(){ //Once add button is clicked
        if(x_justificativa < maxField_justificativa){ //Check maximum number of input fields
            x_justificativa++; //Increment field counter
            
            $('#texto_justificativa').hide();
            $(wrapper_justificativa).append(fieldHTML_justificativa); // Add field html
        }
    });
    $(wrapper_justificativa).on('click', '.remove_button_justificativa', function(e){ //Once remove button is clicked
    	e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x_justificativa--; //Decrement field counter
        $('#texto_justificativa').show();
    });
});
</script>
@stop
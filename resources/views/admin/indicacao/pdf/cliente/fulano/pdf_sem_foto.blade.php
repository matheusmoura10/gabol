<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <title>Indicação</title>
  <style type="text/css">
  .page {
    overflow: hidden;
    page-break-after: always;
  }
</style>
</head>
<body>
  <div class="page">
    <div class="row" style="padding-top: 70px">
      <div class="col-xs-12">
        <center>
          <h4>INDICAÇÃO Nº_______________de 2018</h4>
        </center>
      </div>
    </div>
    <div class="row" style="padding-top: 70px;text-transform: uppercase;">
      <div class="col-xs-1">
      </div>
      <div class="col-xs-2">
        <h4>Ementa:</h4>
      </div>
      <div class="col-xs-8">
        <h4>Promover em caráter de urgência a {!!$lista_indicacaoes->titulo_ementa!!} no bairro {{$lista_indicacaoes->bairro_indicacao}}</h4>
      </div>
      <div class="col-xs-1">
      </div>
    </div>
    <div class="row" style="padding-top: 100px">
      <div class="col-xs-1">
      </div>
      <div class="col-xs-10">
        @if($lista_indicacaoes->texto_indicacao == 1)
        <p class="text-justify lead" style="font-size:large">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Excelentíssimo 
          Senhor Prefeito do Município de Campinas, Jonas Donizette, indico com urgência, para que determine ao setor competente,
          a <b style="text-transform: uppercase;">{!!$lista_indicacaoes->titulo_ementa!!}</b>,em toda extensão da  {{$lista_indicacaoes->endereco_indicacao}}, no bairro {{$lista_indicacaoes->bairro_indicacao}}
        </p>
        @elseif($lista_indicacaoes->texto_indicacao == 2)
        <p class="text-justify lead" style="font-size:large">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Excelentíssimo 
          Senhor Prefeito do Município de Campinas, Jonas Donizette, indico com urgência, para que determine ao setor competente,
          a <b style="text-transform: uppercase;">{!!$lista_indicacaoes->titulo_ementa!!}</b>,localiza na   {{$lista_indicacaoes->endereco_indicacao}}, no entroncamento da {{$lista_indicacaoes->cruzamento_indicacao}} no bairro {{$lista_indicacaoes->bairro_indicacao}}
        </p>

        @elseif($lista_indicacaoes->texto_indicacao == 3)
        <p class="text-justify lead" style="font-size:large">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Excelentíssimo 
          Senhor Prefeito do Município de Campinas, Jonas Donizette, indico com urgência, para que determine ao setor competente,
          a <b style="text-transform: uppercase;">{!!$lista_indicacaoes->titulo_ementa!!}</b>, no endereço   {{$lista_indicacaoes->endereco_indicacao}}, na altura do numero 
          @if($lista_indicacaoes->numero_alternativo_indicacao != "")
          {{$lista_indicacaoes->numero_alternativo_indicacao}}
          @else
          {{$lista_indicacaoes->numero_indicacao}}
          @endif
          , no bairro {{$lista_indicacaoes->bairro_indicacao}}.
        </p>
        @elseif($lista_indicacaoes->texto_indicacao == 4)
        <p class="text-justify lead" style="font-size:large">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Excelentíssimo 
          Senhor Prefeito do Município de Campinas, Jonas Donizette, indico com urgência, para que determine ao setor competente,
          a <b style="text-transform: uppercase;">{!!$lista_indicacaoes->titulo_ementa!!}</b>, no bairro {{$lista_indicacaoes->bairro_indicacao}}</p>

          @endif
        </div>
        <div class="col-xs-1">
        </div>
      </div>
      <div class="row" style="padding-top: 30px">
        <div class="col-xs-1">
        </div>
        <div class="col-xs-10">
         <p class="text-justify lead" style="font-size:large">
           @if($lista_indicacaoes->justificativa_indicacao != "")
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$lista_indicacaoes->justificativa_indicacao}}
           @endif
         </p>
       </div>
       <div class="col-xs-1">
       </div>
     </div>
     @if($lista_indicacaoes->img_indicacao !="")
          <div class="row" style="padding-top: 30px">
      <div class="col-xs-1">
      </div>
      <div class="col-xs-10">
       <p class="text-left lead" style="font-size:large">
        Segue fotos em anexo.
      </p>
    </div>
    <div class="col-xs-1">
    </div>
  </div>
  @endif
     <div class="row" style="padding-top: 30px">
      <div class="col-xs-1">
      </div>
      <div class="col-xs-10">
       <p class="text-justify lead" style="font-size:large">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Desta forma, espero que seja acatada a presente indicação e o serviço realizado
      </p>
    </div>
    <div class="col-xs-1">
    </div>
  </div>
  <div class="row" style="padding-top: 30px">
    <div class="col-xs-6">
    </div>
    <div class="col-xs-6">
     <p class="text-left lead" style="font-size:large">
      @php
      setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
      date_default_timezone_set('America/Sao_Paulo');
      echo "Sala de reuniões ".strftime('%A, %d de %B de %Y', strtotime($lista_indicacaoes->created_at));
      @endphp
    </p>
  </div>
</div>
<div class="row" style="padding-top: 70px">
  <div class="col-xs-12">
    <center>
      <h4>______________________________</h4><br>
      <h4><b>{{$dados->nome_vereador_assinatura}}</b></h4>
    </center>
  </div>
</div>
</div>
@if($lista_indicacaoes->img_indicacao !="")
<div class="page">
  <div class="row" style="padding-top: 70px">
      <div class="col-xs-12">
        <center>
          <h2>Fotos do local</h2>
        </center>
      </div>
    </div>
  @php 
    $fotos = array();
    $fotos = explode("|",$lista_indicacaoes->img_indicacao);

   
  @endphp
@foreach($fotos as $pics)
 <div class="row" style="padding-top: 10px;">
      <div class="col-xs-2">
      </div>
       <div class="col-xs-8">
        <center>
        <img src="{!! asset('image/'.$pics) !!}" style="max-height: 300px; width: 600px">
      </center>
      </div>
     
      <div class="col-xs-2">
      </div>
    </div>

@endforeach
@endif
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
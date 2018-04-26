<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>
<body>
  <div class="row" style="padding-top: 50px">
    <div class="col-xs-2">
      <img src="{{$dados->logo_pdf}}" style="max-height: 120px">
    </div>
    <div class="col-xs-10">
      <center>
        <h1><b>CÂMARA MUNICIPAL DE CAMPINAS</b></h1>
        <h5>Estado de São Paulo</h5>
        <small>www.campinas.sp.leg.br</small>
      </center>
    </div>
  </div>
  <div class="row" style="padding-top: 70px">
      <div class="col-xs-12">
        <center>
        <h4>INDICAÇÃO Nº_______________de 2018</h4>
         </center>
      </div>
  </div>
  <div class="row" style="padding-top: 70px;text-transform: uppercase;">
    <div class="col-xs-2">
      <h3>Ementa:</h3>
    </div>
    <div class="col-xs-10">
      <h3>Promover em caráter de urgência a {!!$indicacao->ementa_indicacao!!} no bairro {{$indicacao->bairro}}</h3>
    </div>
  </div>
  <div class="row" style="padding-top: 100px">
    <div class="col-xs-2">
      <h3>Ementa:</h3>
    </div>
    <div class="col-xs-10">
      <p class="text-justify lead">Excelentíssimo Senhor Prefeito do Município de Campinas, Jonas Donizette, indico com urgência, para que determine ao setor competente, a <b style="text-transform: uppercase;">{{$indicacao->ementa_indicacao}}</b></p>
    </div>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
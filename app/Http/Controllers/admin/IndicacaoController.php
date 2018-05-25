<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Alert;
use Redirect;
use PDF;
use Response;
use DB;

use App\User;
use App\indicacao;
use App\ementa;
use App\models\config_aplicacao;
use App\models\tramite;



class IndicacaoController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index_indicacao()
	{

		$ementas = Auth::user()->lista_ementa_disponivel;
		return view('admin.indicacao.mapa')
		->with('ementas',$ementas);
	}

	public function store_indicacao(request $request){

		//dd($request);

		if($request->cruzamento){

			$rules = array(
				'ementa'       				=> 'required',
				'endereco'      			=> 'required',
				'cruzamento' 				=> 'required',
				'bairro' 					=> 'required',
				'cidade' 					=> 'required',
				'latlon' 					=> 'required',
				'autor_id' 					=> 'required',
				'sistema_id' 				=> 'required',
				'tipo_texto_indicacao'		=> 'required',
			);

		}else{


			$rules = array(
				'ementa'       				=> 'required',
				'endereco'      			=> 'required',
				'numero' 					=> 'required',
				'bairro' 					=> 'required',
				'cidade' 					=> 'required',
				'latlon' 					=> 'required',
				'autor_id' 					=> 'required',
				'sistema_id' 				=> 'required',
				'tipo_texto_indicacao'		=> 'required',
			);

		}

		if($request->cruzamento){

			$campos = array(
				'ementa' 				=> $request->ementa,
				'endereco'				=> $request->endereco,
				'cruzamento'			=> $request->cruzamento,
				'bairro'				=> $request->bairro,
				'cidade'				=> $request->cidade,
				'latlon'				=> $request->latlon,
				'justificativa'			=> $request->justificativa,
				'autor_id'				=> $request->autor_id,
				'sistema_id'			=> $request->sistema_id,
				'tipo_texto_indicacao'	=> $request->tipo_texto_indicacao,
			);

		}else{
			$campos = array(
				'ementa' 				=> $request->ementa,
				'endereco'				=> $request->endereco,
				'numero'				=> $request->numero,
				'numero_alternativo'	=> $request->numero_alternativo,
				'bairro'				=> $request->bairro,
				'cidade'				=> $request->cidade,
				'latlon'				=> $request->latlon,
				'justificativa'			=> $request->justificativa,
				'autor_id'				=> $request->autor_id,
				'sistema_id'			=> $request->sistema_id,
				'tipo_texto_indicacao'	=> $request->tipo_texto_indicacao,
			);
		}


		$validator = \Validator::make($campos, $rules);

        // process the login
		if ($validator->fails()) {

			Alert::error('Erro =/', 'Houve algum erro nos dados digitados')->autoclose(3000);
			return Redirect::route('mapa_visualiza')
			->withErrors($validator);
		} else {
			$dados = Auth::user()->retorna_dados_configuracao;
			if($files=$request->file('images')){
				$images=array();
				foreach($files as $file){
					$name=$dados->id_plicacao."_".date('ymdhis').$file->getClientOriginalName();
					$file->move('image',$name);
					$images[]=$name;
				}
			}



			$explode_latlon_1 = str_replace("(","", $request->latlon);
			$explode_latlon_2 = str_replace(")","", $explode_latlon_1);
			$explode_latlon_3 = explode(",",$explode_latlon_2);

			$indicacao = new indicacao;
			$indicacao->id_sistema_indicacao       		= $dados->id_plicacao;
			$indicacao->id_autor_indicacao      		= $request->autor_id;
			$indicacao->ementa_indicacao 				= $request->ementa;
			$indicacao->endereco_indicacao				= $request->endereco;
			$indicacao->numero_indicacao				= $request->numero;
			$indicacao->numero_alternativo_indicacao 	= $request->numero_alternativo;
			$indicacao->cruzamento_indicacao			= $request->cruzamento;
			$indicacao->bairro_indicacao				= $request->bairro;
			$indicacao->cidade_indicacao				= $request->cidade;
			$indicacao->latitude_indicacao				= $explode_latlon_3[0];
			$indicacao->longitude_indicacao				= $explode_latlon_3[1];
			$indicacao->texto_indicacao					= $request->tipo_texto_indicacao;
			$indicacao->justificativa_indicacao			= $request->justificativa;
			if($files=$request->file('images')){
				$indicacao->img_indicacao					=  implode("|",$images);
			}
			$indicacao->save();

			Alert::success('Suceso','Aguarde... processando sua indicação')->autoclose(3000);

			return redirect::route('lista_indicacao');

		}
	}

	public function index_lista_indicacao()
	{
		$dados = Auth::user()->retorna_dados_configuracao->id_aplicacao;

		$lista_indicacaoes = DB::table('indicacaos')
		->join('ementas','indicacaos.ementa_indicacao','=','ementas.id_ementa')
		->join('users','indicacaos.id_autor_indicacao','=','users.id')
		->leftJoin(\DB::raw('(SELECT * FROM tramites A WHERE id_tramite = (SELECT MAX(id_tramite) FROM tramites B WHERE A.id_indicacao_tramite=B.id_indicacao_tramite)) AS tramites'), function($join) {
			$join->on('indicacaos.id_indicacao', '=', 'tramites.id_indicacao_tramite');
		})
		->leftJoin('despacho_status','tramites.status_tramite','=','despacho_status.id_despacho')
		->where('users.id_dominio_users', '=', $dados)
		->where('indicacaos.id_sistema_indicacao', '=', $dados)
		->get();

		//dd($lista_indicacaoes);
		return view('admin.indicacao.lista_indicacao')
		->with('lista_indicacaoes',$lista_indicacaoes);
	}

	public function ver_indicacao($id_indicacao,$tipo)
	{


		$dados = Auth::user()->retorna_dados_configuracao;

		$lista_indicacaoes = DB::table('indicacaos')
		->join('ementas','indicacaos.ementa_indicacao','=','ementas.id_ementa')
		->join('users','indicacaos.id_autor_indicacao','=','users.id')
		->join('config_aplicacao','indicacaos.id_sistema_indicacao','=','config_aplicacao.id_aplicacao')
		->where('indicacaos.id_indicacao', '=', $id_indicacao)
		->where('users.id_dominio_users', '=', $dados->id_aplicacao)
		->first();

		if(empty($lista_indicacaoes)){
			return redirect::route('lista_indicacao');
		}

		$footer = \View::make($dados->footer)->render();
		$header = \View::make($dados->header,compact('dados'))->render();

		$pdf = PDF::loadView($dados->doc_pdf_com_sem_foto, compact('lista_indicacaoes','dados'))
		->setOption('margin-top', '40mm')
		->setOption('margin-bottom', '10mm')
		->setOption('footer-html',$footer)
		->setOption('header-html',$header);

		$indicacao_nome = $lista_indicacaoes->titulo_ementa."-".$lista_indicacaoes->bairro_indicacao."-".date('d-m-Y-H:i:s').$dados->titulo_site_interno;

		if($tipo == 1){
			return Response($pdf->output(), 200, array(
				'Location' =>'http://gabol.test/inicio',
				'Content-Type' => 'application/pdf',
				'Content-Disposition' => 'attachment; filename="'.$indicacao_nome.'.pdf"',
			));
			
		}else{
			return $pdf->stream($indicacao_nome.".pdf");
		}

	}

	public function tramite_index($id_indicacao)
	{
		$dados 		= Auth::user()->retorna_dados_configuracao;
		$despachos 	= Auth::user()->lista_despacho;

		//dd($despachos);

		$lista_indicacaoes = DB::table('indicacaos')
		->join('ementas','indicacaos.ementa_indicacao','=','ementas.id_ementa')
		->join('users','indicacaos.id_autor_indicacao','=','users.id')
		->join('config_aplicacao','indicacaos.id_sistema_indicacao','=','config_aplicacao.id_aplicacao')
		->where('indicacaos.id_indicacao', '=', $id_indicacao)
		->where('users.id_dominio_users', '=', $dados->id_aplicacao)
		->first();

		$ver_tramite_indicacao = DB::table('tramites')
		->join('users','tramites.autor_tramite','=','users.id')
		->leftJoin('despacho_status','tramites.status_tramite','=','despacho_status.id_despacho')
		->where('id_indicacao_tramite', '=', $id_indicacao)
		->orderBy('id_tramite', 'desc')
		->get();

		if(empty($lista_indicacaoes)){
			return redirect::route('lista_indicacao');
		}

		return view('admin.indicacao.tramite',compact('ver_tramite_indicacao','lista_indicacaoes','despachos'));
	}

	public function store_tramite(request $request)
	{
		if($request->numero_protocolo_tramite){

			$rules = array(
				'numero_protocolo_tramite'	=> 'required',
				'texto_tramite'       		=> 'required',
				'despacho'      			=> 'required',
				'autor_id' 					=> 'required',
				'sistema_id' 				=> 'required',
				'id_indicacao' 				=> 'required',
			);	

			$campos = array(
				'numero_protocolo_tramite'	=> $request->numero_protocolo_tramite,
				'texto_tramite' 			=> $request->texto_tramite,
				'despacho'					=> $request->despacho,
				'autor_id'					=> $request->autor_id,
				'sistema_id'				=> $request->sistema_id,
				'id_indicacao'				=> $request->id_indicacao,
			);

		}else{
			$rules = array(
				'texto_tramite'       	=> 'required',
				'despacho'      		=> 'required',
				'autor_id' 				=> 'required',
				'sistema_id' 			=> 'required',
				'id_indicacao' 			=> 'required',
			);	

			$campos = array(
				'texto_tramite' 		=> $request->texto_tramite,
				'despacho'				=> $request->despacho,
				'autor_id'				=> $request->autor_id,
				'sistema_id'			=> $request->sistema_id,
				'id_indicacao'			=> $request->id_indicacao,
			);
		}

		$validator = \Validator::make($campos, $rules);

        // process the login
		if ($validator->fails()) {
			dd($validator);
			Alert::error('Erro =/', 'Houve algum erro nos dados digitados')->autoclose(3000);
			return Redirect::route('ver_tramite', $request->id_indicacao)
			->withErrors($validator);
		} else {

			$dados = Auth::user()->retorna_dados_configuracao->id_aplicacao;

			if($request->numero_protocolo_tramite){

				$tramite = new tramite;
				$tramite->id_indicacao_tramite		= $request->id_indicacao;
				$tramite->id_sistema_tramite		= $dados;
				$tramite->autor_tramite				= $request->autor_id;
				$tramite->texto_tramite				= $request->texto_tramite;
				$tramite->status_tramite			= $request->despacho;
				$tramite->save();

				$indicacao = indicacao::findOrFail($request->id_indicacao);
				$indicacao->numero_protocolo_indicacao = $request->numero_protocolo_tramite;
				$indicacao->save();
			}else{
				$tramite = new tramite;
				$tramite->id_indicacao_tramite		= $request->id_indicacao;
				$tramite->id_sistema_tramite		= $dados;
				$tramite->autor_tramite				= $request->autor_id;
				$tramite->texto_tramite				= $request->texto_tramite;
				$tramite->status_tramite			= $request->despacho;
				$tramite->save();
			}

			Alert::success('Sucesso', 'Tramite realizado com sucesso')->autoclose(3000);
			return Redirect::route('lista_indicacao');

		}


	}
	public function deleta_tramite($id_tramite,$indicacao)
	{
		$dados = Auth::user()->retorna_dados_configuracao->id_aplicacao;

		$deleta_tramite = tramite::where('id_tramite', $id_tramite)->where('id_sistema_tramite',$dados)->delete();

		//dd($deleta_tramite);

		if($deleta_tramite){

			Alert::success('Sucesso', 'Tramite deletado com sucesso')->autoclose(3000);
			return Redirect::route('ver_tramite', $indicacao);

		}else{

			Alert::error('Erro =/', 'Abra um ticket informando a respeito')->autoclose(3000);
			return Redirect::route('ver_tramite', $indicacao);
		}


	}
}

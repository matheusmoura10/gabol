<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Alert;
use Redirect;
use PDF;

use App\User;
use App\indicacao;



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
			);
		}


		$validator = \Validator::make($campos, $rules);

        // process the login
		if ($validator->fails()) {

			Alert::error('Erro =/', 'Houve algum erro nos dados digitados')->autoclose(3000);
			return Redirect::route('mapa_visualiza')
			->withErrors($validator);
		} else {
            // store

			$explode_latlon_1 = str_replace("(","", $request->latlon);
			$explode_latlon_2 = str_replace(")","", $explode_latlon_1);
			$explode_latlon_3 = explode(",",$explode_latlon_2);

			$indicacao = new indicacao;
			$indicacao->id_sistema_indicacao       		= $request->sistema_id;
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
			$indicacao->save();

			//dd($indicacao);

			//$indicacao_new = $indicacao->id_indicacao;

			//dd($indicacao_new);

            // redirect
			Alert::success('Suceso','Aguarde... processando sua indicação, após processada será feito o download')->autoclose(3000);

			$dados = Auth::user()->retorna_dados_configuracao;

			$pdf = PDF::loadView($dados->doc_pdf_com_sem_foto, compact('indicacao','dados'));
			return $pdf->download('invoice.pdf');

			return redirect::route('home');
		}



	}
}

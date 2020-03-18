<?php

namespace App\Http\Controllers;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth')->except('condTerminos');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index() {
		return view('home');
	}

	public function condTerminos() {

		return view('modals/home/condTerminos');
	}
	public function aviso() {

		return redirect('home/aviso');
	}
	public function contactoIndex() {

		return redirect('usuarios/contacto_dash');
	}

}

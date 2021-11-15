<?php

namespace App\Http\Controllers\Historial;

use App\HistorialQuotation;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserAccess\UserAccessController;
use App\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistorialQuotationController extends Controller
{
    public $userAccess;
    public $modulo = 'Cotizacion';

 
    public function __construct(){

       $this->middleware('auth');
       $this->userAccess = new UserAccessController();
   }

   public function index()
   {
        
        if($this->userAccess->validate_user_access($this->modulo)){
            $historials = HistorialQuotation::on(Auth::user()->database_name)->get();

            return view('admin.quotations.index',compact('historials'));
        }else{
            return redirect('/home')->withDanger('No tiene Acceso al modulo de '.$this->modulo);
        }

      
   }
}

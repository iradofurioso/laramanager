<?php
/**
 * This controller handles customer entity and provides the 
 * necessary features to manage it.
 * 
 * @author Carlos Eduardo da Silva <carlosedasilva@gmail.com>
 * @package Controllers
 */

namespace LaraManager\Http\Controllers\Customer;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use LaraManager\Http\Controllers\Controller;
use LaraManager\Model\TbCustomer;
use Auth;

class CustomerController extends Controller
{
    /**
     * Module home screen. 
     * 
     * @return View
     */
    public function index()
    {       
        $data['clientes'] = TbCustomer::all();
        
        return view('modules.Customer.list')->with($data);
    }

    /**
     * Formulário para adicionar novo cliente.
     * 
     * @return View
     */
    public function add()
    {
        return view('modules.Customer.add');
    }

    /**
     * Edita um cliente existe.
     * 
     * @param $id (int) O identificador do cliente. 
     * @return View
     */
    public function edit($id)
    {
        $data['id']         = $id;
        $data['cliente']    = TbCustomer::find($id);
        
        return view('modules.Customer.edit')->with($data);
    }

    /**
     * Salva um usuário tanto para o insert quanto para o update
     * 
     * @param $request (Request) O http request. 
     * @param id (int) O identificador do cliente. 
     * @return View
     */
    public function save(Request $request, $id = null)
    {
        if($request->hasFile("foto")) { 
            $file           = request()->file('foto');
            $rawFileName    =  time() .'_'. $file->getClientOriginalName();
            $fileName       = strtolower(str_slug(pathinfo($rawFileName, PATHINFO_FILENAME), "-"));
            $fileName      .= '.' . strtolower(pathinfo($rawFileName, PATHINFO_EXTENSION));
            $cliFoto        = $file->storeAs('clientes', $fileName, 'laraManagerFiles');
        } else {
            $fileName = $request->foto;
        }
        
        $cli                = TbCustomer::findOrNew($id);
        $cli->name          = $request->nome;
        $cli->email         = $request->email;
        $cli->phone         = $request->telefone;
        $cli->photo         = $fileName;
        $cli->status        = $request->status;
        $cli->fk_id_user    = Auth::id();
        
        $cli->save();
        
        $success['savedstatus']	= '1';
        $success['message']		= 'Dados salvos com sucesso!';
        $success['nome'] 		= $request->nome;
        $success['email'] 		= $request->email;
        $success['telefone'] 	= $request->telefone;
        $success['foto']        = $fileName;
        $success['id'] 			= $cli->id;
        return $success;
    }

    /**
     * Apaga um cliente 
     * 
     * @param $request (Request) O http request. 
     * @param id (int) O identificador do cliente. 
     * @return View
     */
    public function delete(Request $request, $id)
    {
        if( $request->isMethod('post') ) {

            $cli = TbCustomer::find($id);

            if(!$cli) {
                $error['savedstatus']	= '0';
                $error['message']		= 'O cliente não existe!';
                $error['id'] 			= $id;

                return $error;
            } else {
                $cli->delete();

                $success['savedstatus']	= '1';
                $success['message']		= 'O cliente foi removido com sucesso!';
                $success['id'] 			= $id;
                return $success;
            }

        } elseif( $request->isMethod('get') ) {
            $data['id']         = $id;
            $data['cliente']    = TbCustomer::find($id);
            
            return view('modules.Customer.delete')->with($data);
        }
    }
}

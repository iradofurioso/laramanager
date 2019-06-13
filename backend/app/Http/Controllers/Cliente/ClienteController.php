<?php
/**
 * Controller do cliente.
 * 
 * @author: Carlos Eduardo da Silva <carlosedasilva@gmail.com>
 * @package: Controllers
 */

namespace LaraManager\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use LaraManager\Http\Controllers\Controller;
use LaraManager\Model\TbCliente;

class ClienteController extends Controller
{
    /**
     * Página inicial do módulo. 
     * 
     * @return View
     */
    public function index()
    {
        $data['clientes'] = TbCliente::all();
        
        return view('modules.Cliente.list')->with($data);
    }

    /**
     * Formulário para adicionar novo cliente.
     * 
     * @return View
     */
    public function add()
    {
        return view('modules.Cliente.add');
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
        $data['cliente']    = TbCliente::find($id);
        
        return view('modules.Cliente.edit')->with($data);
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
        if($request->hasFile("foto") and $id == null) { 
            $file           = request()->file('foto');
            $rawFileName    =  time() .'_'. $file->getClientOriginalName();
            $fileName       = strtolower(str_slug(pathinfo($rawFileName, PATHINFO_FILENAME), "-"));
            $fileName      .= '.' . strtolower(pathinfo($rawFileName, PATHINFO_EXTENSION));
            $cliFoto        = $file->storeAs('clientes', $fileName, 'laraManagerFiles');
        } else {
            $error['savedstatus']	= '0';
            $error['message']		= 'Obrigatório envio de imagem!';
            $error['id'] 			= $id;

            return $error;
        }
        
        $cli                = TbCliente::findOrNew($id);
        $cli->nome          = $request->nome;
        $cli->email         = $request->email;
        $cli->telefone      = $request->telefone;
        $cli->foto          = $fileName;
        $cli->status        = $request->status;
        $cli->fk_id_user    = 1;
        
        $cli->save();
        
        $success['savedstatus']	= '1';
        $success['message']		= 'Dados salvos com sucesso!';
        $success['nome'] 		= $request->nome;
        $success['email'] 		= $request->email;
        $success['telefone'] 	= $request->telefone;
        $success['foto']        = $fileName;
        $success['id'] 			= $cli->id_cliente;
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

            $cli = TbCliente::find($id);

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
            $data['cliente']    = TbCliente::find($id);
            
            return view('modules.Cliente.delete')->with($data);
        }
    }
}

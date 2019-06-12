/**
 * LaraManager
 * This script contains the core components for the application. 
 * 
 * @author: Carlos Eduardo da Silva <carlosedasilva@gmail.com>
 * @link https://github.com/tresloukadu
 */



/**
 * Requests in background the backend module.
 * 
 * @param  {string} moduleAction Module name
 * @param  {int}	id           Container Id
 * @return {void}                Returns nothing.
 */
function triggerRequest(moduleAction, id) 
{
	Pace.restart();

	$.get(appUrl + moduleAction, function(data) {
        $(id).html(data);
    });
}

/**
 * Open a modal window and loads the desired content.
 * 
 * @param {int}     id 
 * @param {string}  moduleUrl 
 */
function triggerModal(id, moduleUrl)
{
	$('#laramanager-modal').modal({
		keyboard: true,
		backdrop: true
    });
    
	if(id!='')
        triggerRequest(moduleUrl+'/'+id,'#laramanager-modal-content');
	else 
        triggerRequest(moduleUrl,'#laramanager-modal-content');
        
	return false;
}


/**
 * Triggered before submiting a modal form.
 */
function triggerPreSubmit() 
{
    $('#laramanager-submit').attr('disabled', 'disabled');
}


/**
 * Closes a modal window.
 * 
 * @param {int} delayToClose Time to close the window.
 */
function closeModal(delayToClose) 
{
    setTimeout('$("#laramanager-modal").modal("toggle")', delayToClose);
}


/**
 * If the data is removed without any error runs this method.
 * 
 * @param {obj} data Returned information from backend. 
 */
function triggerSuccessForModal(data) 
{
    $('#laramanager-modal-message').removeClass('alert-danger');
    $('#laramanager-modal-message').addClass('alert-success');
    $('#laramanager-modal-msg-body').html(data.message);
    $('#laramanager-modal-message').show('slow');
    $('#laramanager-submit').removeAttr('disabled');
}


/**
 * In case there is an error, this method is fired.
 * 
 * @param {obj} data 
 */
function triggerErrorForModal(data) 
{
    $('#laramanager-modal-message').removeClass('alert-success');
    $('#laramanager-modal-message').addClass('alert-danger');
    $('#laramanager-modal-msg-body').html(data.message);
    $('#laramanager-modal-message').show('slow');
    $('#laramanager-submit').removeAttr('disabled');
}


/**
 * Apaga cliente
 * 
 */
var laraManagerDeleteCliente =
{
	dataType:   'json', 
	beforeSubmit:  triggerPreSubmit,
	clearForm:    false,
	resetForm:    false,
	success:    function(data) {

		var qtdRegistros = 0;
		var qtdRegistrosTotal = 0;

		if( data.savedstatus == 1 ) 
		{
			// Retorno sucesso 
            triggerSuccessForModal(data);
            
            $('#tr_'+data.id).remove();
            
			// Verifica se está mostrando a quantidade de registros encontrados
			// e substrai.
			if($('#total-found-data').is(':visible'))
			{
				qtdRegistros = $('#total-found-data-qqty').text();

				if(qtdRegistros > 0)
				{
					qtdRegistros = qtdRegistros - 1;

					if(qtdRegistros == 0)
					{
						$('#total-found-data').hide();	
					}
					else 
					{
						$('#total-found-data-qqty').text(qtdRegistros);
					}
				}
				else 
				{
					$('#total-found-data').hide();	
				}
			}

			closeModal(2000); 
		} 
		else 
            triggerErrorForModal(data);
	}
};


 /**
  * Editar um cliente. 
  */
var laramanagerEditCliente =
{
	dataType:   'json', 
	beforeSubmit:  triggerPreSubmit,
	clearForm:    false,
	resetForm:    false,
	success:    function(data) {
		var trTable = '';
		if( data.savedstatus == 1 ) {
			// Retorno sucesso 
			triggerSuccessForModal(data);
			$('#tr_'+data.id).empty();
			
			trTable ='<td><i class="fas fa-barcode"></i> '+data.id+'</td><td><img src="assets/app/img/public/'+data.foto+'" style="height:50px;width:50px;"> '+data.nome+'</td><td>'+data.email+'</td><td>'+data.telefone+'</td><td><a href="#" class="btn btn-danger" onclick="triggerModal('+data.id+', \'clientes/delete\');" role="button" aria-pressed="true"><i class="fas fa-trash-alt"></i></a><a href="#" class="btn btn-warning" onclick="triggerModal('+data.id+', \'clientes/edit\');" role="button" aria-pressed="true"><i class="fas fa-edit"></i></a></td>';
			
			$('#tr_'+data.id).html(trTable);
			closeModal(2000); 
		} else triggerErrorForModal(data);	
	}
};


/**
 * Adiciona novo cliente
 */
var laramanagerAddCliente =
{
	dataType:   'json', 
	beforeSubmit:  triggerPreSubmit,
	clearForm:    false,
	resetForm:    false,
	success:    function(data) {
		if(data.savedstatus == 1) {
            triggerSuccessForModal(data);
			trTable ='<tr id="tr_'+data.id+'"><td><i class="fas fa-barcode"></i> '+data.id+'</td><td><img src="assets/app/img/public/'+data.foto+'" style="height:50px;width:50px;"> '+data.nome+'</td><td>'+data.email+'</td><td>'+data.telefone+'</td><td><a href="#" class="btn btn-danger" onclick="triggerModal('+data.id+', \'clientes/delete\');" role="button" aria-pressed="true"><i class="fas fa-trash-alt"></i></a> <a href="#" class="btn btn-warning" onclick="triggerModal('+data.id+', \'clientes/edit\');" role="button" aria-pressed="true"><i class="fas fa-edit"></i></a></td></tr>';

			$('#laramanager-grid tbody tr:last').after(trTable);

            // Updates the total results
            if($('#total-found-data').is(':visible'))
			{
				qtdRegistros = $('#total-found-data-qqty').text();

				if(qtdRegistros > 0)
				{
					qtdRegistros = eval(qtdRegistros) + eval(1); // Forcing to sum

					if(qtdRegistros == 0)
					{
						$('#total-found-data').hide();	
					}
					else 
					{
						$('#total-found-data-qqty').text(qtdRegistros);
					}
				}
				else 
				{
					$('#total-found-data').hide();	
                }
            }
            
			closeModal(1000);
        } 
        else 
        {
			triggerErrorForModal(data);
		}
	}
};

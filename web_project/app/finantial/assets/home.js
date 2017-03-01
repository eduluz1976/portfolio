
MainHome = {
    
    hasError : true,
    
    init : function() {
	
	$('#samples-list LI').on('click',MainHome.clickSample);
	$('#cpf').on('blur', MainHome.validateCPF);
//	$('#btnValidateCPF').on('click', MainHome.validateCPF);
	
    },
    
    clickSample : function(e) {
	var value = $(this).text();
	$('#cpf').val(value);
	MainHome.validateCPF();
    },
    
    validateCPF : function() {
	
	if ($('#cpf').val().length == 0) {
	    MainHome.getResultValidation({success:false,msg:'CPF field not informed'});
	    return;
	}
	
	var data = {
	    _class : 'FinantialApp',
	    _action : 'checkCPF',
	    cpf : $('#cpf').val()
	};
	$.post('index.php',data, MainHome.getResultValidation, 'json');
    },
    
    getResultValidation : function (data) {
	console.log(data);
	var elemen = $('#cpf').parent();
	var icon = $(elemen).children('.glyphicon');
	if (data.success == true) {
	    $(elemen).removeClass('has-error');
	    $(elemen).addClass('has-success');
	    $(icon).removeClass('glyphicon-warning-sign').addClass('glyphicon-ok');
	    MainHome.hasError = false;
	    $('#btnValidateCPF').removeAttr('disabled');
	} else {
	    $(elemen).removeClass('has-success');
	    $(elemen).addClass('has-error');
	    $(icon).removeClass('glyphicon-ok').addClass('glyphicon-warning-sign');
	    $('#cpf').attr('title',data.msg);
	    MainHome.hasError = true;
	    $('#btnValidateCPF').attr('disabled',1);
	}
	
    }
    
    
}


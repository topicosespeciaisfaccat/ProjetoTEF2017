(function($){

	$(document).ready(function(){
			
			obterEmpresa();
	
	

});

})(jQuery);


function obterEmpresa (){
	$.ajax({
				url:"cadastro/configuradorbonus/funcoes.php",
				datatype : 'json',
				type : 'POST',
				data : {funcao : 'obterEmpresaSolicitacao'},
				success: function(data){
	                // Parse the returned json data
	                var opts = $.parseJSON(data);               
	                // Use jQuery's each to iterate over the opts value
	                $.each(opts, function(i, d) {
	                    // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
	                    $('#empresa').append('<option value="' + d.id + '">' + d.empresa + '</option>');

	                });
				},
				error :function(data) {
					console.log("ola mundo erro");
				},
				complete : function(){
					console.log("ola mundo completo");
				}

			});
}
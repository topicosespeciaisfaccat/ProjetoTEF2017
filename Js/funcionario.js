(function($){

	$(document).ready(function(){

			obterCargo();
			obterEmpresa();
			search();
			
			$("#button").click(function(){
			 search();
			});

			$('#search').keyup(function(e) {
			if(e.keyCode == 13) {
			search();
			}
			});

	});

})(jQuery);


function obterEmpresa (){
	$.ajax({
				url:"cadastro/funcionario/funcoes.php",
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


function obterCargo (){
	$.ajax({
				url:"cadastro/funcionario/funcoes.php",
				datatype : 'json',
				type : 'POST',
				data : {funcao : 'obterCargoSolicitacao'},
				 success: function(data){
			   
                                // Parse the returned json data
                var opts = $.parseJSON(data);
                // Use jQuery's each to iterate over the opts value
                $.each(opts, function(i, d) {
                    // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                    $('#cargo').append('<option value="' + d.id + '">' + d.cargo + '</option>');
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

function search(){
 
	var title=$("#search").val();

	if(title!=""){
	//$("#result").html("<img alt="ajax search" src='ajax-loader.gif'/>");

	 $.ajax({
	    type:"post",
	    url:"cadastro/funcionario/funcoes.php",
	    data:{funcao : 'obterUsuarioSolicitacao',key : title},
	    success:function(data){
	        $("#result").html(data);
	        $("#search").val("");
	     }
	  });
	}
}


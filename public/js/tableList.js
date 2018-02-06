$(document).ready(function(){

	$('.disable').change(function(){
		var categoryId = this.id;
		var postData = {
                    'statusId':1,
                     'categoryId': categoryId,
                     '_token' : $('meta[name=_token]').attr('content')
                };

		$.confirm({
		    title: 'Status?',
		    content: 'Are You Sure Want to Update Status?',
		    type: 'green',
		    buttons: {   
		        ok: {
		            text: "ok!",
		            btnClass: 'btn-primary',
		            keys: ['enter'],
		            action: function(){
		                 
		                  $.ajax({
						        	type:"post",
						        	data:postData,
						        	url:"disable",
						        	dataType:"text",
						        	success:function(result)
						        	{
						        		if(result == 1)
						        		{

						        			$('#message').html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'> × </button> <strong>Success!</strong> Status has been changed!!</div>");
						        		}else if(result == 0)
						        		{
						        			$('#message').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'> × </button> <strong>Error!</strong> Status has Not been changed!!</div>")	
						        		}
						        		

									},
						        	error:function(error)
						        	{
						        		$('#message').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'> × </button> <strong>Error!</strong> Status has Not been changed!!</div>")	
						        	}
						        });
		            }
		        },
		        cancel: function(){
		                console.log('the user clicked cancel');
		        }
		    }
		});

    });

    $('.enable').change(function(){

    	var category_id = this.id;
    	var postData1 = {
    			'status_id':0,
    			'categoryId':category_id,
    			'_token' : $('meta[name=_token]').attr('content')

    	};

    	$.confirm({
		    title: 'Status?',
		    content: 'Are You Sure Want to Update Status?',
		    type: 'green',
		    buttons: {   
		        ok: {
		            text: "ok!",
		            btnClass: 'btn-primary',
		            keys: ['enter'],
		            action: function(){
		                 
		                  $.ajax({
						        	type:"post",
						        	data:postData1,
						        	url:"enable",
						        	dataType:"text",
						        	success:function(result)
						        	{
						        		if(result == 1)
						        		{

						        			$('#message').html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'> × </button> <strong>Success!</strong> Status has been changed!!</div>");
						        		}else if(result == 0)
						        		{
						        			$('#message').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'> × </button> <strong>Error!</strong> Status has Not been changed!!</div>")	
						        		}

									},
						        	error:function(error)
						        	{
						        		$('#message').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'> × </button> <strong>Error!</strong> Status has Not been changed!!</div>")	
						        	}
						        });
		            }
		        },
		        cancel: function(){
		                console.log('the user clicked cancel');
		        }
		    }
		});

    });

    $('.categoryDelete').click(function(){
    	var categoryId = this.id;
    	var postData2 = {
    			
    			'categoryId':categoryId,
    			'_token' : $('meta[name=_token]').attr('content')

    	};

    	$.confirm({
		    title: 'Delete?',
		    content: 'Are You Sure Want to Delete This Item?',
		    type: 'green',
		    buttons: {   
		        ok: {
		            text: "ok!",
		            btnClass: 'btn-primary',
		            keys: ['enter'],
		            action: function(){
		                 
		                  $.ajax({
						        	type:"delete",
						        	data:postData2,
						        	url:"category/"+categoryId,
						        	dataType:"text",
						        	success:function(result)
						        	{
						        		if(result == 1)
						        		{

						        			$('#message').html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'> × </button> <strong>Success!</strong> Your Item Has been Deleted!!</div>");
						        			location.reload();
						        		}else if(result == 0)
						        		{
						        			$('#message').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'> × </button> <strong>Error!</strong> Your Item has not been  Deleted!!</div>")	
						        		}

									},
						        	error:function(error)
						        	{
						        		$('#message').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'> × </button> <strong>Error!</strong>Your Item Has not been deleted!!</div>");
						        	}
						        });
		            }
		        },
		        cancel: function(){
		                console.log('the user clicked cancel');
		        }
		    }
		});
    });

    





});
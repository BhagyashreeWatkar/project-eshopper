$(document).ready(function(){
	//alert("test")
	$(".btn-update").click(function(){
		records=$("#update_form").serialize();

		$.post("../controllers/password-action.php",records).success(function(res){

			$(".msg_update").html(res);
		})
	})
 /////brand////

	$(".btn-brand").click(function(){
		records=$("#brand_form").serialize();

		$.post("../controllers/brand_action.php",records).success(function(res){

			$(".msg_brand").html(res);
		})
	})

/////category//////
$(".btn-category").click(function(){
	records=$('#category_form').serialize();

	$.post("../controllers/category_action.php",records).success(function(res){
		$(".msg_category").html(res);
	})
})


/////////products////////

// $(".btn-product").click(function(){
//     	alert(1)
// 	record = $("#product_form").serialize();

// 	$.ajax({
// 		type:"post",
// 		data:record,
// 		url:"../controllers/product-action.php",
// 		success:function(res){
// 			$(".msg_product").html(res);
// 		},
// 		error:function(errmsg){
// 			console.log(errmsg);
// 		}
// 	});
// })

$(".btn-product").click(function(){
	
	//create an object of given form
	formobj=document.getElementById("product_form");
	//alert(formobj);
	

	//create an object of form data
	dataobj = new FormData(formobj);
	//alert(dataobj);



	$.ajax({
		type:"post",
 		data:dataobj,
 		url:"../controllers/product-action.php",
 		contentType:false,  //text/plain convert to enctype
 		processData:false,
 		success:function(res){
			$(".msg_product").html(res);
		},
		error:function(errmsg){
			console.log(errmsg);
		}
	});
})
	
})
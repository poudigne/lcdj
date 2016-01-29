<meta charset="UTF-8">
<meta http-equiv="Content-type" content="text/html; charset=UTF-8">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>


<!-- Bootstrap Stylesheet -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="/CSS/bootstrap.css">
<link rel="stylesheet" href="/CSS/bootstrap-theme.css">

<!-- Custom Stylesheet -->
<link rel="stylesheet" href="/CSS/Navbar.css">
<link rel="stylesheet" href="/CSS/Footer.css">
<link rel="stylesheet" href="/CSS/Event.css">
<link rel="stylesheet" href="/CSS/Jumbotron.css">

<!-- Bootstrap Javascript -->
<script src="/JS/bootstrap.js" type="text/javascript"></script>


<!-- <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css" integrity="sha384-XXXXXXXX" crossorigin="anonymous">
<script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js" integrity="sha384-XXXXXXXX" crossorigin="anonymous"></script>-->

<!-- bootstrap Multiselect -->
<link rel="stylesheet" href="/CSS/bootstrap-multiselect.min.css">
<script src="/JS/bootstrap-multiselect.js" type="text/javascript"></script>

<!-- Bootstrap slider -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/6.0.9/bootstrap-slider.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/6.0.9/css/bootstrap-slider.min.css">

<!-- Bootbox -->
<script src="/JS/bootbox.min.js" type="text/javascript"></script>


<style>
.flavor-text {
	margin-left: 10px;
}

.float-right {
	float:right !important;
}
.float-left {
	float:left !important;
	margin: 0 5px 0 0;
}
</style>

<script type="text/javascript">
	$(document).ready(function(){
		var bulk_action_json = [];
		$("#check-all").click(function(){
			console.log("check all triggered");
			var is_checked = $(this).prop('checked');
			$(".check-box").each(function(){
				console.log("found a .check-box checked state : " + is_checked);
				$(this).prop('checked', is_checked);
				$(this).trigger("change");
			});
		});
		$(".check-box").change(function() {
			console.log("change triggered");
			var product_id = $(this).attr("data-field-id");
			if (this.checked){
				bulk_action_json.push(product_id)
			}
			else{
				for(var i = 0, j = bulk_action_json.length; i < j; ++i) {
					if (bulk_action_json[i] == product_id){
						bulk_action_json.splice(i, 1);
						break;
					}
				}
			}
			console.log(bulk_action_json);

		});

		$("#delete-request").click(function(){
			console.log("ids list length : " + bulk_action_json.length);
			if (bulk_action_json.length == 0)
				return;
			var link = $(this).attr("data-field-link");
			console.log(link);
			bootbox.confirm("Are you sure you want to delete "+ bulk_action_json.length +" elements?", function(result) {
				if (!result)
					return;
				$.ajax({
					url: link,
					type: "post",
					data: {
						"ids"  : bulk_action_json,
						"_token" : "{{ csrf_token() }}"
					},
					dataType: "json"
				}).always(function(data) {
					console.log("item deleted : " + data)
				});
			});
		});
	});
</script>
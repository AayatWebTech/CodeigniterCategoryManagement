<!DOCTYPE html>
<html>
<head>
	<title><?= $page_title; ?></title>

	<script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
	<script type="text/javascript" src="<?= base_url('/assets/js/jquery-ui.min.js'); ?>"></script>
	<script type="text/javascript" src="<?= base_url('/assets/js/jquery.mjs.nestedSortable.js'); ?>"></script>

</head>
<body>

<section>
	<div id="orderResult"></div>
	<button id="save" class="btn btn-primary">Save</button>
</section>

<script type="text/javascript">
	$('#save').on("click",function(){
		var oSortable = $('.sortable').nestedSortable('toArray');
		$('#orderResult').slideUp(function(){
			$.post("<?= 'category/order_ajax'; ?>",{ sortable: oSortable },function(data){
				$('#orderResult').html(data);
				$('#orderResult').slideDown() ;
			});
		});
	});
	$(function(){
		$.post("<?= 'category/order_ajax'; ?>",{},function(data){
			$('#orderResult').html(data);
		});
	});
</script>

</body>
</html>
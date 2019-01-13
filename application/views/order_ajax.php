<?php 
	echo get_ol($category);
	function get_ol( $array, $child = FALSE ){
		$str = '';
		if(count($array)){
			$str .= $child == FALSE ? '<ol class="sortable">' : '<ol>';

			foreach ($array as $arr) {
				$str .= '<li id="list_' . $arr['id'] . '">';
				$str .= '<div><span style="margin-left:20px;font-size:16px;color:black;">' . strtoupper($arr['category_name']) . '</div>';

				//Do we have any children?
				if(isset($arr['children']) && count($arr['children'])){
					$str .= get_ol( $arr['children'], TRUE);
				}

				$str .= '</li>' . PHP_EOL;
			}
			$str .= '</ol>' . PHP_EOL;
		}
		return $str;
	}
?>

<script type="text/javascript">
	
	$(document).ready(function(){

		$('.sortable').nestedSortable({
			handle: 'div',
			items: 'li',
			toleranceElement: '> div',
			maxLevels: 3
		});

	});

</script>
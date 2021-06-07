<?php
	
	function total_price($cart){
		$price = 0.0;
		if(is_array($cart)){
		  	foreach($cart as $ptid => $qty){
		  		$cena = getcenaprduktu($ptid);
		  		if($cena){
		  			$price += $cena * $qty;
		  		}
		  	}
		}
		return $price;
	}


	function total_items($cart){
		$items = 0;
		if(is_array($cart)){
			foreach($cart as $ptid => $qty){
				$items += $qty;
			}
		}
		return $items;
	}
?>
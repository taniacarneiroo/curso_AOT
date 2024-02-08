<?php
	$bd = new PDO('sqlite:supertech.db');  

	function inserePedido($bd,$cod_pedido,$data_pedido,$cod_cliente,$status_pedido){

		$sql= "INSERT INTO pedidos (cod_pedido,data_pedido,cod_cliente,status_pedido) 
		values(:cod_pedido,:data_pedido,:cod_cliente,:status_pedido)";
		
		$stmt = $bd->prepare($sql);

		$stmt-> bindValue(":cod_pedido",$cod_pedido);
		$stmt-> bindValue(":data_pedido",$data_pedido);
		$stmt-> bindValue(":cod_cliente",$cod_cliente);
		$stmt-> bindValue(":status_pedido",$status_pedido);
					
		$stmt-> execute();
				
	}

	inserePedido($bd,1,"07/02/2024","1","Em Analise");	
	inserePedido($bd,2,"07/02/2024","2","Saiu para entrega");	
	
	function retornaTodosPedidos($bd){
		$sql = "SELECT * FROM pedidos";
		$stmt = $bd->prepare($sql);
		$stmt-> execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	$todosPedidos = retornaTodosPedidos($bd);
	
	echo "<pre>";//tag PHP para formatar a exibição no navegador
	print_r($todosPedidos);
	echo "</pre>";
?>



<?php
	$bd = new PDO('sqlite:supertech.db');  

	function insereProduto($bd,$cod_produto,$nome,$descricao,$preco,
	$quantidade, $fornecedor){

		$sql= "INSERT INTO produtos (cod_produto,nome,descricao,
		preco,quantidade,fornecedor) values(:cod_produto,:nome,:descricao,:preco,
		:quantidade,:fornecedor)";
		
		$stmt = $bd->prepare($sql);

		$stmt-> bindValue(":cod_produto",$cod_produto);
		$stmt-> bindValue(":nome",$nome);
		$stmt-> bindValue(":descricao",$descricao);
		$stmt-> bindValue(":preco",$preco);
		$stmt-> bindValue(":quantidade",$quantidade);
		$stmt-> bindValue(":fornecedor",$fornecedor);
			
		$stmt-> execute();
				
	}

	insereProduto($bd, 20, "TV 42 polegadas","TV led 42 polegadas com wifi e bluetooth",
	1850.47,2985,"samsung");	
	
	function retornaTodosProdutos($bd){
		$sql = "SELECT * FROM produtos";
		$stmt = $bd->prepare($sql);
		$stmt-> execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	$todosProdutos = retornaTodosProdutos($bd);
	
	echo "<pre>";//tag PHP para formatar a exibição no navegador
	print_r($todosProdutos);
	echo "</pre>";
?>



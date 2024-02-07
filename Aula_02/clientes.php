<?php

	// conectando o PHP com o SQLite usando PDO

	//criar variavel e atribuir um objeto a partir da classe PDO (parâmetros informar o banco)

	$db = new PDO('sqlite:supertech.db');

	//comando var_dump - para imprimir a informação na tela (imprime detalhado, tipo da variável, tamanho da variaável que está sendo impressa. Auxilia na hora de fazer debug)

	//var_dump($db);

	//comando Insert - Inserir dados no banco de dados

	//insert into tabela (campos da tabela separado por virgula) values (valores à ser inseridos separados por virgula)
	// este comando SQL vai inserir dados na tabela

	function insereClientes($db,$cod_Cliente,$nome,$email,$telefone,$endereco){

		//Atribuir valor automaticamente no banco de dados 

		$sql= "INSERT INTO clientes (cod_cliente,nome,email,telefone,endereco) values
		(:cod_cliente,:nome,:email,:telefone,:endereco)";

		//criar variável pra salvar o valor 
		// Acessar dentro do objeto(PDO) um membro (prepare)

		$stmt = $db->prepare($sql);

		// vincular valor (bindValue), joga os valores dentro da variavel stmt

		$stmt-> bindValue(":cod_cliente",$cod_Cliente);
		$stmt-> bindValue(":nome",$nome);
		$stmt-> bindValue(":email",$email);
		$stmt-> bindValue(":telefone",$telefone);
		$stmt-> bindValue(":endereço",$endereco);

		//executa a instrução sql no banco de dados

		$stmt-> execute();
		
	}

	//Atribuindo valor manualmente no banco de dados
	insereClientes($db,2,"tania","tan@email.com","31999999999","rua nair pentagna");

	//lastInsertId - Informa o ultimo valor inserido

	//echo $stmt->lastInsertId ();

	//buscar todos os clientes

	function retornaTodosClientes($db){
		$sql = "SELECT * FROM clientes";
		$stmt = $db->prepare($sql);
		$stmt-> execute();
		
		return $stmt-> fetchAll(PDO::FETCH_ASSOC);
		
	}

	$todosClientes = retornaTodosClientes($db);

	echo "<pre>";//tag PHP para formatar a exibição no navegador
	print_r($todosClientes);
	echo "</pre>";

?>


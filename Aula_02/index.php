<?php

/*conectando o PHP com o SQLite usando PDO
//criar variavel e atribuir um objeto a partir da classe PDO (parâmetros informar o banco)

//$db = new PDO("sqlite:supertech.db");

//comando var_dump - para imprimir a informação na tela (imprime detalhado, tipo da variável, tamanho da variaável que está sendo impressa. Auxilia na hora de fazer debug)

var_dump($db);

//comando Insert - Inserir dados no banco de dados

//insert into tabela (campos da tabela separado por virgula) values (valores à ser inseridos separados por virgula)
// este comando SQL vai inserir dados na tabela


//Atribuir valor manualmente no banco de dados
// $sql= "INSERT INTO clientes (cod_cliente,nome,email,telefone,endereco) values(1, tania, 31999999999, rua nairpentagna 300)";


//Atribuir valor automaticamente no banco de dados 

$sql= "INSERT INTO clientes (cod_cliente,nome,email,telefone,endereco) values(:cod_cliente,:nome,:email,:telefone,:endereco)";

//criar variável pra salvar o valor 
// Acessar dentro do objeto(PDO) um membro (prepare)

$stmt = $db->prepare($sql);

//bindValue - vincular valor, joga os valores dentro da variavel stmt

$stmt-> bindValue(":cod_cliente",1);
$stmt-> bindValue(":nome","tania");
$stmt-> bindValue(":email","tania@email.com");
$stmt-> bindValue(":telefone",31999999999);
$stmt-> bindValue(":endereço","rua nair Pentagna 300");

//execute - executa a instrução sql no banco de dados

$stmt-> execute();

//lastInsertId - Informa o ultimo valor inserido

//echo $stmt->lastInsertId ();


// Criar função para organizar os dados e carregar pelos parametros automaticamente

/*function inserirDadosNaTabelaCliente($db,$cod_cliente,$nome,$email,$telefone,$endereco)

{

$stmt = $db->prepare($sql);

$stmt-> bindValue(":cod_cliente",$cod_cliente);
$stmt-> bindValue(":nome",$nome);
$stmt-> bindValue(":email",$email);
$stmt-> bindValue(":telefone",$telefone);
$stmt-> bindValue(":endereço",$endereço);

$stmt-> execute();
}

//buscar todos os clientes

function buscaTodosClientes($db){
	$sql = "select *FROM clientes";
	$stmt = $db->prepare($sql);

	$stmt-> execute();
	$resultado = $stmt-> fetchAll(PDO::FETCH_ASSOC);//fetchAll - busca todos os clientes
	
	return $resultado;
}

	//print_r (buscaTodosClientes($db));

function buscaCliente($db,$cod_cliente=null){//null para o sistema adicionar null caso não exista um código para o cliente
	
	if($cod_cliente){
	$sql= "SELECT * FROM clientes WHERE COD_CLIENTE=1"; //* Selecionar o cliente de codigo =1
	}
	$stmt= $db->prepare($sql);
	$stmt-> bindValue(":cod_cliente",$cod_cliente);
	$stmt->execute();
	print_r ($stmt-> fetch(PDO::FETCH_ASSOC));
}
//UPDATE - ALTERA

function alteraCliente ($db,$cod_cliente,$nome,$email,$telefone,$endereco){
	$sql="(UPDATE clientes SET nome = :nome, email = :email, telefone = :telefone,
	 endereço = :endereco WHERE cod_cliente= :cod_cliente)";

	 $stmt = $$db->prepare($sql);

	 $stmt-> bindValue(":cod_cliente",1);
	 $stmt-> bindValue(":nome","tania");
	 $stmt-> bindValue(":email","tania@email.com");
	 $stmt-> bindValue(":telefone",31999999999);
	 $stmt-> bindValue(":endereço","rua nair Pentagna 300");

	 $stmt-> execute();
}
	 //inserirDadosNaTabelaCliente($db,21,"Maria","mariinha@gmail.com","rua das gaivotas,29");

	 //print_r(buscaTodosClientes)


	 //function excluiCliente (){};*/
?>
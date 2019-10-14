<?php
    include_once('conect.php');
    function insertCliente ($nome, $cpf, $email) {
        $conect = conectaBD();
        $sql = "INSERT INTO cliente (nome,cpf,email) VALUES (?,?,?)";
        $stmt = $conect->prepare($sql);
        $stmt->bindParam(1,$nome);
        $stmt->bindParam(2,$cpf);
        $stmt->bindParam(3,$email);
        $stmt->execute();
        $stmt->closeCursor();
        $conect=NULL;
    }
    function deletaCliente ($id) {
        $conect = conectaBD();
        $sql = "DELETE FROM cliente WHERE codcliente=?";
        $stmt = $conect->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->execute();
        $stmt->closeCursor();
        $conect=NULL;  
    }
    function alteraCliente ($id, $nome, $cpf, $email) {
        $conect = conectaBD();
        $sql = "UPDATE cliente SET nome=?, cpf=?, email=? WHERE codcliente=?";
        $stmt = $conect->prepare($sql);
        $stmt->bindParam(1,$nome);
        $stmt->bindParam(2,$cpf);
        $stmt->bindParam(3,$email);
        $stmt->bindParam(4,$id);
        $stmt->execute();
        $stmt->closeCursor();
        $conect=NULL;  
    }
    function buscaCliente ($id) {
        $conect = conectaBD();
        $sql = "SELECT * FROM cliente WHERE codcliente=?";
        $stmt = $conect->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->execute();
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $conect=NULL;
        return $cliente;
    }
    function buscaXCliente ($nLimit, $offset = 0) {
        $conect = conectaBD();
        $sql = "SELECT * FROM cliente LIMIT ? OFFSET ?";
        $stmt = $conect->prepare($sql);
        $stmt->bindParam(1,$nLimit);
        $stmt->bindParam(2,$offset);
        $stmt->execute();
        $vetor = [];
        while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($vetor, $linha);
        }
        $stmt->closeCursor();
        $conect=NULL;
        return $vetor;
    }

    print_r(buscaXCliente(3, 2));
?>


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
    alteraCliente('7','diego', '12122121', 'cleivamaconheria');
?>
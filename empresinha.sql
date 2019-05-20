DROP TABLE projEmp;
DROP TABLE projeto;
DROP TABLE empregados;
DROP TABLE cliente;



CREATE TABLE cliente (
    nome varchar(100) NOT NULL,
    telefone varchar(25) NOT NULL,
    cpf varchar(11) UNIQUE,
    CONSTRAINT "clientePK" PRIMARY KEY (cpf)
);

CREATE TABLE empregado (
    nome varchar(100) NOT NULL,
    cargo varchar(40) NOT NULL, 
    cpf varchar(11) UNIQUE,
    CONSTRAINT "empregadoPK" PRIMARY KEY (cpf)
);

CREATE TABLE projeto (
    codProj serial,
    nome varchar(100) NOT NULL,
    descricao varchar(144) NOT NULL,
    preco FLOAT NOT NULL,
    dtFim date NOT NULL,
    dtEstimada date NOT NULL,
    dtSolicitacao date NOT NULL,
    cpfCliente varchar(11),
    cpfGerente varchar(11),
    CONSTRAINT "projetoPK" PRIMARY KEY (codProj),
    CONSTRAINT "projetoFKCliente" FOREIGN KEY (cpfCliente)
        REFERENCES cliente (cpf)
        ON UPDATE CASCADE,
    CONSTRAINT "projetoFKEmpregado" FOREIGN KEY (cpfGerente)
        REFERENCES empregado (cpf)
        ON UPDATE CASCADE
);

CREATE TABLE projEmp (
    codProj int,
    cpfEmpregado varchar(11),
    hrTrab FLOAT NOT NULL,
    CONSTRAINT "projEmpPK" PRIMARY KEY (codProj,cpfEmpregado),
    CONSTRAINT "projEmpFKProjeto" FOREIGN KEY (codProj)
        REFERENCES projeto (codProj)
        ON UPDATE CASCADE,
    CONSTRAINT "projEmpFKEmpregado" FOREIGN KEY (cpfEmpregado)
        REFERENCES empregado (cpf)
        ON UPDATE CASCADE
);



-- 1) ALTERAR O NOME DA TABELA EMPREGADOS 

ALTER TABLE empregado RENAME TO empregados;

-- 2) add rg em cliente

ALTER TABLE cliente ADD rg varchar(10) NOT NULL;

-- 3) Altere o tipo preço da tabela projeto para numeric(12,2)

ALTER TABLE projeto ALTER COLUMN preco TYPE numeric(11,2);  

-- 4) )Crie uma restrição do tipo unique na coluna RG de cliente

ALTER TABLE cliente ADD CONSTRAINT rg UNIQUE (rg);

-- INSERT'S

    -- clientes
INSERT INTO cliente (nome, telefone, cpf, rg) 
VALUES ('thiago', '32323232' , '04948371080', '3860395440');

INSERT INTO cliente (nome, telefone, cpf, rg) 
VALUES ('rafael', '33333333' , '01452015520', '3260283446');

SELECT * FROM cliente;

    -- empregados
INSERT INTO empregados (nome, cargo, cpf) 
VALUES ('rafinha', 'DONO DA PORRA TODA' , '05564405502');

INSERT INTO empregados (nome, cargo, cpf) 
VALUES ('thiagueira', 'prostituta' , '01108854008');

SELECT * FROM empregados;

    -- projeto
INSERT INTO projeto (nome, descricao, preco, dtfim, dtestimada, dtsolicitacao, cpfGerente, cpfCliente) 
VALUES ('PROSTIBULO', 'CASA DE PROSTITUIÇÃO COM FINS BENEFICENTES' , '10000.00', '04/08/2012', '04/08/2011','04/08/2012', '05564405502', '04948371080');

SELECT * FROM projeto;

    -- projEmp
INSERT INTO projEmp (codProj, cpfEmpregado, hrTrab) 
VALUES ('1', '05564405502' , '10000.');

SELECT * FROM projEmp;

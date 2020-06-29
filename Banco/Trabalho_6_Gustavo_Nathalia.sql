-- NOME: Gustavo da Silva Mafra e Nathália Adriana de Oliveira
-- Trabalho de Banco de dados 6

-- CRIAÇÃO DO BANCO DE DADOS
CREATE SCHEMA trab_6 DEFAULT CHARACTER SET utf8; 
ALTER DATABASE trab_6 DEFAULT COLLATE utf8mb4_bin;
DROP SCHEMA trab_6; 

CREATE TABLE IF NOT EXISTS  estado(
	id INT NOT NULL AUTO_INCREMENT,
    estado varchar(60),
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS  cidade(
	id INT NOT NULL AUTO_INCREMENT,
    id_estado int,
    cidade varchar(60),
    PRIMARY KEY (id),
    CONSTRAINT fk_cidade_estado
		FOREIGN KEY (id_estado) REFERENCES estado (id)
);

CREATE TABLE IF NOT EXISTS  bairro(
	id INT NOT NULL AUTO_INCREMENT,
    id_cidade int,
    bairro varchar(60),
    PRIMARY KEY (id),
    CONSTRAINT fk_bairro_cidade
		FOREIGN KEY (id_cidade) REFERENCES cidade (id)
);

CREATE TABLE IF NOT EXISTS  endereco(
	id INT NOT NULL AUTO_INCREMENT,
    id_bairro int,
    logradouro varchar(120),
    numero	varchar(60),
    PRIMARY KEY (id),
    
      CONSTRAINT fk_endereco_bairro
		FOREIGN KEY (id_bairro) REFERENCES bairro (id)
	
);

CREATE TABLE IF NOT EXISTS  tamanho(
	id INT NOT NULL AUTO_INCREMENT,
    largura varchar(60),
    altura varchar(60),
    comprimento varchar(60),
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS  cliente( 
	id INT NOT NULL AUTO_INCREMENT,
	nome varchar(60),
    email varchar(60),
    telefone varchar(20),
    id_endereco int,
    PRIMARY KEY (id),

	CONSTRAINT fk_cliente_endereco
		FOREIGN KEY (id_endereco) REFERENCES endereco (id)
);

CREATE TABLE IF NOT EXISTS  pacote(
	id INT NOT NULL AUTO_INCREMENT,
    data_entrega varchar(8),
    data_prevista varchar(8),
    peso varchar(200),
    state int(1),
    id_tamanho int,
    id_endereco int,
    id_cliente int,
    PRIMARY KEY (id),
    
    CONSTRAINT fk_pacote_tamanho
		FOREIGN KEY (id_tamanho) REFERENCES tamanho (id),
        
	CONSTRAINT fk_pacote_endereco
		FOREIGN KEY (id_endereco) REFERENCES endereco (id),
        
	CONSTRAINT fk_pacote_cliente
		FOREIGN KEY (id_cliente) REFERENCES cliente (id)
);

-- READ DAS TABELAS 

select * from cliente;
select * from endereco;
select * from bairro;
select * from cidade;
select * from estado;

select * from tamanho;
select * from pacote;

-- INSERÇÃO DAS TABELAS

INSERT INTO estado (estado) VALUES
('Santa Catarina'),
('Rio Grance do Sul'),
('Rio Grande do Noite');

INSERT INTO cidade (cidade) VALUES
('Florianopolis'),
('Natal'),
('Porto Alegre');

INSERT INTO bairro(bairro) VALUES
('Centro'),
('Lagoa Azul'),
('Bela Vista');

INSERT INTO endereco(logradouro,numero) VALUES
('Adolfo Melo',43),
('Alagoinha',32),
('Antonio Parreiras',300);

INSERT INTO tamanho(largura,altura,comprimento)VALUES
('20cm','40cm','35cm'),
('55cm','32cm','70cm'),
('10cm','5cm','7cm');

INSERT INTO cliente(nome,email,telefone,endereco)VALUES
('Juliana Souza','juliana@gmail.com',48994135456,'Florianopolis - SC,Centro, Adolfo Melo,43'),
('Mariana Silva','mariana_silva@gmail.com',849882517241,'Natal - RN,Lagoa Azul,Alagoinha,32'),
('Joao Pedro de Moraes','jpm@gmail.com',51981371253,'Porto Alegre - RS,Bela Vista, Antonio Parreiras,300');


INSERT INTO pacote (data_entrega,data_prevista,peso) VALUES
('03/03/2019','04/03/2019','10kg'),
('12/07/2015','14/07/2015','5kg'),
('20/11/2018','20/11/2018','15kg');

-- UPDATE DAS TABELAS
UPDATE cliente SET nome = 'Mariana da Silva'  WHERE id = 2;
UPDATE pacote SET peso = '17kg'  WHERE id = 1;
UPDATE tamanho SET altura = '7cm'  WHERE id = 3;

-- DELETE DAS TABELAS
DELETE FROM estado WHERE id = 1;
DELETE FROM cidade WHERE id = 1;
DELETE FROM bairro WHERE id = 1;
DELETE FROM endereco WHERE id = 1;
DELETE FROM tamanho WHERE id = 1;
DELETE FROM cliente WHERE id = 1;
DELETE FROM pacote WHERE id = 1;

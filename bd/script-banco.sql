create table Fornecedor (
	codFornecedor integer AUTO_INCREMENT not null,
	nome VARCHAR(50) not null,
  email VARCHAR(50) not null,
	cnpj VARCHAR(50) not null,
	razaoSocial VARCHAR(50) not null,
	telefone integer not null,
	rua VARCHAR(50) not null,
	numeroRua integer not null,
	complemento VARCHAR(50) ,
	bairro VARCHAR(50) not null,
	cidade VARCHAR(50) not null,
	estado VARCHAR(2) not null,
	pais VARCHAR(50) not null,
	primary key (codFornecedor)
);

create table Produto (
	codProduto integer AUTO_INCREMENT not null,
	nome VARCHAR(100) not null,
	primary key (codProduto)
);
create table Sku (
	codSku integer AUTO_INCREMENT not null,
	sku VARCHAR(50) not null,
	quantidade integer not null,
  valorUnitario Numeric(10,2) not null,
	codProduto integer not null,
	codFornecedor integer not null,
	primary key (codSku)
);

CREATE TABLE `usuario` (
  `codUsuario` integer AUTO_INCREMENT NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
	primary key (codUsuario)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE Sku ADD CONSTRAINT sku_produto_FK
	FOREIGN KEY (codProduto)
	REFERENCES Produto (codProduto)
	ON DELETE NO ACTION
	ON UPDATE NO ACTION;

ALTER TABLE Sku ADD CONSTRAINT sku_fornecedor_FK
	FOREIGN KEY (codFornecedor)
	REFERENCES Fornecedor (codFornecedor)
	ON DELETE NO ACTION
	ON UPDATE NO ACTION;

insert into Fornecedor(codFornecedor,nome,email,cnpj,razaoSocial,telefone,rua,numeroRua,complemento,bairro,cidade,estado,pais)
	values(1,'Marlon','marlon@marlon.com','99.999.9999/0001-99','Imbarach Desing',999999999,'Avendia Brasil',104,'Apartamento','Centro','Passo Fundo','RS','Brasil');
insert into Fornecedor(codFornecedor,nome,email,cnpj,razaoSocial,telefone,rua,numeroRua,complemento,bairro,cidade,estado,pais)
	values(2,'Bruno','bruno@bruno.com','88.999.9999/0001-99','Bruno Golpista',888888888,'Rua Antoninho de Moraes',107,'Apartamento','Anes','Passo Fundo','RS','Brasil');
insert into Fornecedor(codFornecedor,nome,email,cnpj,razaoSocial,telefone,rua,numeroRua,complemento,bairro,cidade,estado,pais)
	values(3,'Gabriel Dias','gabriel@gabriel.com','77.999.9999/0001-99','Gabriel Dias Dev',7777777,'Rua Princesa IsBEL',626,'Casa','Petropoles','Passo Fundo','RS','Brasil');

insert into Produto(codProduto,nome)values(1,'Inox');
insert into Produto(codProduto,nome)values(2,'Pedra');
insert into Produto(codProduto,nome)values(3,'Madeira');

insert into Sku(codSku,sku,quantidade,valorUnitario,codProduto,codFornecedor)values(1,'Inox Enferrujado',100,5.50,1,1);
insert into Sku(codSku,sku,quantidade,valorUnitario,codProduto,codFornecedor)values(2,'Inox Top',200,10,1,3);
insert into Sku(codSku,sku,quantidade,valorUnitario,codProduto,codFornecedor)values(3,'Pedra Quebrada',100,5,2,2);
insert into Sku(codSku,sku,quantidade,valorUnitario,codProduto,codFornecedor)values(4,'Pedra Lisa',50,7,2,3);
insert into Sku(codSku,sku,quantidade,valorUnitario,codProduto,codFornecedor)values(5,'Madeira Eucalipto',100,15,3,2);
insert into Sku(codSku,sku,quantidade,valorUnitario,codProduto,codFornecedor)values(6,'Madeira Usada',20,2,3,1);

Insert into usuario values(1,'admin','admin');
Update usuario set senha = md5('admin') where login = 'admin';

-- drop table sku;
-- drop table fornecedor;
-- drop table produto;
-- drop table usuario;

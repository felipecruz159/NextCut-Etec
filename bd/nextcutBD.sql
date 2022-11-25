CREATE DATABASE nextcut;
USE nextcut;

CREATE TABLE `Endereco` (
  `idEndereco` INT NOT NULL AUTO_INCREMENT,
  `cep` VARCHAR(9) NOT NULL,
  `rua` VARCHAR(50) NOT NULL,
  `numero` INT NOT NULL,
  `bairro` VARCHAR(40) NOT NULL,
  `cidade` VARCHAR(30) NOT NULL,
  `estado` VARCHAR(15) NOT NULL,
  `complemento` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idEndereco`)
  );

  CREATE TABLE `Pessoa` (
  `idPessoa` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(60) NOT NULL,
  `sexo` VARCHAR(12) NOT NULL,
  `dataNascimento` DATE NOT NULL,
  `email` VARCHAR(60) NOT NULL,
  `telefone` VARCHAR(14) NOT NULL,
  `Endereco_idEndereco` INT NULL,
  `plano` VARCHAR(7) NOT NULL,
  `cargo` VARCHAR(12) NOT NULL,
  `senha` VARCHAR(32) NOT NULL,
  `foto` VARCHAR(30) NULL,
  PRIMARY KEY (`idPessoa`)
);

CREATE TABLE `Cliente` (
  `idCliente` INT NOT NULL AUTO_INCREMENT,
  `Pessoa_idPessoa` INT NOT NULL,
  `fotoCliente` VARCHAR(30) NULL,
  PRIMARY KEY (`idCliente`),
  CONSTRAINT `fk_Cliente_Pessoa` FOREIGN KEY (`Pessoa_idPessoa`) REFERENCES `nextcut`.`Pessoa` (`idPessoa`)
  );

CREATE TABLE `Estabelecimento` (
  `idEstabelecimento` INT NULL AUTO_INCREMENT,
  `nomeFantasia` VARCHAR(40) NOT NULL,
  `razaoSocial` VARCHAR(40) NULL,
  `cnpj` VARCHAR(15) NULL,
  `email` VARCHAR(60) NOT NULL,
  `telefone` VARCHAR(14) NOT NULL,
  `fotoEstabelecimento` VARCHAR(30) NOT NULL,
  `Endereco_idEndereco` INT NOT NULL,
  PRIMARY KEY (`idEstabelecimento`),
  CONSTRAINT `fk_Estabelecimento_Endereco` FOREIGN KEY (`Endereco_idEndereco`) REFERENCES `nextcut`.`Endereco` (`idEndereco`)
);

CREATE TABLE `HorarioFuncionamento` (
  `idHorarioFuncionamento` INT NOT NULL AUTO_INCREMENT,
  `horaInicio` TIME NOT NULL,
  `horarioTermino` TIME NOT NULL,
  `dia` VARCHAR(7) NOT NULL,
  `Estabelecimento_idEstabelecimento` INT NOT NULL,
  PRIMARY KEY (`idHorarioFuncionamento`),
  CONSTRAINT `fk_Estabelecimento_HorarioFuncionamento` FOREIGN KEY (`Estabelecimento_idEstabelecimento`) REFERENCES `nextcut`.`Estabelecimento` (idEstabelecimento)
  );

CREATE TABLE `Agendamento` (
  `idAgendamento` INT NOT NULL AUTO_INCREMENT,
  `horario` TIME NOT NULL,
  `data` DATE NOT NULL,
  `status` VARCHAR(10) NOT NULL,
  `Pessoa_idPessoa` INT NOT NULL,
  `Estabelecimento_idEstabelecimento` INT NOT NULL,
  PRIMARY KEY (`idAgendamento`),
  CONSTRAINT `fk_Pessoa_Agendamento` FOREIGN KEY (`Pessoa_idPessoa`) REFERENCES `nextcut`.`Pessoa` (idPessoa),
  CONSTRAINT `fk_Estabelecimento_Agendamento` FOREIGN KEY (`Estabelecimento_idEstabelecimento`) REFERENCES `nextcut`.`Estabelecimento` (idEstabelecimento)
  );

CREATE TABLE `Cabeleireiro` (
  `idCabeleireiro` INT NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(14) NOT NULL,
  `foto` VARCHAR(30) NOT NULL,
  `linkFacebook` VARCHAR(50) NULL,
  `linkInstagram` VARCHAR(50) NULL,
  `Pessoa_idPessoa` INT NOT NULL,
  `Estabelecimento_idEstabelecimento` INT NOT NULL,
  PRIMARY KEY (`idCabeleireiro`),
  CONSTRAINT `fk_Cabeleireiro_Pessoa` FOREIGN KEY (`Pessoa_idPessoa`) REFERENCES `nextcut`.`Pessoa` (`idPessoa`),
  CONSTRAINT `fk_Cabeleireiro_Estabelecimento` FOREIGN KEY (`Estabelecimento_idEstabelecimento`) REFERENCES `nextcut`.`Estabelecimento` (`idEstabelecimento`)
);

CREATE TABLE `Avaliacao` (
  `idAvaliacao` INT NOT NULL AUTO_INCREMENT,
  `avaliacaoCliente` VARCHAR(5) NULL,
  `Estabelecimento_idEstabelecimento` INT NOT NULL,
  `Pessoa_idPessoa` INT NOT NULL,
  PRIMARY KEY (`idAvaliacao`),
  CONSTRAINT `fk_Avaliacao_Estabelecimento` FOREIGN KEY (`Estabelecimento_idEstabelecimento`) REFERENCES `nextcut`.`Estabelecimento` (`idEstabelecimento`),
  CONSTRAINT `fk_Avaliacao_Pessoa` FOREIGN KEY (`Pessoa_idPessoa`) REFERENCES `nextcut`.`Pessoa` (`idPessoa`)
  );

#CABELEIREIRO
INSERT INTO endereco ( cep, estado, cidade, bairro, rua, numero, complemento ) VALUES ( '13306220', 'SP', 'Itu', 'Vila Prudente de Moraes', 'Vila Prudente de Moraes', '410', '' );
INSERT INTO pessoa ( nome, sexo, dataNascimento, email, senha, telefone, plano, Endereco_idEndereco, cargo ) VALUES ( 'RAFAEL', 'MASCULINO', '2004-01-07', 'barbeiro@email.com', '202cb962ac59075b964b07152d234b70', '(11)11111-1111', 'PREMIUM', '1', 'CABELEIREIRO' );
INSERT INTO estabelecimento ( cnpj, razaoSocial, nomeFantasia, email, telefone, Endereco_idEndereco ) VALUES ( '11.111.111/1111', 'Rafaelo', 'Rafaelos', 'barbeiro@email.com', '(11)11111-1111', '1' );
INSERT INTO cabeleireiro ( Pessoa_idPessoa, Estabelecimento_idEstabelecimento, cpf, foto ) VALUES ( '1', '1', '111.111.111-11', '000' );

#CLIENTE
INSERT INTO pessoa ( nome, sexo, dataNascimento, email, senha, telefone, cargo, plano, foto ) VALUES ( 'MARCOS' , 'MASCULINO' , '2003-10-13' , 'cliente@email.com' , '202cb962ac59075b964b07152d234b70', '(11)11111-1111', 'CLIENTE', 'BÁSICO', '000' );

#HORARIO FUNCIONAMENTO 
INSERT INTO horariofuncionamento (horaInicio, horarioTermino, dia, Estabelecimento_idEstabelecimento) VALUES ('07:00:00', '17:00:00', 'DOMINGO', '1');
INSERT INTO horariofuncionamento (horaInicio, horarioTermino, dia, Estabelecimento_idEstabelecimento) VALUES ('07:00:00', '17:00:00', 'SEGUNDA', '1');
INSERT INTO horariofuncionamento (horaInicio, horarioTermino, dia, Estabelecimento_idEstabelecimento) VALUES ('07:00:00', '17:00:00', 'TERCA', '1');
INSERT INTO horariofuncionamento (horaInicio, horarioTermino, dia, Estabelecimento_idEstabelecimento) VALUES ('07:00:00', '17:00:00', 'QUARTA', '1');
INSERT INTO horariofuncionamento (horaInicio, horarioTermino, dia, Estabelecimento_idEstabelecimento) VALUES ('07:00:00', '17:00:00', 'QUINTA', '1');
INSERT INTO horariofuncionamento (horaInicio, horarioTermino, dia, Estabelecimento_idEstabelecimento) VALUES ('07:00:00', '17:00:00', 'SEXTA', '1');
INSERT INTO horariofuncionamento (horaInicio, horarioTermino, dia, Estabelecimento_idEstabelecimento) VALUES ('07:00:00', '17:00:00', 'SABADO', '1');
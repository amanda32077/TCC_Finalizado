-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Out-2020 às 02:31
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `nvmd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `idagenda` int(11) NOT NULL,
  `data` date NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `idempresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`idagenda`, `data`, `descricao`, `idempresa`) VALUES
(3, '2020-05-20', 'Pagamento da Taxa Aduaneira', 3),
(4, '2020-12-24', 'Pagar Boletos do fornecedor X', 3),
(11, '2020-10-17', 'Caderno Happy vendido a $12,00', 4),
(13, '2020-09-30', 'Bolachas Recheadas', 4),
(15, '2020-10-31', 'ir ao fornecedor N', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `idcontato` int(11) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `idvendedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`idcontato`, `telefone`, `email`, `idvendedor`) VALUES
(10, '55 9858-2136', 'Fernando_J_P_@gmail.com', 10),
(11, '55 9858-2136', 'Fernando_J_P_@gmail.com', 10),
(12, '55 8799-5555', 'Fernando_J_P_@gmail.com', 10),
(13, '55 7847-9986', 'FehRod@gmail.com', 13),
(14, '54 8125-3233', 'PedroChips@gmail.com', 14),
(15, '54 8125-3233', 'Asa@gmail.com', 15),
(16, '55 8199-1244', 'carlosMg@gmail.com', 16),
(17, '54 92435566', 'SeuCoisinha@gmail.com', 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `idempresa` int(11) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`idempresa`, `senha`, `nome`) VALUES
(3, '123', 'Coca Cola'),
(4, '1234', 'Marques e Janner');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa_fornecedor`
--

CREATE TABLE `empresa_fornecedor` (
  `idempresa_fornecedor` int(11) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `idfornecedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresa_fornecedor`
--

INSERT INTO `empresa_fornecedor` (`idempresa_fornecedor`, `idempresa`, `idfornecedor`) VALUES
(15, 4, 15),
(16, 4, 16),
(17, 4, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `idfornecedor` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`idfornecedor`, `nome`) VALUES
(10, 'Coca Cola'),
(11, 'Zagonel'),
(12, 'Coca Cola'),
(15, 'Kasadora Distribuidora de Alimentos '),
(16, 'Bom Gosto Mesmo'),
(17, 'Coca Cola ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor_vendedor`
--

CREATE TABLE `fornecedor_vendedor` (
  `idfornecedor_vendedor` int(11) NOT NULL,
  `idfornecedor` int(11) NOT NULL,
  `idvendedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedor_vendedor`
--

INSERT INTO `fornecedor_vendedor` (`idfornecedor_vendedor`, `idfornecedor`, `idvendedor`) VALUES
(12, 15, 15),
(13, 16, 16),
(14, 10, 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idproduto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `codigo_de_venda` int(11) NOT NULL,
  `preco` varchar(20) NOT NULL,
  `quantidade_minima` int(11) NOT NULL,
  `idtipo` int(11) NOT NULL,
  `idfornecedor` int(11) NOT NULL,
  `idempresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idproduto`, `quantidade`, `descricao`, `codigo_de_venda`, `preco`, `quantidade_minima`, `idtipo`, `idfornecedor`, `idempresa`) VALUES
(34, 30, 'Caderno Happy AAA', 12, '13.50', 10, 5, 16, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_venda`
--

CREATE TABLE `produto_venda` (
  `idproduto_venda` int(11) NOT NULL,
  `idvenda` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `preco` varchar(20) NOT NULL,
  `codigo_de_venda` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `idproduto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto_venda`
--

INSERT INTO `produto_venda` (`idproduto_venda`, `idvenda`, `descricao`, `preco`, `codigo_de_venda`, `quantidade`, `idproduto`) VALUES
(9, 9, 'Caderno Happy AAA', '10,00', 12, 5, 34);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `idtipo` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`idtipo`, `descricao`) VALUES
(4, 'Bebida'),
(5, 'Material Escolar'),
(6, 'Higiene'),
(7, 'Biscoito'),
(8, 'Doce'),
(9, 'Molho'),
(10, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `idvenda` int(11) NOT NULL,
  `data_venda` date NOT NULL,
  `idempresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`idvenda`, `data_venda`, `idempresa`) VALUES
(9, '2020-03-24', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `idvendedor` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendedor`
--

INSERT INTO `vendedor` (`idvendedor`, `nome`) VALUES
(10, 'Caio Ribeiro'),
(11, 'Caio Ribeiro'),
(12, 'Caio Ribeiro'),
(13, 'Fernando Collor'),
(14, 'Fernando Junior Pereira'),
(15, 'AtÃ­lio Fontana'),
(16, 'Carlos Magno '),
(17, 'Luis Perreira');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`idagenda`),
  ADD KEY `idempresa` (`idempresa`);

--
-- Índices para tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`idcontato`),
  ADD KEY `idvendedor` (`idvendedor`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idempresa`);

--
-- Índices para tabela `empresa_fornecedor`
--
ALTER TABLE `empresa_fornecedor`
  ADD PRIMARY KEY (`idempresa_fornecedor`),
  ADD KEY `idempresa` (`idempresa`),
  ADD KEY `idfornecedor` (`idfornecedor`);

--
-- Índices para tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`idfornecedor`);

--
-- Índices para tabela `fornecedor_vendedor`
--
ALTER TABLE `fornecedor_vendedor`
  ADD PRIMARY KEY (`idfornecedor_vendedor`),
  ADD KEY `idfornecedor` (`idfornecedor`),
  ADD KEY `idvendedor` (`idvendedor`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idproduto`),
  ADD KEY `idtipo` (`idtipo`),
  ADD KEY `idfornecedor` (`idfornecedor`),
  ADD KEY `idempresa` (`idempresa`);

--
-- Índices para tabela `produto_venda`
--
ALTER TABLE `produto_venda`
  ADD PRIMARY KEY (`idproduto_venda`),
  ADD KEY `idvenda` (`idvenda`);

--
-- Índices para tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`idtipo`);

--
-- Índices para tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`idvenda`),
  ADD KEY `idempresa` (`idempresa`);

--
-- Índices para tabela `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`idvendedor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `idagenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `idcontato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idempresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `empresa_fornecedor`
--
ALTER TABLE `empresa_fornecedor`
  MODIFY `idempresa_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `idfornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `fornecedor_vendedor`
--
ALTER TABLE `fornecedor_vendedor`
  MODIFY `idfornecedor_vendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `idproduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `produto_venda`
--
ALTER TABLE `produto_venda`
  MODIFY `idproduto_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `idtipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `idvenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `idvendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`idempresa`) REFERENCES `empresa` (`idempresa`);

--
-- Limitadores para a tabela `contato`
--
ALTER TABLE `contato`
  ADD CONSTRAINT `contato_ibfk_1` FOREIGN KEY (`idvendedor`) REFERENCES `vendedor` (`idvendedor`);

--
-- Limitadores para a tabela `empresa_fornecedor`
--
ALTER TABLE `empresa_fornecedor`
  ADD CONSTRAINT `empresa_fornecedor_ibfk_1` FOREIGN KEY (`idempresa`) REFERENCES `empresa` (`idempresa`),
  ADD CONSTRAINT `empresa_fornecedor_ibfk_2` FOREIGN KEY (`idfornecedor`) REFERENCES `fornecedor` (`idfornecedor`);

--
-- Limitadores para a tabela `fornecedor_vendedor`
--
ALTER TABLE `fornecedor_vendedor`
  ADD CONSTRAINT `fornecedor_vendedor_ibfk_1` FOREIGN KEY (`idfornecedor`) REFERENCES `fornecedor` (`idfornecedor`),
  ADD CONSTRAINT `fornecedor_vendedor_ibfk_2` FOREIGN KEY (`idvendedor`) REFERENCES `vendedor` (`idvendedor`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`idtipo`) REFERENCES `tipo` (`idtipo`),
  ADD CONSTRAINT `produto_ibfk_2` FOREIGN KEY (`idfornecedor`) REFERENCES `fornecedor` (`idfornecedor`),
  ADD CONSTRAINT `produto_ibfk_3` FOREIGN KEY (`idempresa`) REFERENCES `empresa` (`idempresa`);

--
-- Limitadores para a tabela `produto_venda`
--
ALTER TABLE `produto_venda`
  ADD CONSTRAINT `produto_venda_ibfk_1` FOREIGN KEY (`idvenda`) REFERENCES `venda` (`idvenda`);

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`idempresa`) REFERENCES `empresa` (`idempresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

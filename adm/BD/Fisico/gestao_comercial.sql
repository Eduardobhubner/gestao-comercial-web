-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 06/02/2021 às 07:06
-- Versão do servidor: 5.6.41-84.1
-- Versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `vhhook31_tabacaria`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `idCat` int(11) NOT NULL,
  `nomeCat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `obsCat` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`idCat`, `nomeCat`, `obsCat`) VALUES
(1, 'catTeste', 'Aqui você vai poder colocar todas as observações sobre a categoria que deseja cadastrar, como por exemplo, Carvão - Usado no fumo para aquecer a água. OBS: esse exemplo foi uma bosta'),
(2, 'teste2', 'teste2'),
(3, 'Steams', 'Partes centrais do narguile'),
(4, 'Essencias', 'Refil');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nomeCliente` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `emailCliente` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cpfCliente` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `instagramCliente` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `celCliente` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cepCliente` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `estadoCliente` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cidCliente` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `endCliente` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sexoCliente` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `enviarEmailCliente` int(1) NOT NULL,
  `enviarSmsCliente` int(1) NOT NULL,
  `nascCliente` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nomeCliente`, `emailCliente`, `cpfCliente`, `instagramCliente`, `celCliente`, `cepCliente`, `estadoCliente`, `cidCliente`, `endCliente`, `sexoCliente`, `enviarEmailCliente`, `enviarSmsCliente`, `nascCliente`) VALUES
(1, 'Eduardo Balan Hubner', 'eduardobhubner@gmail.com', '493.555.068-64', '@balanzinho', '(11)94194-1066', '06342-000', 'SP', 'Carapicuíba', 'Estrada Taguai', 'M', 0, 0, '2001-08-14'),
(4, 'teste', 'teste', '111.111.111-11', 'teste', '(11)11111-1111', '11111-111', 'AC', 'teste', 'teste', 'f', 0, 0, '2002-12-12'),
(5, 'teste2', 'teste2@gmail.com', '999.999.999-99', 'adc', '(99)99999-9999', '99999-999', 'GO', 'teste2', 'teste2', 'M', 0, 0, '2010-11-11'),
(6, 'Comeia', 'comeia@gmail.com', '123.123.123-12', '@comeia', '(12)31231-2312', '12312-312', 'GO', 'comeia', 'comeia', 'M', 0, 0, '2020-11-11'),
(7, 'Rubens Hubner', 'rubenshubnerjunior2010@gmail.com', '89570332891', 'rubenshubnerjunior', '(11)99939-5578', '06329-410', 'SP', 'Carapicuíba', 'Rua Ibirama 125', 'M', 0, 0, '1956-03-14'),
(8, 'Katherina Aguilar Lino', 'Kath.aguilino@gmail.com', '541.319.148-08', '@ka_aguilino', '(11)98778-0206', '06122-080', 'SP', 'Osasco', 'Rua Sebastião Gonçalves da Silva', 'f', 0, 0, '2002-10-25'),
(9, 'Marquinho', 'Marquinho@gmail.com', '591.238.975-89', '@Marquinho_', '(23)49886-5721', '23498-981', 'AC', 'Não tem', 'Jurassic Park ', 'M', 0, 0, '2000-04-12'),
(10, 'Jõaozinho', 'Jõaozinho@gmail.com', '123.123.123-12', '@Jõaozinho_', '(49)55028-5921', '58927-592', 'RN', 'casa do caralho', 'mais dois metros', 'O', 0, 0, '1990-12-31'),
(11, 'Eduardo Pereira Nascimento', 'epereira607@gmail.com', '056.100.338-10', 'edupn_', '(11)98112-0937', '06223-070', 'SP', 'Osasco, São Paulo, Brasil', 'RUA ALTO ALEGRE', 'f', 0, 0, '2002-05-26');

-- --------------------------------------------------------

--
-- Estrutura para tabela `compra`
--

CREATE TABLE `compra` (
  `idCompra` int(11) NOT NULL,
  `valorTotalCompra` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dataCompra` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `quantProdCompra` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `valorFreteCompra` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `numDocCompra` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idForn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `compra_produto`
--

CREATE TABLE `compra_produto` (
  `idCompra` int(11) NOT NULL,
  `idProd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `idForn` int(11) NOT NULL,
  `razaoSocialForn` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nomeForn` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cnpjForn` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `telForn` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `celForn` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `endForn` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cidForn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estadoForn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cepForn` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `emailForn` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `fornecedor`
--

INSERT INTO `fornecedor` (`idForn`, `razaoSocialForn`, `nomeForn`, `cnpjForn`, `telForn`, `celForn`, `endForn`, `cidForn`, `estadoForn`, `cepForn`, `emailForn`) VALUES
(1, 'teste1', 'teste1', '11.111.111/1111-11', '(11)1111-1111', '(11)11111-1111', 'teste1', '', 'SP', '11111-111', 'teste1@gmai.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `idProd` int(11) NOT NULL,
  `nomeProd` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `codBarraProd` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `codNumProd` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descriProd` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `estoqueProd` int(20) NOT NULL,
  `valorCompraProd` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `imgProd` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `unidMedProd` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `marcaProd` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idCat` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`idProd`, `nomeProd`, `codBarraProd`, `codNumProd`, `descriProd`, `estoqueProd`, `valorCompraProd`, `imgProd`, `unidMedProd`, `marcaProd`, `idCat`) VALUES
(10, 'produto1', '123', '321', 'produto1', 1, '10', 'img_logo.jpg', 'kg', 'produto1', '2'),
(11, 'produto2', '222', '999', 'produto2', 10, '50', 'img_logo.jpg', 'kg', 'produto2', '1'),
(12, 'Fresh Lemon', '17898927097698', '9923', 'ziggy limão', 7, '6.99', 'img_logo.jpg', 'un', 'Ziggy', '4'),
(13, 'Banana Tropical', '17898965792067', '1334', 'Essencia de banana', 14, '6.99', 'happy-frutti.png', 'un', 'Ziggy', '4'),
(14, 'Laranjola', '65469841', '2988', 'Laranja com acerola', 26, '6.99', 'happy-frutti.png', 'un', 'Ziggy', '3'),
(15, 'Hapocalyx mint', '7898927097684', '2958', 'Essencia menta da ziggy', 10, '6.99', 'hapocalyx-mint.png', 'un', 'Ziggy', '4'),
(16, 'Macchiato', '17898927097797', '7823', 'Cafe da ziggy', 4, '6.99', 'caffe-macchiato.png', 'un', 'Ziggy', '4'),
(17, 'AMORAWI', '06028838615818', 'Ess_001', 'Amora com kiwi da FM', 9, '8.9', 'transferir.jpg', 'un', 'FM', '4'),
(18, 'Cane Mint', '1 06 02883 57170 0', 'Ess_002', 'Cana com menta', 6, '8.9', 'fm-brasil-cane-mint.jpg', 'un', 'FM', '4'),
(19, 'DENSUKE', '1060288357', 'Ess_003', 'Melancia Densuke', 7, '8.9', 'fm-brasil-densuke-50g.jpg', 'un', 'FM', '4'),
(20, 'FROST ICE', '10602883861579', 'Ess_004', 'Menta Gelada', 10, '8.9', 'fm-brasil-frost-ice.jpg', 'un', 'FM', '4'),
(21, 'LEMON MINT', '10602883030296', 'Ess_005', 'Limão com Menta', 5, '8.9', 'Sem título.png', 'un', 'FM', '4'),
(22, 'RES GUMMY BEAR', '10602883030289', 'Ess_006', 'Groselha com Fremboesa', 7, '8.9', 'FM-Brasil-Red-Gummy-Bear.jpg', 'un', 'FM', '4'),
(23, 'ARTIC CHERRY', '00202077', 'Ess_007', 'Cereja gelada', 9, '7.5', 'pimp-50g-artic-cherry1-b27d388e52e82e3c4b15931098085459-640-0.jpg', 'un', 'PIMP', '4'),
(24, 'ARTIC LEMON', '00202060', 'Ess_008', 'Limão gelado', 8, '7.5', 'transferir (1).jpg', 'un', 'PIMP', '4'),
(25, 'EXPLOSION GRAPES', '00202022', 'Ess_009', 'Chiclete de uva', 10, '7.5', 'Pimp uva.jpg', 'un', 'PIMP', '4'),
(26, 'EXPLOSION GREEN', '00202183', 'Ess_010', 'Maça verde', 7, '7.5', 'transferir (2).jpg', 'un', 'PIMP', '4'),
(27, 'PURE MINT', '00202046', 'Ess_011', 'Menta gelada', 9, '7.5', 'transferir (2).jpg', 'un', 'PIMP', '4'),
(28, 'New Morangi', '00202138', 'Ess_012', 'laranja, pêra, manga', 8, '7.5', 'transferir (3).jpg', 'un', 'PIMP', '4');

-- --------------------------------------------------------

--
-- Estrutura para tabela `venda`
--

CREATE TABLE `venda` (
  `idVenda` int(11) NOT NULL,
  `dataVenda` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `quantItensVenda` int(10) NOT NULL,
  `valorTotalVenda` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `valorImpostoVenda` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `valorEmbalaVenda` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `valorFreteVenda` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `statusVenda` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `numDocVenda` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `venda_produto`
--

CREATE TABLE `venda_produto` (
  `idVenda` int(11) NOT NULL,
  `idProd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCat`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices de tabela `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`idCompra`),
  ADD KEY `idForn` (`idForn`);

--
-- Índices de tabela `compra_produto`
--
ALTER TABLE `compra_produto`
  ADD KEY `idCompra` (`idCompra`),
  ADD KEY `idProduto` (`idProd`);

--
-- Índices de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`idForn`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProd`);

--
-- Índices de tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`idVenda`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Índices de tabela `venda_produto`
--
ALTER TABLE `venda_produto`
  ADD KEY `idVenda` (`idVenda`),
  ADD KEY `idProd` (`idProd`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `compra`
--
ALTER TABLE `compra`
  MODIFY `idCompra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `idForn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `idProd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `idVenda` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`idForn`) REFERENCES `fornecedor` (`idForn`);

--
-- Restrições para tabelas `compra_produto`
--
ALTER TABLE `compra_produto`
  ADD CONSTRAINT `compra_produto_ibfk_1` FOREIGN KEY (`idCompra`) REFERENCES `compra` (`idCompra`),
  ADD CONSTRAINT `compra_produto_ibfk_2` FOREIGN KEY (`idProd`) REFERENCES `produto` (`idProd`);

--
-- Restrições para tabelas `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);

--
-- Restrições para tabelas `venda_produto`
--
ALTER TABLE `venda_produto`
  ADD CONSTRAINT `venda_produto_ibfk_1` FOREIGN KEY (`idVenda`) REFERENCES `venda` (`idVenda`),
  ADD CONSTRAINT `venda_produto_ibfk_2` FOREIGN KEY (`idProd`) REFERENCES `produto` (`idProd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

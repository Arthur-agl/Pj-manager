-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Maio-2017 às 19:49
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clientes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `email` text NOT NULL,
  `empresa_assoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idcliente`, `first_name`, `last_name`, `cpf`, `telefone`, `email`, `empresa_assoc`) VALUES
(2, 'Brenda', 'Leijon', '123.456.289-1', '(55)31987-654', 'brenda@email.com', 1),
(5, 'Alex', 'Silva', '111.111.111-11', '(31)11111-1111', 'alan@email.com', 1),
(15, 'Alex', 'Marinho', '562.067.396-74', '(39)84523-5893', 'alex@email.com', 2),
(16, 'JÃºlia', 'Coutinho', '128.947.590-38', '(31)98675-8904', 'julia@email.com', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `idempresa` int(11) NOT NULL,
  `Nome` text,
  `CNPJ` varchar(20) NOT NULL,
  `endereco` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`idempresa`, `Nome`, `CNPJ`, `endereco`) VALUES
(1, 'Empresa S.A', '33333333333333', 'rua x, numero y, bairroz, MG brasil'),
(2, 'Empresa inc.', '98.735.893/2759-08', 'Rua x bairro Y alamenda dos doces Z'),
(3, 'Stock+', '09.436.790/4837-64', 'Avenida Amarantes, 4432, sÃ£o Paulo, SP');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE `projeto` (
  `idprojeto` int(11) NOT NULL,
  `cliente_assoc` int(11) NOT NULL,
  `data_assinatura` date NOT NULL,
  `valor` int(10) UNSIGNED NOT NULL,
  `description` longtext,
  `data_entrega` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`idprojeto`, `cliente_assoc`, `data_assinatura`, `valor`, `description`, `data_entrega`) VALUES
(2, 2, '2017-05-02', 4000, 'Projeto LIFE 2.0', '2017-05-24'),
(5, 5, '2017-05-17', 3500, 'Quiz 2.0', '2017-05-31'),
(6, 15, '2017-05-10', 15000, 'BestBuy', '2017-06-20'),
(7, 2, '2017-05-18', 2000, 'Blog 3.0', '2017-05-28'),
(9, 5, '2017-02-01', 800000, 'Google+', '2017-10-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  ADD KEY `empresa_assoc_idx` (`empresa_assoc`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idempresa`),
  ADD UNIQUE KEY `CNPJ_UNIQUE` (`CNPJ`);

--
-- Indexes for table `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`idprojeto`),
  ADD KEY `cliente_assoc_idx` (`cliente_assoc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idempresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `projeto`
--
ALTER TABLE `projeto`
  MODIFY `idprojeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `empresa_assoc` FOREIGN KEY (`empresa_assoc`) REFERENCES `empresa` (`idempresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `projeto`
--
ALTER TABLE `projeto`
  ADD CONSTRAINT `cliente_assoc` FOREIGN KEY (`cliente_assoc`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

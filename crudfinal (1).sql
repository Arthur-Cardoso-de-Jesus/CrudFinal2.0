-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Dez-2023 às 03:14
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crudfinal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtarefa`
--

CREATE TABLE `tbtarefa` (
  `pkIdTare` int(50) NOT NULL,
  `tituloTare` varchar(20) NOT NULL,
  `descricaoTare` text NOT NULL,
  `dataTare` date NOT NULL,
  `concluida` varchar(5) NOT NULL DEFAULT 'Não',
  `fkIdUsu` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbtarefa`
--

INSERT INTO `tbtarefa` (`pkIdTare`, `tituloTare`, `descricaoTare`, `dataTare`, `concluida`, `fkIdUsu`) VALUES
(5, 'Teste', 'Teste', '2023-12-14', 'Não', 9),
(11, '123', '123', '0000-00-00', 'Não', 9),
(12, 'A', '321', '0000-00-00', 'Não', 17),
(13, 'teste', 'teste', '0000-00-00', 'Não', 9),
(14, '1231', '123123', '0000-00-00', 'Não', 9),
(15, '123123', '123123', '0000-00-00', 'Não', 9),
(16, '11231', '123123', '0000-00-00', 'Não', 9),
(17, 'teste', 'ajsndkajsdkasjbdkajsbd kasjbd kasj bkabj b jd jbsjba jbkskjs ka kajbd kjd abjasb d', '0000-00-00', 'Não', 9),
(18, 'wrw', 'alsdnalksndlaksn ldkna kdl nask ndalksn dkn k nnsasnlks kd n knk dsk dsn sd nskla klsdkldk ndk nk d kn dkskl sakdlaknsndk nk s kad s', '0000-00-00', 'Não', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

CREATE TABLE `tbusuario` (
  `pkIdUsu` int(50) NOT NULL,
  `emailUsu` varchar(50) NOT NULL,
  `nomeUsu` varchar(50) NOT NULL,
  `senhaUsu` varchar(50) NOT NULL,
  `adm` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbusuario`
--

INSERT INTO `tbusuario` (`pkIdUsu`, `emailUsu`, `nomeUsu`, `senhaUsu`, `adm`) VALUES
(9, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', 1),
(17, 'f', 'f', '8fa14cdd754f91cc6554c9e71929cce7', 0),
(18, 'teste', 'teste', '698dc19d489c4e4db73e28a713eab07b', 0),
(19, 'q', 'q', '7694f4a66316e53c8cdd9d9954bd611d', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbtarefa`
--
ALTER TABLE `tbtarefa`
  ADD PRIMARY KEY (`pkIdTare`),
  ADD KEY `tbtarefa_ibfk_1` (`fkIdUsu`);

--
-- Índices para tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`pkIdUsu`),
  ADD UNIQUE KEY `emailUsu` (`emailUsu`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbtarefa`
--
ALTER TABLE `tbtarefa`
  MODIFY `pkIdTare` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `pkIdUsu` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbtarefa`
--
ALTER TABLE `tbtarefa`
  ADD CONSTRAINT `tbtarefa_ibfk_1` FOREIGN KEY (`fkIdUsu`) REFERENCES `tbusuario` (`pkIdUsu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

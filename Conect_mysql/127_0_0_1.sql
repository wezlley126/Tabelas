-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Set-2022 às 20:04
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
-- Banco de dados: `biblioteca_contas`
--
CREATE DATABASE IF NOT EXISTS `biblioteca_contas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `biblioteca_contas`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`) VALUES
(1, 'weslleyborges34@gmail.com', '7cef99583b2a7965f540d811c392cdad');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Banco de dados: `sistema_tabelas`
--
CREATE DATABASE IF NOT EXISTS `sistema_tabelas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sistema_tabelas`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `inventário_ce_sp`
--

CREATE TABLE `inventário_ce_sp` (
  `id` int(11) NOT NULL,
  `Usuário` varchar(30) DEFAULT NULL,
  `Unidade` varchar(30) DEFAULT NULL,
  `Departamento` varchar(30) DEFAULT NULL,
  `Equipamento` varchar(30) DEFAULT NULL,
  `Patrimônio` varchar(30) DEFAULT NULL,
  `NF` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nova`
--

CREATE TABLE `nova` (
  `id` int(11) NOT NULL,
  `ads` varchar(100) DEFAULT NULL,
  `ad` varchar(100) DEFAULT NULL,
  `dsa` varchar(100) DEFAULT NULL,
  `dsds` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `nova`
--

INSERT INTO `nova` (`id`, `ads`, `ad`, `dsa`, `dsds`) VALUES
(1, 'adicionar valor 1', 'dsds', 'sora', 'aaa'),
(3, 'adicionar valor 1', 'dsds', 'sora', 'rar'),
(5, 'nome', '', 'adicionar2', 'aaa'),
(6, 'nome', 'fdsfds', 'sora', 'aaa'),
(8, 'nome', 'gfsgf', 'sora', 'rar'),
(9, 'nome', 'fdfsd', 'sora', 'aaa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela`
--

CREATE TABLE `tabela` (
  `id` int(11) NOT NULL,
  `nomea` varchar(100) DEFAULT NULL,
  `nomura` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tabela`
--

INSERT INTO `tabela` (`id`, `nomea`, `nomura`) VALUES
(1, '', ''),
(2, '', ''),
(3, '', ''),
(4, '', ''),
(5, '', ''),
(6, '', ''),
(7, '', ''),
(8, '', ''),
(9, '', ''),
(10, '', ''),
(11, '', ''),
(12, '', ''),
(13, '', ''),
(14, '', ''),
(15, '', ''),
(16, '', ''),
(17, '', ''),
(18, '', ''),
(19, '', ''),
(20, '', ''),
(21, '', ''),
(22, '', ''),
(23, '', ''),
(24, '', ''),
(25, '', ''),
(26, '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela2`
--

CREATE TABLE `tabela2` (
  `id` int(11) NOT NULL,
  `Coluna_1` varchar(30) DEFAULT NULL,
  `ds` varchar(30) DEFAULT NULL,
  `dfsds` varchar(30) DEFAULT NULL,
  `dsad` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabelas`
--

CREATE TABLE `tabelas` (
  `id` int(11) NOT NULL,
  `a` varchar(30) DEFAULT NULL,
  `b` varchar(30) DEFAULT NULL,
  `c` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tabelas`
--

INSERT INTO `tabelas` (`id`, `a`, `b`, `c`) VALUES
(1, 'lklj', 'hg', 'gh');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabua`
--

CREATE TABLE `tabua` (
  `id` int(11) NOT NULL,
  `Nome` varchar(30) DEFAULT NULL,
  `Sobrenome` varchar(30) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tabua`
--

INSERT INTO `tabua` (`id`, `Nome`, `Sobrenome`, `Email`) VALUES
(1, 'adicionar valor 1', 'adicionar2', 'aaa'),
(2, 'adicionar valor 1', 'adicionar2', 'rar'),
(5, 'dsdsdsd', 'dsdsds', 'dsdsdss');

-- --------------------------------------------------------

--
-- Estrutura da tabela `testa`
--

CREATE TABLE `testa` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `noma` varchar(100) DEFAULT NULL,
  `sobrenome` varchar(30) DEFAULT NULL,
  `CampO` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `testa`
--

INSERT INTO `testa` (`id`, `nome`, `noma`, `sobrenome`, `CampO`) VALUES
(4, 'dsads', NULL, 'dsad', 'dsda'),
(6, 'dasdsa', NULL, 'dsad', 'dsada'),
(8, 'dsadsa', NULL, 'dsada', 'dsada'),
(10, 'asdasd', NULL, 'drop', 'dsad'),
(12, 'drop ', NULL, 'sadas', 'dsadas'),
(15, 'dasdas', NULL, 'dsadsa', 'dsadasds'),
(16, 'adicionar valor 1', NULL, 'sora', 'aaa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `testado`
--

CREATE TABLE `testado` (
  `id` int(11) NOT NULL,
  `Ara` varchar(30) DEFAULT NULL,
  `Rar` varchar(30) DEFAULT NULL,
  `A` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `inventário_ce_sp`
--
ALTER TABLE `inventário_ce_sp`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `nova`
--
ALTER TABLE `nova`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tabela`
--
ALTER TABLE `tabela`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tabela2`
--
ALTER TABLE `tabela2`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tabelas`
--
ALTER TABLE `tabelas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tabua`
--
ALTER TABLE `tabua`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `testa`
--
ALTER TABLE `testa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `testado`
--
ALTER TABLE `testado`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `inventário_ce_sp`
--
ALTER TABLE `inventário_ce_sp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `nova`
--
ALTER TABLE `nova`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tabela`
--
ALTER TABLE `tabela`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `tabela2`
--
ALTER TABLE `tabela2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tabelas`
--
ALTER TABLE `tabelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tabua`
--
ALTER TABLE `tabua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `testa`
--
ALTER TABLE `testa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `testado`
--
ALTER TABLE `testado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

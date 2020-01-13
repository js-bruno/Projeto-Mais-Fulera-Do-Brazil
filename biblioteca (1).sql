-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2020 at 04:07 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteca`
--

-- --------------------------------------------------------

--
-- Table structure for table `alugar`
--

CREATE TABLE `alugar` (
  `cod_emp` int(100) NOT NULL,
  `cod_livro` int(200) NOT NULL,
  `cod_usu` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alugar`
--

INSERT INTO `alugar` (`cod_emp`, `cod_livro`, `cod_usu`) VALUES
(8, 9, 3),
(9, 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `autores`
--

CREATE TABLE `autores` (
  `cod_autor` int(200) NOT NULL,
  `nome_autor` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `autores`
--

INSERT INTO `autores` (`cod_autor`, `nome_autor`) VALUES
(3, 'ananda'),
(8, 'Ismael');

-- --------------------------------------------------------

--
-- Table structure for table `cursos`
--

CREATE TABLE `cursos` (
  `cod_curso` int(2) NOT NULL,
  `nome_curso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cursos`
--

INSERT INTO `cursos` (`cod_curso`, `nome_curso`) VALUES
(1, 'Informática 1'),
(2, 'Mecânica 1'),
(3, 'Eletrotécnica 1'),
(4, 'Administração 1');

-- --------------------------------------------------------

--
-- Table structure for table `descricao`
--

CREATE TABLE `descricao` (
  `cod_livro` int(200) NOT NULL,
  `cod_autor` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `genero`
--

CREATE TABLE `genero` (
  `cod_genero` int(200) NOT NULL,
  `nome_genero` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genero`
--

INSERT INTO `genero` (`cod_genero`, `nome_genero`) VALUES
(9, '7t7cut'),
(10, 'terror');

-- --------------------------------------------------------

--
-- Table structure for table `livros`
--

CREATE TABLE `livros` (
  `cod_livro` int(200) NOT NULL,
  `nome_livro` varchar(200) NOT NULL,
  `status_livro` tinyint(1) DEFAULT NULL,
  `cod_genero` int(200) NOT NULL,
  `cod_autor` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `livros`
--

INSERT INTO `livros` (`cod_livro`, `nome_livro`, `status_livro`, `cod_genero`, `cod_autor`) VALUES
(9, 'ismael', 1, 9, 3),
(10, 'abelha', 1, 10, 8);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `cod` int(50) NOT NULL,
  `login_nome` varchar(200) NOT NULL,
  `login_senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`cod`, `login_nome`, `login_senha`) VALUES
(1, 'ismael', '123');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `cod_usu` int(200) NOT NULL,
  `nome_usu` varchar(200) NOT NULL,
  `curso_usu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`cod_usu`, `nome_usu`, `curso_usu`) VALUES
(3, 'Nara Hévila Costa Carvalho', 'Informática'),
(5, 'dad', 'Eletrotécnica 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alugar`
--
ALTER TABLE `alugar`
  ADD PRIMARY KEY (`cod_emp`);

--
-- Indexes for table `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`cod_autor`);

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`cod_curso`);

--
-- Indexes for table `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`cod_genero`);

--
-- Indexes for table `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`cod_livro`),
  ADD KEY `cod_autor` (`cod_autor`),
  ADD KEY `cod_genero` (`cod_genero`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_usu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alugar`
--
ALTER TABLE `alugar`
  MODIFY `cod_emp` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `autores`
--
ALTER TABLE `autores`
  MODIFY `cod_autor` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `cod_curso` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `genero`
--
ALTER TABLE `genero`
  MODIFY `cod_genero` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `livros`
--
ALTER TABLE `livros`
  MODIFY `cod_livro` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `cod` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_usu` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

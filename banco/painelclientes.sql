-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Set-2021 às 02:12
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `painelclientes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `nomecompleto` varchar(100) NOT NULL,
  `datanasc` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cep` varchar(100) NOT NULL,
  `logradouro` varchar(50) NOT NULL,
  `uf` varchar(10) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`nomecompleto`, `datanasc`, `email`, `cep`, `logradouro`, `uf`, `bairro`, `cidade`, `complemento`, `id`) VALUES
('Gilberto Carlos Santos', '1979-05-27', 'gilberto@hotmail.com', '40425-240', 'Avenida Constelação', 'BA', 'Monte Serrat', 'Salvador', 'Casa', 1),
('Ana Soares da Silva', '1988-08-26', 'ana@hotmail.com', '59147-640', 'Rua Luiz Soares da Câmara', 'RN', 'Vida Nova', 'Parnamirim', 'Casa', 2),
('Jenival Lacerda Santos', '1983-02-14', 'jenival@gmail.com', '78091-220', 'Travessa L-7', 'MT', 'Liberdade', 'Cuiabá', 'Apartamento', 3),
('Ferdinando Fernandes Lemos', '2000-01-10', 'ferdinando@outlook.com', '66816-880', 'Beco São João', 'PA', 'Pratinha (Icoaraci)', 'Belém', 'Apartamento', 4),
('Afonso Padilha ', '1981-07-27', 'afonso@yahoo.com.br', '59621-524', 'Rua José Mendes da Rocha', 'RN', 'Santo Antônio', 'Mossoró', 'Apartamento', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `user` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `adm` int(1) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`user`, `senha`, `nome`, `adm`, `id`) VALUES
('admin', 'admin', 'Administrador', 1, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/05/2026 às 02:16
-- Versão do servidor: 8.0.40
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `eshoptbkau`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `anuncios`
--

CREATE TABLE `anuncios` (
  `idAnuncio` int NOT NULL,
  `Usuarios_idUsuario` int NOT NULL,
  `fotoAnuncio` varchar(100) NOT NULL,
  `tituloAnuncio` varchar(25) NOT NULL,
  `categoriaAnuncio` varchar(15) NOT NULL,
  `descricaoAnuncio` varchar(255) NOT NULL,
  `valorAnuncio` decimal(10,2) NOT NULL,
  `dataAnuncio` date NOT NULL,
  `horaAnuncio` time NOT NULL,
  `statusAnuncio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `anuncios`
--

INSERT INTO `anuncios` (`idAnuncio`, `Usuarios_idUsuario`, `fotoAnuncio`, `tituloAnuncio`, `categoriaAnuncio`, `descricaoAnuncio`, `valorAnuncio`, `dataAnuncio`, `horaAnuncio`, `statusAnuncio`) VALUES
(1, 8, 'assets/img/ceramica fria.jpg', 'Cerâmica Fria', 'games', 'Cerâmica Fria para artesanato', 1990.00, '2026-04-27', '20:32:25', 'finalizado'),
(2, 1, 'assets/img/snoop.jpg', 'SNOOP', 'games', 'NUUPI', 237.00, '2026-04-27', '20:58:10', 'disponivel');

-- --------------------------------------------------------

--
-- Estrutura para tabela `compras`
--

CREATE TABLE `compras` (
  `idCompra` int NOT NULL,
  `Usuarios_idUsuario` int NOT NULL,
  `Anuncios_idAnuncio` int NOT NULL,
  `dataCompra` date NOT NULL,
  `horaCompra` time NOT NULL,
  `valorCompra` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `compras`
--

INSERT INTO `compras` (`idCompra`, `Usuarios_idUsuario`, `Anuncios_idAnuncio`, `dataCompra`, `horaCompra`, `valorCompra`) VALUES
(1, 1, 1, '2026-05-25', '20:37:45', 1990.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int NOT NULL,
  `fotoUsuario` varchar(100) NOT NULL,
  `nomeUsuario` varchar(50) NOT NULL,
  `dataUsuario` date NOT NULL,
  `cidadeUsuario` varchar(30) NOT NULL,
  `emailUsuario` varchar(60) NOT NULL,
  `senhaUsuario` varchar(100) NOT NULL,
  `nivelUsuario` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `fotoUsuario`, `nomeUsuario`, `dataUsuario`, `cidadeUsuario`, `emailUsuario`, `senhaUsuario`, `nivelUsuario`) VALUES
(1, 'assets/img/Captura de tela 2025-05-14 083629.png', 'Constantino Moreira', '2025-09-02', 'reserva', 'constantino@gmail.com', '3dbe00a167653a1aaee01d93e77e730e', 'usuario'),
(2, 'assets/img/Captura de tela 2025-03-10 081504.png', 'Pou enrraivado', '2010-01-21', 'curiuva', 'pouenrraivado@gmail.com', '79ff73a86f0aba2383b5ec45b102389f', 'usuario'),
(8, 'assets/img/snoop.jpg', 'Adiministrador', '2026-04-03', 'curiuva', 'kau@gmail.com', '3dbe00a167653a1aaee01d93e77e730e', 'administrador');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`idAnuncio`),
  ADD KEY `fk_anuncios_usuarios` (`Usuarios_idUsuario`);

--
-- Índices de tabela `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`idCompra`),
  ADD KEY `fk_compras_usuarios` (`Usuarios_idUsuario`),
  ADD KEY `fk_compras_anuncios` (`Anuncios_idAnuncio`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `idAnuncio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `compras`
--
ALTER TABLE `compras`
  MODIFY `idCompra` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `anuncios`
--
ALTER TABLE `anuncios`
  ADD CONSTRAINT `fk_anuncios_usuarios` FOREIGN KEY (`Usuarios_idUsuario`) REFERENCES `usuarios` (`idUsuario`);

--
-- Restrições para tabelas `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_compras_anuncios` FOREIGN KEY (`Anuncios_idAnuncio`) REFERENCES `anuncios` (`idAnuncio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_compras_usuarios` FOREIGN KEY (`Usuarios_idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

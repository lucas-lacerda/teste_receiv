-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Maio-2020 às 00:28
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `receiv_devedores`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(200) DEFAULT NULL,
  `email_cliente` varchar(200) DEFAULT NULL,
  `dataNasc_cliente` date DEFAULT NULL,
  `telefone_cliente` bigint(13) DEFAULT NULL,
  `tipo_cliente` varchar(10) DEFAULT NULL,
  `cpf_cliente` bigint(11) DEFAULT NULL,
  `cnpj_cliente` bigint(20) DEFAULT NULL,
  `cep_cliente` int(8) DEFAULT NULL,
  `endereco_cliente` varchar(255) DEFAULT NULL,
  `numero_cliente` int(5) DEFAULT NULL,
  `complemento_cliente` varchar(255) DEFAULT NULL,
  `cidade_cliente` varchar(100) DEFAULT NULL,
  `estado_cliente` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dividas`
--

CREATE TABLE `dividas` (
  `id_divida` int(11) NOT NULL,
  `descricao_divida` text NOT NULL,
  `valor_divida` float NOT NULL,
  `vencimento_divida` date NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `updated_divida` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(255) DEFAULT NULL,
  `email_usuario` varchar(200) DEFAULT NULL,
  `senha_usuario` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$hS8n14cwpSd025jlIVmbXeTqH5.mKz7NO/jNNTWXpG3kyWYcVALP2');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `cpf_cliente` (`cpf_cliente`),
  ADD UNIQUE KEY `cnpj_cliente` (`cnpj_cliente`),
  ADD KEY `cpf_cliente_2` (`cpf_cliente`);

--
-- Índices para tabela `dividas`
--
ALTER TABLE `dividas`
  ADD PRIMARY KEY (`id_divida`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email_usuario` (`email_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `dividas`
--
ALTER TABLE `dividas`
  MODIFY `id_divida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `dividas`
--
ALTER TABLE `dividas`
  ADD CONSTRAINT `id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

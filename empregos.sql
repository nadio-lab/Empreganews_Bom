-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Ago-2025 às 14:43
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `empregos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidatos`
--

CREATE TABLE `candidatos` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `idade` varchar(220) NOT NULL,
  `sexo` varchar(220) NOT NULL,
  `contacto` varchar(20) NOT NULL,
  `descricao` varchar(220) NOT NULL,
  `corriculo` varchar(200) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `candidatos`
--

INSERT INTO `candidatos` (`id`, `nome`, `email`, `idade`, `sexo`, `contacto`, `descricao`, `corriculo`, `created`) VALUES
(31, 'Adolfo Capita', 'adolfocapita8@gmail.com', '2000-02-11', 'Masculino', '9453456', '2 Quartos, 2 Salas, 1 Cozinha e  1 Wc ', 'img/CV_2025-08-06-114027.pdf', '2025-08-09 13:01:31'),
(32, 'Adolfo Capita', 'adolfocapita8@gmail.com', '2000-02-11', 'Masculino', '9453456', 'bom bom', 'img/CV_2025-08-06-114027.pdf', '2025-08-09 13:12:12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidaturas`
--

CREATE TABLE `candidaturas` (
  `id` int(11) NOT NULL,
  `nome_candidato` varchar(333) NOT NULL,
  `vaga_id` int(11) NOT NULL,
  `candidato_id` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `candidaturas`
--

INSERT INTO `candidaturas` (`id`, `nome_candidato`, `vaga_id`, `candidato_id`, `data`) VALUES
(15, 'adolfo', 0, 0, '2025-08-09 04:07:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nome` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `created` datetime NOT NULL,
  `foto` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `nome`, `email`, `created`, `foto`) VALUES
(1, 'Água, Energia Eléctrica e Lixo', 'adolfocapita8@gmail.com', '2025-08-08 09:08:58', 'img/logo.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('candidato','empresa','admin') NOT NULL,
  `nif` varchar(30) DEFAULT NULL,
  `empresa_nome` varchar(100) DEFAULT NULL,
  `empresa_endereco` varchar(150) DEFAULT NULL,
  `empresa_contacto` varchar(20) DEFAULT NULL,
  `data` datetime NOT NULL,
  `token_recuperacao` varchar(200) DEFAULT NULL,
  `foto` varchar(3333) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `password`, `user_type`, `nif`, `empresa_nome`, `empresa_endereco`, `empresa_contacto`, `data`, `token_recuperacao`, `foto`) VALUES
(29, 'texteEmpresa', 'texteempresa@gmail.com', '1111', 'empresa', '11as3223LOd34', 'texteEmpresa', 'Luanda, Viana.', '930581053', '2025-06-08 04:27:12', '74a06fa5545e2abc8d75bef6fdcdc790', 'img/empresa.jpg'),
(30, 'texteCandidato', 'textecandidato@gmail.com', '$2y$10$mHSDwg/1zT1lAmO9kWVNJ.gbztkeYXz959SI58kOJaraOwpRph9Qq', 'candidato', NULL, NULL, NULL, NULL, '2025-06-08 04:28:24', NULL, 'img/empresa.jpg'),
(31, 'Conplexo escolar Cladanto', 'cladantoneto@gmail.com', '1234', 'empresa', '123wed45tgLO8u', 'Conplexo escolar Cladanto', 'Luanda, Estalagem', '932675123', '2025-06-08 04:30:30', '0fa4897415843ae057a1042138cb4330', 'img/admin.png'),
(38, 'Adolfo Capita', 'adolfocapita8@gmail.com', '$2y$10$wLw3d9sPL1SL.tT90FrsreaWBtHpmzNjubRDm4f4pEJNgav4e9jRG', 'candidato', NULL, NULL, NULL, NULL, '2025-08-09 12:02:29', NULL, 'img/candidato.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

CREATE TABLE `vagas` (
  `id` int(11) NOT NULL,
  `vaga_id` int(11) NOT NULL,
  `nome_empresa` varchar(222) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `tipo` varchar(220) NOT NULL,
  `area` varchar(220) NOT NULL,
  `nivel` varchar(222) NOT NULL,
  `cidade` varchar(220) NOT NULL,
  `descricao` varchar(220) NOT NULL,
  `requisitos` varchar(220) NOT NULL,
  `beneficios` varchar(220) NOT NULL,
  `carga` varchar(222) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `vagas`
--

INSERT INTO `vagas` (`id`, `vaga_id`, `nome_empresa`, `nome`, `tipo`, `area`, `nivel`, `cidade`, `descricao`, `requisitos`, `beneficios`, `carga`, `created`, `modified`) VALUES
(288, 0, 'Conplexo escolar cladanto neto', 'Desenvolvedor Web', 'TemporÃ¡rio', 'TI', 'Pleno', 'Malange', 'Desenvolvimento de aplicaÃ§Ãµes web modernas usando JavaScript e frameworks atuais.', 'ExperiÃªncia com JS e frameworks (React, Vue ou Angular) e um bom corriculo.', 'Plano de saÃºde, VR, home-office.', 'Meio periodo', '2025-06-20 11:09:50', NULL),
(289, 0, 'Conplexo escolar cladanto neto', 'Analista Financeiro', 'Efetivo', 'Financeiro', 'JÃºnior', 'Huambo', 'Controle de fluxo de caixa, lanÃ§amentos e conciliaÃ§Ã£o bancÃ¡ria.', 'FormaÃ§Ã£o em AdministraÃ§Ã£o ou Ã¡reas afins e um bom corriculo.', 'Vale transporte, VR, assistÃªncia mÃ©dica.', 'Meio periodo', '2025-06-20 11:14:58', NULL),
(290, 0, 'Conplexo escolar cladanto neto', 'EstagiÃ¡rio TI', 'EstÃ¡gio', 'TI', 'SÃªnior', 'Luanda', 'Suporte tÃ©cnico, manutenÃ§Ã£o de computadores e redes.', 'Cursando Superior em TI e um bom corriculo.', 'Bolsa estÃ¡gio, VT, curso de capacitaÃ§Ã£o.', 'Integral', '2025-06-20 11:18:05', NULL),
(291, 0, 'Conplexo escolar cladanto neto', 'Assistente Administrativo', 'TemporÃ¡rio', 'AdministraÃ§Ã£o', 'Pleno', 'Benguela', 'Atendimento telefonico, organizaÃ§Ã£o de arquivo', 'Ensino MÃ©dio completo. DesejÃ¡vel vivÃªncia administrativa e um bom corriculo.', 'VR, VT, plano odontolÃ³gico.', 'Meio periodo', '2025-06-20 11:19:53', '2025-08-09 10:43:40'),
(298, 0, 'Conplexo escolar cladanto neto', 'EstagiÃ¡rio TI', 'EstÃ¡gio', 'TI', 'SÃªnior', 'Luanda', 'Suporte tÃ©cnico, manutenÃ§Ã£o de computadores e redes.', 'Cursando Superior em TI e um bom corriculo.', 'Bolsa estÃ¡gio, VT, curso de capacitaÃ§Ã£o.', 'Integral', '2025-06-20 11:18:05', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `candidaturas`
--
ALTER TABLE `candidaturas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `vagas`
--
ALTER TABLE `vagas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `candidaturas`
--
ALTER TABLE `candidaturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `vagas`
--
ALTER TABLE `vagas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

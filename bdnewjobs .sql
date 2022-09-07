-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Nov-2021 às 20:18
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdnewjobs`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbavaliacao`
--

CREATE TABLE `tbavaliacao` (
  `idAvaliacao` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `estrela` int(5) NOT NULL,
  `dtAvaliacao` date NOT NULL,
  `idCandidato` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbavaliacao`
--

INSERT INTO `tbavaliacao` (`idAvaliacao`, `comentario`, `estrela`, `dtAvaliacao`, `idCandidato`, `idEmpresa`) VALUES
(1, 'excelente ambiente de trabalho', 4, '2020-08-12', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcandidato`
--

CREATE TABLE `tbcandidato` (
  `idCandidato` int(11) NOT NULL,
  `nomeCandidato` varchar(90) NOT NULL,
  `cpfCandidato` varchar(11) NOT NULL,
  `dtNascto` date NOT NULL,
  `estadoCivil` varchar(10) NOT NULL,
  `nascionalidade` varchar(100) NOT NULL,
  `usuarioCandidato` varchar(20) NOT NULL,
  `emailCandidato` varchar(50) NOT NULL,
  `senhaCandidato` varchar(200) NOT NULL,
  `enderecoCandidato` varchar(70) NOT NULL,
  `numeroCandidato` varchar(10) NOT NULL,
  `complementoCandidato` varchar(8) NOT NULL,
  `cepCandidato` varchar(9) NOT NULL,
  `bairroCandidato` varchar(150) NOT NULL,
  `cidadeCandidato` varchar(60) NOT NULL,
  `zonaCandidato` varchar(60) DEFAULT NULL,
  `ativoCandidato` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbcandidato`
--

INSERT INTO `tbcandidato` (`idCandidato`, `nomeCandidato`, `cpfCandidato`, `dtNascto`, `estadoCivil`, `nascionalidade`, `usuarioCandidato`, `emailCandidato`, `senhaCandidato`, `enderecoCandidato`, `numeroCandidato`, `complementoCandidato`, `cepCandidato`, `bairroCandidato`, `cidadeCandidato`, `zonaCandidato`, `ativoCandidato`) VALUES
(2, 'Rosana Nunes da Silva', '00689056794', '0000-00-00', 'solteira', '', 'rosanaSilva13', 'rohNunes@gmail.com', '123', 'Rua: Capitólio de Macedo Neves', '112', '1', '856110', 'Jardim Florença', '', 'Mairinque', ''),
(3, 'Rodrigo Santos', '95799041038', '1995-05-20', 'Casado (a)', 'Usa', 'Rodrigo', 'rodrigo@gmail.com', '$2y$13$V3h3GoCAjXf8qekeaDVnMuxaBF7OsUaJdp5AWoRfOcilpgLvNvkUW', 'Rua Frei Francisco', '6000', 'Andar 4', '08420-200', 'Jardim Helena', 'S&atilde;o Paulo', 'Norte 1', 's'),
(5, 'Maria', '35935461838', '2000-02-15', 'Casado (a)', 'Brasileiro', 'maria', 'maria@gamil.com', '$2y$13$T8x.nUXEAlDc.JuxqkD.buzDv4fuj0gQdBpTQvLVyA7QpXUQjEVeu', 'Rua Frei Francisco', '272', 'Andar 4', '8420200', 'Jardim Helena', 'S&atilde;o Paulo', 'Leste 1', 's'),
(6, 'luciana', '95799041038', '2021-11-07', 'Casado (a)', 'Brasileiro', 'luciana', 'luciana@gamil.con', '$2y$13$pvmlmvr8l7I0fMXUappFU.MulNGN4Zhk3ac.V5B7Ogck.24LfI456', 'Rua Frei Francisco', '272', '', '8420200', 'Jardim Helena', 'S&atilde;o Paulo', 'Leste 2', 's'),
(9, 'joaqui', '62008814050', '2021-11-28', 'Casado (a)', 'Brasileiro', 'joaqui', 'joaqui@gmail.com', '$2y$13$5PMdUrcxKeJPUF4tmKgS3eAQltaVVj9R96M/Y8AJ18uRVrF6CYCHe', 'Rua Frei Francisco', '300', 'Andar 6', '08420200', 'Jardim Helena', 'S&atilde;o Paulo', NULL, 's'),
(10, 'Guilherme', '97637117030', '2002-06-05', 'Solteiro', 'Brasileiro ', 'guilherme', 'guilheme@gmail.com', '$2y$13$qL3U37jLU9AeuoRq.KmFg.4Ylm8zGpLbPECKFwhLn4PKvkokesvwa', 'Rua Frei Francisco', '448', 'andar 1', '08420200', 'Jardim Helena', 'S&atilde;o Paulo', NULL, 's'),
(11, 'Beatriz', '07888615066', '1995-02-28', 'Casado (a)', 'Brasileiro ', 'beatriz', 'beatriz@gmail.com', '$2y$13$DBilf9RbafhoeuPUDqox1eI1zFbI/XxTJ5FENIgAbinhcvia6X7f6', 'Rua Arroio Campo Bom', '55', '5A', '08485475', 'Conjunto Habitacional Santa Etelvina III', 'S&atilde;o Paulo', NULL, 's'),
(12, 'Bruno', '83797181000', '1999-07-25', 'Casado (a)', 'Brasileiro', 'bruno', 'bruno@gmail.com', '$2y$13$fIjWsB006c4NY9Lw6JMIGu9ksljaN9okBLF2wlrDdipULJKYwrBpW', 'Rua Gaspar de Souza', '50', 'academia', '08451150', 'Lajeado', 'S&atilde;o Paulo', NULL, 's');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbchat`
--

CREATE TABLE `tbchat` (
  `idChat` int(11) NOT NULL,
  `mensagemCandidato` text NOT NULL,
  `mensagemRecrutador` text NOT NULL,
  `dtMensagem` date NOT NULL,
  `horaMensagem` time NOT NULL,
  `idInteresse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbchat`
--

INSERT INTO `tbchat` (`idChat`, `mensagemCandidato`, `mensagemRecrutador`, `dtMensagem`, `horaMensagem`, `idInteresse`) VALUES
(1, 'ola', 'ola', '2020-10-20', '15:20:20', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbempresa`
--

CREATE TABLE `tbempresa` (
  `idEmpresa` int(11) NOT NULL,
  `nomeEmpresa` varchar(30) NOT NULL,
  `cnpjEmpresa` varchar(14) NOT NULL,
  `emailEmpresa` varchar(50) NOT NULL,
  `usuarioEmpresa` varchar(100) NOT NULL,
  `senhaEmpresa` varchar(200) NOT NULL,
  `enderecoEmpresa` varchar(50) NOT NULL,
  `numeroEmpresa` int(11) NOT NULL,
  `complementoEmpresa` varchar(10) NOT NULL,
  `cepEmpresa` varchar(9) NOT NULL,
  `bairroEmpresa` varchar(25) NOT NULL,
  `cidadeEmpresa` varchar(25) NOT NULL,
  `zonaEmpresa` varchar(60) DEFAULT NULL,
  `ativoEmpresa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbempresa`
--

INSERT INTO `tbempresa` (`idEmpresa`, `nomeEmpresa`, `cnpjEmpresa`, `emailEmpresa`, `usuarioEmpresa`, `senhaEmpresa`, `enderecoEmpresa`, `numeroEmpresa`, `complementoEmpresa`, `cepEmpresa`, `bairroEmpresa`, `cidadeEmpresa`, `zonaEmpresa`, `ativoEmpresa`) VALUES
(1, 'Astra', '24658425751296', 'astra@gmail.com', '', '', 'Rua: Ferraz Gomes', 15, '1 andar', '57695412', 'Limoeiro', 'Rio de Janeiro', '', ''),
(2, 'Astral', '16749807000161', 'astral@hotmail.com', 'Astral', '$2y$13$eaWQz3il4VlzU9Ts6n44q.iuD9ZTIydTMFpmcR1I9U/vJ1lX45rU6', 'astral@hotmail.com', 7000, 'Andar 6', '08420200', 'Jardim Helena', 'S&atilde;o Paulo', 'Leste 2', 's'),
(4, 'Google', '49924614000159', 'google@gmail.com', 'google', '$2y$13$WSCPDpHH9dJ1EucYwSS92urs8mzYXrECpBq26DIZDgoBpOFMtqdye', 'google@gmail.com', 2564, '', '8420200', 'Jardim Helena', 'S&atilde;o Paulo', 'Centro', 's'),
(5, 'Fatec', '17470297000151', 'fatec@gamil.com', 'fatec', '$2y$13$INRr8gHtNkn9SaOe97C/8.KXyv96.Kt2/PK2BxkKk80fryxl5ChBW', 'Rua Frei Francisco', 272, 'fads', '8420200', 'Jardim Helena', 'S&atilde;o Paulo', 'Leste 1', 's'),
(8, 'facebook', '72624805000117', 'facebook@gmail.con', 'facebook', '$2y$13$h7giTbzKPjo6RoSSi6.Yd.tG5KJhFRZmhcqOfyDcXX2A52./R/GWu', 'Rua Frei Francisco', 2456, 'Andar 4', '08420200', 'Jardim Helena', 'S&atilde;o Paulo', NULL, 's'),
(9, 'Mercado Livre', '03499243000104', 'crm.ml@mercadolivre.com.br', 'mercadolivre', '$2y$13$8eYZ8FLwmy9MlZpviMghButZ0k6VCY.TgYBHP31GysWwyj63yHQOq', 'Rua C&acirc;ndido God&oacute;i', 122, 'Andar 1', '08210-770', 'Vila Brasil', 'S&atilde;o Paulo', NULL, 's'),
(10, 'Assa&iacute; Atacadista', '06057223000171', 'assai@gmail.com', 'assai', '$2y$13$sjJ0NKdT5Hh4iN2sLYMBYOIKM4jf4WHrRiKYGdEkMpN7s/h4Zv6OC', 'Rua Bar&atilde;o Louren&ccedil;o de Atalaia', 864, '', '08472-727', 'Conjunto Habitacional In&', 'S&atilde;o Paulo', NULL, 's'),
(11, 'Microsoft', '00000000000000', 'microsoft@gmail.com', 'microsoft', '$2y$13$XZ0x/qbxR.DAulZVuEc.nuiy4U0vLjIoQTUB.ZgsRiBur5LZ88UYe', 'Avenida Chedid Jafet', 1909, 'andar 16', '04551065', 'Vila Ol&iacute;mpia', 'S&atilde;o Paulo', NULL, 's');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbexperiencia`
--

CREATE TABLE `tbexperiencia` (
  `idExperiencia` int(11) NOT NULL,
  `nomeEmpresa` varchar(30) NOT NULL,
  `cargo` varchar(35) NOT NULL,
  `especialidade` varchar(20) NOT NULL,
  `dtInicio` date NOT NULL,
  `dtSaida` date DEFAULT NULL,
  `idCandidato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbexperiencia`
--

INSERT INTO `tbexperiencia` (`idExperiencia`, `nomeEmpresa`, `cargo`, `especialidade`, `dtInicio`, `dtSaida`, `idCandidato`) VALUES
(1, 'Lola entregas', 'entregador', 'delivery', '2020-08-10', '2021-08-15', 2),
(18, 'Astral Cop', 'Ti', 'desenvolvimento ', '2021-11-07', '0000-00-00', 3),
(19, 'Astral ', 'Ti', 'desenvolvimento ', '2021-11-07', '2021-11-07', 3),
(21, 'IBM', 'Est&aacute;gio', 'Banco de dados', '2018-06-06', '2020-05-05', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfonecandidato`
--

CREATE TABLE `tbfonecandidato` (
  `idFoneCandidato` int(11) NOT NULL,
  `foneCandidato` varchar(14) NOT NULL,
  `idCandidato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbfonecandidato`
--

INSERT INTO `tbfonecandidato` (`idFoneCandidato`, `foneCandidato`, `idCandidato`) VALUES
(1, '11983205986', 2),
(2, '(11)95483-1765', 3),
(22, '(11)93275-6641', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfoneempresa`
--

CREATE TABLE `tbfoneempresa` (
  `idFoneEmpresa` int(11) NOT NULL,
  `foneEmpresa` varchar(14) NOT NULL,
  `idEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbfoneempresa`
--

INSERT INTO `tbfoneempresa` (`idFoneEmpresa`, `foneEmpresa`, `idEmpresa`) VALUES
(1, '11985467238', 1),
(17, '555', 4),
(18, '8855', 4),
(20, '(11)95483-1765', 2),
(21, '(11)92548-6524', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbformacao`
--

CREATE TABLE `tbformacao` (
  `idFormacao` int(11) NOT NULL,
  `nomeCurso` varchar(100) NOT NULL,
  `nomeInstituicao` varchar(100) NOT NULL,
  `dtInicio` date NOT NULL,
  `dtFinal` date NOT NULL,
  `diploma` varchar(200) NOT NULL,
  `idCandidato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbformacao`
--

INSERT INTO `tbformacao` (`idFormacao`, `nomeCurso`, `nomeInstituicao`, `dtInicio`, `dtFinal`, `diploma`, `idCandidato`) VALUES
(6, 'Dss', 'etec', '2000-02-05', '2021-02-05', 'tec', 5),
(22, 'DSddffffffffff', 'Etec', '2021-11-27', '2021-11-12', 'Tec', 3),
(25, 'Ciencia da computa&ccedil;&atilde;o', 'banditec', '2017-02-01', '2021-12-01', 'bacharelado', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbhabicandi`
--

CREATE TABLE `tbhabicandi` (
  `idHabiCandi` int(11) NOT NULL,
  `idCandidato` int(11) NOT NULL,
  `idHabilidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbhabicandi`
--

INSERT INTO `tbhabicandi` (`idHabiCandi`, `idCandidato`, `idHabilidade`) VALUES
(31, 3, 11),
(32, 3, 12),
(37, 12, 9),
(38, 12, 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbhabilidade`
--

CREATE TABLE `tbhabilidade` (
  `idHabilidade` int(11) NOT NULL,
  `nomeHabilidade` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbhabilidade`
--

INSERT INTO `tbhabilidade` (`idHabilidade`, `nomeHabilidade`) VALUES
(9, 'Trabalhar em equipe'),
(10, 'Inovador e criativo'),
(11, 'Resili&ecirc;ncia'),
(12, 'Atitude'),
(17, 'Lideran&ccedil;a');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbhabivaga`
--

CREATE TABLE `tbhabivaga` (
  `idHabiVaga` int(11) NOT NULL,
  `idVaga` int(11) NOT NULL,
  `idHabilidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbinteresse`
--

CREATE TABLE `tbinteresse` (
  `idInteresse` int(11) NOT NULL,
  `ativoInteresse` varchar(20) NOT NULL,
  `idCandidato` int(11) NOT NULL,
  `idVaga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbinteresse`
--

INSERT INTO `tbinteresse` (`idInteresse`, `ativoInteresse`, `idCandidato`, `idVaga`) VALUES
(1, '', 2, 1),
(17, 's', 3, 12),
(21, 's', 3, 13),
(22, 's', 3, 25),
(27, 's', 3, 26),
(29, 's', 6, 37),
(30, 's', 11, 37),
(31, 's', 10, 37),
(32, 's', 12, 37);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbrecrutador`
--

CREATE TABLE `tbrecrutador` (
  `idRecrutador` int(11) NOT NULL,
  `nomeRecrutador` varchar(120) NOT NULL,
  `cpfRecrutador` varchar(11) NOT NULL,
  `usuarioRecrutador` varchar(100) NOT NULL,
  `emailRecrutador` varchar(200) NOT NULL,
  `senhaRecrutador` varchar(200) NOT NULL,
  `idEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbrecrutador`
--

INSERT INTO `tbrecrutador` (`idRecrutador`, `nomeRecrutador`, `cpfRecrutador`, `usuarioRecrutador`, `emailRecrutador`, `senhaRecrutador`, `idEmpresa`) VALUES
(1, 'Maria', '111111111', 'LuizAugus123', 'emailGG', '987', 1),
(12, 'Julia', '23272648046', 'julia', 'julia@gamil.com', '$2y$13$RRCAuX8LNlisQvwxAFAJA.kEixXomeXkQnS2emqDqs6jGNk6oZCb.', 2),
(23, 'Domini', '35935461838', 'domini', 'domini@gamil.com', '$2y$13$6G0XURhBEHKWt9bE2b//XuvVAkI9fSNjqGrLQQSIbKk4fty3JH8Lu', 2),
(25, 'manoel', '35935461838', 'xxx', 'manoel@gmail.com', '$2y$13$I9l5MKZ15kL6XGDimqwWQO15Ke1I1bI4w6ODTVQaq/WA22nPg980K', 4),
(26, 'Lucas', '66681453104', 'lucas', 'lucas@gmail.com', '$2y$13$NJvZvZ4Gw9pK5vC.yz4byOW84A7Lizcm76M3rdTIkkLU/eG6GcDSm', 9),
(27, 'Pedro', '48623558111', 'pedro', 'pedro@gmail.com', '$2y$13$7fG3DkIjEWMFHASAyYLZ4uKBiR.JSxdK4Nc8cAMvbvUUPBUGBxxAO', 10),
(29, 'Alana', '19953878005', 'alana', 'alana@gmail.com', '$2y$13$It5XaexCOuUckjTc5ChV1.bVwu/xE.CICePtm7UyXGo63R/XvATtW', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbvaga`
--

CREATE TABLE `tbvaga` (
  `idVaga` int(11) NOT NULL,
  `cargo` varchar(20) NOT NULL,
  `descVaga` text NOT NULL,
  `salarioVaga` varchar(20) NOT NULL,
  `dtInicio` date NOT NULL,
  `dtFim` date DEFAULT NULL,
  `horarioTrabalho` varchar(7) NOT NULL,
  `zonaVaga` varchar(60) DEFAULT NULL,
  `cepVaga` varchar(8) NOT NULL,
  `enderecoVaga` varchar(150) NOT NULL,
  `numeroVaga` varchar(8) NOT NULL,
  `complementoVaga` varchar(5) NOT NULL,
  `bairroVaga` varchar(150) NOT NULL,
  `cidadeVaga` varchar(120) NOT NULL,
  `ativoVaga` varchar(20) NOT NULL,
  `idEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbvaga`
--

INSERT INTO `tbvaga` (`idVaga`, `cargo`, `descVaga`, `salarioVaga`, `dtInicio`, `dtFim`, `horarioTrabalho`, `zonaVaga`, `cepVaga`, `enderecoVaga`, `numeroVaga`, `complementoVaga`, `bairroVaga`, `cidadeVaga`, `ativoVaga`, `idEmpresa`) VALUES
(1, 'cozinheira', 'Inicio imediato', '', '2020-08-10', '2020-09-10', '', '', '', '', '', '', '', '', '', 1),
(12, 'Ti', 'trabalhar em ti', '1500', '2021-10-17', '2021-12-30', '8', 'Leste 1', 'Leste 2', 'Rua Frei Francisco', '272', 'Andar', 'Jardim Helena', 'S&atilde;o Paulo', 'n', 2),
(13, 'junio', 'trabalhar em ti', '1500', '2021-10-25', '2021-12-30', '8', 'Leste 1', 'Norte 1', 'Rua Frei Francisco', '272', 'casa ', 'Jardim Helena', 'S&atilde;o Paulo', 'n', 2),
(14, 'Ti', 'trabalhar em ti', '1500', '2021-10-26', '2021-11-30', '8', 'Leste 1', '08420200', 'Rua Frei Francisco', '272', 'casa ', 'Jardim Helena', 'S&atilde;o Paulo', 'n', 2),
(15, 'Ti', 'trabalhar em ti', '1500', '2021-10-26', '2021-11-30', '8', 'Leste 1', '08420200', 'Rua Frei Francisco', '272', 'casa ', 'Jardim Helena', 'S&atilde;o Paulo', 'n', 2),
(16, 'ti', 'sdfs', '1500', '2021-10-26', '2021-12-30', '5', 'Leste 1', '08420200', 'Rua Frei Francisco', '272', 'casa', 'Jardim Helena', 'S&atilde;o Paulo', 'n', 2),
(17, 'ti', 'sdfs', '1500', '2021-10-26', '2021-12-30', '5', 'selecionar...', '08420200', 'Rua Frei Francisco', '272', 'casa', 'Jardim Helena', 'S&atilde;o Paulo', 'n', 2),
(18, 'junio', 'TI', '500', '2021-10-29', '2021-10-21', '8', 'Leste 1', '08420200', 'Rua Frei Francisco', '272', 'casa ', 'Jardim Helena', 'S&atilde;o Paulo', 'n', 2),
(19, 'junio', 'trabalhar em ti', '500', '2021-10-30', '2021-10-30', '8', 'Leste 1', '08420200', 'Rua Frei Francisco', '272', 'casa ', 'jardim ', 'S&atilde;o Paulo', 'n', 2),
(20, 'Desumider', 'trabalhar em ti', '1500', '2021-10-30', '2021-10-30', '8', 'Leste 1', '08420200', 'Rua Frei Francisco', '272', 'casa ', 'Jardim Helena', 'S&atilde;o Paulo', 'n', 2),
(22, 'Ti', 'trabalhar em ti', '1500', '2021-10-17', '2021-12-30', '8', 'Leste 1', 'Leste 1', 'Rua Frei Francisco', '272', 'Andar', 'Jardim Helena', 'S&atilde;o Paulo', 'n', 2),
(23, 'Tiii', 'trabalhar em ti', '1500', '2021-10-17', '2021-12-30', '8', 'Leste 2', 'Leste 1', 'Rua Frei Francisco', '272', 'Andar', 'Jardim Helena', 'S&atilde;o Paulo', 'n', 2),
(24, 'junioo', 'trabalhar em ti', '1500', '2021-10-25', '2021-12-30', '8', 'Norte 1', 'Leste 2', 'Rua Frei Francisco', '272', 'casa ', 'Jardim Helena', 'S&atilde;o Paulo', 'n', 2),
(25, 'Desenvolvedor Junior', 'Desenvolver projetos com o objetivo de estabelecer e implementar solu&ccedil;&otilde;es de um sistema embarcado.', '1500', '2021-10-25', '2021-12-30', '8', 'Leste 1', '08420200', 'Rua Frei Francisco', '272', 'casa ', 'Jardim Helena', 'S&atilde;o Paulo', 's', 2),
(26, 'TI', 'trabalhar em ti', '1500', '2021-10-17', '2021-12-30', '8', 'Leste 1', 'Leste 1', 'Rua Frei Francisco', '272', 'Andar', 'Jardim Helena', 'S&atilde;o Paulo', 'n', 2),
(27, 'juniooo', 'trabalhar em ti', '1500', '2021-10-25', '2021-12-30', '8', 'Leste 1', 'Leste 1', 'Rua Frei Francisco', '272', 'casa ', 'Jardim Helena', 'S&atilde;o Paulo', 'n', 2),
(28, 'Ti', 'trabalhar em ti', '1500', '2021-11-07', '2021-11-07', '8', 'Leste 2', 'Leste 2', 'Rua Frei Francisco', '272', '', 'Jardim Helena', 'S&atilde;o Paulo', 'n', 4),
(29, 'dfasf', 'sdfadsa', '70000', '2021-11-05', '0000-00-00', '8', 'Leste 1', '08420200', 'Rua Frei Francisco', '272', 'casa ', 'Jardim Helena', 'S&atilde;o Paulo', 'n', 2),
(30, 'junio', 'trabalhar em ti', '1500', '2021-11-28', '2021-11-28', '8', 'Norte 1', '20030-05', 'Rua Adherbal Madruga', '300', 'Andar', 'Centro', 'Rio de Janeiro', 'n', 2),
(31, 'Tiii', 'Gerson', '1500', '2021-11-17', '0000-00-00', '8', '', '20030-05', 'Rua Adherbal Madruga', '2564', 'Andar', 'Centro', 'Rio de Janeiro', 'n', 2),
(32, 'ti', 'sdfs', '1500', '2021-11-29', '0000-00-00', '5', NULL, '08420200', 'Rua Frei Francisco', '272', 'casa', 'Jardim Helena', 'S&atilde;o Paulo', 'n', 2),
(33, 'Telemarketing', 'Analista de Atendimento, Analista de Back Office, Analista de Reten&ccedil;&atilde;o, Analista de SAC, Assistente de Atendimento, Assistente de Back Office.', '872,74', '2021-10-04', '0000-00-00', '9', NULL, '08210-77', 'Rua C&acirc;ndido God&oacute;i', '122', 'Andar', 'Vila Brasil', 'S&atilde;o Paulo', 's', 9),
(34, 'Estoquista', 'Fazer o recebimento, a confer&ecirc;ncia, a verifica&ccedil;&atilde;o da validade e do estoque dos produtos.', '1.363,69', '2021-11-15', '2022-02-01', '8', NULL, '08472-72', 'Rua Bar&atilde;o Louren&ccedil;o de Atalaia', '864', '', 'Conjunto Habitacional In&aacute;cio Monteiro', 'S&atilde;o Paulo', 's', 10),
(35, 'Analista de dados', 'Coletar, compilar, analisar e prover as interpreta&ccedil;&otilde;es corretas das informa&ccedil;&otilde;es coletadas. Ao realizar a sua an&aacute;lise, esse profissional precisa avaliar cuidadosamente os benef&iacute;cios e os riscos de cada manobra, auxiliando os gestores na tomada de decis&otilde;es.', '3.000', '2021-11-29', '0000-00-00', '8', NULL, '04551065', 'Avenida Chedid Jafet', '1909', 'andar', 'Vila Ol&iacute;mpia', 'S&atilde;o Paulo', 'n', 11),
(36, 'Analista de dado', 'Coletar, compilar, analisar e prover as interpreta&ccedil;&otilde;es corretas das informa&ccedil;&otilde;es coletadas. Ao realizar a sua an&aacute;lise, esse profissional precisa avaliar cuidadosamente os benef&iacute;cios e os riscos de cada manobra, auxiliando os gestores na tomada de decis&otilde;es.', '3.000', '2021-11-29', '0000-00-00', '8', NULL, '04551065', 'Avenida Chedid Jafet', '1909', 'andar', 'Vila Ol&iacute;mpia', 'S&atilde;o Paulo', 'n', 11),
(37, 'Analista de dados', 'Coletar, compilar, analisar e prover as interpreta&ccedil;&otilde;es corretas das informa&ccedil;&otilde;es coletadas. Ao realizar a sua an&aacute;lise, esse profissional precisa avaliar cuidadosamente os benef&iacute;cios e os riscos de cada manobra, auxiliando os gestores na tomada de decis&otilde;es.', '3.000', '2021-11-29', '0000-00-00', '8', NULL, '04551065', 'Avenida Chedid Jafet', '1909', 'andar', 'Vila Ol&iacute;mpia', 'S&atilde;o Paulo', 's', 11);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbavaliacao`
--
ALTER TABLE `tbavaliacao`
  ADD PRIMARY KEY (`idAvaliacao`),
  ADD KEY `fk_idCandidato` (`idCandidato`),
  ADD KEY `fk_idEmpresa` (`idEmpresa`);

--
-- Índices para tabela `tbcandidato`
--
ALTER TABLE `tbcandidato`
  ADD PRIMARY KEY (`idCandidato`);

--
-- Índices para tabela `tbchat`
--
ALTER TABLE `tbchat`
  ADD PRIMARY KEY (`idChat`),
  ADD KEY `fk_idInteresse` (`idInteresse`);

--
-- Índices para tabela `tbempresa`
--
ALTER TABLE `tbempresa`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Índices para tabela `tbexperiencia`
--
ALTER TABLE `tbexperiencia`
  ADD PRIMARY KEY (`idExperiencia`),
  ADD KEY `fk_idCandidato` (`idCandidato`);

--
-- Índices para tabela `tbfonecandidato`
--
ALTER TABLE `tbfonecandidato`
  ADD PRIMARY KEY (`idFoneCandidato`),
  ADD KEY `fk_idCandidato` (`idCandidato`);

--
-- Índices para tabela `tbfoneempresa`
--
ALTER TABLE `tbfoneempresa`
  ADD PRIMARY KEY (`idFoneEmpresa`),
  ADD KEY `fk-idEmpresa` (`idEmpresa`);

--
-- Índices para tabela `tbformacao`
--
ALTER TABLE `tbformacao`
  ADD PRIMARY KEY (`idFormacao`),
  ADD KEY `fk_idCandidato` (`idCandidato`) USING BTREE;

--
-- Índices para tabela `tbhabicandi`
--
ALTER TABLE `tbhabicandi`
  ADD PRIMARY KEY (`idHabiCandi`),
  ADD KEY `idCandidato` (`idCandidato`) USING BTREE,
  ADD KEY `idHabilidade` (`idHabilidade`) USING BTREE;

--
-- Índices para tabela `tbhabilidade`
--
ALTER TABLE `tbhabilidade`
  ADD PRIMARY KEY (`idHabilidade`);

--
-- Índices para tabela `tbhabivaga`
--
ALTER TABLE `tbhabivaga`
  ADD PRIMARY KEY (`idHabiVaga`),
  ADD UNIQUE KEY `idVaga` (`idVaga`),
  ADD UNIQUE KEY `idHabilidade` (`idHabilidade`);

--
-- Índices para tabela `tbinteresse`
--
ALTER TABLE `tbinteresse`
  ADD PRIMARY KEY (`idInteresse`),
  ADD KEY `fk_idCandidato` (`idCandidato`),
  ADD KEY `fk_idVaga` (`idVaga`);

--
-- Índices para tabela `tbrecrutador`
--
ALTER TABLE `tbrecrutador`
  ADD PRIMARY KEY (`idRecrutador`),
  ADD KEY `fk_idEmpresa` (`idEmpresa`);

--
-- Índices para tabela `tbvaga`
--
ALTER TABLE `tbvaga`
  ADD PRIMARY KEY (`idVaga`),
  ADD KEY `fk_idEmpresa` (`idEmpresa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbavaliacao`
--
ALTER TABLE `tbavaliacao`
  MODIFY `idAvaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbcandidato`
--
ALTER TABLE `tbcandidato`
  MODIFY `idCandidato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tbchat`
--
ALTER TABLE `tbchat`
  MODIFY `idChat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbempresa`
--
ALTER TABLE `tbempresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tbexperiencia`
--
ALTER TABLE `tbexperiencia`
  MODIFY `idExperiencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tbfonecandidato`
--
ALTER TABLE `tbfonecandidato`
  MODIFY `idFoneCandidato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `tbfoneempresa`
--
ALTER TABLE `tbfoneempresa`
  MODIFY `idFoneEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tbformacao`
--
ALTER TABLE `tbformacao`
  MODIFY `idFormacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `tbhabicandi`
--
ALTER TABLE `tbhabicandi`
  MODIFY `idHabiCandi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `tbhabilidade`
--
ALTER TABLE `tbhabilidade`
  MODIFY `idHabilidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `tbhabivaga`
--
ALTER TABLE `tbhabivaga`
  MODIFY `idHabiVaga` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbinteresse`
--
ALTER TABLE `tbinteresse`
  MODIFY `idInteresse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `tbrecrutador`
--
ALTER TABLE `tbrecrutador`
  MODIFY `idRecrutador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `tbvaga`
--
ALTER TABLE `tbvaga`
  MODIFY `idVaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbavaliacao`
--
ALTER TABLE `tbavaliacao`
  ADD CONSTRAINT `tbavaliacao_ibfk_1` FOREIGN KEY (`idCandidato`) REFERENCES `tbcandidato` (`idCandidato`),
  ADD CONSTRAINT `tbavaliacao_ibfk_2` FOREIGN KEY (`idEmpresa`) REFERENCES `tbempresa` (`idEmpresa`);

--
-- Limitadores para a tabela `tbchat`
--
ALTER TABLE `tbchat`
  ADD CONSTRAINT `tbchat_ibfk_1` FOREIGN KEY (`idInteresse`) REFERENCES `tbinteresse` (`idInteresse`);

--
-- Limitadores para a tabela `tbexperiencia`
--
ALTER TABLE `tbexperiencia`
  ADD CONSTRAINT `tbexperiencia_ibfk_1` FOREIGN KEY (`idCandidato`) REFERENCES `tbcandidato` (`idCandidato`);

--
-- Limitadores para a tabela `tbfonecandidato`
--
ALTER TABLE `tbfonecandidato`
  ADD CONSTRAINT `tbfonecandidato_ibfk_1` FOREIGN KEY (`idCandidato`) REFERENCES `tbcandidato` (`idCandidato`);

--
-- Limitadores para a tabela `tbfoneempresa`
--
ALTER TABLE `tbfoneempresa`
  ADD CONSTRAINT `tbfoneempresa_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `tbempresa` (`idEmpresa`);

--
-- Limitadores para a tabela `tbformacao`
--
ALTER TABLE `tbformacao`
  ADD CONSTRAINT `tbformacao_ibfk_1` FOREIGN KEY (`idCandidato`) REFERENCES `tbcandidato` (`idCandidato`);

--
-- Limitadores para a tabela `tbhabicandi`
--
ALTER TABLE `tbhabicandi`
  ADD CONSTRAINT `tbhabicandi_ibfk_1` FOREIGN KEY (`idHabilidade`) REFERENCES `tbhabilidade` (`idHabilidade`),
  ADD CONSTRAINT `tbhabicandi_ibfk_2` FOREIGN KEY (`idCandidato`) REFERENCES `tbcandidato` (`idCandidato`);

--
-- Limitadores para a tabela `tbinteresse`
--
ALTER TABLE `tbinteresse`
  ADD CONSTRAINT `tbinteresse_ibfk_1` FOREIGN KEY (`idCandidato`) REFERENCES `tbcandidato` (`idCandidato`),
  ADD CONSTRAINT `tbinteresse_ibfk_2` FOREIGN KEY (`idVaga`) REFERENCES `tbvaga` (`idVaga`);

--
-- Limitadores para a tabela `tbrecrutador`
--
ALTER TABLE `tbrecrutador`
  ADD CONSTRAINT `tbrecrutador_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `tbempresa` (`idEmpresa`);

--
-- Limitadores para a tabela `tbvaga`
--
ALTER TABLE `tbvaga`
  ADD CONSTRAINT `tbvaga_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `tbempresa` (`idEmpresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

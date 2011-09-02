-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Set 02, 2011 as 09:19 
-- Versão do Servidor: 5.5.8
-- Versão do PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `PrW2KqYEbfv5hcQe`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atualizacoes`
--

CREATE TABLE IF NOT EXISTS `atualizacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chave` text,
  `titulo` text,
  `texto` text,
  `data` date DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `down`
--

CREATE TABLE IF NOT EXISTS `down` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chave` text,
  `arquivo` text,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dti_grupos`
--

CREATE TABLE IF NOT EXISTS `dti_grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dti_pessoas`
--

CREATE TABLE IF NOT EXISTS `dti_pessoas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text,
  `cpf` varchar(20) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `nasc` date NOT NULL,
  `unidade` int(3) NOT NULL,
  `funcao` int(1) NOT NULL,
  `fone1` varchar(14) NOT NULL,
  `fone2` varchar(14) NOT NULL,
  `email1` varchar(50) NOT NULL,
  `email2` varchar(50) NOT NULL,
  `msn` varchar(50) NOT NULL,
  `skype` varchar(25) NOT NULL,
  `expcomp` varchar(30) NOT NULL,
  `login` varchar(20) DEFAULT NULL,
  `senha` varchar(70) DEFAULT NULL,
  `nivel` int(1) DEFAULT NULL,
  `acesso` text,
  `grupos` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dti_pessoas_funcoes`
--

CREATE TABLE IF NOT EXISTS `dti_pessoas_funcoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `acao` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12182 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `destaque` int(1) DEFAULT NULL,
  `fotodestaque` text,
  `cat` varchar(80) NOT NULL,
  `texto` text,
  `datapub` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `usuario` text,
  `datasave` datetime DEFAULT NULL,
  `view` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidades`
--

CREATE TABLE IF NOT EXISTS `unidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text,
  `login` varchar(20) DEFAULT NULL,
  `senha` varchar(70) DEFAULT NULL,
  `nivel` int(1) DEFAULT NULL,
  `acesso` text,
  `status` int(1) NOT NULL DEFAULT '1',
  `grupos` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

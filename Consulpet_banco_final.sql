-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 27-Maio-2018 às 04:12
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id5871108_consulpet`
--
CREATE DATABASE IF NOT EXISTS `id5871108_consulpet` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id5871108_consulpet`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ani_animal`
--

CREATE TABLE `ani_animal` (
  `ani_id_animal` int(11) NOT NULL,
  `ani_id_raca` int(11) NOT NULL,
  `ani_id_cliente` int(11) NOT NULL,
  `ani_nm_animal` varchar(45) NOT NULL,
  `ani_idade_animal` varchar(2) NOT NULL,
  `ani_peso_animal` decimal(7,3) DEFAULT NULL,
  `ani_altura_animal` decimal(10,0) DEFAULT NULL,
  `ani_sexo_animal` varchar(5) NOT NULL,
  `ani_vacina_animal` varchar(200) NOT NULL,
  `ani_doenca_animal` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ani_animal`
--

INSERT INTO `ani_animal` (`ani_id_animal`, `ani_id_raca`, `ani_id_cliente`, `ani_nm_animal`, `ani_idade_animal`, `ani_peso_animal`, `ani_altura_animal`, `ani_sexo_animal`, `ani_vacina_animal`, `ani_doenca_animal`) VALUES
(1, 3, 1, 'Aruk', '3', 27.300, 61, 'macho', 'Raiva ; Cinomose; V8 e V10;', 'Nenhuma'),
(2, 4, 2, 'Garfield', '5', 3.100, 20, 'macho', 'Polivalente: 2 doses; V4', 'Micose de pele;');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atd_atendimento`
--

CREATE TABLE `atd_atendimento` (
  `atd_id_atendimento` int(11) NOT NULL,
  `atd_id_animal` int(11) NOT NULL,
  `atd_inicio_atendimento` datetime NOT NULL,
  `atd_fim_atendimento` datetime NOT NULL,
  `atd_ds_atendimento` varchar(45) NOT NULL,
  `atd_obs_atendimento` varchar(100) DEFAULT NULL,
  `atd_st_atendimento` varchar(1) NOT NULL,
  `atd_id_medico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cid_cidade`
--

CREATE TABLE `cid_cidade` (
  `cid_id_cidade` int(11) NOT NULL,
  `cid_ds_cidade` varchar(100) NOT NULL,
  `cid_est_cidade` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cid_cidade`
--

INSERT INTO `cid_cidade` (`cid_id_cidade`, `cid_ds_cidade`, `cid_est_cidade`) VALUES
(1, 'Salvador', 'BA'),
(2, 'Lauro de Freitas', 'BA'),
(3, 'Camaçari', 'BA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cli_cliente`
--

CREATE TABLE `cli_cliente` (
  `cli_id_cliente` int(11) NOT NULL,
  `cli_id_pessoa` int(11) NOT NULL,
  `cli_tel_cliente` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cli_cliente`
--

INSERT INTO `cli_cliente` (`cli_id_cliente`, `cli_id_pessoa`, `cli_tel_cliente`) VALUES
(1, 4, '71997525714'),
(2, 5, '71995283904');

-- --------------------------------------------------------

--
-- Estrutura da tabela `end_endereco`
--

CREATE TABLE `end_endereco` (
  `end_id_endereco` int(11) NOT NULL,
  `end_id_cidade` int(11) NOT NULL,
  `end_id_cliente` int(11) NOT NULL,
  `end_bairro_endereco` varchar(45) NOT NULL,
  `end_ds_endereco` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `end_endereco`
--

INSERT INTO `end_endereco` (`end_id_endereco`, `end_id_cidade`, `end_id_cliente`, `end_bairro_endereco`, `end_ds_endereco`) VALUES
(1, 1, 1, 'Jardim Apipema', 'Rua Professor Sabino Silva, 994'),
(2, 1, 2, 'Boca do Rio', 'Rua Clemente Mariani, 42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pes_pessoa`
--

CREATE TABLE `pes_pessoa` (
  `pes_id_pessoa` int(11) NOT NULL,
  `pes_nm_pessoa` varchar(45) NOT NULL,
  `pes_sbnm_pessoa` varchar(45) NOT NULL,
  `pes_sexo_pessoa` varchar(9) NOT NULL,
  `pes_cpf_pessoa` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pes_pessoa`
--

INSERT INTO `pes_pessoa` (`pes_id_pessoa`, `pes_nm_pessoa`, `pes_sbnm_pessoa`, `pes_sexo_pessoa`, `pes_cpf_pessoa`) VALUES
(1, 'Administrador', '', 'masculino', NULL),
(2, 'Emanuel', 'Alexandre Nathan Novaes', 'masculino', '13401291599'),
(3, 'Breno', 'Ian Marcos Nunes', 'masculino', '04756780520'),
(4, 'Kevin', 'Manoel Alexandre Peixoto', 'masculino', '79552423511'),
(5, 'Isabella ', 'Alícia', 'feminino', '32997782503'),
(6, 'Daniele', 'Almeida', 'feminino', '27295872507');

-- --------------------------------------------------------

--
-- Estrutura da tabela `rac_raca`
--

CREATE TABLE `rac_raca` (
  `rac_id_raca` int(11) NOT NULL,
  `rac_ds_raca` varchar(45) NOT NULL,
  `rac_id_tipo` int(11) NOT NULL,
  `rac_st_raca` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `rac_raca`
--

INSERT INTO `rac_raca` (`rac_id_raca`, `rac_ds_raca`, `rac_id_tipo`, `rac_st_raca`) VALUES
(1, 'Poodle', 1, '1'),
(2, 'Husky', 1, '1'),
(3, 'Dálmata', 1, '1'),
(4, 'Siamês', 2, '1'),
(5, 'Persa', 2, '1'),
(6, 'Sphynx', 2, '1'),
(7, 'Birmanês', 2, '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tpa_tipo_animal`
--

CREATE TABLE `tpa_tipo_animal` (
  `tpa_id_tipo` int(11) NOT NULL,
  `tpa_ds_tipo` varchar(50) NOT NULL,
  `tpa_st_tipo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tpa_tipo_animal`
--

INSERT INTO `tpa_tipo_animal` (`tpa_id_tipo`, `tpa_ds_tipo`, `tpa_st_tipo`) VALUES
(1, 'Cachorro', 1),
(2, 'Gato', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tpu_tipo_usuario`
--

CREATE TABLE `tpu_tipo_usuario` (
  `tpu_id_tipo_usuario` int(11) NOT NULL,
  `tpu_ds_tipo_usuario` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tpu_tipo_usuario`
--

INSERT INTO `tpu_tipo_usuario` (`tpu_id_tipo_usuario`, `tpu_ds_tipo_usuario`) VALUES
(1, 'Admin'),
(2, 'Atendente'),
(4, 'Cliente'),
(3, 'Médico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usr_usuario`
--

CREATE TABLE `usr_usuario` (
  `usr_id_usuario` int(11) NOT NULL,
  `usr_id_pessoa` int(11) NOT NULL,
  `usr_tipo_usuario` int(11) NOT NULL,
  `usr_crmv_usuario` int(11) DEFAULT NULL,
  `usr_login_usuario` varchar(45) NOT NULL,
  `usr_password_usuario` varchar(160) NOT NULL,
  `usr_st_usuario` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usr_usuario`
--

INSERT INTO `usr_usuario` (`usr_id_usuario`, `usr_id_pessoa`, `usr_tipo_usuario`, `usr_crmv_usuario`, `usr_login_usuario`, `usr_password_usuario`, `usr_st_usuario`) VALUES
(1, 1, 1, NULL, 'admin', '356a192b7913b04c54574d18c28d46e6395428ab', '1'),
(2, 2, 3, 44567895, '13401291599', '356a192b7913b04c54574d18c28d46e6395428ab', '1'),
(3, 3, 3, 9897678, '04756780520', '356a192b7913b04c54574d18c28d46e6395428ab', '1'),
(4, 4, 4, NULL, '79552423511 ', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1'),
(5, 5, 4, NULL, '32997782503', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1'),
(6, 6, 2, NULL, '27295872507', '356a192b7913b04c54574d18c28d46e6395428ab', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ani_animal`
--
ALTER TABLE `ani_animal`
  ADD PRIMARY KEY (`ani_id_animal`),
  ADD UNIQUE KEY `ani_id_animal_UNIQUE` (`ani_id_animal`),
  ADD KEY `fk_ani_animal_cli_cliente1_idx` (`ani_id_cliente`),
  ADD KEY `fk_ani_animal_rac_raca1_idx` (`ani_id_raca`);

--
-- Indexes for table `atd_atendimento`
--
ALTER TABLE `atd_atendimento`
  ADD PRIMARY KEY (`atd_id_atendimento`),
  ADD UNIQUE KEY `atd_id_atendimento_UNIQUE` (`atd_id_atendimento`),
  ADD KEY `fk_atd_atendimento_ani_animal1_idx` (`atd_id_animal`),
  ADD KEY `fk_atd_atendimento_usr_usuario1_idx` (`atd_id_medico`);

--
-- Indexes for table `cid_cidade`
--
ALTER TABLE `cid_cidade`
  ADD PRIMARY KEY (`cid_id_cidade`),
  ADD UNIQUE KEY `cid_id_cidades_UNIQUE` (`cid_id_cidade`),
  ADD UNIQUE KEY `cid_ds_cidade_UNIQUE` (`cid_ds_cidade`);

--
-- Indexes for table `cli_cliente`
--
ALTER TABLE `cli_cliente`
  ADD PRIMARY KEY (`cli_id_cliente`),
  ADD UNIQUE KEY `cli_id_cliente_UNIQUE` (`cli_id_cliente`),
  ADD UNIQUE KEY `cli_id_pessoa_UNIQUE` (`cli_id_pessoa`),
  ADD KEY `fk_cli_cliente_pes_pessoa1_idx` (`cli_id_pessoa`);

--
-- Indexes for table `end_endereco`
--
ALTER TABLE `end_endereco`
  ADD PRIMARY KEY (`end_id_endereco`),
  ADD UNIQUE KEY `end_id_endereco_UNIQUE` (`end_id_endereco`),
  ADD UNIQUE KEY `end_id_cliente_UNIQUE` (`end_id_cliente`),
  ADD KEY `fk_end_endereco_cli_cliente1_idx` (`end_id_cliente`),
  ADD KEY `fk_end_endereco_cid_cidades1_idx` (`end_id_cidade`);

--
-- Indexes for table `pes_pessoa`
--
ALTER TABLE `pes_pessoa`
  ADD PRIMARY KEY (`pes_id_pessoa`),
  ADD UNIQUE KEY `pes_id_pessoa_UNIQUE` (`pes_id_pessoa`);

--
-- Indexes for table `rac_raca`
--
ALTER TABLE `rac_raca`
  ADD PRIMARY KEY (`rac_id_raca`),
  ADD UNIQUE KEY `rac_id_raca_UNIQUE` (`rac_id_raca`);

--
-- Indexes for table `tpa_tipo_animal`
--
ALTER TABLE `tpa_tipo_animal`
  ADD PRIMARY KEY (`tpa_id_tipo`);

--
-- Indexes for table `tpu_tipo_usuario`
--
ALTER TABLE `tpu_tipo_usuario`
  ADD PRIMARY KEY (`tpu_id_tipo_usuario`),
  ADD UNIQUE KEY `tpu_id_tipo_usuario_UNIQUE` (`tpu_id_tipo_usuario`),
  ADD UNIQUE KEY `tpu_ds_tipo_usuario_UNIQUE` (`tpu_ds_tipo_usuario`);

--
-- Indexes for table `usr_usuario`
--
ALTER TABLE `usr_usuario`
  ADD PRIMARY KEY (`usr_id_usuario`),
  ADD UNIQUE KEY `usr_id_usuario_UNIQUE` (`usr_id_usuario`),
  ADD UNIQUE KEY `usr_id_pessoa_UNIQUE` (`usr_id_pessoa`),
  ADD UNIQUE KEY `usr_login_usuario_UNIQUE` (`usr_login_usuario`),
  ADD KEY `usr_tipo_usuario` (`usr_tipo_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ani_animal`
--
ALTER TABLE `ani_animal`
  MODIFY `ani_id_animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `atd_atendimento`
--
ALTER TABLE `atd_atendimento`
  MODIFY `atd_id_atendimento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cid_cidade`
--
ALTER TABLE `cid_cidade`
  MODIFY `cid_id_cidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cli_cliente`
--
ALTER TABLE `cli_cliente`
  MODIFY `cli_id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `end_endereco`
--
ALTER TABLE `end_endereco`
  MODIFY `end_id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pes_pessoa`
--
ALTER TABLE `pes_pessoa`
  MODIFY `pes_id_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rac_raca`
--
ALTER TABLE `rac_raca`
  MODIFY `rac_id_raca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tpa_tipo_animal`
--
ALTER TABLE `tpa_tipo_animal`
  MODIFY `tpa_id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tpu_tipo_usuario`
--
ALTER TABLE `tpu_tipo_usuario`
  MODIFY `tpu_id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usr_usuario`
--
ALTER TABLE `usr_usuario`
  MODIFY `usr_id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `ani_animal`
--
ALTER TABLE `ani_animal`
  ADD CONSTRAINT `fk_ani_animal_cli_cliente` FOREIGN KEY (`ani_id_cliente`) REFERENCES `cli_cliente` (`cli_id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ani_animal_rac_raca1` FOREIGN KEY (`ani_id_raca`) REFERENCES `rac_raca` (`rac_id_raca`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `atd_atendimento`
--
ALTER TABLE `atd_atendimento`
  ADD CONSTRAINT `fk_atd_atendimento_ani_animal1` FOREIGN KEY (`atd_id_animal`) REFERENCES `ani_animal` (`ani_id_animal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_atd_atendimento_usr_usuario1` FOREIGN KEY (`atd_id_medico`) REFERENCES `usr_usuario` (`usr_id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cli_cliente`
--
ALTER TABLE `cli_cliente`
  ADD CONSTRAINT `fk_cli_cliente_pes_pessoa1` FOREIGN KEY (`cli_id_pessoa`) REFERENCES `pes_pessoa` (`pes_id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `end_endereco`
--
ALTER TABLE `end_endereco`
  ADD CONSTRAINT `fk_end_endereco_cid_cidades1` FOREIGN KEY (`end_id_cidade`) REFERENCES `cid_cidade` (`cid_id_cidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_end_endereco_cli_cliente1` FOREIGN KEY (`end_id_cliente`) REFERENCES `cli_cliente` (`cli_id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usr_usuario`
--
ALTER TABLE `usr_usuario`
  ADD CONSTRAINT `fk_usr_usuario_pes_pessoa1` FOREIGN KEY (`usr_id_pessoa`) REFERENCES `pes_pessoa` (`pes_id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usr_usuario_tpu_tipo_usuario1` FOREIGN KEY (`usr_tipo_usuario`) REFERENCES `tpu_tipo_usuario` (`tpu_id_tipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

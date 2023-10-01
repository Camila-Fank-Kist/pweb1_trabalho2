-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para db_trabalho
CREATE DATABASE IF NOT EXISTS `db_trabalho` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_trabalho`;

-- Copiando estrutura para tabela db_trabalho.avaliacao
CREATE TABLE IF NOT EXISTS `avaliacao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int DEFAULT NULL,
  `sabor` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nota` int NOT NULL,
  `descricao` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `FK_avaliacao_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela db_trabalho.avaliacao: ~6 rows (aproximadamente)
INSERT INTO `avaliacao` (`id`, `usuario_id`, `sabor`, `nota`, `descricao`) VALUES
	(21, 12, 'Marguerita, Marinara e Parmiggiana', 10, 'Melhores pizzas que eu já comi na minha vida!'),
	(22, 13, 'Mare e monti, Four stagioni e Diavola', 10, 'Massa bem crocante e recheio bem saboroso.'),
	(23, 14, 'Napolitana e Boscaiola', 9, 'Muito saborosa, comprarei novamente'),
	(24, 15, 'Parmiggiana e Margherita', 10, 'Essas pizzar contêm a essência italiana!'),
	(25, 16, 'Mare e monti', 10, 'Excelente! Recomendo'),
	(26, 14, 'Parmiggiana e Marinara', 10, 'É a segunda vez que eu pego pizza aqui e a qualidade aumenta cada vez mais');

-- Copiando estrutura para tabela db_trabalho.pedido
CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int DEFAULT NULL,
  `sabores` varchar(500) NOT NULL,
  `forma_retirada` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `forma_pagamento` varchar(50) NOT NULL,
  `observacao` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_pedido_usuario` (`usuario_id`),
  CONSTRAINT `FK_pedido_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela db_trabalho.pedido: ~6 rows (aproximadamente)
INSERT INTO `pedido` (`id`, `usuario_id`, `sabores`, `forma_retirada`, `forma_pagamento`, `observacao`) VALUES
	(13, 12, 'Marguerita, Marinara e Parmiggiana', 'Retirar no local', 'Cartão de crédito', 'Se possível, colocar bastante molho de tomate'),
	(14, 13, 'Mare e monti, Four stagioni e Diavola', 'Entregar em meu endereço', 'Dinheiro', 'Na Diavola, colocar peperoni americano'),
	(15, 14, 'Napolitana e Boscaiola', 'Retirar no local', 'Pix', 'Na Napolitana, grelhar bem as anchovas'),
	(16, 19, 'Parmiggiana e Margherita.', 'Entregar em meu endereço', 'Cartão de débito', 'Se possível, colocar bastante queijo na Parmiggiana'),
	(17, 16, '3 Mare e monti', 'Retirar no local', 'Cartão de crédito', 'Fritar bem o alho'),
	(18, 14, 'Parmiggiana e Marinara', 'Entregar em meu endereço', 'Dinheiro', 'Se possível, colocar bastante orégano');

-- Copiando estrutura para tabela db_trabalho.sabor
CREATE TABLE IF NOT EXISTS `sabor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ingredientes` varchar(600) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `preco` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela db_trabalho.sabor: ~9 rows (aproximadamente)
INSERT INTO `sabor` (`id`, `nome`, `ingredientes`, `preco`) VALUES
	(5, 'Marguerita', 'Molho de tomate, muçarela de búfala e manjericão.', 40),
	(6, 'Marinara', 'Molho de tomate, alho, orégano, e azeite de oliva.', 35),
	(7, 'Four stagioni', 'Molho de tomate, muçarela, azeitonas pretas, presunto, alcachofra e cogumelos.', 45),
	(8, 'Bianca', 'Azeite de oliva e sal grosso (é vendida por peso e não por fatia, como as outras pizzas).', 35),
	(9, 'Bismarck', 'Molho de tomate, muçarela, presunto e um ovo com gema mole.', 40),
	(10, 'Boscaiola', 'Muçarela, cogumelos e linguiça.', 45),
	(11, 'Diavola', 'Molho de tomate, muçarela de búfala, manjericão, salame picante (ou peperoni americano) e azeite picante.', 50),
	(12, 'Mare e monti', 'Molho de tomate, muçarela, camarões, alho e salsicha.', 55),
	(13, 'Napolitana', 'Molho de tomate, muçarela e anchovas grelhadas.', 45);

-- Copiando estrutura para tabela db_trabalho.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `telefone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `login` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `senha` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela db_trabalho.usuario: ~6 rows (aproximadamente)
INSERT INTO `usuario` (`id`, `nome`, `email`, `telefone`, `login`, `senha`) VALUES
	(12, 'Mortícia', 'morticia@gmail.com', '4911223344', 'morticia', '$2y$10$C8YaM/u/A9BFKrGBFXx/vOSoHx3/L6C0.knH9MBsvyKyBx18IOHDa'),
	(13, 'Xena', 'xena@gmail.com', '49888776655', 'xena', '$2y$10$MvN.7rGdQ5gUMgXX64HrR.E4OSYi/oFzSQTN38yLTNcJUzyQIpB/C'),
	(14, 'Lola Maria', 'lola@gmail.com', '49555667788', 'lola', '$2y$10$NRW7nMywKcDrXtQ69g9F5ulHFf1lwM/gFYMqS9dcUJjk0JGu9v8oi'),
	(15, 'Dora ', 'doraAlice@gmail.com', '49666554435', 'dora', '$2y$10$OZtyL7BhdcIuPSwrTPOrIuj6fBILxc25dA56O3TziL7FVa0ACnxPq'),
	(16, 'Rafael Henrique', 'rafael@gmail.com', '47999887766', 'rafael', '$2y$10$ZURxXVS0JjUD7kUlsLguGeQweFf7n1kMw9aYtr/vjR0I.FSM4487C'),
	(19, 'Camila', 'camila@gmail.com', '4911223344', 'camila', '$2y$10$n1h70LipaOLBIzx.nIh2buDZTgODj/rOITbJ8z9/GsKFt/4N5Wrra');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

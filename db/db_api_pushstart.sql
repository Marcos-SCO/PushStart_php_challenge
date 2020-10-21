-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Out-2020 às 17:55
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_api_pushstart`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `first_name` varchar(80) DEFAULT NULL,
  `last_name` varchar(80) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `img_path` varchar(255) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_user`, `first_name`, `last_name`, `email`, `password`, `img_path`, `create_at`, `updated_at`) VALUES
(1, 'Mestre', 'dos Magos', 'mastre@outlook.com', '$2y$10$iJqB0QUZL.Q7WKSRwN/gUep05PRTHbeVpq3MbVdjYEHILCHjzqPUy', '/public/img/users/id_1/mestreDosMagos-min.jpg', '2020-10-21 14:22:36', '2020-10-21 15:23:27'),
(2, 'Myckey', 'Mouse', 'mickey@outlook.com', '$2y$10$TeU.WUzgGEFkWdMd7ZlO6e6aEEh9nT7NKcHIbDN/iSmK0O8hXe.Ny', '/public/img/users/id_2/mickey.jpg', '2020-10-21 14:58:18', '2020-10-21 14:58:18'),
(3, 'Homer', 'Simpson', 'homer@outlook.com', '$2y$10$IR28.0bOV8D8RQCDrEYXb.bfORLXG1m83LxseIPu.NeSNHNniuCAW', '/public/img/users/id_3/homer-min.png', '2020-10-21 15:37:49', '2020-10-21 15:37:49'),
(4, 'Giorno', 'Popo', 'giorno@outlook.com', '$2y$10$Iq6Dh7G.0LQTOvsLq//iYumAwmUj5pFWgSr.HkvZTMHVsdcqX8uIG', '/public/img/users/id_4/giornoGiovanna-min.jpg', '2020-10-21 15:38:32', '2020-10-21 15:38:32'),
(5, 'Insane', 'Programmer', 'inseane@outlook.com', '$2y$10$OwxPmtMweg2nlV4jcfFi7uAppR5cD0UAGj4hJd73qw65gTvQ/61.6', '/public/img/users/id_5/programadorTurboNitro-min.jpg', '2020-10-21 15:39:41', '2020-10-21 15:39:41'),
(6, 'Dio', 'Brando', 'dio@outlook.com', '$2y$10$IF0bX6QnfEeaP2mvIlbPt.NJoK4PPWSvNrE2x2VtyT56vDUBIRmve', '/public/img/users/id_6/dio-min.jpg', '2020-10-21 15:40:08', '2020-10-21 15:40:08'),
(7, 'Zero', 'the second', 'zero@outlook.com', '$2y$10$1nMcMlK0JHdGCBX4n4I79.V5gNpm8YVBsmDV368PLVvLv0luLIuke', '/public/img/users/id_7/zero-min.png', '2020-10-21 15:40:40', '2020-10-21 15:40:40'),
(8, 'Joana', 'D\' arc', 'joana@outlook.com', '$2y$10$bucHTLTn.9gn5WNntgqFNOIljEqWUYhbHnGFsWXjLOWjF6iqaGCC6', '/public/img/users/id_8/joanna.jpg', '2020-10-21 15:41:25', '2020-10-21 15:41:25'),
(9, 'Jotaro', 'Kujo', 'jotaro@outlook.com', '$2y$10$4Y3SRlhmtghpooXmdTlUtuILHE6BFQapZB78Tq5yekmowkAyBRe5K', '/public/img/users/id_9/jotaroKujo-min.png', '2020-10-21 15:42:01', '2020-10-21 15:42:01');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

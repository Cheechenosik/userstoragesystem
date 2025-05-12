-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 11 2025 г., 05:49
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `clients_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `number` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('active','blacklisted') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` enum('client','admin') DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `number`, `email`, `password`, `status`, `created_at`, `role`) VALUES
(1, 'admin1', '+79990001122', 'admin1@example.com', '$2y$10$W8Qz8z5g8y5g5z5g8y5g8u5z5g8y5g8y5g8y5g8y5g8y5g8y5g8y', 'blacklisted', '2025-04-05 12:29:53', 'admin'),
(2, 'client1', '+79991112233', 'client1@example.com', '$2y$10$X8Qz8z5g8y5g5z5g8y5g8u5z5g8y5g8y5g8y5g8y5g8y5g8y5g8y', 'active', '2025-04-05 12:29:53', 'client'),
(5, '1', '+71111111111', '1@1.1', '$2y$10$ElkNXK0nJT9MKgZxuKYoN.TOZbPeqUxLFPUShXnAS6uXBVn6XFPy.', 'blacklisted', '2025-04-05 12:39:53', 'admin'),
(6, '4', '+3333333333', '3@3', '$2y$10$x0Lryl13onogOCsxOoy.Q.zNJZi0BoIwlr7bkkCVVOw72SCuwfJOK', 'active', '2025-04-11 11:10:23', 'client');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

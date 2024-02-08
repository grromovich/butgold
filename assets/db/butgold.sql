-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 08 2024 г., 21:32
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `butgold`
--

-- --------------------------------------------------------

--
-- Структура таблицы `emails`
--

CREATE TABLE `emails` (
  `id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int NOT NULL,
  `type` int NOT NULL,
  `name` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
  `shortdesc` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fulldesc` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `img` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
  `zoloto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `type`, `name`, `shortdesc`, `fulldesc`, `price`, `img`, `zoloto`) VALUES
(1, 1, 'Золотое кольцо с алмазами', 'Прекрасное золотое кольцо с алмазами \r\nдополнит Ваш образ!', 'Вдохновленный силой единения и инклюзивности. Это смелое и наглядное заявление о личных связях, которые делают нас теми, кто мы есть. Это кольцо искусно изготовлено из золота 18 карат с бриллиантами ручной огранки. Носите это эффектное кольцо как само по себе, так и с вашей повседневной коллекцией колец.', 130000, '../assets/img/goods/kolzo1.png', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `svaz`
--

CREATE TABLE `svaz` (
  `id` int NOT NULL,
  `name` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
  `comment` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(400) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `svaz`
--

INSERT INTO `svaz` (`id`, `name`, `comment`, `phone`, `email`) VALUES
(14, 'Кирилл', 'asdadfsdf', '345345345345', 'gmail@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastlastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pol` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `lastlastname`, `email`, `date`, `password`, `pol`) VALUES
(8, NULL, NULL, NULL, 'gmail@gmail.com', NULL, '$2y$10$ynD6tRjzabjdwX5rOG07a.BwK1eFMh.BFh7vhu135.J3ofrhSYiLa', NULL),
(9, 'Кирилл', 'ee', 'r', 'email@sdf.com', '2024-02-08', '$2y$10$.lw6zPHH2ftG/RvvPLsBT.e4OYpd9ZQP2M9XaEUnA5sve1/JAwsXi', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `zakazi`
--

CREATE TABLE `zakazi` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sum` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `zakazi`
--

INSERT INTO `zakazi` (`id`, `name`, `phone`, `email`, `address`, `date`, `sum`) VALUES
(9, 'Кирилл', '345345345345', 'gmail@gmail.com', '444444', '2024-02-08', 650000);

-- --------------------------------------------------------

--
-- Структура таблицы `zakazinfo`
--

CREATE TABLE `zakazinfo` (
  `id` int NOT NULL,
  `id_zakaz` int NOT NULL,
  `id_good` int NOT NULL,
  `kol` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `zakazinfo`
--

INSERT INTO `zakazinfo` (`id`, `id_zakaz`, `id_good`, `kol`) VALUES
(5, 9, 1, 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `svaz`
--
ALTER TABLE `svaz`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `zakazi`
--
ALTER TABLE `zakazi`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `zakazinfo`
--
ALTER TABLE `zakazinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `svaz`
--
ALTER TABLE `svaz`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `zakazi`
--
ALTER TABLE `zakazi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `zakazinfo`
--
ALTER TABLE `zakazinfo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

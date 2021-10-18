-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 12 2021 г., 11:31
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gb1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int NOT NULL,
  `goods_id` int NOT NULL,
  `session_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `goods_id`, `session_id`) VALUES
(31, 1, '9p3oui4l4httnmneltr97nq6110b2lec'),
(32, 2, '9p3oui4l4httnmneltr97nq6110b2lec'),
(33, 2, '9p3oui4l4httnmneltr97nq6110b2lec'),
(34, 3, '9p3oui4l4httnmneltr97nq6110b2lec'),
(35, 2, '9p3oui4l4httnmneltr97nq6110b2lec'),
(36, 1, '9p3oui4l4httnmneltr97nq6110b2lec'),
(37, 1, '16ej7pr5caaup3rpbufgissefkjbtiii'),
(38, 2, '16ej7pr5caaup3rpbufgissefkjbtiii'),
(39, 1, 'jc6ujinvrdjcfqqkq5vjh9ukg4ltgcg3'),
(44, 2, 'sthae6l4fa8i25c4v6c7rnvr4a4ktntm'),
(47, 3, 'sthae6l4fa8i25c4v6c7rnvr4a4ktntm'),
(48, 1, 'sthae6l4fa8i25c4v6c7rnvr4a4ktntm'),
(49, 1, 'sthae6l4fa8i25c4v6c7rnvr4a4ktntm'),
(50, 1, 'sthae6l4fa8i25c4v6c7rnvr4a4ktntm'),
(51, 1, 'sthae6l4fa8i25c4v6c7rnvr4a4ktntm'),
(52, 1, 'sthae6l4fa8i25c4v6c7rnvr4a4ktntm'),
(53, 1, 'ab5qnb36b6cp527ehq92v63gl0vihocm'),
(54, 1, 'id7563c9se8392ill3msq0ueajs0pftl'),
(55, 1, 'id7563c9se8392ill3msq0ueajs0pftl'),
(56, 1, 'id7563c9se8392ill3msq0ueajs0pftl'),
(57, 2, 'id7563c9se8392ill3msq0ueajs0pftl'),
(58, 3, 'id7563c9se8392ill3msq0ueajs0pftl'),
(59, 3, 'id7563c9se8392ill3msq0ueajs0pftl');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `author` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `author`, `text`) VALUES
(1, 'Admin', 'Всем ку!'),
(2, 'Пират', 'Еху'),
(3, 'Bob', 'flowers'),
(4, 'Andrew', 'hi people!'),
(5, 'Tom', 'the best');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `title`, `price`, `description`, `image`) VALUES
(1, 'Пицца', '24', 'Очень вкусно!', 'pizza.jpeg'),
(2, 'Чай', '1', NULL, 'tea.png'),
(3, 'Яблоко', '12', 'Полезно', 'apple.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `views` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `title`, `views`) VALUES
(2, '01.jpg', 39),
(3, '02.jpg', 21),
(4, '03.jpg', 2),
(5, '04.jpg', 1),
(6, '05.jpg', 0),
(7, '06.jpg', 0),
(8, '07.jpg', 0),
(9, '08.jpg', 0),
(10, '09.jpg', 2),
(11, '10.jpg', 1),
(12, '11.jpg', 1),
(13, '12.jpg', 2),
(14, '13.jpg', 1),
(15, '14.jpg', 24),
(16, '15.jpg', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `text`) VALUES
(1, 'Правительство и бизнес договорились по основным вопросам изменения налогов', 'Мишустин: правительство и бизнес договорились по основным параметрам изменения налогов\r\nПредседатель правительства РФ Михаил Мишустин проводит встречу с членами бюро правления Российского союза промышленников и предпринимателей - РИА Новости, 1920, 23.09.2021\r\n© РИА Новости / Александр Астафьев\r\nПерейти в фотобанк\r\nЧитать ria.ru в\r\nМОСКВА, 23 сен — РИА Новости. Власти и предпринимательское сообщество договорились по основным параметрам изменения налогов, заявил премьер-министр Михаил Мишустин на встрече с членами Российского союза промышленников и предпринимателей.'),
(2, 'Минобороны опровергло заявление Эстонии о нарушении воздушной границы', 'Минобороны опровергло заявление Эстонии о нарушении воздушной границы российским самолетом\r\nСамолет дальнего радиолокационного обнаружения А-50 - РИА Новости, 1920, 23.09.2021\r\n© РИА Новости / Антон Денисов\r\nПерейти в фотобанк\r\nЧитать ria.ru в\r\nМОСКВА, 23 сен — РИА Новости. Минобороны России опровергло заявление Эстонии о нарушении воздушного пространства страны.\r\nВ Таллине заявили, что самолет А-50 накануне пересек воздушную границу Эстонии.\r\n\"Экипаж самолета А-50 Воздушно-космических сил осуществил плановый перелет с аэродрома в Калининградской области в пункт постоянной дислокации\", — заявили в российском оборонном ведомстве.\r\nПодчеркивается, что \"перелет проходил по заранее согласованному маршруту с включенным транспондером\", а пилоты находились на связи эстонскими диспетчерами.'),
(4, 'Новый заголовок', 'dfgg4');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `user_id` int NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `sum` int NOT NULL,
  `status` enum('Новый','Подтвержден','Собран','Передан в доставку','Доставлен') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `user_id`, `session_id`, `sum`, `status`) VALUES
(1, 'sdfghj', '123456', 1, '9p3oui4l4httnmneltr97nq6110b2lec', 63, 'Подтвержден'),
(3, 'hgfds', '54321', 2, 'jc6ujinvrdjcfqqkq5vjh9ukg4ltgcg3', 24, 'Собран'),
(5, 'gfds', '54222', 2, 'id7563c9se8392ill3msq0ueajs0pftl', 97, 'Подтвержден');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `hash` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`) VALUES
(1, 'admin', '123', '125408039361599e7225dd50.07737986'),
(2, 'user', '321', '14484387196159935dc9fcd8.87411427'),
(41, 'user2', '123', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

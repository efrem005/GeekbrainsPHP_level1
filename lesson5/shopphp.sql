-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 26 2021 г., 19:45
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shopphp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Обучения'),
(2, 'Интернет'),
(3, 'Техника'),
(4, 'Политика'),
(5, 'Спорт');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` text,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `view` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `category_id`, `view`) VALUES
(1, 'Voluptate molestiae sapiente qui cupiditate.', 'Corporis earum neque voluptatem hic incidunt eos vel. Porro repellendus non ut sunt ipsum. Voluptas nesciunt quisquam iste eum.', 1, 5),
(6, 'Aut optio non assumenda tenetur.', 'Ut occaecati ut aut exercitationem inventore sint. Id laboriosam natus ratione earum. Labore et sint in eum praesentium.', 1, 2),
(8, 'Voluptatem quo maxime ab adipisci fugit omnis voluptas.', 'Et assumenda velit rem aut reiciendis recusandae. Quasi repudiandae dolor sit sint. Molestiae et omnis quo minima quisquam voluptate rem. Asperiores praesentium delectus rerum est.', 3, 0),
(10, 'Maxime omnis ut vitae quia est suscipit animi.', 'Rerum illo magnam vero ipsa molestiae maiores iure. Laboriosam nisi aut totam est et ratione et. Et voluptatum nam et amet.', 5, 1),
(11, 'Occaecati necessitatibus repellat beatae exercitationem.', 'Dolores in id consequuntur beatae deleniti quia alias. Ut voluptatem modi aliquam modi fugit nobis. Magnam aspernatur aut odio sint.', 1, 0),
(12, 'Aliquam iusto possimus est sit non.', 'Voluptatem pariatur maxime quia voluptates officia reiciendis corporis. Aut quod eum similique ullam et. Consequatur temporibus ipsam consequatur aut voluptatem cupiditate inventore aut.', 2, 3),
(13, 'Qui praesentium qui provident.', 'Optio fuga eaque molestiae rerum. Ullam corrupti sint aut. Corporis perspiciatis perspiciatis reprehenderit omnis.', 3, 5),
(14, 'Accusantium aut ut quia aut iusto similique aspernatur.', 'At nihil fuga non animi exercitationem. Deleniti et fugiat error non. Harum numquam dignissimos odio consequatur.', 4, 2),
(15, 'Velit est officia animi doloribus.', 'Id aspernatur distinctio vero. Ea laudantium in velit iste reiciendis qui quidem veniam. Voluptatem nostrum vel qui ipsam ipsam id.', 5, 1),
(16, 'Tempore debitis reiciendis sit esse quia aliquid fugiat.', 'Consequatur soluta distinctio voluptatum sint magni repellendus. Doloremque omnis minima quo. Pariatur consectetur recusandae consectetur sunt. Qui vel sapiente qui atque.', 1, 0),
(17, 'Et aspernatur rerum et est earum provident explicabo.', 'Minus natus perferendis quibusdam ad suscipit. Deleniti reprehenderit vel quisquam odio qui fuga. Fuga voluptatem facilis et dolor. Qui non voluptatum laudantium et aut.', 2, 0),
(18, 'Dicta commodi autem voluptates sunt eius atque tenetur.', 'Veniam aut et doloribus modi neque necessitatibus eveniet tempore. Enim consectetur alias modi temporibus. Laborum totam aperiam id qui. Ut et magnam hic voluptas nam.', 3, 0),
(19, 'Eaque qui totam sunt optio sed.', 'Sequi nobis laudantium voluptatem quidem ducimus ullam qui velit. Omnis est assumenda error iure repudiandae fuga et autem. Facere maiores reiciendis ut excepturi. Omnis eveniet quia distinctio sed.', 4, 0),
(20, 'Odio facere illum repellat animi natus.', 'Quia nulla exercitationem sed laborum pariatur consequatur. Vero culpa exercitationem et et. Impedit et minima voluptatibus reprehenderit sed.', 5, 0),
(21, 'Natus ut enim vitae assumenda.', 'Voluptates libero cupiditate aut temporibus optio iste itaque sed. Alias impedit cupiditate molestias doloribus quis a ut. Nisi consequuntur accusantium voluptatem officiis corrupti.', 1, 2),
(22, 'Quo sint est aut earum cumque.', 'Ipsa quis sunt voluptates ut reiciendis. Quidem architecto est ut optio ipsa. Et sint voluptas excepturi ut qui facere accusantium et. Hic in inventore qui sunt.', 2, 0),
(23, 'Quam vel neque quis veritatis possimus laudantium.', 'Ratione adipisci ullam magnam accusamus ullam. Esse iste nesciunt vero dignissimos veniam cumque.', 3, 1),
(24, 'Et autem tempore libero enim excepturi possimus tempore.', 'Tempora odit est placeat sunt soluta aut cupiditate. Consequatur autem iste non est quia. Vero aut odit ut minima. Similique odit harum cumque.', 4, 0),
(25, 'Ea consequatur quis quisquam et.', 'Reprehenderit id optio eos nulla. Omnis enim debitis omnis nulla qui sequi. Dolor aut sed aspernatur. Assumenda recusandae et at qui. Quia asperiores consequuntur repellat aut sint libero distinctio.', 5, 0),
(26, 'Recusandae et dignissimos mollitia sed nisi.', 'Omnis cum vitae et. Perferendis ea quia voluptates est laudantium enim. Occaecati non delectus quam eaque omnis nesciunt animi. Totam iste iure consequatur explicabo ut illum.', 1, 0),
(27, 'Eum tempore et molestiae expedita tempore occaecati qui autem.', 'Aliquid mollitia eligendi explicabo eaque ut odit. Magnam laboriosam vel dicta dicta repellendus tempore. Alias perspiciatis id aut omnis quam sequi. Officia et quisquam modi voluptatem cum sunt.', 2, 0),
(28, 'Molestias unde aut consequatur iusto.', 'Nihil voluptatem autem voluptate totam. Ipsam maiores eaque sint quia vel voluptate. Est expedita accusamus quidem praesentium quo voluptatum.', 3, 0),
(29, 'Atque possimus ad voluptas pariatur libero.', 'Quod ab est eligendi et perferendis totam soluta. Quis quia omnis in sint labore nemo quaerat. Soluta voluptatem non quasi ad consequatur tenetur sit.', 4, 0),
(30, 'Explicabo eius quia sit ex porro voluptatum.', 'Est quo rerum hic excepturi. Provident perferendis dicta cupiditate et officia sit. Quia unde similique odio sunt.', 5, 0),
(31, 'Ullam illum vitae eum in libero assumenda.', 'Et sit aliquam temporibus cum. Aut et omnis quam. Quidem est voluptas aut perferendis voluptatem. Perspiciatis ducimus neque non iusto.', 1, 0),
(32, 'Ut ut esse et veniam et.', 'Quaerat placeat accusantium voluptatem blanditiis. Qui aut consequatur rerum. Nostrum non reprehenderit magnam ullam fugiat dolores. Eum sunt molestiae doloremque non in et a.', 2, 0),
(33, 'Qui itaque et eius est suscipit.', 'Illum quae non velit dolor. Alias id quaerat quod est iure omnis et. Non doloribus vero cupiditate ut.', 3, 0),
(34, 'Optio molestias nihil et vel modi.', 'Totam velit commodi voluptatem ut sit. Aspernatur a quisquam quis voluptatibus eligendi nostrum. Minima facilis ipsam quod est sit necessitatibus. Saepe minima cumque corporis qui doloremque.', 4, 0),
(35, 'Veritatis et qui rerum.', 'Excepturi in fuga laborum quasi deserunt et. At doloremque dolores et minima et incidunt officiis. Ullam vel dolores voluptatem autem fugit.', 5, 0),
(36, 'Tenetur sed aperiam possimus sit unde nisi excepturi.', 'Nihil vel alias dolores vel ducimus pariatur. Aut reprehenderit hic dolor in distinctio. Provident cupiditate et commodi officiis. Consequatur quidem soluta rerum sed.', 1, 0),
(37, 'Sequi earum iste tempore ullam.', 'Vel molestias voluptatem maxime sit qui est. Hic omnis doloribus tenetur quibusdam ducimus atque aut. Odit vel aut sint voluptates enim odit.', 2, 0),
(38, 'Voluptas aspernatur nihil consectetur voluptatem accusamus quis.', 'Perspiciatis impedit in non corporis enim aut. Omnis et beatae aut dolores error esse eaque. Error autem distinctio dicta dolor aliquid et aut ducimus.', 3, 0),
(39, 'Quaerat maiores quos neque impedit et ut qui.', 'Id sint at nihil voluptate alias voluptatem. Perferendis laboriosam sunt suscipit et. Eaque earum fugit dicta est qui ut quasi. Consequuntur sint accusantium dolorem.', 4, 0),
(40, 'Sunt facilis accusamus cum sequi saepe.', 'Veniam dignissimos sed repudiandae. Nobis corporis corporis beatae quaerat perspiciatis autem qui. Hic nisi quam asperiores fuga excepturi earum. Numquam distinctio unde soluta quia et nulla.', 5, 0),
(41, 'Itaque magnam sed eligendi aut.', 'Ut laudantium dolorem architecto aperiam. Culpa iure atque voluptas possimus autem. Aut qui perspiciatis est numquam ea occaecati. Cumque facilis soluta consequatur eum nesciunt earum.', 1, 0),
(42, 'Id soluta quaerat culpa.', 'Sit natus molestias culpa itaque nisi omnis nihil animi. Ipsa ut ut dolorem et aliquid minus. Rerum veritatis labore et et fugiat nisi quaerat. Sunt et magni suscipit laborum quia autem ex.', 2, 0),
(43, 'Quas ipsam vel aliquid molestiae fugit qui sint occaecati.', 'Consequatur consequatur sed omnis nisi consequatur nobis animi. Eos dolores voluptate quos occaecati earum aspernatur perspiciatis. Tempore nihil est repudiandae qui.', 3, 0),
(44, 'Non dolores quasi quae iste eum.', 'Cumque in ducimus sequi rem velit dolorem. Ipsam similique commodi possimus ad mollitia. Sequi et suscipit deleniti possimus ut eum. Voluptas aut id qui illo eos incidunt.', 4, 0),
(45, 'Laudantium sed accusamus praesentium.', 'Laborum debitis error et. Nihil laboriosam aut impedit quia accusantium aut exercitationem.', 5, 0),
(46, 'Corrupti nisi sed laboriosam perferendis.', 'Et est voluptatum labore aut aperiam quia. Nihil molestiae corrupti et odit. Quis dolor reiciendis dolorem fugiat eligendi tempore ex.', 1, 0),
(47, 'Ipsam rerum provident excepturi cupiditate nostrum mollitia.', 'Dolores voluptatem doloremque veritatis nam. Qui similique labore architecto accusamus quisquam nisi doloribus. Explicabo quisquam quod facere illum voluptas.', 2, 0),
(48, 'Ut similique delectus quia consequatur aliquid accusantium veritatis.', 'Qui sed qui unde accusamus quo quo enim. Rem nostrum voluptatem magnam qui asperiores in. Officia excepturi aperiam labore est mollitia et.', 3, 0),
(49, 'Qui et ab excepturi explicabo.', 'Nihil nihil nisi deserunt ut mollitia enim. Ut amet accusamus maxime sint minus.', 4, 0),
(50, 'Quidem consequatur nulla et eveniet in odit quia delectus.', 'Impedit consectetur a molestias dolorum aspernatur explicabo enim. Aliquam cupiditate placeat eius sapiente. Voluptatibus est quasi quis et. Facilis rerum temporibus omnis dolore nobis harum.', 5, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `photo`
--

CREATE TABLE `photo` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `href` text,
  `size` bigint DEFAULT NULL,
  `view` bigint DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `photo`
--

INSERT INTO `photo` (`id`, `title`, `href`, `size`, `view`, `created_at`) VALUES
(1, 'Озеро в лесу', 'wallhaven-1jyy51.jpg', 4378079, 0, '2021-05-05 05:40:58'),
(2, 'Луна', 'wallhaven-2e7voy.jpg', 1600191, 1, '2021-02-06 16:08:29'),
(3, 'Горы и небо', 'wallhaven-2e8eoy.jpg', 3488313, 0, '2012-04-15 23:52:12'),
(4, 'Водопад и гора', 'wallhaven-2e85jx.jpg', 3715553, 1, '2021-02-08 23:53:04'),
(5, 'Степь и небо', 'wallhaven-2em116.jpg', 3393963, 0, '2021-03-05 13:04:20'),
(6, 'Озеро в ущелье', 'wallhaven-2ex38g.jpg', 4635720, 0, '2021-05-12 15:11:25'),
(7, 'Старый замок в горах', 'wallhaven-5w9d23.jpg', 3066504, 0, '2021-04-24 11:45:13'),
(8, 'Песочная дюна', 'wallhaven-5wqpd1.jpg', 2758006, 1, '2021-01-14 04:24:44'),
(9, 'Над облаками', 'wallhaven-5wvme1.jpg', 2194075, 0, '2021-04-20 18:31:26'),
(10, 'Долина гор', 'wallhaven-5wxvr5.jpg', 1377051, 0, '2021-05-26 08:18:51'),
(11, 'Мост у озера', 'wallhaven-6k1d6l.jpg', 2913866, 0, '2021-02-24 20:57:19'),
(12, 'Город и горы', 'wallhaven-39zre9.jpg', 2954062, 0, '2021-03-14 09:16:33');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`,`title`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `photo`
--
ALTER TABLE `photo`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

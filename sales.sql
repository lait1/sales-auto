-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.38 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping data for table auto.autos: ~8 rows (approximately)
/*!40000 ALTER TABLE `autos` DISABLE KEYS */;
INSERT INTO `autos` (`id`, `name`, `slug`, `type_id`, `model_car_id`, `status_id`, `city_id`, `user_id`, `year`, `mileage`, `transmission`, `fuel`, `drive`, `price`, `description`, `draft`, `created_at`, `updated_at`, `keywords`, `title`, `seo_desc`) VALUES
	(54, 'Тачка крутая отвечаю', 'tachka-krutaya-otvechayu', 1, 1, 1, 2, 7, '2010', '123123', 'Механическая', 'Бензин', 'Передний', '123020', 'это тачила для настоящего самца', 0, '2020-05-28 19:44:28', '2020-05-28 20:02:43', NULL, NULL, NULL),
	(55, 'Таз пацанский', 'taz-pacanskiy', 1, 6, 2, 1, 7, '2001', '1231231231', 'Механическая', 'Дизель', 'Полный', '12313213', 'текст', 0, '2020-05-28 19:54:28', '2020-05-28 19:56:13', NULL, NULL, NULL),
	(56, 'Тест', 'test', 7, NULL, 2, 4, 7, NULL, NULL, NULL, NULL, NULL, '1231231', 'текст', 0, '2020-05-28 20:02:04', '2020-05-28 20:02:40', NULL, NULL, NULL),
	(58, 'пвапыв123132', 'pvapyv123132', 13, NULL, 2, 2, 7, NULL, NULL, NULL, NULL, NULL, '98765', 'текст', 0, '2020-05-28 20:18:06', '2020-05-28 20:59:39', NULL, NULL, NULL),
	(60, 'Новая машина', 'novaya-mashina', 1, 8, 2, 4, 7, '2020', '123123', 'Автомат', 'Дизель', 'Задний', '500123', 'текст', 0, '2020-05-28 20:21:44', '2020-05-28 20:22:24', 'слово, слово, слово', 'Новая лучшая машина на свете', 'Тут можно чтото купиьт, продать, найти и потерять'),
	(61, 'Тачила', 'tachila', 1, 12, 2, 2, 7, '2000', '11111111', 'Механическая', 'Бензин', 'Передний', '1899999', 'текст', 0, '2020-05-28 20:59:46', '2020-05-28 21:00:35', NULL, NULL, NULL),
	(62, 'пвапыв123132', 'pvapyv123132', 25, NULL, 2, 2, 7, NULL, NULL, NULL, NULL, NULL, '12000112', 'текст', 0, '2020-05-28 20:18:06', '2020-05-28 20:59:39', NULL, NULL, NULL),
	(63, NULL, NULL, 7, NULL, NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-06-02 14:48:54', '2020-06-02 14:48:54', NULL, NULL, NULL);
/*!40000 ALTER TABLE `autos` ENABLE KEYS */;

-- Dumping data for table auto.brands: ~21 rows (approximately)
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
	(1, 'Audi', NULL, '2020-05-20 22:01:10', '2020-05-20 22:01:10'),
	(2, 'BMW', NULL, '2020-05-20 22:01:18', '2020-05-20 22:01:18'),
	(3, 'Chevrolet', NULL, '2020-05-20 22:01:27', '2020-05-20 22:01:27'),
	(4, 'Citroen', NULL, '2020-05-28 22:23:32', '2020-05-28 22:23:33'),
	(5, 'Ford', NULL, '2020-05-28 22:23:30', '2020-05-28 22:23:34'),
	(6, 'Toyota', NULL, '2020-05-28 19:19:45', '2020-05-28 19:19:45'),
	(7, 'Nissan', NULL, '2020-05-28 19:19:55', '2020-05-28 19:19:55'),
	(8, 'Hyundai', NULL, '2020-05-28 19:20:01', '2020-05-28 19:20:01'),
	(9, 'KIA', NULL, '2020-05-28 19:20:05', '2020-05-28 19:20:05'),
	(10, 'Mercedes-Benz', NULL, '2020-05-28 19:20:10', '2020-05-28 19:20:10'),
	(11, 'Mazda', NULL, '2020-05-28 19:20:18', '2020-05-28 19:20:18'),
	(12, 'Volkswagen', NULL, '2020-05-28 19:20:25', '2020-05-28 19:20:25'),
	(13, 'Volvo', NULL, '2020-05-28 19:20:33', '2020-05-28 19:20:33'),
	(14, 'Skoda', NULL, '2020-05-28 19:20:36', '2020-05-28 19:20:36'),
	(15, 'Land Rover', NULL, '2020-05-28 19:20:43', '2020-05-28 19:20:43'),
	(16, 'Lancia', NULL, NULL, NULL),
	(17, 'Lexus', NULL, NULL, NULL),
	(18, 'Lincoln', NULL, NULL, NULL),
	(19, 'Lotus', NULL, NULL, NULL),
	(20, 'Maserati', NULL, NULL, NULL),
	(21, 'Mercury', NULL, NULL, NULL),
	(27, 'test', '4di5PYp2tyCk5dZ88CaC.png', '2020-06-04 12:12:19', '2020-06-04 13:11:54'),
	(28, 'test 2', NULL, '2020-06-04 12:12:25', '2020-06-04 12:12:25');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;

-- Dumping data for table auto.categories: ~5 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
	(1, 'Автомобили', 'legkovye', '2020-05-24 20:47:12', '2020-06-01 10:21:00'),
	(2, 'Мото', 'moto', '2020-05-24 20:47:14', '2020-06-01 10:21:09'),
	(3, 'Грузовые', 'gruzovye', '2020-05-19 12:51:53', '2020-06-01 10:21:28'),
	(4, 'Водный', 'vodnyy', '2020-05-19 12:52:17', '2020-06-01 10:21:35'),
	(5, 'Прочее', 'prochee', '2020-05-19 17:26:58', '2020-06-01 10:21:43');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping data for table auto.cities: ~8 rows (approximately)
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Пермь', NULL, NULL),
	(2, 'Омск', NULL, '2020-05-29 07:16:14'),
	(4, 'Питер', '2020-05-21 07:02:49', '2020-05-21 07:02:49'),
	(6, 'Москва', '2020-05-29 07:15:02', '2020-05-29 07:15:02'),
	(7, 'Новосибирск', '2020-05-29 07:15:29', '2020-05-29 07:15:29'),
	(8, 'Екатеринбург', '2020-05-29 07:15:36', '2020-05-29 07:15:36'),
	(9, 'Минск', '2020-05-29 07:15:43', '2020-05-29 07:15:43'),
	(10, 'Бруклин', '2020-05-29 07:15:51', '2020-05-29 07:15:51');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;

-- Dumping data for table auto.clients: ~3 rows (approximately)
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` (`id`, `fio`, `city_id`, `phone`, `email`, `password`, `remember_token`, `blocked`, `created_at`, `updated_at`) VALUES
	(1, 'Тееыват123', 4, '123123', '123123', NULL, NULL, 0, NULL, '2020-05-24 13:35:34'),
	(5, 'asdasd', 1, '13123', 'е5н6г7', NULL, NULL, 0, NULL, '2020-06-03 08:53:09'),
	(7, 'Иванов Иван Иванович', 1, '+7 (992) 204-9933', 'test@test.ru', '$2y$10$I1nQCuShWrmrNNEIpUsvHu/sOlC0SuAf9V.AT2/3k9mGK7n8k/XgK', NULL, 0, '2020-05-31 20:55:24', '2020-06-04 07:33:28');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Dumping data for table auto.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping data for table auto.favorites: ~0 rows (approximately)
/*!40000 ALTER TABLE `favorites` DISABLE KEYS */;
/*!40000 ALTER TABLE `favorites` ENABLE KEYS */;

-- Dumping data for table auto.histories: ~0 rows (approximately)
/*!40000 ALTER TABLE `histories` DISABLE KEYS */;
/*!40000 ALTER TABLE `histories` ENABLE KEYS */;

-- Dumping data for table auto.images: ~17 rows (approximately)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`id`, `name`, `auto_id`, `priority`, `created_at`, `updated_at`) VALUES
	(38, 'iG8LgDBtVZb8yiGldzG6.jpg', 54, NULL, '2020-05-28 19:53:31', '2020-05-28 19:53:31'),
	(39, 'UmODnXigKsmyWGrCL4rd.jpg', 54, NULL, '2020-05-28 19:53:31', '2020-05-28 19:53:31'),
	(40, 'GXShY4Jb3qgzYSF9LXLX.jpg', 54, NULL, '2020-05-28 19:53:32', '2020-05-28 19:53:32'),
	(41, 'y5qEORDJQNQhmrajJLFX.jpg', 55, NULL, '2020-05-28 19:54:34', '2020-05-28 19:54:34'),
	(42, 'zjUk199IuWt1XnYf5f75.jpg', 55, NULL, '2020-05-28 19:54:34', '2020-05-28 19:54:34'),
	(43, 'brvGKYkPWLMOp60FFV6g.jpg', 55, NULL, '2020-05-28 19:54:34', '2020-05-28 19:54:34'),
	(44, 'a8s12VhZxvnX1qGUr3Xc.png', 56, NULL, '2020-05-28 20:02:25', '2020-05-28 20:02:25'),
	(45, '1MIq0a0gaOQ5JaPOFZvO.png', 56, NULL, '2020-05-28 20:02:25', '2020-05-28 20:02:25'),
	(46, 'BRJCZo8YYc92EtqNZwYk.png', 56, NULL, '2020-05-28 20:02:26', '2020-05-28 20:02:26'),
	(47, 'CYVNnlGJuWMgorHMytvp.png', 58, NULL, '2020-05-28 20:18:37', '2020-05-28 20:18:37'),
	(48, 'lN6TdZYphUoxukyE7olV.png', 58, NULL, '2020-05-28 20:18:37', '2020-05-28 20:18:37'),
	(49, 'bY7PWgtUIT1tbYdOpfug.jpg', 60, NULL, '2020-05-28 20:22:19', '2020-05-28 20:22:19'),
	(50, 'bGkuLu1WNIJ50Eh9XARy.jpg', 60, NULL, '2020-05-28 20:22:19', '2020-05-28 20:22:19'),
	(51, 'XjyMdV5khR8hZk06LFlH.jpg', 60, NULL, '2020-05-28 20:22:19', '2020-05-28 20:22:19'),
	(52, 'gS1H6lu3rbWokDHsdvtT.jpg', 61, NULL, '2020-05-28 21:00:32', '2020-05-28 21:00:32'),
	(53, 'a7FNUZzTs4OBcKEf9A5c.jpg', 61, NULL, '2020-05-28 21:00:32', '2020-05-28 21:00:32'),
	(54, 'SrCN4Gjbce6kBI79nXGl.jpg', 61, NULL, '2020-05-28 21:00:33', '2020-05-28 21:00:33');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Dumping data for table auto.migrations: ~18 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(37, '2014_10_12_000000_create_users_table', 1),
	(38, '2014_10_12_100000_create_password_resets_table', 1),
	(39, '2019_08_19_000000_create_failed_jobs_table', 1),
	(40, '2020_05_15_072715_create_autos_table', 1),
	(41, '2020_05_15_073304_create_model_cars_table', 1),
	(42, '2020_05_15_073320_create_brands_table', 1),
	(43, '2020_05_15_073342_create_categories_table', 1),
	(44, '2020_05_15_073355_create_types_table', 1),
	(45, '2020_05_15_073417_create_statuses_table', 1),
	(46, '2020_05_15_073459_create_orders_table', 1),
	(47, '2020_05_15_073522_create_clients_table', 1),
	(48, '2020_05_15_073542_create_favorites_table', 1),
	(49, '2020_05_15_073601_create_histories_table', 1),
	(50, '2020_05_15_081319_create_images_table', 1),
	(51, '2020_05_15_082739_create_cities_table', 1),
	(52, '2020_05_15_092155_create_posts_table', 1),
	(53, '2020_05_15_111942_create_roles_table', 1),
	(54, '2020_05_15_120225_add_foreign_key', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping data for table auto.model_cars: ~13 rows (approximately)
/*!40000 ALTER TABLE `model_cars` DISABLE KEYS */;
INSERT INTO `model_cars` (`id`, `name`, `brand_id`, `created_at`, `updated_at`) VALUES
	(1, 'A4', 1, NULL, NULL),
	(2, 'A1', 1, NULL, NULL),
	(3, 'A2', 1, NULL, NULL),
	(4, 'A5', 1, NULL, NULL),
	(5, 'A6', 1, NULL, NULL),
	(6, 'X1', 2, NULL, NULL),
	(7, 'X2', 2, NULL, NULL),
	(8, 'X3', 2, NULL, NULL),
	(9, 'X4', 2, NULL, NULL),
	(10, 'X5', 2, NULL, NULL),
	(11, 'Aveo', 3, '2020-05-28 19:22:50', '2020-05-28 19:22:50'),
	(12, 'Lacetti', 3, '2020-05-28 19:22:57', '2020-05-28 19:22:57'),
	(13, 'Lacetti', 3, '2020-05-28 19:23:02', '2020-05-28 19:23:02');
/*!40000 ALTER TABLE `model_cars` ENABLE KEYS */;

-- Dumping data for table auto.orders: ~3 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `client_id`, `auto_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
	(1, 7, 60, 7, NULL, '2020-05-31 21:32:00', '2020-06-03 08:20:53'),
	(2, 7, 60, 7, NULL, '2020-05-31 21:32:22', '2020-06-03 08:15:22'),
	(3, 7, 61, NULL, NULL, '2020-06-04 08:52:01', '2020-06-04 08:52:01');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping data for table auto.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping data for table auto.posts: ~3 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `image`, `content`, `draft`, `created_at`, `updated_at`) VALUES
	(1, 7, 'Как купить автомобиль с торгов', 'kak-kupit-avtomobil-s-torgov', 'lpZmq1tf7go3jMxDsbxi.jpg', '<h3>Контроллеры и пространства имён</h3><p>Важно помнить, что при определении роута контроллера нам не надо указывать полное пространство имён контроллера. Так как RouteServiceProvider загружает файлы вашего роута в группу роута, которая содержит пространство имён, мы указали только ту часть имени класса, которая следует за частью App\\Http\\Controllers пространства имён.</p><p>Если вы решите разместить свои контроллеры в поддиректориях App\\Http\\Controllers, то просто используйте конкретное имя класса относительно корня пространства имён App\\Http\\Controllers. Тогда, если полный путь к вашему классу будет App\\Http\\Controllers\\Photos\\AdminController, то вам надо зарегистрировать роуты к контроллеру следующим образом:</p>', 0, NULL, '2020-05-29 13:11:05'),
	(14, 7, 'Как купить автомобиль у банка', 'kak-kupit-avtomobil-u-banka', 'MjYt9uIJFEg7EgpAjnCz.jpg', '<h2>Контроллеры ресурсов</h2><p>Маршрутизация ресурсов Laravel назначает обычные CRUD-роуты на контроллеры одной строчкой кода. Например, вы можете создать контроллер, обрабатывающий все HTTP-запросы к фотографиям, хранимым вашим приложением. Вы можете быстро создать такой контроллер с помощью artisan-команды make:controller:</p><p>php artisan make:controller PhotoController --resource</p><p>Эта команда сгенерирует контроллер app/Http/Controllers/PhotoController.php. Данный контроллер будет содержать метод для каждой доступной операции с ресурсами.</p><p>Теперь мы можем зарегистрировать роут контроллера ресурса:</p>', 0, '2020-05-28 08:42:45', '2020-05-29 13:11:14'),
	(17, 7, 'Как продать свой залоговый  автомобиль через банк', 'kak-prodat-svoy-zalogovyy-avtomobil-cherez-bank', 'E1GbNzteaPMElu63p7xh.jpg', '<h4><strong>Указание модели ресурса</strong></h4><p>Если вы используете связывание моделей роутов и хотели бы, чтобы методы контроллера ресурсов указывали в качестве аргумента экземпляр модели, можно использовать опцию --model при генерировании контроллера:</p><p>php artisan make:controller PhotoController --resource --model=Photo</p><h4><strong>Подмена методов формы</strong></h4><p>Поскольку HTML-формы не могут выполнять запросы PUT, PATCH или DELETE, вам надо добавить скрытое поле _method для подмены этих HTTP-запросов. Blade-директива @method создаст это поле для вас:</p>', 0, '2020-05-28 11:29:33', '2020-05-29 13:11:19');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Dumping data for table auto.roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Админ', NULL, NULL),
	(2, 'Модератор', NULL, NULL),
	(3, 'редактор', NULL, NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping data for table auto.statuses: ~2 rows (approximately)
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Продано', NULL, NULL),
	(2, 'Почти продано', NULL, NULL);
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;

-- Dumping data for table auto.types: ~12 rows (approximately)
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` (`id`, `name`, `category_id`, `created_at`, `updated_at`) VALUES
	(1, 'Легковые', 1, NULL, '2020-06-01 10:20:22'),
	(7, 'Багги', 2, NULL, '2020-05-20 15:12:59'),
	(13, 'Вездеходы', 2, '2020-05-20 19:35:15', '2020-05-20 19:48:44'),
	(17, 'Картинг', 2, '2020-05-20 21:23:12', '2020-05-20 21:23:12'),
	(18, 'Мотоциклы', 2, '2020-05-20 21:25:00', '2020-05-20 21:25:00'),
	(19, 'Автобусы', 3, NULL, NULL),
	(20, 'Грузовики', 3, NULL, NULL),
	(21, 'Прицепы', 3, NULL, NULL),
	(22, 'Погрузчики', 3, NULL, NULL),
	(23, 'Катера', 4, NULL, NULL),
	(24, 'Лодки', 4, NULL, NULL),
	(25, 'Запчасти', 5, NULL, NULL);
/*!40000 ALTER TABLE `types` ENABLE KEYS */;

-- Dumping data for table auto.users: ~6 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `login`, `role_id`, `blocked`, `remember_token`, `created_at`, `updated_at`) VALUES
	(3, 'Тееыват123', 'Тест 4567', 2, 0, NULL, '2020-05-22 15:35:07', '2020-05-22 15:35:07'),
	(4, 'asdasd', 'Тест 3', 3, 0, NULL, '2020-05-22 15:42:56', '2020-05-22 15:42:56'),
	(5, 'asdasd', 'Тест 34', 3, 0, NULL, '2020-05-22 15:43:30', '2020-05-22 15:43:30'),
	(6, 'asdasd', 'Тест 34456', 3, 1, NULL, '2020-05-22 16:08:43', '2020-05-22 16:30:12'),
	(7, 'Еремеев Александр Вадимович', 'erem', 2, 0, 'sefz83H16HBDmhnZyZElGCvuQTSEWiIA5o01v4oBB8elWVUJSfwWNb0lUwzk', NULL, '2020-05-22 13:35:30'),
	(8, 'выавы123123', 'пвапыв123132', 1, 0, NULL, '2020-05-22 16:13:23', '2020-05-22 16:30:06');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

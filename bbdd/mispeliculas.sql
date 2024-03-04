-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-03-2024 a las 09:44:02
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mispeliculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(18, '2014_10_12_000000_create_users_table', 1),
(19, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(20, '2019_08_19_000000_create_failed_jobs_table', 1),
(21, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(22, '2024_03_01_131219_create_movies_table', 1),
(23, '2024_03_01_131225_create_reviews_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `release_year` year(4) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`id`, `title`, `genre`, `release_year`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Pinocho', 'Animación', '1940', 'xAN8ww5YetWnri5CPti3K6nojHekXXVF8rWj6cCL.jpg', '2024-03-02 08:46:26', '2024-03-02 16:42:11'),
(3, 'John Wick: Chapter 4', 'Acción', '2023', 'Pqbo501ypw1xlpCE8C2NxbSwcQqn78rtFLyywQ5B.jpg', '2024-03-02 12:49:53', '2024-03-02 12:49:53'),
(5, 'Taxi Driver', 'Noir', '1976', 'SacVyx5Rb5np9LF8xmocXpuRay7RJAnjJFvCErZ9.jpg', '2024-03-02 12:54:10', '2024-03-02 12:54:10'),
(6, 'Kill Bill 2', 'Drama/Acción', '2004', 'yw6te4sAiDo9KTimdELJDcvSJHQQM53SiVZiYnwh.jpg', '2024-03-02 13:11:12', '2024-03-02 13:11:12'),
(7, 'Soy Leyenda', 'Suspense/Apocalipsis', '2007', 'masWoRKC1GJnekeIYbEBwyycFQfUv65eAvMztdz9.jpg', '2024-03-02 13:12:15', '2024-03-02 13:12:15'),
(8, 'Matrix', 'Ficción', '1999', '7MjHUQYkhSWJm9kIXyrvDRh3u839TX3kYWZxPeYh.jpg', '2024-03-02 13:12:43', '2024-03-02 13:12:43'),
(9, 'Reservoir Dogs', 'Suspense/Drama', '1992', 'vgR6A5oLLhnR6BWdEvDaSPszyXevLPRfLZlYMZci.jpg', '2024-03-02 16:52:04', '2024-03-02 16:52:04'),
(10, 'Akira', 'Anime', '1988', 'MK8l63ewbGI9Wn0L2JFCgOHMu66FGrakJL2kXrSy.jpg', '2024-03-02 16:55:48', '2024-03-02 16:56:07'),
(11, 'El Padrino', 'Crimen', '1972', '5tCw408w2TYJ2BHBUJnthOuiCwJYw4jTJorFoHV2.jpg', '2024-03-02 16:56:39', '2024-03-02 16:56:39'),
(12, 'El viaje de Chihiro', 'Anime', '2001', 'mdgJmmmGztM8spn3oNTvyWBYHw9PrEmq3B9I3XmD.jpg', '2024-03-02 16:57:09', '2024-03-02 16:57:09'),
(13, 'El Verdugo', 'Tragicomedia', '1963', 'vQJ8aqEWyPPrY5bOHmeCBLiRMoytUkRBycMHMQlk.jpg', '2024-03-02 16:58:10', '2024-03-02 16:58:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reviews`
--

INSERT INTO `reviews` (`id`, `movie_id`, `title`, `description`, `rating`, `created_at`, `updated_at`) VALUES
(3, 1, 'Mentira', 'Rodri, ma che cosa? ¿Por qué hemos vuelto a Italia?\r\nRaviolli, farfalla, il Papa, spaghetti, pepperoni, triviani\r\nMamma mia! ¡El perro se comió la mia pizza!\r\nPorca miseria', 4, '2024-03-02 10:04:16', '2024-03-02 16:41:50'),
(4, 3, 'Kung Fun Par Denn', 'Jhon Wick er med et ord ekstraordinær i handling og følelser med sin ekstreme akrobatikk, og den utrolige intuisjonen til å forsvare seg med presisjon. Handlingen er fengslende fra begynnelse til slutt. Og scenene vokser for hvert sekund de kobles sammen i uovertruffen spenning. Det er avgjørende å vite at æreskoder oppfylles som er verdifulle å bestemme i den handlingsverdenen, hvor det å overleve er målet for å bli frigjort. Denne filmen er en suksess som en saga fra det 21. århundre', 4, '2024-03-02 16:28:44', '2024-03-02 16:42:55'),
(5, 5, 'Ladies and gentleman...', 'Esto es una reseña con poco texto 😎🤙', 5, '2024-03-02 16:43:45', '2024-03-02 16:47:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_movie_id_foreign` (`movie_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

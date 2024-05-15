-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 15, 2024 alle 16:35
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ifoa_pratica_s5_l5`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `cover_image_url` varchar(255) DEFAULT NULL,
  `director` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `movies`
--

INSERT INTO `movies` (`id`, `title`, `cover_image_url`, `director`) VALUES
(1, 'Inception', 'https://i.etsystatic.com/35681979/r/il/a80bfd/3957854063/il_fullxfull.3957854063_5dfy.jpg', 'Christopher Nolan'),
(2, 'The Dark Knight', 'https://e0.pxfuel.com/wallpapers/127/348/desktop-wallpaper-batman-logo-cool-batman-logo.jpg', 'Christopher Nolan'),
(3, 'Interstellar', 'https://w0.peakpx.com/wallpaper/438/840/HD-wallpaper-interstellar-2014-movie-poster.jpg', 'Christopher Nolan'),
(4, 'Pulp Fiction', 'https://static.posters.cz/image/1300/poster/pulp-fiction-cover-i1288.jpg', 'Quentin Tarantino'),
(5, 'The Matrix', 'https://c8.alamy.com/comp/2K4TMJ5/the-matrix-1999-the-matrix-movie-poster-keanu-reeves-2K4TMJ5.jpg', 'Lana Wachowski, Lilly Wachowski'),
(7, 'The Godfather', 'https://www.crimemuseum.org/wp-content/uploads/2014/06/The-Godfather-1.jpg', 'Francis Ford Coppola'),
(8, 'Fight Club', 'https://wallpapers.com/images/hd/fight-club-wall-graffiti-iphone-du2xx4ml3m83fvim.jpg', 'David Fincher'),
(9, 'Goodfellas', 'https://m.media-amazon.com/images/I/51gzQ7FJwDL._AC_UF1000,1000_QL80_.jpg', 'Martin Scorsese');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'dom', 'prova'),
(2, 'prova1', '$2y$10$.6bFJ4ha9RKFmNyWK07ixuG/nMKmTI3XU0LAL.4y2xA'),
(3, 'prova1', '$2y$10$8jx5nJztcjBt5AseNstiq.TnQecqkVWWxiP7555465k'),
(4, 'prova2', '$2y$10$DLnTs4MVS/dfjB4EBhnvSuN1P2MfGZsZVjy0bR76K2P'),
(5, 'prova3', '$2y$10$Ujrnqhh8r8RqlyqDIChueevsnCHNorJsqVBk6OB1Nwq'),
(6, 'prova5', '$2y$10$OzXkUzvt8hGJTLaCvN2/SO1.a30A82bjIZi1DGZmT0T'),
(7, 'prova7', '$2y$10$A9iMsGd1.659XhPbSo32juYCx4w7u/dic8JBTm9/nlw'),
(8, 'prova8', '$2y$10$VK7QzrWMS6rGExrJDLId/e8uIsQi2sSGCwfG80g68jy'),
(9, 'prova9', '$2y$10$G51Zi1oV8tuyL6/z.Qzt8u0gGzydIuJ9zwCLFvDy7zEDrRherJq1G'),
(11, 'prova10', '$2y$10$tTuSRAGK0uG391KGAVPGgesYKpH/hvHqBkPD5bL83BHcYnZ3kWVB.'),
(12, 'prova11', '$2y$10$LGcwn/KI2BxKA.jj7kfpyOtbitgsJjblqvWke48667jsdfmhAI1xi'),
(13, 'prova12', '$2y$10$9K0bs5zFlmKvj.rbXGHAGeH27SvVGgsfJQ.9JM54Y/Y6WVPWvlq5G');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

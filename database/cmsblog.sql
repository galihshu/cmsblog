-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jul 2019 pada 09.31
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmsblog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `seotitle` varchar(255) NOT NULL,
  `active` enum('Yes','No') NOT NULL DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `title`, `seotitle`, `active`) VALUES
(1, 'Bisnis', 'bisnis', 'Yes'),
(2, 'Web Design', 'web-design', 'Yes'),
(3, 'Web Programming', 'web-programming', 'Yes'),
(4, 'Digital Marketing', 'digital-marketing', 'Yes'),
(5, 'Graphic Design', 'graphic-design', 'Yes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` int(5) NOT NULL,
  `category_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `seotitle` varchar(255) NOT NULL,
  `intro` text NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `caption` varchar(150) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '1',
  `active` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `username`, `title`, `seotitle`, `intro`, `content`, `image`, `caption`, `tag`, `hits`, `active`, `date_created`) VALUES
(1, 4, 'admin', 'Vestibulum pellentesque sit amet turpis in mollis', 'vestibulum-pellentesque-sit-amet-turpis-in-mollis', '  ', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eget mi vel nisl consectetur dictum quis at enim. Vestibulum dignissim tincidunt felis ac ultricies. Nunc ac dolor dignissim, blandit dui et, volutpat nulla. Donec blandit turpis ac nisl convallis euismod. Sed vel ligula tincidunt ipsum consectetur auctor vitae in lacus. Donec accumsan velit odio, vel elementum augue fermentum vel. Morbi placerat libero sit amet mattis lacinia. Integer eu mi non urna varius laoreet vitae sit amet lacus. Nulla facilisi.</p>\r\n<p>Duis porttitor, metus a pellentesque tincidunt, libero libero laoreet diam, ac imperdiet tortor metus et velit. Curabitur in lobortis lectus, ut accumsan sapien. Donec auctor, lectus a tincidunt sagittis, nisi urna elementum tellus, non tincidunt nibh est nec sem. Phasellus ac urna ex. Fusce commodo neque turpis, non eleifend velit elementum nec. Praesent ipsum nisi, tempor dignissim ornare in, tincidunt in ante. Vestibulum pulvinar mauris nec laoreet imperdiet.</p>\r\n<p>Vestibulum pellentesque sit amet turpis in mollis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque condimentum quam quis nisi tempor dictum vitae at lacus. Nunc pellentesque elit sed mattis laoreet. Suspendisse eleifend, dui eu porttitor ultricies, justo risus condimentum metus, non elementum arcu neque pellentesque lacus. Fusce eu mi nibh. Curabitur vitae molestie metus.</p>\r\n<p>Suspendisse tristique volutpat sapien, eu pellentesque dui efficitur at. Maecenas orci ex, feugiat ac malesuada nec, cursus eget elit. Aenean semper justo sit amet lectus fringilla dignissim. Duis convallis velit eu maximus aliquet. Interdum et malesuada fames ac ante ipsum primis in faucibus. In auctor nunc mi, vitae placerat ex tincidunt non. Donec nec vestibulum ex. Aliquam a lectus quis sem pulvinar efficitur facilisis a neque. Morbi euismod vitae neque ac ornare. Aliquam quis velit sit amet massa commodo mollis sit amet eu nunc. Morbi odio mauris, bibendum quis ornare ac, bibendum in sapien. Donec pretium vel erat quis scelerisque.</p>\r\n<p>Curabitur pulvinar eros cursus tortor commodo, non condimentum ex eleifend. In hac habitasse platea dictumst. Sed pharetra nulla ac nunc tincidunt tincidunt. Suspendisse et orci nisl. In feugiat, nisi quis sodales efficitur, ante diam faucibus neque, vitae venenatis dolor orci nec ipsum. Fusce et ornare dui. Nunc vitae vulputate leo, ut posuere tortor. Mauris quis tellus quis ex suscipit ullamcorper eget at mauris. Sed et consectetur mauris. Pellentesque consequat porttitor vulputate. Aenean imperdiet bibendum erat eu dapibus. Curabitur id dui venenatis, vulputate lectus fringilla, tempus leo. Nam hendrerit, nibh eget mollis lobortis, dolor neque porttitor nibh, mattis bibendum est felis eu dui. Integer porttitor lectus sed risus tincidunt imperdiet. Proin nulla ante, tincidunt eu erat ut, aliquam rhoncus urna. Nunc ornare est nec elit feugiat, at malesuada sapien vestibulum.</p>', '652.jpg', ' Aenean imperdiet bibendum erat eu dapibus', 'bisnis-online', 1, 'Yes', '2019-07-07 21:58:50'),
(2, 4, 'admin', 'Duis aute irure dolor in reprehenderit in voluptate', 'duis-aute-irure-dolor-in-reprehenderit-in-voluptate', '  Vestibulum pellentesque sit amet turpis in mollis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque condimentum quam quis nisi tempor dictum vitae at lacus. Nunc pellentesque elit sed mattis laoreet. Suspendisse eleifend, dui eu porttitor ultricies, justo risus condimentum metus, non elementum arcu neque pellentesque lacus. Fusce eu mi nibh. Curabitur vitae molestie metus.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eget mi vel nisl consectetur dictum quis at enim. Vestibulum dignissim tincidunt felis ac ultricies. Nunc ac dolor dignissim, blandit dui et, volutpat nulla. Donec blandit turpis ac nisl convallis euismod. Sed vel ligula tincidunt ipsum consectetur auctor vitae in lacus. Donec accumsan velit odio, vel elementum augue fermentum vel. Morbi placerat libero sit amet mattis lacinia. Integer eu mi non urna varius laoreet vitae sit amet lacus. Nulla facilisi.</p>\r\n<p>Duis porttitor, metus a pellentesque tincidunt, libero libero laoreet diam, ac imperdiet tortor metus et velit. Curabitur in lobortis lectus, ut accumsan sapien. Donec auctor, lectus a tincidunt sagittis, nisi urna elementum tellus, non tincidunt nibh est nec sem. Phasellus ac urna ex. Fusce commodo neque turpis, non eleifend velit elementum nec. Praesent ipsum nisi, tempor dignissim ornare in, tincidunt in ante. Vestibulum pulvinar mauris nec laoreet imperdiet.</p>\r\n<p>Vestibulum pellentesque sit amet turpis in mollis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque condimentum quam quis nisi tempor dictum vitae at lacus. Nunc pellentesque elit sed mattis laoreet. Suspendisse eleifend, dui eu porttitor ultricies, justo risus condimentum metus, non elementum arcu neque pellentesque lacus. Fusce eu mi nibh. Curabitur vitae molestie metus.</p>\r\n<p>Suspendisse tristique volutpat sapien, eu pellentesque dui efficitur at. Maecenas orci ex, feugiat ac malesuada nec, cursus eget elit. Aenean semper justo sit amet lectus fringilla dignissim. Duis convallis velit eu maximus aliquet. Interdum et malesuada fames ac ante ipsum primis in faucibus. In auctor nunc mi, vitae placerat ex tincidunt non. Donec nec vestibulum ex. Aliquam a lectus quis sem pulvinar efficitur facilisis a neque. Morbi euismod vitae neque ac ornare. Aliquam quis velit sit amet massa commodo mollis sit amet eu nunc. Morbi odio mauris, bibendum quis ornare ac, bibendum in sapien. Donec pretium vel erat quis scelerisque.</p>\r\n<p>Curabitur pulvinar eros cursus tortor commodo, non condimentum ex eleifend. In hac habitasse platea dictumst. Sed pharetra nulla ac nunc tincidunt tincidunt. Suspendisse et orci nisl. In feugiat, nisi quis sodales efficitur, ante diam faucibus neque, vitae venenatis dolor orci nec ipsum. Fusce et ornare dui. Nunc vitae vulputate leo, ut posuere tortor. Mauris quis tellus quis ex suscipit ullamcorper eget at mauris. Sed et consectetur mauris. Pellentesque consequat porttitor vulputate. Aenean imperdiet bibendum erat eu dapibus. Curabitur id dui venenatis, vulputate lectus fringilla, tempus leo. Nam hendrerit, nibh eget mollis lobortis, dolor neque porttitor nibh, mattis bibendum est felis eu dui. Integer porttitor lectus sed risus tincidunt imperdiet. Proin nulla ante, tincidunt eu erat ut, aliquam rhoncus urna. Nunc ornare est nec elit feugiat, at malesuada sapien vestibulum.</p>', '51neom-organics-nicola-elliott-on-finding-the-right-business-partner-696x364.jpg', 'Integer porttitor lectus sed risus tincidunt imperdiet.', 'bisnis-online', 1, 'Yes', '2019-07-07 22:03:36'),
(3, 3, 'admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit', '  ', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eget mi vel nisl consectetur dictum quis at enim. Vestibulum dignissim tincidunt felis ac ultricies. Nunc ac dolor dignissim, blandit dui et, volutpat nulla. Donec blandit turpis ac nisl convallis euismod. Sed vel ligula tincidunt ipsum consectetur auctor vitae in lacus. Donec accumsan velit odio, vel elementum augue fermentum vel. Morbi placerat libero sit amet mattis lacinia. Integer eu mi non urna varius laoreet vitae sit amet lacus. Nulla facilisi.</p>\r\n<p>Duis porttitor, metus a pellentesque tincidunt, libero libero laoreet diam, ac imperdiet tortor metus et velit. Curabitur in lobortis lectus, ut accumsan sapien. Donec auctor, lectus a tincidunt sagittis, nisi urna elementum tellus, non tincidunt nibh est nec sem. Phasellus ac urna ex. Fusce commodo neque turpis, non eleifend velit elementum nec. Praesent ipsum nisi, tempor dignissim ornare in, tincidunt in ante. Vestibulum pulvinar mauris nec laoreet imperdiet.</p>\r\n<p>Vestibulum pellentesque sit amet turpis in mollis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque condimentum quam quis nisi tempor dictum vitae at lacus. Nunc pellentesque elit sed mattis laoreet. Suspendisse eleifend, dui eu porttitor ultricies, justo risus condimentum metus, non elementum arcu neque pellentesque lacus. Fusce eu mi nibh. Curabitur vitae molestie metus.</p>\r\n<p>Suspendisse tristique volutpat sapien, eu pellentesque dui efficitur at. Maecenas orci ex, feugiat ac malesuada nec, cursus eget elit. Aenean semper justo sit amet lectus fringilla dignissim. Duis convallis velit eu maximus aliquet. Interdum et malesuada fames ac ante ipsum primis in faucibus. In auctor nunc mi, vitae placerat ex tincidunt non. Donec nec vestibulum ex. Aliquam a lectus quis sem pulvinar efficitur facilisis a neque. Morbi euismod vitae neque ac ornare. Aliquam quis velit sit amet massa commodo mollis sit amet eu nunc. Morbi odio mauris, bibendum quis ornare ac, bibendum in sapien. Donec pretium vel erat quis scelerisque.</p>\r\n<p>Curabitur pulvinar eros cursus tortor commodo, non condimentum ex eleifend. In hac habitasse platea dictumst. Sed pharetra nulla ac nunc tincidunt tincidunt. Suspendisse et orci nisl. In feugiat, nisi quis sodales efficitur, ante diam faucibus neque, vitae venenatis dolor orci nec ipsum. Fusce et ornare dui. Nunc vitae vulputate leo, ut posuere tortor. Mauris quis tellus quis ex suscipit ullamcorper eget at mauris. Sed et consectetur mauris. Pellentesque consequat porttitor vulputate. Aenean imperdiet bibendum erat eu dapibus. Curabitur id dui venenatis, vulputate lectus fringilla, tempus leo. Nam hendrerit, nibh eget mollis lobortis, dolor neque porttitor nibh, mattis bibendum est felis eu dui. Integer porttitor lectus sed risus tincidunt imperdiet. Proin nulla ante, tincidunt eu erat ut, aliquam rhoncus urna. Nunc ornare est nec elit feugiat, at malesuada sapien vestibulum.</p>', '64full-stack-dev.jpg', '', '', 1, 'Yes', '2019-07-07 22:00:07'),
(4, 2, 'admin', 'Pellentesque consequat porttitor vulputate', 'pellentesque-consequat-porttitor-vulputate', '   ', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eget mi vel nisl consectetur dictum quis at enim. Vestibulum dignissim tincidunt felis ac ultricies. Nunc ac dolor dignissim, blandit dui et, volutpat nulla. Donec blandit turpis ac nisl convallis euismod. Sed vel ligula tincidunt ipsum consectetur auctor vitae in lacus. Donec accumsan velit odio, vel elementum augue fermentum vel. Morbi placerat libero sit amet mattis lacinia. Integer eu mi non urna varius laoreet vitae sit amet lacus. Nulla facilisi.</p>\r\n<p>Duis porttitor, metus a pellentesque tincidunt, libero libero laoreet diam, ac imperdiet tortor metus et velit. Curabitur in lobortis lectus, ut accumsan sapien. Donec auctor, lectus a tincidunt sagittis, nisi urna elementum tellus, non tincidunt nibh est nec sem. Phasellus ac urna ex. Fusce commodo neque turpis, non eleifend velit elementum nec. Praesent ipsum nisi, tempor dignissim ornare in, tincidunt in ante. Vestibulum pulvinar mauris nec laoreet imperdiet.</p>\r\n<p>Vestibulum pellentesque sit amet turpis in mollis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque condimentum quam quis nisi tempor dictum vitae at lacus. Nunc pellentesque elit sed mattis laoreet. Suspendisse eleifend, dui eu porttitor ultricies, justo risus condimentum metus, non elementum arcu neque pellentesque lacus. Fusce eu mi nibh. Curabitur vitae molestie metus.</p>\r\n<p>Suspendisse tristique volutpat sapien, eu pellentesque dui efficitur at. Maecenas orci ex, feugiat ac malesuada nec, cursus eget elit. Aenean semper justo sit amet lectus fringilla dignissim. Duis convallis velit eu maximus aliquet. Interdum et malesuada fames ac ante ipsum primis in faucibus. In auctor nunc mi, vitae placerat ex tincidunt non. Donec nec vestibulum ex. Aliquam a lectus quis sem pulvinar efficitur facilisis a neque. Morbi euismod vitae neque ac ornare. Aliquam quis velit sit amet massa commodo mollis sit amet eu nunc. Morbi odio mauris, bibendum quis ornare ac, bibendum in sapien. Donec pretium vel erat quis scelerisque.</p>\r\n<p>Curabitur pulvinar eros cursus tortor commodo, non condimentum ex eleifend. In hac habitasse platea dictumst. Sed pharetra nulla ac nunc tincidunt tincidunt. Suspendisse et orci nisl. In feugiat, nisi quis sodales efficitur, ante diam faucibus neque, vitae venenatis dolor orci nec ipsum. Fusce et ornare dui. Nunc vitae vulputate leo, ut posuere tortor. Mauris quis tellus quis ex suscipit ullamcorper eget at mauris. Sed et consectetur mauris. Pellentesque consequat porttitor vulputate. Aenean imperdiet bibendum erat eu dapibus. Curabitur id dui venenatis, vulputate lectus fringilla, tempus leo. Nam hendrerit, nibh eget mollis lobortis, dolor neque porttitor nibh, mattis bibendum est felis eu dui. Integer porttitor lectus sed risus tincidunt imperdiet. Proin nulla ante, tincidunt eu erat ut, aliquam rhoncus urna. Nunc ornare est nec elit feugiat, at malesuada sapien vestibulum.</p>', '194 (1).jpg', 'Vestibulum pellentesque sit amet turpis in mollis', 'bisnis-online', 1, 'Yes', '2019-07-07 22:01:15'),
(5, 4, 'admin', 'Duis porttitor, metus a pellentesque tincidunt', 'duis-porttitor-metus-a-pellentesque-tincidunt', 'Duis porttitor, metus a pellentesque tincidunt, libero libero laoreet diam, ac imperdiet tortor metus et velit. Curabitur in lobortis lectus, ut accumsan sapien. Donec auctor, lectus a tincidunt sagittis, nisi urna elementum tellus, non tincidunt nibh est nec sem. Phasellus ac urna ex. Fusce commodo neque turpis, non eleifend velit elementum nec. Praesent ipsum nisi, tempor dignissim ornare in, tincidunt in ante. Vestibulum pulvinar mauris nec laoreet imperdiet.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eget mi vel nisl consectetur dictum quis at enim. Vestibulum dignissim tincidunt felis ac ultricies. Nunc ac dolor dignissim, blandit dui et, volutpat nulla. Donec blandit turpis ac nisl convallis euismod. Sed vel ligula tincidunt ipsum consectetur auctor vitae in lacus. Donec accumsan velit odio, vel elementum augue fermentum vel. Morbi placerat libero sit amet mattis lacinia. Integer eu mi non urna varius laoreet vitae sit amet lacus. Nulla facilisi.</p>\r\n<p>Duis porttitor, metus a pellentesque tincidunt, libero libero laoreet diam, ac imperdiet tortor metus et velit. Curabitur in lobortis lectus, ut accumsan sapien. Donec auctor, lectus a tincidunt sagittis, nisi urna elementum tellus, non tincidunt nibh est nec sem. Phasellus ac urna ex. Fusce commodo neque turpis, non eleifend velit elementum nec. Praesent ipsum nisi, tempor dignissim ornare in, tincidunt in ante. Vestibulum pulvinar mauris nec laoreet imperdiet.</p>\r\n<p><img src=\"../vendor/editor/gambar/image/smart-asian.jpg\" alt=\"\" /></p>\r\n<p>Vestibulum pellentesque sit amet turpis in mollis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque condimentum quam quis nisi tempor dictum vitae at lacus. Nunc pellentesque elit sed mattis laoreet. Suspendisse eleifend, dui eu porttitor ultricies, justo risus condimentum metus, non elementum arcu neque pellentesque lacus. Fusce eu mi nibh. Curabitur vitae molestie metus.</p>\r\n<p>Suspendisse tristique volutpat sapien, eu pellentesque dui efficitur at. Maecenas orci ex, feugiat ac malesuada nec, cursus eget elit. Aenean semper justo sit amet lectus fringilla dignissim. Duis convallis velit eu maximus aliquet. Interdum et malesuada fames ac ante ipsum primis in faucibus. In auctor nunc mi, vitae placerat ex tincidunt non. Donec nec vestibulum ex. Aliquam a lectus quis sem pulvinar efficitur facilisis a neque. Morbi euismod vitae neque ac ornare. Aliquam quis velit sit amet massa commodo mollis sit amet eu nunc. Morbi odio mauris, bibendum quis ornare ac, bibendum in sapien. Donec pretium vel erat quis scelerisque.</p>\r\n<p>Curabitur pulvinar eros cursus tortor commodo, non condimentum ex eleifend. In hac habitasse platea dictumst. Sed pharetra nulla ac nunc tincidunt tincidunt. Suspendisse et orci nisl. In feugiat, nisi quis sodales efficitur, ante diam faucibus neque, vitae venenatis dolor orci nec ipsum. Fusce et ornare dui. Nunc vitae vulputate leo, ut posuere tortor. Mauris quis tellus quis ex suscipit ullamcorper eget at mauris. Sed et consectetur mauris. Pellentesque consequat porttitor vulputate. Aenean imperdiet bibendum erat eu dapibus. Curabitur id dui venenatis, vulputate lectus fringilla, tempus leo. Nam hendrerit, nibh eget mollis lobortis, dolor neque porttitor nibh, mattis bibendum est felis eu dui. Integer porttitor lectus sed risus tincidunt imperdiet. Proin nulla ante, tincidunt eu erat ut, aliquam rhoncus urna. Nunc ornare est nec elit feugiat, at malesuada sapien vestibulum.</p>', '98slider1.jpg', 'Nunc ornare est nec elit feugiat, at malesuada sapien vestibulum', 'bisnis-online,css', 1, 'Yes', '2019-07-07 21:56:48'),
(6, 2, 'user', 'Curabitur pulvinar eros cursus tortor commodo', 'curabitur-pulvinar-eros-cursus-tortor-commodo', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eget mi vel nisl consectetur dictum quis at enim. Vestibulum dignissim tincidunt felis ac ultricies. Nunc ac dolor dignissim, blandit dui et, volutpat nulla. Donec blandit turpis ac nisl convallis euismod. Sed vel ligula tincidunt ipsum consectetur auctor vitae in lacus. Donec accumsan velit odio, vel elementum augue fermentum vel. Morbi placerat libero sit amet mattis lacinia. Integer eu mi non urna varius laoreet vitae sit amet lacus. Nulla facilisi.</p>\r\n<p>Duis porttitor, metus a pellentesque tincidunt, libero libero laoreet diam, ac imperdiet tortor metus et velit. Curabitur in lobortis lectus, ut accumsan sapien. Donec auctor, lectus a tincidunt sagittis, nisi urna elementum tellus, non tincidunt nibh est nec sem. Phasellus ac urna ex. Fusce commodo neque turpis, non eleifend velit elementum nec. Praesent ipsum nisi, tempor dignissim ornare in, tincidunt in ante. Vestibulum pulvinar mauris nec laoreet imperdiet.</p>\r\n<p>Vestibulum pellentesque sit amet turpis in mollis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque condimentum quam quis nisi tempor dictum vitae at lacus. Nunc pellentesque elit sed mattis laoreet. Suspendisse eleifend, dui eu porttitor ultricies, justo risus condimentum metus, non elementum arcu neque pellentesque lacus. Fusce eu mi nibh. Curabitur vitae molestie metus.</p>\r\n<p>Suspendisse tristique volutpat sapien, eu pellentesque dui efficitur at. Maecenas orci ex, feugiat ac malesuada nec, cursus eget elit. Aenean semper justo sit amet lectus fringilla dignissim. Duis convallis velit eu maximus aliquet. Interdum et malesuada fames ac ante ipsum primis in faucibus. In auctor nunc mi, vitae placerat ex tincidunt non. Donec nec vestibulum ex. Aliquam a lectus quis sem pulvinar efficitur facilisis a neque. Morbi euismod vitae neque ac ornare. Aliquam quis velit sit amet massa commodo mollis sit amet eu nunc. Morbi odio mauris, bibendum quis ornare ac, bibendum in sapien. Donec pretium vel erat quis scelerisque.</p>\r\n<p>Curabitur pulvinar eros cursus tortor commodo, non condimentum ex eleifend. In hac habitasse platea dictumst. Sed pharetra nulla ac nunc tincidunt tincidunt. Suspendisse et orci nisl. In feugiat, nisi quis sodales efficitur, ante diam faucibus neque, vitae venenatis dolor orci nec ipsum. Fusce et ornare dui. Nunc vitae vulputate leo, ut posuere tortor. Mauris quis tellus quis ex suscipit ullamcorper eget at mauris. Sed et consectetur mauris. Pellentesque consequat porttitor vulputate. Aenean imperdiet bibendum erat eu dapibus. Curabitur id dui venenatis, vulputate lectus fringilla, tempus leo. Nam hendrerit, nibh eget mollis lobortis, dolor neque porttitor nibh, mattis bibendum est felis eu dui. Integer porttitor lectus sed risus tincidunt imperdiet. Proin nulla ante, tincidunt eu erat ut, aliquam rhoncus urna. Nunc ornare est nec elit feugiat, at malesuada sapien vestibulum.</p>', '372.jpg', 'Nunc ornare est nec elit feugiat, at malesuada sapien vestibulum', 'bisnis-online,css', 1, 'Yes', '2019-07-07 22:15:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tags`
--

CREATE TABLE `tags` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `seotitle` varchar(255) NOT NULL,
  `active` enum('Yes','No') DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tags`
--

INSERT INTO `tags` (`id`, `title`, `seotitle`, `active`) VALUES
(1, 'Bisnis Online', 'bisnis-online', 'Yes'),
(2, 'CSS', 'css', 'Yes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `level` enum('admin','user') NOT NULL DEFAULT 'user',
  `block` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`username`, `password`, `full_name`, `email`, `level`, `block`) VALUES
('admin', '88b3340abaa6acbf87abe45f68fa8960224c1e36f6a96433bcbc490c84c9c6d2', 'Administrator', 'admin@cmsblog.com', 'admin', 'No'),
('aldy', '960556fcdc05b33232c44b5343f246713fd57b9b04b4b903f47a7c742eeccf39', 'Aldy', 'aldy@gmail.com', 'user', 'No'),
('user', '9e75aa32de6fb60e9fe97e8753de0122d32f62eeb638626de8f3f77dfbd78f05', 'Adiva Yasna Umaiza', 'adiva@cmsblog.com', 'user', 'No');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

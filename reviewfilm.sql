-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 16, 2026 lúc 10:00 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `reviewfilm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'Action'),
(3, 'Drama'),
(4, 'Comedy'),
(5, 'Horror'),
(6, 'Sci-Fi'),
(7, 'Romance'),
(8, 'Family'),
(10, 'Biography'),
(11, 'Musical');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `email`, `message`, `created_at`, `name`) VALUES
(3, 'khanh@gmail.com', '12edasfdgbfgbsdawd', '2026-04-03 09:04:47', 'Khánh'),
(4, 'tan@gmail.com', 'sgdgfbesdfesdf!', '2026-04-03 09:05:14', 'Tan'),
(5, 'phuc@gmail.com', 'ădsdvdtghfngfbdc!dscdsc', '2026-04-03 09:05:28', 'Phúc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `film`
--

INSERT INTO `film` (`id`, `title`, `description`, `image`) VALUES
(2, 'Thỏ Ơi', 'Inspired by true stories, \"Little Rabbit!!\" exposes the dark side of love and marriage, where the \"masks\" of truth are gradually removed.', '69c640011bf97thỏ ơi.jpg'),
(3, 'Bố Già', 'The Godfather revolves around the daily life of a poor working-class neighborhood, where the four brothers Giau, Sang, Phu, and Quy are present. Ba Sang is the main character, a busybody who meddles in other people\'s affairs but deeply loves his children. The story focuses on Ba Sang and his son, Quan. Despite their love for each other, the generation gap creates significant disagreements between father and son. Will they be able to give each other a chance to understand one another, bridge the gap, and create happiness from their differences?', '69c63ec76992ebố già.jpg'),
(4, 'Báu Vật Trời Cho', 'This emotionally rich and heartwarming film, filled with love and family bonding, is perfect for Tet 2026. Ngoc (Phuong Anh Dao) is a single mother who conceived through artificial insemination using donated sperm. During a beach trip to escape her past, she and To encounter Hong (Tuan Tran), a free-spirited fisherman who also contributed to To\'s birth. This unexpected encounter draws three strangers into a series of hilarious, tense, and heartbreaking situations as things begin to spiral out of control. Is this \"heaven-sent\" father a genuine gift from fate, or merely a cruel twist of fate?', '69c63eecdc195báu vật trời cho.jpg'),
(5, ' Mùi Phở', 'The story revolves around generational conflict and the clash between old values ​​and modern lifestyles, centered around Pho – an iconic Vietnamese dish. Behind these conflicts and controversies, secrets are gradually revealed, opening up a journey to rediscover the warmth of family bonds through humorous, witty, and charming plot points.', '69c63ff602461mùi phở.jpg'),
(6, 'Tài', 'Tài unexpectedly finds himself caught in a dangerous spiral due to a massive debt. Cornered, Tài is forced to make wrong choices that put his family at risk. Behind these reckless actions lies the haunting memory of his mother, whom he desperately wants to protect and compensate for at all costs. As the line between right and wrong becomes increasingly blurred, Tài must confront the biggest question of his life: is filial piety enough to justify the path he is taking?', '69c640b22990dtài.jpg'),
(7, 'Con Kể Ba Nghe', '\"My Son Tells His Father\" follows a tightrope walker and his withdrawn son on a journey to rediscover a lost connection. Amidst the dazzling yet fragile lights of the circus stage, the father and son gradually open up and heal old wounds. The film both celebrates Vietnamese circus art and reminds us of the importance of family in modern life.', '69c6411ec60f1con kể ba nghe.jpg'),
(8, 'Mai', 'Tran Thanh\'s film \"Mai\" will be released on the first day of Tet 2024 - February 10, 2024. \"Mai\" revolves around the bittersweet sisterly relationship between Mai (Phuong Anh Dao) and Duong (Tuan Tran), along with the mysterious interplay between past and future stories that are constantly mentioned.', '69c651f714b1amai.jpg'),
(9, 'Gặp Lại Chị Bầu', '\"Meeting the Pregnant Woman Again\" revolves around Phuc, a young man with a passion for acting but who faces countless hardships in life. He accidentally ends up at Mrs. Le\'s boarding house and, along with his friends there, experiences some of the most memorable days of his youth.', '69c65237b2370gặp lại vợ bầu.png'),
(10, 'Hẹn Em Ngày Nhật Thực', 'In 1995, while facing a crucial life decision, An is unexpectedly pulled back in time by unspoken love letters. Her journey to find Thien – her first love, deeply etched in her heart – takes her back to the village of Tra May, where sweet and painful memories still linger. In a fateful moment when they unexpectedly meet, secrets hidden for years gradually unfold, forcing An to confront the truth and choose her own path. \"Meeting You on the Day of the Eclipse\" is an emotionally charged love story about unspoken words, eternal love, and the haunting question: if given another chance, would we dare to trust our hearts once more?', '69c6607183ac8hẹn em ngày nhật thực.jpg'),
(11, 'Nhà Mình Đi Thôi', 'Phuong, an ambitious young startup founder, is forced to stage a lavish vacation for her troubled family in order to secure investment for her startup. Can she overcome the challenge, mend her family relationships, and seize the opportunity for success?', '69c660b2adac4nhà mình đi thôi.jpg'),
(12, 'Quỷ Nhập Tràng 2', 'The Corpse Possession 2 is a prequel to the story of Minh Như, who returns to her family\'s dyeing workshop after years of being ostracized. There, she must confront paranormal phenomena and the brutal truth about her mother\'s death and a bloody pact from the past. Will Minh Như escape the clutches of evil?', '69c660ef3bd7bQuỷ Nhập Tràng 2.jpg'),
(13, ' Cảm Ơn Người Đã Thức Cùng Tôi', '\"Thank You for Staying Awake With Me\" is an emotional journey of young people searching for the answer to the question \"What is your dream?\", only to gradually realize, as they enter adulthood, the most important question: \"Who do I want to pursue that dream with?\"', '69c66166173b2Cảm Ơn Người Đã Thức Cùng Tôi.jpg'),
(14, 'Nhà Ba Tôi Một Phòng', 'Set in an old apartment building with a single-room apartment, \"My Dad\'s One-Room House\" portrays the mismatched relationship between a conservative father and his ambitious Gen Z daughter. As generational differences clash in this cramped space, family bonds are tested and healed. The film offers a relatable glimpse into a modern Vietnamese family, where love sometimes begins with understanding.', '69c662f292be1nhà ba tôi một phòng.jpg'),
(15, 'Công Tử Bạc Liêu', 'Inspired by the famous anecdote of the character known as the most extravagant playboy in the world, \"The Prince of Bac Lieu\" is a humorous psychological film set in the old Southern provinces of Vietnam. BA HON – the beloved son of Councilman Linh, the first banker in Vietnam – after studying in France, squandered his entire fortune on frivolous entertainment and debauchery, earning him the nickname \"The Prince of Bac Lieu.\"', '69c6637b92803Công Tử Bạc Liêu.jpg'),
(16, 'Cám', 'The film\'s story is a bloody horror adaptation inspired by the famous fairy tale of Tam Cam. The main plot revolves around Cam, Tam\'s half-sister, and will feature many creative characters and details, evoking a feeling that is both familiar and new.', '69c663d49f6cfCÁM.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `film_category`
--

CREATE TABLE `film_category` (
  `film_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `film_category`
--

INSERT INTO `film_category` (`film_id`, `category_id`) VALUES
(2, 3),
(2, 7),
(3, 4),
(3, 8),
(4, 3),
(4, 4),
(4, 8),
(5, 4),
(5, 8),
(6, 2),
(6, 3),
(6, 8),
(7, 3),
(7, 8),
(8, 3),
(9, 8),
(10, 7),
(11, 3),
(11, 8),
(12, 3),
(12, 5),
(13, 7),
(13, 8),
(13, 11),
(14, 3),
(14, 8),
(15, 3),
(15, 4),
(15, 10),
(16, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `film_id` int(11) DEFAULT NULL,
  `reviewer_id` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `rating` int(11) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `review`
--

INSERT INTO `review` (`id`, `film_id`, `reviewer_id`, `content`, `created_at`, `rating`) VALUES
(8, 8, 8, 'Not what I expected, but still a decent watch.', '2026-03-27 09:57:37', 5),
(10, 6, 10, 'Great storyline and strong performances from the cast.', '2026-03-27 09:58:30', 5),
(13, 5, 13, 'This film really touched my heart and stayed with me long after it ended.', '2026-03-27 10:04:58', 5),
(14, 3, 14, 'I was completely immersed in the story from beginning to end.', '2026-03-27 10:05:59', 5),
(16, 7, 16, 'sđfhdfhjdfghsdfgdrgsdfsdfsdgsfjrtfh!', '2026-03-27 10:46:09', 5),
(17, 13, 17, 'It’s a good movie to watch with friends or family.', '2026-03-27 10:53:37', 4),
(18, NULL, 18, 'The plot is engaging and keeps the audience interested until the end.', '2026-03-27 10:54:24', 4),
(19, NULL, 19, 'I really like this film because it is funny and meaningful.', '2026-03-27 10:54:56', 4),
(20, NULL, 20, 'The story is easy to understand but very touching.', '2026-03-27 10:55:29', 3),
(21, 4, 21, 'The cinematography is beautiful and visually impressive.', '2026-03-27 10:56:36', 3),
(26, 10, 27, 'This film was absolutely amazing! The storyline was engaging, and the acting was outstanding. I was hooked from beginning to end. The visuals and soundtrack also added a lot to the overall experience. Highly recommended!', '2026-04-03 05:51:55', 2),
(27, 15, 28, 'This film offers a compelling storyline with well-developed characters. The director did a great job creating emotional moments, and the cinematography was beautiful. However, the movie could have been shorter, as some scenes felt unnecessary. Overall, it’s still a solid and enjoyable film.', '2026-04-03 05:54:05', 4),
(32, 16, 33, 'ắdadwad', '2026-04-14 19:53:43', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviewer`
--

CREATE TABLE `reviewer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `reviewer`
--

INSERT INTO `reviewer` (`id`, `name`, `email`) VALUES
(8, 'Nguyên', 'nguyen@gmail.com'),
(9, 'Phúc', 'phuc@gmail.com'),
(10, 'Hưng', 'hung@gmail.com'),
(11, 'Thân', 'than@gmail.com'),
(13, 'Huy', 'huy@gmail.com'),
(14, 'Hoàng', 'hoang@gmail.com'),
(16, 'Khánh', 'khanh@gmail.com'),
(17, 'Phát', 'phat@gmail.com'),
(18, 'Tuấn', 'tuan@gmail.com'),
(19, 'Tâm', 'tam@gmail.com'),
(20, 'Việt', 'viet@gmail.com'),
(21, 'Đăng', 'dang@gmail.com'),
(22, 'Anh', 'anh@gmail.com'),
(23, 'Bảo', 'bao@gmail.com'),
(27, 'Hải', 'hai@gmail.com'),
(28, 'Tú', 'tu@gmail.com'),
(31, 'ădasd', 'ádasdas'),
(33, 'Tan', 'tan@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(2, 'admin', '$2y$10$D.m365bnsVv/8UtHI5sAb.3I.m9YNIVmSUZ/uufT3IbYwr9CZIQV6');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `film_category`
--
ALTER TABLE `film_category`
  ADD PRIMARY KEY (`film_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `film_id` (`film_id`),
  ADD KEY `reviewer_id` (`reviewer_id`);

--
-- Chỉ mục cho bảng `reviewer`
--
ALTER TABLE `reviewer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `reviewer`
--
ALTER TABLE `reviewer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `film_category`
--
ALTER TABLE `film_category`
  ADD CONSTRAINT `film_category_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `film_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_film` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`reviewer_id`) REFERENCES `reviewer` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

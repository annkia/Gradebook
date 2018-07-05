-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 03 Kwi 2018, 22:41
-- Wersja serwera: 10.1.21-MariaDB
-- Wersja PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `gradebook`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `grades`
--

CREATE TABLE `grades` (
  `id_grade` int(4) NOT NULL,
  `grade_1` int(1) NOT NULL,
  `grade_2` int(1) NOT NULL,
  `grade_3` int(1) NOT NULL,
  `id_student` int(11) NOT NULL,
  `student_name` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `student_surname` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `subject_name` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `id_subject` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `grades`
--

INSERT INTO `grades` (`id_grade`, `grade_1`, `grade_2`, `grade_3`, `id_student`, `student_name`, `student_surname`, `subject_name`, `id_subject`) VALUES
(1, 1, 2, 2, 1, 'Adam', 'Kowalski', 'Matematyka gr.B8', 16),
(2, 3, 4, 3, 2, 'Karolina', 'Nowak', 'Matematyka gr.B8', 16),
(3, 4, 5, 3, 4, 'Wojciech', 'Rak', 'Systemy Wbudowane gr.A2', 17),
(4, 8, 8, 8, 5, 'Marcin', 'Sol', 'Systemy Wbudowane gr.A2', 17),
(6, 0, 0, 0, 3, 'Magda', 'Biedrowska', 'Statyka', 30),
(7, 0, 0, 0, 5, 'Marcin', 'Sol', 'Statyka', 30),
(12, 0, 0, 0, 3, 'Magda', 'Biedrowska', '', 34),
(13, 5, 5, 2, 3, 'Magda', 'Biedrowska', '', 16),
(14, 1, 2, 3, 5, 'Marcin', 'Sol', '', 16),
(15, 5, 5, 5, 1, 'Adam', 'Kowalski', '', 27),
(16, 0, 0, 0, 2, 'Karolina', 'Nowak', '', 27),
(17, 0, 0, 0, 3, 'Wojciech', 'Rak', '', 27),
(18, 0, 0, 0, 5, 'Marcin', 'Sol', '', 27),
(19, 0, 4, 0, 9, 'Karol', 'Malicki', '', 16),
(20, 0, 0, 0, 6, 'Magda', 'Karwacka', '', 16),
(22, 0, 0, 0, 6, 'Magda', 'Karwacka', '', 16),
(23, 0, 0, 0, 9, 'Karol', 'Malicki', '', 16),
(24, 0, 0, 0, 11, 'Dawid', 'Pawelczyk', '', 16),
(25, 0, 0, 0, 11, '', '', '', 16),
(26, 0, 0, 0, 10, '', '', '', 16),
(27, 0, 0, 0, 11, 'Dawid', 'Pawelczyk', '', 17);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `presences`
--

CREATE TABLE `presences` (
  `id_student` int(11) NOT NULL,
  `id_subject` int(2) NOT NULL,
  `date` date NOT NULL,
  `student_name` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `student_surname` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `presence` tinyint(1) NOT NULL,
  `id_presences` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `presences`
--

INSERT INTO `presences` (`id_student`, `id_subject`, `date`, `student_name`, `student_surname`, `presence`, `id_presences`) VALUES
(11, 16, '2018-04-02', 'Dawid', 'Pawelczyk', 1, 1),
(11, 16, '2018-04-01', 'Dawid', 'Pawelczyk', 0, 2),
(1, 16, '2018-02-13', 'Adam', 'Kowalski', 1, 7),
(3, 17, '2018-04-01', 'Wojciech', 'Rak', 1, 8),
(2, 16, '2018-04-02', 'Karolina', 'Nowak', 0, 9),
(5, 16, '2018-04-01', 'Marcin', 'Sol', 0, 10),
(3, 16, '2018-04-02', 'Magda', 'Biedrowska', 1, 12);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `students`
--

CREATE TABLE `students` (
  `id_student` int(11) NOT NULL,
  `student_name` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `student_surname` varchar(30) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `students`
--

INSERT INTO `students` (`id_student`, `student_name`, `student_surname`) VALUES
(1, 'Adam', 'Kowalski'),
(2, 'Karolina', 'Nowak'),
(3, 'Magda', 'Biedrowska'),
(4, 'Wojciech', 'Rak'),
(5, 'Marcin', 'Sol'),
(6, 'Magda', 'Karwacka'),
(7, 'Jan', 'Dobosz'),
(8, 'Marek', 'Walicki'),
(9, 'Karol', 'Malicki'),
(10, 'Olaf', 'Kopiec'),
(11, 'Dawid', 'Pawelczyk'),
(12, 'Zofia', 'Marczyk');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `subjects`
--

CREATE TABLE `subjects` (
  `id_subject` int(2) NOT NULL,
  `subject_name` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `start_date` date NOT NULL,
  `username` bigint(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `subjects`
--

INSERT INTO `subjects` (`id_subject`, `subject_name`, `start_date`, `username`, `id_user`) VALUES
(16, 'Matematyka gr.B8', '2018-02-13', 33333333333, 31),
(17, 'Systemy Wbudowane gr. A2', '2018-02-13', 33333333333, 31),
(26, 'Niemiecki gr.A3', '2018-02-16', 22222222222, 30),
(27, 'Algorytmy gr.C1', '0000-00-00', 33333333333, 31),
(29, 'Biologia gr.B2', '2018-02-05', 33333333333, 31),
(30, 'Statyka  gr.C2', '2018-02-05', 33333333333, 31),
(31, 'Mechanika  gr.B4', '2018-02-03', 33333333333, 31),
(32, 'Fizyka gr. A5', '2018-02-07', 33333333333, 31),
(33, 'Filozofia gr.B9', '2018-02-17', 33333333333, 31),
(34, 'Chemia  gr.C1', '2018-02-19', 33333333333, 31);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `teachers`
--

CREATE TABLE `teachers` (
  `id_user` int(11) NOT NULL,
  `username` bigint(11) NOT NULL,
  `password` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `teacher_name` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `teacher_surname` varchar(30) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci ROW_FORMAT=COMPACT;

--
-- Zrzut danych tabeli `teachers`
--

INSERT INTO `teachers` (`id_user`, `username`, `password`, `email`, `teacher_name`, `teacher_surname`) VALUES
(30, 22222222222, '780de4d0eaa443d19af074a08ae5d5ba', 'dwa@wp.pl', 'dwa', 'dwadziesciadwa'),
(31, 33333333333, 'de4da443d5ba19af074a00ea8ae5d780', '33@ff.pl', 'trzy', 'trzyff'),
(32, 44444444444, '35b826c5f97e42fee928d5c1e68bb423', 'cztery@ffee.pl', 'cztery', 'ffdsdf');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id_grade`),
  ADD KEY `id_subject` (`id_subject`),
  ADD KEY `id_student` (`id_student`);

--
-- Indexes for table `presences`
--
ALTER TABLE `presences`
  ADD PRIMARY KEY (`id_presences`),
  ADD KEY `id_student` (`id_student`),
  ADD KEY `id_subject` (`id_subject`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id_student`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id_subject`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `grades`
--
ALTER TABLE `grades`
  MODIFY `id_grade` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT dla tabeli `presences`
--
ALTER TABLE `presences`
  MODIFY `id_presences` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT dla tabeli `students`
--
ALTER TABLE `students`
  MODIFY `id_student` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT dla tabeli `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id_subject` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT dla tabeli `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`),
  ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`);

--
-- Ograniczenia dla tabeli `presences`
--
ALTER TABLE `presences`
  ADD CONSTRAINT `presences_ibfk_1` FOREIGN KEY (`id_student`) REFERENCES `grades` (`id_student`),
  ADD CONSTRAINT `presences_ibfk_2` FOREIGN KEY (`id_subject`) REFERENCES `grades` (`id_subject`);

--
-- Ograniczenia dla tabeli `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `teachers` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

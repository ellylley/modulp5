-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2024 at 04:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek1`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `activity` text DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `id_user`, `activity`, `timestamp`) VALUES
(1552, 1, 'Mengakses halaman dashboard', '2024-09-06 00:37:57'),
(1553, 1, 'Mengakses halaman profile', '2024-09-06 00:38:11'),
(1554, 1, 'Mengubah data profile', '2024-09-06 00:38:17'),
(1555, 1, 'Mengakses halaman profile', '2024-09-06 00:38:18'),
(1556, 1, 'Mengubah data profile', '2024-09-06 00:38:22'),
(1557, 1, 'Mengakses halaman profile', '2024-09-06 00:38:23'),
(1558, 1, 'Mengakses halaman ubah password', '2024-09-06 00:38:24'),
(1559, 1, 'mengubah password profile', '2024-09-06 00:38:44'),
(1560, 1, 'Mengakses halaman ubah password', '2024-09-06 00:38:45'),
(1561, 1, 'mengubah password profile', '2024-09-06 00:38:54'),
(1562, 1, 'Mengakses halaman ubah password', '2024-09-06 00:38:55'),
(1563, 1, 'Mengakses halaman modul', '2024-09-06 00:39:00'),
(1564, 1, 'Mengakses halaman kelola modul', '2024-09-06 00:39:02'),
(1565, 1, 'Mengakses halaman tambah modul', '2024-09-06 00:39:05'),
(1566, 1, 'Menambah modul', '2024-09-06 00:41:30'),
(1567, 1, 'Mengakses halaman kelola modul', '2024-09-06 00:41:31'),
(1568, 1, 'Mengakses halaman modul', '2024-09-06 00:41:37'),
(1569, 1, 'Mengakses halaman detail modul', '2024-09-06 00:41:45'),
(1570, 1, 'Mengakses halaman kelola modul', '2024-09-06 00:41:52'),
(1571, 1, 'Mengakses halaman detail modul', '2024-09-06 00:41:56'),
(1572, 1, 'Mengakses halaman edit modul', '2024-09-06 00:42:02'),
(1573, 1, 'mengubah data modul', '2024-09-06 00:42:08'),
(1574, 1, 'Mengakses halaman kelola modul', '2024-09-06 00:42:09'),
(1575, 1, 'Mengakses halaman detail modul', '2024-09-06 00:42:13'),
(1576, 1, 'Mencetak modul', '2024-09-06 00:42:17'),
(1577, 1, 'Mengakses halaman detail modul', '2024-09-06 00:42:33'),
(1578, 1, 'Mengakses halaman kelola modul', '2024-09-06 00:42:35'),
(1579, 1, 'Mengakses halaman restore edit modul', '2024-09-06 00:42:38'),
(1580, 1, 'Mengakses halaman kelola modul', '2024-09-06 00:42:44'),
(1581, 1, 'Mengakses halaman restore edit modul', '2024-09-06 00:42:50'),
(1582, 1, 'Merestore modul yang diedit', '2024-09-06 00:43:00'),
(1583, 1, 'Mengakses halaman restore edit modul', '2024-09-06 00:43:01'),
(1584, 1, 'Mengakses halaman kelola modul', '2024-09-06 00:43:03'),
(1585, 1, 'Mengakses halaman manajemen user', '2024-09-06 00:43:08'),
(1586, 1, 'Mengakses halaman tambah user', '2024-09-06 00:43:11'),
(1587, 1, 'Menambah user', '2024-09-06 00:43:51'),
(1588, 1, 'Mengakses halaman manajemen user', '2024-09-06 00:43:51'),
(1589, 1, 'Mengakses halaman edit user', '2024-09-06 00:43:59'),
(1590, 1, 'Mengubah data user', '2024-09-06 00:44:04'),
(1591, 1, 'Mengakses halaman manajemen user', '2024-09-06 00:44:05'),
(1592, 1, 'Mereset password user', '2024-09-06 00:44:20'),
(1593, 1, 'Mengakses halaman manajemen user', '2024-09-06 00:44:20'),
(1594, 1, 'Mengakses halaman restore edit user', '2024-09-06 00:44:29'),
(1595, 1, 'Merestore user yang diedit', '2024-09-06 00:44:33'),
(1596, 1, 'Mengakses halaman restore edit user', '2024-09-06 00:44:33'),
(1597, 1, 'Mengakses halaman manajemen user', '2024-09-06 00:44:35'),
(1598, 1, 'Mengakses halaman daftar guru', '2024-09-06 00:44:38'),
(1599, 1, 'Mengakses halaman daftar siswa', '2024-09-06 00:44:53'),
(1600, 1, 'Mengakses halaman daftar siswa', '2024-09-06 00:44:53'),
(1601, 1, 'Mengakses halaman manajemen kelas', '2024-09-06 00:44:59'),
(1602, 1, 'Mengakses halaman tambah kelas', '2024-09-06 00:45:01'),
(1603, 1, 'Menambah data kelas', '2024-09-06 00:45:07'),
(1604, 1, 'Mengakses halaman manajemen kelas', '2024-09-06 00:45:08'),
(1605, 1, 'Mengakses halaman edit kelas', '2024-09-06 00:45:10'),
(1606, 1, 'Mengubah data kelas', '2024-09-06 00:45:17'),
(1607, 1, 'Mengakses halaman manajemen kelas', '2024-09-06 00:45:17'),
(1608, 1, 'Menghapus data kelas', '2024-09-06 00:45:22'),
(1609, 1, 'Mengakses halaman manajemen kelas', '2024-09-06 00:45:23'),
(1610, 1, 'Mengakses halaman edit kelas', '2024-09-06 00:45:31'),
(1611, 1, 'Mengubah data kelas', '2024-09-06 00:45:36'),
(1612, 1, 'Mengakses halaman manajemen kelas', '2024-09-06 00:45:36'),
(1613, 1, 'Mengakses halaman restore edit kelas', '2024-09-06 00:45:37'),
(1614, 1, 'Merestore kelas yang diedit', '2024-09-06 00:45:39'),
(1615, 1, 'Mengakses halaman restore edit kelas', '2024-09-06 00:45:39'),
(1616, 1, 'Mengakses halaman restore edit kelas', '2024-09-06 00:45:41'),
(1617, 1, 'Mengakses halaman manajemen kelas', '2024-09-06 00:45:44'),
(1618, 1, 'Mengakses halaman setting', '2024-09-06 00:45:55'),
(1619, 1, 'Mengubah data setting', '2024-09-06 00:46:12'),
(1620, 1, 'Mengakses halaman setting', '2024-09-06 00:46:13'),
(1621, 1, 'Mengubah data setting', '2024-09-06 00:46:23'),
(1622, 1, 'Mengakses halaman setting', '2024-09-06 00:46:23'),
(1623, 1, 'Mengakses halaman log aktivitas', '2024-09-06 00:46:25'),
(1624, 1, 'Mengakses halaman restore modul', '2024-09-06 00:46:38'),
(1625, 1, 'Mengakses halaman modul', '2024-09-06 00:46:40'),
(1626, 1, 'Mengakses halaman kelola modul', '2024-09-06 00:46:42'),
(1627, 1, 'Mengedit Modul', '2024-09-06 00:46:45'),
(1628, 1, 'Mengakses halaman kelola modul', '2024-09-06 00:46:45'),
(1629, 1, 'Mengakses halaman restore modul', '2024-09-06 00:46:48'),
(1630, 1, 'Merestore Modul', '2024-09-06 00:46:51'),
(1631, 1, 'Mengakses halaman restore modul', '2024-09-06 00:46:51'),
(1632, 1, 'Mengakses halaman modul', '2024-09-06 00:46:53'),
(1633, 1, 'Mengakses halaman kelola modul', '2024-09-06 00:46:54'),
(1634, 1, 'Mengakses halaman restore user', '2024-09-06 00:46:57'),
(1635, 1, 'Mengakses halaman restore kelas', '2024-09-06 00:46:59'),
(1636, 1, 'Mengakses halaman manajemen kelas', '2024-09-06 00:47:56'),
(1637, 1, 'Menghapus data kelas', '2024-09-06 00:48:06'),
(1638, 1, 'Mengakses halaman manajemen kelas', '2024-09-06 00:48:06'),
(1639, 1, 'Mengakses halaman restore edit kelas', '2024-09-06 00:48:08'),
(1640, 1, 'Mengakses halaman manajemen kelas', '2024-09-06 00:48:16'),
(1641, 1, 'Mengakses halaman edit kelas', '2024-09-06 00:48:22'),
(1642, 1, 'Mengubah data kelas', '2024-09-06 00:48:28'),
(1643, 1, 'Mengakses halaman manajemen kelas', '2024-09-06 00:48:28'),
(1644, 1, 'Mengakses halaman restore edit kelas', '2024-09-06 00:48:30'),
(1645, 1, 'Mengakses halaman manajemen kelas', '2024-09-06 00:48:44'),
(1646, 1, 'Mengakses halaman edit kelas', '2024-09-06 00:49:17'),
(1647, 1, 'Mengubah data kelas', '2024-09-06 00:49:21'),
(1648, 1, 'Mengakses halaman manajemen kelas', '2024-09-06 00:49:21'),
(1649, 1, 'Mengakses halaman restore edit kelas', '2024-09-06 00:49:23'),
(1650, 1, 'Mengakses halaman manajemen kelas', '2024-09-06 00:49:25'),
(1651, 1, 'Menghapus data kelas', '2024-09-06 00:49:28'),
(1652, 1, 'Mengakses halaman manajemen kelas', '2024-09-06 00:49:29'),
(1653, 1, 'Mengakses halaman restore edit kelas', '2024-09-06 00:49:30'),
(1654, 1, 'Mengakses halaman kelola modul', '2024-09-06 00:50:45'),
(1655, 1, 'Mengakses halaman detail modul', '2024-09-06 00:50:47'),
(1656, 1, 'Mengakses halaman edit modul', '2024-09-06 00:50:51'),
(1657, 1, 'mengubah data modul', '2024-09-06 00:50:57'),
(1658, 1, 'Mengakses halaman kelola modul', '2024-09-06 00:50:58'),
(1659, 1, 'Mengakses halaman restore edit modul', '2024-09-06 00:50:59'),
(1660, 1, 'Mengakses halaman kelola modul', '2024-09-06 00:51:01'),
(1661, 1, 'Mengedit Modul', '2024-09-06 00:51:04'),
(1662, 1, 'Mengakses halaman kelola modul', '2024-09-06 00:51:05'),
(1663, 1, 'Mengakses halaman restore edit modul', '2024-09-06 00:51:06'),
(1664, 1, 'Mengakses halaman restore edit modul', '2024-09-06 00:52:08'),
(1665, 1, 'Mengakses halaman restore edit modul', '2024-09-06 00:54:37'),
(1666, 1, 'Mengakses halaman restore modul', '2024-09-06 00:56:26'),
(1667, 1, 'Merestore Modul', '2024-09-06 00:56:28'),
(1668, 1, 'Mengakses halaman restore modul', '2024-09-06 00:56:29'),
(1669, 1, 'Mengakses halaman modul', '2024-09-06 00:56:31'),
(1670, 1, 'Mengakses halaman kelola modul', '2024-09-06 00:56:33'),
(1671, 1, 'Mengakses halaman detail modul', '2024-09-06 00:56:35'),
(1672, 1, 'Mengakses halaman edit modul', '2024-09-06 00:56:39'),
(1673, 1, 'mengubah data modul', '2024-09-06 00:56:44'),
(1674, 1, 'Mengakses halaman kelola modul', '2024-09-06 00:56:45'),
(1675, 1, 'Mengakses halaman restore edit modul', '2024-09-06 00:56:54'),
(1676, 1, 'Mengakses halaman kelola modul', '2024-09-06 00:56:58'),
(1677, 1, 'Mengakses halaman restore edit modul', '2024-09-06 00:57:09'),
(1678, 1, 'Mengakses halaman restore edit modul', '2024-09-06 01:00:14'),
(1679, 1, 'Mengakses halaman dashboard', '2024-09-06 01:01:33'),
(1680, 1, 'Mengakses halaman profile', '2024-09-06 01:01:46'),
(1681, 1, 'Mengubah data profile', '2024-09-06 01:01:51'),
(1682, 1, 'Mengakses halaman profile', '2024-09-06 01:01:52'),
(1683, 1, 'Mengubah data profile', '2024-09-06 01:01:54'),
(1684, 1, 'Mengakses halaman profile', '2024-09-06 01:01:55'),
(1685, 1, 'Mengakses halaman ubah password', '2024-09-06 01:01:56'),
(1686, 1, 'mengubah password profile', '2024-09-06 01:02:08'),
(1687, 1, 'Mengakses halaman ubah password', '2024-09-06 01:02:09'),
(1688, 1, 'mengubah password profile', '2024-09-06 01:02:17'),
(1689, 1, 'Mengakses halaman ubah password', '2024-09-06 01:02:18'),
(1690, 1, 'Mengakses halaman modul', '2024-09-06 01:02:22'),
(1691, 1, 'Mengakses halaman kelola modul', '2024-09-06 01:02:26'),
(1692, 1, 'Mengakses halaman tambah modul', '2024-09-06 01:02:30'),
(1693, 1, 'Menambah modul', '2024-09-06 01:04:39'),
(1694, 1, 'Mengakses halaman kelola modul', '2024-09-06 01:04:39'),
(1695, 1, 'Mengakses halaman detail modul', '2024-09-06 01:04:46'),
(1696, 1, 'Mencetak modul', '2024-09-06 01:04:53'),
(1697, 1, 'Mengakses halaman detail modul', '2024-09-06 01:05:03'),
(1698, 1, 'Mengakses halaman edit modul', '2024-09-06 01:05:05'),
(1699, 1, 'mengubah data modul', '2024-09-06 01:05:18'),
(1700, 1, 'Mengakses halaman kelola modul', '2024-09-06 01:05:18'),
(1701, 1, 'Mengakses halaman restore edit modul', '2024-09-06 01:05:28'),
(1702, 1, 'Merestore modul yang diedit', '2024-09-06 01:05:37'),
(1703, 1, 'Mengakses halaman restore edit modul', '2024-09-06 01:05:38'),
(1704, 1, 'Mengakses halaman kelola modul', '2024-09-06 01:05:40'),
(1705, 1, 'Mengakses halaman modul', '2024-09-06 01:05:43'),
(1706, 1, 'Mengakses halaman detail modul', '2024-09-06 01:05:49'),
(1707, 1, 'Mengakses halaman manajemen user', '2024-09-06 01:05:55'),
(1708, 1, 'Mengakses halaman tambah user', '2024-09-06 01:06:00'),
(1709, 1, 'Menambah user', '2024-09-06 01:06:28'),
(1710, 1, 'Mengakses halaman manajemen user', '2024-09-06 01:06:29'),
(1711, 1, 'Mengakses halaman edit user', '2024-09-06 01:06:39'),
(1712, 1, 'Mengubah data user', '2024-09-06 01:06:46'),
(1713, 1, 'Mengakses halaman manajemen user', '2024-09-06 01:06:46'),
(1714, 1, 'Mengakses halaman restore edit user', '2024-09-06 01:06:50'),
(1715, 1, 'Merestore user yang diedit', '2024-09-06 01:06:51'),
(1716, 1, 'Mengakses halaman restore edit user', '2024-09-06 01:06:52'),
(1717, 1, 'Mengakses halaman manajemen user', '2024-09-06 01:06:53'),
(1718, 1, 'Mengakses halaman daftar guru', '2024-09-06 01:07:17'),
(1719, 1, 'Mengakses halaman daftar siswa', '2024-09-06 01:07:26'),
(1720, 1, 'Mengakses halaman daftar siswa', '2024-09-06 01:08:27'),
(1721, 1, 'Mengakses halaman daftar siswa', '2024-09-06 01:08:51'),
(1722, 1, 'Mengakses halaman dashboard', '2024-09-06 01:11:13'),
(1723, 1, 'Mengakses halaman profile', '2024-09-06 01:11:28'),
(1724, 1, 'Mengubah data profile', '2024-09-06 01:11:33'),
(1725, 1, 'Mengakses halaman profile', '2024-09-06 01:11:33'),
(1726, 1, 'Mengubah data profile', '2024-09-06 01:11:36'),
(1727, 1, 'Mengakses halaman profile', '2024-09-06 01:11:37'),
(1728, 1, 'Mengakses halaman ubah password', '2024-09-06 01:11:38'),
(1729, 1, 'mengubah password profile', '2024-09-06 01:11:50'),
(1730, 1, 'Mengakses halaman ubah password', '2024-09-06 01:11:51'),
(1731, 1, 'mengubah password profile', '2024-09-06 01:11:57'),
(1732, 1, 'Mengakses halaman ubah password', '2024-09-06 01:11:57'),
(1733, 1, 'Mengakses halaman modul', '2024-09-06 01:12:00'),
(1734, 1, 'Mengakses halaman kelola modul', '2024-09-06 01:12:05'),
(1735, 1, 'Mengakses halaman tambah modul', '2024-09-06 01:12:09'),
(1736, 1, 'Mengakses halaman dashboard', '2024-09-06 01:13:52'),
(1737, 1, 'Mengakses halaman profile', '2024-09-06 01:14:05'),
(1738, 1, 'Mengubah data profile', '2024-09-06 01:14:10'),
(1739, 1, 'Mengakses halaman profile', '2024-09-06 01:14:11'),
(1740, 1, 'Mengubah data profile', '2024-09-06 01:14:13'),
(1741, 1, 'Mengakses halaman profile', '2024-09-06 01:14:13'),
(1742, 1, 'Mengakses halaman ubah password', '2024-09-06 01:14:17'),
(1743, 1, 'mengubah password profile', '2024-09-06 01:14:27'),
(1744, 1, 'Mengakses halaman ubah password', '2024-09-06 01:14:28'),
(1745, 1, 'mengubah password profile', '2024-09-06 01:14:34'),
(1746, 1, 'Mengakses halaman ubah password', '2024-09-06 01:14:35'),
(1747, 1, 'Mengakses halaman modul', '2024-09-06 01:14:39'),
(1748, 1, 'Mengakses halaman kelola modul', '2024-09-06 01:14:47'),
(1749, 1, 'Mengakses halaman tambah modul', '2024-09-06 01:14:49'),
(1750, 1, 'Menambah modul', '2024-09-06 01:16:52'),
(1751, 1, 'Mengakses halaman kelola modul', '2024-09-06 01:16:52'),
(1752, 1, 'Mengakses halaman detail modul', '2024-09-06 01:17:00'),
(1753, 1, 'Mencetak modul', '2024-09-06 01:17:05'),
(1754, 1, 'Mengakses halaman detail modul', '2024-09-06 01:17:11'),
(1755, 1, 'Mengakses halaman edit modul', '2024-09-06 01:17:13'),
(1756, 1, 'mengubah data modul', '2024-09-06 01:17:20'),
(1757, 1, 'Mengakses halaman kelola modul', '2024-09-06 01:17:21'),
(1758, 1, 'Mengakses halaman restore edit modul', '2024-09-06 01:17:26'),
(1759, 1, 'Merestore modul yang diedit', '2024-09-06 01:17:35'),
(1760, 1, 'Mengakses halaman restore edit modul', '2024-09-06 01:17:36'),
(1761, 1, 'Mengakses halaman kelola modul', '2024-09-06 01:17:37'),
(1762, 1, 'Mengakses halaman modul', '2024-09-06 01:17:49'),
(1763, 1, 'Mengakses halaman detail modul', '2024-09-06 01:17:55'),
(1764, 1, 'Mengakses halaman manajemen user', '2024-09-06 01:18:03'),
(1765, 1, 'Mengakses halaman tambah user', '2024-09-06 01:18:07'),
(1766, 1, 'Menambah user', '2024-09-06 01:18:40'),
(1767, 1, 'Mengakses halaman manajemen user', '2024-09-06 01:18:40'),
(1768, 1, 'Mengakses halaman edit user', '2024-09-06 01:18:45'),
(1769, 1, 'Mengakses halaman manajemen user', '2024-09-06 01:18:52'),
(1770, 1, 'Mengakses halaman edit user', '2024-09-06 01:19:14'),
(1771, 1, 'Mengubah data user', '2024-09-06 01:19:34'),
(1772, 1, 'Mengakses halaman manajemen user', '2024-09-06 01:19:35'),
(1773, 1, 'Mengakses halaman daftar guru', '2024-09-06 01:19:41'),
(1774, 1, 'Mengakses halaman daftar siswa', '2024-09-06 01:19:47'),
(1775, 1, 'Mengakses halaman daftar guru', '2024-09-06 01:19:52'),
(1776, 1, 'Mengakses halaman manajemen user', '2024-09-06 01:19:57'),
(1777, 1, 'Mengakses halaman manajemen kelas', '2024-09-06 01:20:06'),
(1778, 1, 'Mengakses halaman tambah kelas', '2024-09-06 01:20:11'),
(1779, 1, 'Menambah data kelas', '2024-09-06 01:20:17'),
(1780, 1, 'Mengakses halaman manajemen kelas', '2024-09-06 01:20:17'),
(1781, 1, 'Mengakses halaman setting', '2024-09-06 01:20:33'),
(1782, 1, 'Mengubah data setting', '2024-09-06 01:20:48'),
(1783, 1, 'Mengakses halaman setting', '2024-09-06 01:20:49'),
(1784, 1, 'Mengubah data setting', '2024-09-06 01:20:53'),
(1785, 1, 'Mengakses halaman setting', '2024-09-06 01:20:53'),
(1786, 1, 'Mengakses halaman log aktivitas', '2024-09-06 01:20:57'),
(1787, 1, 'Mengakses halaman restore modul', '2024-09-06 01:21:10'),
(1788, 1, 'Mengakses halaman restore user', '2024-09-06 01:21:15'),
(1789, 1, 'Mengakses halaman modul', '2024-09-06 01:21:20'),
(1790, 1, 'Mengakses halaman kelola modul', '2024-09-06 01:21:23'),
(1791, 1, 'Mengedit Modul', '2024-09-06 01:21:25'),
(1792, 1, 'Mengakses halaman kelola modul', '2024-09-06 01:21:26'),
(1793, 1, 'Mengakses halaman restore modul', '2024-09-06 01:21:28'),
(1794, 1, 'Merestore Modul', '2024-09-06 01:21:32'),
(1795, 1, 'Mengakses halaman restore modul', '2024-09-06 01:21:33'),
(1796, 1, 'Mengakses halaman kelola modul', '2024-09-06 01:21:34'),
(1797, 1, 'Mengakses halaman restore user', '2024-09-06 01:21:39'),
(1798, 1, 'Mengakses halaman restore kelas', '2024-09-06 01:21:43'),
(1799, 24, 'Mengakses halaman dashboard', '2024-09-06 01:22:07'),
(1800, 24, 'Mengakses halaman modul', '2024-09-06 01:22:11'),
(1801, 24, 'Mengakses halaman detail modul', '2024-09-06 01:22:14'),
(1802, 24, 'Mengakses halaman daftar guru', '2024-09-06 01:22:18'),
(1803, 24, 'Mengakses halaman daftar siswa', '2024-09-06 01:22:20'),
(1804, 26, 'Mengakses halaman dashboard', '2024-09-06 01:22:43'),
(1805, 26, 'Mengakses halaman modul', '2024-09-06 01:22:45'),
(1806, 26, 'Mengakses halaman daftar guru', '2024-09-06 01:22:46'),
(1807, 26, 'Mengakses halaman daftar siswa', '2024-09-06 01:22:50'),
(1808, 30, 'Mengakses halaman dashboard', '2024-09-06 01:23:07'),
(1809, 30, 'Mengakses halaman dashboard', '2024-09-06 01:23:14'),
(1810, 30, 'Mengakses halaman modul', '2024-09-06 01:23:16'),
(1811, 30, 'Mengakses halaman kelola modul', '2024-09-06 01:23:23'),
(1812, 27, 'Mengakses halaman dashboard', '2024-09-06 01:23:41'),
(1813, 27, 'Mengakses halaman modul', '2024-09-06 01:23:48'),
(1814, 1, 'Mengakses halaman dashboard', '2024-09-06 02:06:32'),
(1815, 1, 'Mengakses halaman manajemen kelas', '2024-09-06 02:06:34'),
(1816, 1, 'Mengakses halaman edit kelas', '2024-09-06 02:06:37'),
(1817, 1, 'Mengubah data kelas', '2024-09-06 02:06:45'),
(1818, 1, 'Mengakses halaman manajemen kelas', '2024-09-06 02:06:45'),
(1819, 1, 'Mengakses halaman restore edit kelas', '2024-09-06 02:06:47'),
(1820, 1, 'Mengakses halaman manajemen kelas', '2024-09-06 02:06:49'),
(1821, 1, 'Menghapus data kelas', '2024-09-06 02:06:51'),
(1822, 1, 'Mengakses halaman manajemen kelas', '2024-09-06 02:06:51'),
(1823, 1, 'Mengakses halaman restore edit kelas', '2024-09-06 02:06:54'),
(1824, 1, 'Mengakses halaman manajemen kelas', '2024-09-06 02:06:55'),
(1825, 1, 'Mengakses halaman manajemen user', '2024-09-06 02:07:56'),
(1826, 1, 'Mengakses halaman edit user', '2024-09-06 02:08:03'),
(1827, 1, 'Mengubah data user', '2024-09-06 02:08:08'),
(1828, 1, 'Mengakses halaman manajemen user', '2024-09-06 02:08:08'),
(1829, 1, 'Mengakses halaman restore edit user', '2024-09-06 02:08:12'),
(1830, 1, 'Mengakses halaman manajemen user', '2024-09-06 02:08:13'),
(1831, 1, 'Menghapus data user', '2024-09-06 02:08:15'),
(1832, 1, 'Mengakses halaman manajemen user', '2024-09-06 02:08:15'),
(1833, 1, 'Mengakses halaman restore edit user', '2024-09-06 02:08:17'),
(1834, 1, 'Mengakses halaman manajemen user', '2024-09-06 02:08:19'),
(1835, 1, 'Mengakses halaman restore user', '2024-09-06 02:08:29'),
(1836, 1, 'Merestore user', '2024-09-06 02:08:31'),
(1837, 1, 'Mengakses halaman restore user', '2024-09-06 02:08:31'),
(1838, 1, 'Mengakses halaman manajemen user', '2024-09-06 02:08:34'),
(1839, 1, 'Mengakses halaman manajemen user', '2024-09-06 02:08:35'),
(1840, 1, 'Mengakses halaman edit user', '2024-09-06 02:08:38'),
(1841, 1, 'Mengubah data user', '2024-09-06 02:08:40'),
(1842, 1, 'Mengakses halaman manajemen user', '2024-09-06 02:08:40'),
(1843, 1, 'Mengakses halaman restore edit user', '2024-09-06 02:08:42'),
(1844, 1, 'Mengakses halaman manajemen user', '2024-09-06 02:08:44'),
(1845, 1, 'Mengakses halaman modul', '2024-09-06 02:11:46'),
(1846, 1, 'Mengakses halaman detail modul', '2024-09-06 02:11:51'),
(1847, 1, 'Mengakses halaman modul', '2024-09-06 02:11:54'),
(1848, 1, 'Mengakses halaman kelola modul', '2024-09-06 02:11:57'),
(1849, 1, 'Mengakses halaman detail modul', '2024-09-06 02:11:59'),
(1850, 1, 'Mengakses halaman edit modul', '2024-09-06 02:12:02'),
(1851, 1, 'mengubah data modul', '2024-09-06 02:12:06'),
(1852, 1, 'Mengakses halaman kelola modul', '2024-09-06 02:12:07'),
(1853, 1, 'Mengedit Modul', '2024-09-06 02:12:20'),
(1854, 1, 'Mengakses halaman kelola modul', '2024-09-06 02:12:21'),
(1855, 1, 'Mengakses halaman restore modul', '2024-09-06 02:12:44'),
(1856, 1, 'Merestore Modul', '2024-09-06 02:12:47'),
(1857, 1, 'Mengakses halaman restore modul', '2024-09-06 02:12:47'),
(1858, 1, 'Mengakses halaman kelola modul', '2024-09-06 02:12:49'),
(1859, 1, 'Mengakses halaman modul', '2024-09-06 02:12:55'),
(1860, 1, 'Mengakses halaman restore modul', '2024-09-06 02:13:02'),
(1861, 1, 'Mengakses halaman kelola modul', '2024-09-06 02:14:31'),
(1862, 1, 'Mengedit Modul', '2024-09-06 02:14:36'),
(1863, 1, 'Mengakses halaman kelola modul', '2024-09-06 02:14:36'),
(1864, 1, 'Mengakses halaman restore modul', '2024-09-06 02:14:40'),
(1865, 1, 'Mengakses halaman restore modul', '2024-09-06 02:16:04'),
(1866, 1, 'Mengakses halaman restore modul', '2024-09-06 02:16:12'),
(1867, 1, 'Mengakses halaman dashboard', '2024-09-06 02:17:26'),
(1868, 1, 'Mengakses halaman manajemen user', '2024-09-06 02:17:27'),
(1869, 1, 'Mengakses halaman restore edit user', '2024-09-06 02:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `backup_fase`
--

CREATE TABLE `backup_fase` (
  `id_fase` int(11) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `nama_fase` text DEFAULT NULL,
  `kegiatan` text DEFAULT NULL,
  `asesmen` text DEFAULT NULL,
  `id_modul` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `isdelete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `backup_kelas`
--

CREATE TABLE `backup_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `isdelete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `backup_modul`
--

CREATE TABLE `backup_modul` (
  `id_modul` int(11) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `bg_tema` text DEFAULT NULL,
  `tema_modul` text DEFAULT NULL,
  `dimensi_modul` text DEFAULT NULL,
  `elemen_modul` text DEFAULT NULL,
  `subelemen_modul` text DEFAULT NULL,
  `capakhir_modul` text DEFAULT NULL,
  `tujuan` text DEFAULT NULL,
  `asesmen_slrh` text DEFAULT NULL,
  `tips_pelaksana` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `isdelete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `backup_user`
--

CREATE TABLE `backup_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `isdelete` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `editmodul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fase`
--

CREATE TABLE `fase` (
  `id_fase` int(11) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `nama_fase` text DEFAULT NULL,
  `kegiatan` text DEFAULT NULL,
  `asesmen` text DEFAULT NULL,
  `id_modul` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `isdelete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fase`
--

INSERT INTO `fase` (`id_fase`, `id_kelas`, `nama_fase`, `kegiatan`, `asesmen`, `id_modul`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `isdelete`) VALUES
(100, 1, '1: Pengenalan', '1. Menyanyikan lagu Indonesia Raya.\r\n2. menonton video tentang sejarah bendera merah putih.\r\n3. mendengarkan cerita tentang pahlawan yang berjuang untuk merah putih.', '1. Observasi: Perhatikan antusiasime anak saat menyanyi dan mendengarkan cerita.\r\n2. Wawancara: Tanyakan pada anak apa yang mereka ketahui tentang bendara merah putih.\r\n', 26, '2024-09-06 08:16:52', '2024-09-06 09:12:07', '2024-09-06 09:14:36', 1, 1, 1, 1),
(101, 1, '2: Eksplorasi', '1. Mengambarkan bendera merah putih.\r\n2. Membuat kolase gambar bertema bendera.\r\n3. Bermain peran menjadi petugas upacara bendera.', '1. Produk: Amati hasil gambar dan kolase anak.\r\n2. Perfomansi: Perhatikan kemampuan anak dalam memerankan petugas upacara.', 26, '2024-09-06 08:16:52', '2024-09-06 09:12:07', '2024-09-06 09:14:36', 1, 1, 1, 1),
(102, 1, '3: Elaborasi', '1. Membuat kerajinan tangan bertema bendera.\r\n2. Membuat pertunjukkan seni tentang bendera.', '1. Produk: Amati hasil karya kerajinan tengan dan pertunjukan seni.\r\n2. Proses: Perhatikan kemampuan anak dalam bekerja sama dan menyelesaikan tugas.', 26, '2024-09-06 08:16:52', '2024-09-06 09:12:07', '2024-09-06 09:14:36', 1, 1, 1, 1),
(103, 1, '4: Konfirmasi', '1. Pameran hasil karya anak.\r\n2. Diskusi tentang pentingnya bendera merah putih.', '1. Presentasi: Perhatikan kemampuan anaka dalam menjelaskan karya mereka.\r\n2. Refleksi: Tanyakan pada anak apa yang mereka pelajari dari projek ini.', 26, '2024-09-06 08:16:52', '2024-09-06 09:12:07', '2024-09-06 09:14:36', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `isdelete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `isdelete`) VALUES
(1, 'RPL XII A', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, 'RPL XII B', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, 'AKL XII', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(13, 'BDP XI', '2024-09-06 08:20:17', '2024-09-06 09:06:45', '2024-09-06 09:06:51', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id_modul` int(11) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `bg_tema` text DEFAULT NULL,
  `tema_modul` text DEFAULT NULL,
  `dimensi_modul` text DEFAULT NULL,
  `elemen_modul` text DEFAULT NULL,
  `subelemen_modul` text DEFAULT NULL,
  `capakhir_modul` text DEFAULT NULL,
  `tujuan` text DEFAULT NULL,
  `asesmen_slrh` text DEFAULT NULL,
  `tips_pelaksana` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `isdelete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `id_kelas`, `bg_tema`, `tema_modul`, `dimensi_modul`, `elemen_modul`, `subelemen_modul`, `capakhir_modul`, `tujuan`, `asesmen_slrh`, `tips_pelaksana`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `isdelete`) VALUES
(26, 1, 'bendera.jpg', 'Merah Putih Bendera Negarakuu', '1. Beriman, Bertakwa kepada Tuhan YME, dan Berakhlak Mulia.\r\n2. Berkebhinekaan Global.\r\n3. Bergotong Royong.\r\n4. Mandiri.\r\n5. Bernalar Kritis.\r\n', '1. Berakhlak Mulia.\r\n2. Memahami keberagaman.\r\n3. Kolaborasi.\r\n4. Bertanggung jawab.\r\n5. Berpikir kreatif.', '1. Menghargai simbol simbol negara.\r\n2. Mengenali simbol simbol nasional.\r\n3. Bekerja sama dalam kelompok.\r\n4. Menyelesaikan tugas secara mandiri.\r\n5. Membuat karya seni yang unik.', '1. Siswa mampu menunjukkan rasa hormat dan bangga terhadap bendera merah putih sebagai simbol negara.\r\n2. Siswa mampu menjelaskan arti warna dan makna merah putih.\r\n3. Siswa mampu bekerja sama dengan teman dalam membuat karya seni bertema bendera.\r\n4. Siswa mampu membuat gambar bendera merah putih secara mandiri.\r\n5. Siswa mampu membuat karya seni yang orisinal dengan tema bendera.\r\n', 'Membentuk rasa cinta tanah air dan kebanggan terhadap negara indonesia melalui pengenalan bendera merah putih.', '1. Portofolio: Kumpulkan semua hasill karya anak selama projek berlangsung.\r\n2. Rubrik: Gunakan rubrik untuk menilai setiap aspek capaian pembelajaran.\r\n3. Observasi: Catat perilaku dan perkembangan anak selama proses pembelajaran.\r\n4. Wawancara: Lakukan wawancara.', '1. Ajak orang tua: Libatkan orang tua dalam kegiatan projek untuk memperkuat pemahaman anak di rumah.\r\n2. Gunakan media yang menarik: Gunakan gambar, video, dan lagu yang sesuai dengan usia anak\r\n3. Berikan kesempatan bereksplorasi: Biarkan anak bebas bereksplorasi dan mengembangkan kreativitasnya.', '2024-09-06 08:16:52', '2024-09-06 09:12:07', '2024-09-06 09:14:36', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL,
  `nama_setting` varchar(50) DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `alamat` varchar(225) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `nama_setting`, `logo`, `alamat`, `nohp`, `updated_by`, `updated_at`) VALUES
(1, 'MODUL P5 SPH', 'sph_logo-removebg-preview.png', 'Komp.Batu Batam Mas, Jl. Gajah Mada Blok D & E No.1,2,3, Baloi Indah, Kec. Lubuk Baja, Kota Batam, K', '(0778) 431318', 1, '2024-09-06 08:20:53');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `id_kelas` int(11) NOT NULL,
  `foto` text DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `isdelete` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `editmodul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `password`, `level`, `id_kelas`, `foto`, `nis`, `nisn`, `isdelete`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `editmodul`) VALUES
(1, 'Admin', 'c4ca4238a0b923820dcc509a6f75849b', 1, 0, 'default.jpg', NULL, NULL, 0, NULL, '2024-09-06 08:14:34', NULL, NULL, 1, NULL, 1),
(24, 'Kepala Sekolah', 'c4ca4238a0b923820dcc509a6f75849b', 2, 0, 'default.jpg', '22161002', '221610021002', 0, '2024-09-04 04:49:10', '2024-09-05 07:30:47', NULL, 1, 1, NULL, 0),
(26, 'Wakil Kepala Sekolah', 'c4ca4238a0b923820dcc509a6f75849b', 3, 0, 'default.jpg', '22161003', '221610031003', 0, '2024-09-05 07:31:49', NULL, NULL, 1, NULL, NULL, 0),
(27, 'Siswa', 'c4ca4238a0b923820dcc509a6f75849b', 5, 1, 'default.jpg', '22161004', '221610041004', 0, '2024-09-05 07:32:38', NULL, NULL, 1, NULL, NULL, 0),
(30, 'Guru', 'c4ca4238a0b923820dcc509a6f75849b', 4, 0, 'default.jpg', '22161001', '221610011001', 0, '2024-09-06 08:18:40', '2024-09-06 09:08:40', NULL, 1, 1, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backup_fase`
--
ALTER TABLE `backup_fase`
  ADD PRIMARY KEY (`id_fase`);

--
-- Indexes for table `backup_kelas`
--
ALTER TABLE `backup_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `backup_modul`
--
ALTER TABLE `backup_modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `backup_user`
--
ALTER TABLE `backup_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `fase`
--
ALTER TABLE `fase`
  ADD PRIMARY KEY (`id_fase`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1870;

--
-- AUTO_INCREMENT for table `backup_fase`
--
ALTER TABLE `backup_fase`
  MODIFY `id_fase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `backup_kelas`
--
ALTER TABLE `backup_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `backup_modul`
--
ALTER TABLE `backup_modul`
  MODIFY `id_modul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `backup_user`
--
ALTER TABLE `backup_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `fase`
--
ALTER TABLE `fase`
  MODIFY `id_fase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

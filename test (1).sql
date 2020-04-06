-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 06 Nis 2020, 11:16:02
-- Sunucu sürümü: 10.4.10-MariaDB
-- PHP Sürümü: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `test`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_admin`
--

DROP TABLE IF EXISTS `site_admin`;
CREATE TABLE IF NOT EXISTS `site_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_isim` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `admin_mail` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `admin_sifre` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `admin_rutbe` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `admin_foto` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_admin`
--

INSERT INTO `site_admin` (`admin_id`, `admin_isim`, `admin_mail`, `admin_sifre`, `admin_rutbe`, `admin_foto`) VALUES
(1, 'Umut Can Arda', 'umutkonurinso@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'Yazılım ve Teknik Ekip Lİderi', 'https://avatars3.githubusercontent.com/u/47474804?s=460&v=4');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_ayar`
--

DROP TABLE IF EXISTS `site_ayar`;
CREATE TABLE IF NOT EXISTS `site_ayar` (
  `klavuz` int(10) NOT NULL AUTO_INCREMENT,
  `ayar_id` int(11) NOT NULL,
  `ayar_logo` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_favicon` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_title` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_description` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_keywords` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_author` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_tel` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_gsm` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_fax` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_mail` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_ilce` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_il` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_adres` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_mesai` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_maps` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_analystic` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_zoppim` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_facebook` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_twitter` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_google` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_youtube` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_discord` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtphost` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtppassword` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtpport` int(250) NOT NULL,
  `ayar_bakim` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1',
  `site_anasunucuip` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `site_anasunucupassword` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_parabirimi` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`klavuz`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_ayar`
--

INSERT INTO `site_ayar` (`klavuz`, `ayar_id`, `ayar_logo`, `ayar_favicon`, `ayar_title`, `ayar_description`, `ayar_keywords`, `ayar_author`, `ayar_tel`, `ayar_gsm`, `ayar_fax`, `ayar_mail`, `ayar_ilce`, `ayar_il`, `ayar_adres`, `ayar_mesai`, `ayar_maps`, `ayar_analystic`, `ayar_zoppim`, `ayar_facebook`, `ayar_twitter`, `ayar_google`, `ayar_youtube`, `ayar_discord`, `ayar_smtphost`, `ayar_smtppassword`, `ayar_smtpport`, `ayar_bakim`, `site_anasunucuip`, `site_anasunucupassword`, `ayar_parabirimi`) VALUES
(1, 1, 'dimg/28825logo.png', 'assets/images/logo.png', 'Bolfps | Minecraft Web Site Script Hizmetleri', 'Bolfps 2 yıldır geliştirilen ve sunucu sahiplerinin sunucu yönetimini kolaylaştıran Minecraft Web Site scriptidir.', 'minecraft,yazilim', 'Umut Can Arda', '05307993607', '05307993607', '05307993607', 'umutkonurinso@gmail.com', 'Yalovad', 'Çiftlikköy', 'Sahil Mah. İnönü Cad.', '7/24', 'google maps', 'google analystic', 'zoppim', 'flysquaree', 'fly.square0', 'umutkonurinso', 'InsomaniaTR', 'Umut Can Arda#7080', 'localhost9', 'password', 80, '1', 'mc.mineclaks.net', 'acumk6001', 'TL');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_depo`
--

DROP TABLE IF EXISTS `site_depo`;
CREATE TABLE IF NOT EXISTS `site_depo` (
  `depo_id` int(11) NOT NULL AUTO_INCREMENT,
  `depo_urunbaslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `depo_userid` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `depo_zaman` timestamp NOT NULL DEFAULT current_timestamp(),
  `depo_sunucuid` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`depo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_depo`
--

INSERT INTO `site_depo` (`depo_id`, `depo_urunbaslik`, `depo_userid`, `depo_zaman`, `depo_sunucuid`) VALUES
(73, 'ürün1das', '6', '2020-03-23 09:45:56', '3'),
(74, 'ürün1das', '6', '2020-03-23 09:47:20', '3'),
(75, 'Mİnecraft PS4', '6', '2020-03-23 09:48:03', '3'),
(88, 'aaaaaaaaaaaaaaaaa', '19', '2020-03-29 14:46:53', '8'),
(107, 'aaaaaaaaaaaaaaaaa', '25', '2020-03-30 13:28:42', '8'),
(93, 'aaaaaaaaaaaaaaaaa', '19', '2020-03-29 15:29:19', '8'),
(89, 'aaaaaaaaaaaaaaaaa', '19', '2020-03-29 14:51:15', '8'),
(91, 'aaaaaaaaaaaaaaaaa', '19', '2020-03-29 15:25:32', '8'),
(92, 'aaaaaaaaaaaaaaaaa', '19', '2020-03-29 15:28:39', '8'),
(94, 'aaaaaaaaaaaaaaaaa', '19', '2020-03-29 16:04:19', '8'),
(95, 'aaaaaaaaaaaaaaaaa', '19', '2020-03-29 16:04:23', '8'),
(96, 'aaaaaaaaaaaaaaaaa', '19', '2020-03-29 16:09:56', '8'),
(97, 'aaaaaaaaaaaaaaaaa', '19', '2020-03-29 16:10:04', '8'),
(98, 'aaaaaaaaaaaaaaaaa', '19', '2020-03-29 16:10:42', '8'),
(99, 'aaaaaaaaaaaaaaaaa', '19', '2020-03-29 16:12:47', '8'),
(100, 'aaaaaaaaaaaaaaaaa', '19', '2020-03-29 16:12:56', '8'),
(101, 'aaaaaaaaaaaaaaaaa', '19', '2020-03-29 16:28:21', '8'),
(102, 'aaaaaaaaaaaaaaaaa', '19', '2020-03-29 16:32:39', '8');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_destek`
--

DROP TABLE IF EXISTS `site_destek`;
CREATE TABLE IF NOT EXISTS `site_destek` (
  `destek_id` int(11) NOT NULL AUTO_INCREMENT,
  `destek_adsoyad` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `destek_email` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `destek_icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `destek_tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`destek_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_destek`
--

INSERT INTO `site_destek` (`destek_id`, `destek_adsoyad`, `destek_email`, `destek_icerik`, `destek_tarih`) VALUES
(4, 'umtu can arda', 'umutkonurinso@gmail.com', 'acumklkmafmalsişfö', '2020-03-15 19:56:40');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_eft`
--

DROP TABLE IF EXISTS `site_eft`;
CREATE TABLE IF NOT EXISTS `site_eft` (
  `eft_id` int(11) NOT NULL AUTO_INCREMENT,
  `eft_bankaadi` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `eft_ibanno` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `eft_hesapsahip` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `eft_subeno` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `eft_tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `eft_durum` int(250) NOT NULL,
  PRIMARY KEY (`eft_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_eft`
--

INSERT INTO `site_eft` (`eft_id`, `eft_bankaadi`, `eft_ibanno`, `eft_hesapsahip`, `eft_subeno`, `eft_tarih`, `eft_durum`) VALUES
(3, 'Akbankdf', 'TR64 0004 6002 3288 8000 2578 24', 'Umut Can Arda', 'Yalova', '2020-03-15 11:49:22', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_haber`
--

DROP TABLE IF EXISTS `site_haber`;
CREATE TABLE IF NOT EXISTS `site_haber` (
  `haber_id` int(11) NOT NULL AUTO_INCREMENT,
  `haber_baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `haber_foto` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `haber_icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `haber_kategori` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `haber_tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `haber_sahip` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`haber_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_haber`
--

INSERT INTO `site_haber` (`haber_id`, `haber_baslik`, `haber_foto`, `haber_icerik`, `haber_kategori`, `haber_tarih`, `haber_sahip`) VALUES
(11, 'Vip satışı başladı', 'https://www.ecopetit.cat/wpic/mpic/59-591513_minecraft-video-games-pixels-wallpapers-hd-desktop-minecraft.jpg', '<p>ASADASDASD</p>\r\n', 'VIP', '2020-03-30 11:41:31', 'Umut Can Arda'),
(12, 'VİP SATIŞI SON HIZLA DEVAM EDİYOR', 'https://edge.alluremedia.com.au/m/k/2013/09/Minecraft-Desktop-HD.jpg', '<p>ASDASDSAD</p>\r\n', 'VIP', '2020-03-30 11:41:52', 'Umut Can Arda'),
(13, 'umut can arda', 'https://ezibilisim.com/wp-content/uploads/2017/06/pdo-ile-veri-%C3%A7ekme.jpg', '<p>asfasfasf</p>\r\n', 'haberler', '2020-03-30 12:18:47', 'Umut Can Arda'),
(7, 'Lorem ipsum dolor sit amet', 'https://www.ecopetit.cat/wpic/mpic/59-591513_minecraft-video-games-pixels-wallpapers-hd-desktop-minecraft.jpg', '<p>Lorem ipsum&nbsp;<strong>dolor sit amet</strong>, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Massa tincidunt dui ut ornare lectus.&nbsp;Consequat nisl vel pretium&nbsp;lectus quam. Sed blandit libero volutpat sed. Etiam dignissim diam quis enim lobortis. Volutpat odio facilisis mauris sit. Enim facilisis gravida neque convallis. At tellus at urna condimentum. Tellus molestie nunc non blandit massa. Diam vel quam elementum pulvinar etiam non quam lacus. Felis eget nunc lobortis mattis aliquam. Turpis egestas sed tempus urna. Nulla pharetra diam sit amet nisl. Nam aliquam sem et tortor consequat id porta nibh. Lacus vestibulum sed arcu non odio. Orci dapibus ultrices in iaculis nunc. Lectus vestibulum mattis ullamcorper velit sed ullamcorper.</p>\r\n\r\n<p>Commodo ullamcorper a lacus vestibulum sed. Nam at lectus urna duis convallis. In egestas erat imperdiet sed euismod nisi porta. Faucibus in ornare quam viverra orci sagittis. Congue eu consequat ac felis donec. Aliquam eleifend mi in nulla posuere. At tempor commodo ullamcorper a lacus vestibulum. Faucibus scelerisque eleifend donec pretium vulputate sapien nec sagittis. Id semper risus in hendrerit gravida rutrum quisque. Gravida quis blandit turpis cursus in hac habitasse platea. Consequat semper viverra nam libero justo laoreet sit amet cursus. Turpis massa tincidunt dui ut.</p>\r\n\r\n<p>A pellentesque sit amet porttitor eget dolor morbi. Vel orci porta non pulvinar neque laoreet suspendisse interdum consectetur. Pulvinar pellentesque habitant morbi tristique senectus. Et pharetra pharetra massa massa ultricies. Dictum at tempor commodo ullamcorper a lacus vestibulum sed. Morbi tristique senectus et netus. Posuere ac ut consequat semper. Porta lorem mollis aliquam ut. Faucibus purus in massa tempor nec. Malesuada pellentesque elit eget gravida cum. Massa sapien faucibus et molestie ac feugiat. Donec ac odio tempor orci dapibus ultrices in iaculis. Eget arcu dictum varius duis at consectetur. Viverra accumsan in nisl nisi scelerisque eu ultrices vitae. At auctor urna nunc id cursus metus aliquam eleifend mi. Quis auctor elit sed vulputate mi sit amet mauris.</p>\r\n', 'Güncelleme', '2020-03-23 11:45:21', 'Umut Can Ardad');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_haberkategori`
--

DROP TABLE IF EXISTS `site_haberkategori`;
CREATE TABLE IF NOT EXISTS `site_haberkategori` (
  `haberkategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `haberkategori_isim` varchar(250) NOT NULL,
  `haberkategori_icon` varchar(250) NOT NULL,
  `haberkategori_link` varchar(250) NOT NULL,
  PRIMARY KEY (`haberkategori_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `site_haberkategori`
--

INSERT INTO `site_haberkategori` (`haberkategori_id`, `haberkategori_isim`, `haberkategori_icon`, `haberkategori_link`) VALUES
(1, 'Güncellemeler', '', 'guncellemeler'),
(2, 'Haberler', '', 'haberler');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_hakkimizda`
--

DROP TABLE IF EXISTS `site_hakkimizda`;
CREATE TABLE IF NOT EXISTS `site_hakkimizda` (
  `hakkimizda_id` int(11) NOT NULL,
  `hakkimizda_baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_icerik` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_hakkimizda`
--

INSERT INTO `site_hakkimizda` (`hakkimizda_id`, `hakkimizda_baslik`, `hakkimizda_icerik`) VALUES
(1, 'Hakkımızda', 'Bolfps güçlü kadrosu ve yenilikçi vizyonu ile öncelikle Minecraft olmak üzere bir çok oyun üzerinde ve yan dallarında yazılım desteği sağlar. 2017 yılında OtuzFps olarak yola çıkan ekibimiz zamanla değişikliğe giderek Bolfps değişikliğine gitmiş ve yeni bir başlangıç yapmıştır.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_hediyekod`
--

DROP TABLE IF EXISTS `site_hediyekod`;
CREATE TABLE IF NOT EXISTS `site_hediyekod` (
  `hediyekod_id` int(11) NOT NULL AUTO_INCREMENT,
  `hediyekod_kod` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `hediyekod_zaman` timestamp NOT NULL DEFAULT current_timestamp(),
  `hediyekod_hediyemiktar` int(250) NOT NULL,
  `hediyekod_durum` int(250) NOT NULL,
  `hediyekod_tur` int(11) NOT NULL,
  PRIMARY KEY (`hediyekod_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_hediyekod`
--

INSERT INTO `site_hediyekod` (`hediyekod_id`, `hediyekod_kod`, `hediyekod_zaman`, `hediyekod_hediyemiktar`, `hediyekod_durum`, `hediyekod_tur`) VALUES
(4, 'acumk', '2020-03-23 16:35:42', 1000, 0, 1),
(8, 'urun', '2020-03-27 10:10:19', 11, 1, 2),
(9, '0530', '2020-03-27 10:16:29', 203, 0, 1),
(10, 'acumk6001', '2020-03-27 10:17:29', 13, 0, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_icerik`
--

DROP TABLE IF EXISTS `site_icerik`;
CREATE TABLE IF NOT EXISTS `site_icerik` (
  `klavuz` int(10) NOT NULL AUTO_INCREMENT,
  `icerik_id` int(11) NOT NULL,
  `tanitim_baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `tanitim_aciklama` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `tanitim_butonyazi` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `tanitim_butonlink` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `tanitim_resim` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ozellik_aciklama` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ozellik_baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ozellik_1baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ozellik_1aciklama` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ozellik_2baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ozellik_2aciklama` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ozellik_3baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ozellik_3aciklama` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ozellik_4baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ozellik_4aciklama` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ozellik_5baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ozellik_5aciklama` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ozellik_6baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ozellik_6aciklama` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `arama_icerik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `arama_baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `arama_hint` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `musteriyorum_icerik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `musteriyorum_isim` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `musteriyorum_rutbe` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `musteriyorum_foto` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `gosterim_baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `gosterim_icerik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `gosterim_butonyazi` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `gosterim_butonlink` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`klavuz`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_icerik`
--

INSERT INTO `site_icerik` (`klavuz`, `icerik_id`, `tanitim_baslik`, `tanitim_aciklama`, `tanitim_butonyazi`, `tanitim_butonlink`, `tanitim_resim`, `ozellik_aciklama`, `ozellik_baslik`, `ozellik_1baslik`, `ozellik_1aciklama`, `ozellik_2baslik`, `ozellik_2aciklama`, `ozellik_3baslik`, `ozellik_3aciklama`, `ozellik_4baslik`, `ozellik_4aciklama`, `ozellik_5baslik`, `ozellik_5aciklama`, `ozellik_6baslik`, `ozellik_6aciklama`, `arama_icerik`, `arama_baslik`, `arama_hint`, `musteriyorum_icerik`, `musteriyorum_isim`, `musteriyorum_rutbe`, `musteriyorum_foto`, `gosterim_baslik`, `gosterim_icerik`, `gosterim_butonyazi`, `gosterim_butonlink`) VALUES
(1, 1, 'Minecraft Web Site Scripti', 'Gelişmiş özellikleri ve bütçeye uygun paket seçeneğine sahip Minecraft Web Site Scripti bir tık yakınınızda!\r\n\r\n', 'Tanıtım Videosu', '/', 'http://localhost/bolfps/ithost/img/rocket.png', 'Sunucunuza ait iş yükünü hafifletmek ve işlemleri otomatikleştirmek bizden, kolaylığa alışmak sizden.', 'En İyisi Olmak İçin En İyisini Kullan!\r\n', 'Güçlü Sistem\r\n', 'Script, Bootstrap 4 ve JQuery altyapısı ile güçlendirilmiş ve PDO ile veritabanı güvenliği sağlanmıştır.\r\n\r\n', 'Canlı Demo\r\n', 'Sizler için hiçbir sınırlamanın olmadığı demo sayfasını oluşturduk. Ürünümüzü canlı olarak demo sayfasında test edebilirsiniz.\r\n\r\n', 'Tema Düzenleme\r\n', 'Lite ve Pro paket ile temanızı düzenleyip size özel temaları oluşturabilir ve rakiplerinize karşı farkınızı ortaya koyabilirsiniz.\r\n\r\n', 'Tek Tıkla Kurulum\r\n', 'Kurulum ekranında veritabanı bilgileri, site bilgileri ve yönetici hesabı girildikten sonra siteniz otomatik kurulur.\r\n\r\n', 'Ucuz Fiyat\r\n', 'Kişinin bütçesine göre paketler bulunmaktadır. Size uygun paketi alıp sitenizi hızlı bir şekilde kurabilirsiniz.\r\n\r\n', 'Güncelleme Sistemi\r\n', 'Yeni gelen güncellemelerden Yönetim Panelinize gelen bildirim sayesinde haberdar olabilirsin ve tık bir tık ile otomatik güncellemeyi başlatabilirsin.\r\n\r\n', 'arama içerik', 'orama kutusu başlık', 'arama kutusu hinti', 'Piyasadaki en güçlü sistem olan LeaderOS ile iş ortağı olduk. Birlikte çalışarak tecrübelerimizi harmanladık ve ortaya harika bir sistem çıktı. Biz Batihost olarak müşterilerimize LeaderOS v5\'i öneriyoruz.', 'Erkan Babadağı', 'Batihost', 'https://a.wattpad.com/cover/182284634-288-k319782.jpg', 'Oyunun kurallarını değiştirme vakti geldi!\r\n', 'Artık kozlar senin elinde! Tek bir tık ile rakiplerine karşı üstün olmaya hazır mısın?\r\n\r\n', 'Hemen Satın Al', '/');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_ininal`
--

DROP TABLE IF EXISTS `site_ininal`;
CREATE TABLE IF NOT EXISTS `site_ininal` (
  `ininal_id` int(11) NOT NULL AUTO_INCREMENT,
  `ininal_barkodno` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ininal_tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `ininal_durum` int(250) NOT NULL,
  PRIMARY KEY (`ininal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_ininal`
--

INSERT INTO `site_ininal` (`ininal_id`, `ininal_barkodno`, `ininal_tarih`, `ininal_durum`) VALUES
(6, 'fff', '2020-03-24 23:10:01', 1),
(5, '5555555555555555', '2020-03-15 10:40:09', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_kategorikart`
--

DROP TABLE IF EXISTS `site_kategorikart`;
CREATE TABLE IF NOT EXISTS `site_kategorikart` (
  `kategorikart_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategorikart_icon` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kategorikart_baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kategorikart_altbaslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kategorikart_link` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`kategorikart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_kategorikart`
--

INSERT INTO `site_kategorikart` (`kategorikart_id`, `kategorikart_icon`, `kategorikart_baslik`, `kategorikart_altbaslik`, `kategorikart_link`) VALUES
(1, 'fa fa-twitch', 'Twitch', 'Hala yayınlarda yoksun', 'http://ghostmc.com'),
(2, 'fa fa-twitch', 'Twitch', 'Hala yayınlarda yoksun', 'http://ghostmc.com'),
(3, 'fa fa-twitch', 'Twitch', 'Hala yayınlarda yoksun', 'http://ghostmc.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_krediaktar`
--

DROP TABLE IF EXISTS `site_krediaktar`;
CREATE TABLE IF NOT EXISTS `site_krediaktar` (
  `krediaktar_id` int(11) NOT NULL AUTO_INCREMENT,
  `krediaktar_usersid` int(250) NOT NULL,
  `krediaktar_miktar` int(250) NOT NULL,
  `krediaktar_aciklama` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `krediaktar_gonderenid` int(11) NOT NULL,
  `krediaktar_tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`krediaktar_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_krediaktar`
--

INSERT INTO `site_krediaktar` (`krediaktar_id`, `krediaktar_usersid`, `krediaktar_miktar`, `krediaktar_aciklama`, `krediaktar_gonderenid`, `krediaktar_tarih`) VALUES
(1, 4, 12, 'fas', 6, '2020-03-04 10:04:08'),
(2, 4, 50, 'asd', 6, '2020-03-04 10:07:43'),
(3, 4, 100, 'asfasf', 6, '2020-03-04 10:09:56'),
(4, 4, 20, 'fas', 6, '2020-03-04 10:11:55'),
(5, 4, 50, 'asd', 6, '2020-03-04 10:31:27'),
(6, 4, 1, 'fas', 6, '2020-03-04 10:31:58'),
(7, 4, 10, 'asd', 6, '2020-03-04 10:34:22'),
(8, 4, 19, 'asdasd', 6, '2020-03-04 10:34:49'),
(9, 4, 10, 'asd', 6, '2020-03-04 10:34:59'),
(10, 4, 50, 'asd', 6, '2020-03-04 10:37:20'),
(11, 4, 50, 'HEdiye', 6, '2020-03-04 11:35:16'),
(12, 4, 800, 'yaramı ye', 6, '2020-03-05 12:31:47'),
(13, 4, 1000, 'asdasd', 6, '2020-03-15 15:42:07'),
(14, 4, 12, 'asdasd', 6, '2020-03-15 16:21:27'),
(15, 4, 20, 'asfasf', 6, '2020-03-15 19:19:44');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_kredigecmis`
--

DROP TABLE IF EXISTS `site_kredigecmis`;
CREATE TABLE IF NOT EXISTS `site_kredigecmis` (
  `kredigecmis_id` int(11) NOT NULL AUTO_INCREMENT,
  `kredigecmis_tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `kredigecmis_odeme` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kredigecmis_tur` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kredigecmis_userid` int(250) NOT NULL,
  PRIMARY KEY (`kredigecmis_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_marketgecmis`
--

DROP TABLE IF EXISTS `site_marketgecmis`;
CREATE TABLE IF NOT EXISTS `site_marketgecmis` (
  `marketgecmis_id` int(11) NOT NULL AUTO_INCREMENT,
  `marketgecmis_urunbaslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `marketgecmis_tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `marketgecmis_userid` int(250) NOT NULL,
  `marketgecmis_kategori` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `marketgecmis_fiyat` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`marketgecmis_id`)
) ENGINE=MyISAM AUTO_INCREMENT=195 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_marketgecmis`
--

INSERT INTO `site_marketgecmis` (`marketgecmis_id`, `marketgecmis_urunbaslik`, `marketgecmis_tarih`, `marketgecmis_userid`, `marketgecmis_kategori`, `marketgecmis_fiyat`) VALUES
(175, 'aaaaaaaaaaaaaaaaa', '2020-03-28 12:38:56', 19, '8', '60'),
(170, 'aaaaaaaaaaaaaaaaa', '2020-03-27 11:49:40', 19, '8', '60'),
(169, 'Minecraft', '2020-03-27 11:49:02', 25, '3', '52'),
(176, 'aaaaaaaaaaaaaaaaa', '2020-03-29 15:04:31', 19, '8', '10'),
(174, 'aaaaaaaaaaaaaaaaa', '2020-03-28 10:51:05', 19, '8', '60'),
(173, 'ffffffffffffffffffff', '2020-03-27 11:52:31', 19, '8', '2'),
(177, 'aaaaaaaaaaaaaaaaa', '2020-03-29 15:25:32', 19, '8', '10'),
(178, 'aaaaaaaaaaaaaaaaa', '2020-03-29 15:28:39', 19, '8', '10'),
(179, 'aaaaaaaaaaaaaaaaa', '2020-03-29 15:29:19', 19, '8', '10'),
(180, 'aaaaaaaaaaaaaaaaa', '2020-03-29 16:04:19', 19, '8', '10'),
(181, 'aaaaaaaaaaaaaaaaa', '2020-03-29 16:04:23', 19, '8', '10'),
(182, 'aaaaaaaaaaaaaaaaa', '2020-03-29 16:09:56', 19, '8', '10'),
(183, 'aaaaaaaaaaaaaaaaa', '2020-03-29 16:10:04', 19, '8', '10'),
(184, 'aaaaaaaaaaaaaaaaa', '2020-03-29 16:10:42', 19, '8', '10'),
(185, 'aaaaaaaaaaaaaaaaa', '2020-03-29 16:12:47', 19, '8', '10'),
(186, 'aaaaaaaaaaaaaaaaa', '2020-03-29 16:12:56', 19, '8', '10'),
(187, 'aaaaaaaaaaaaaaaaa', '2020-03-29 16:28:21', 19, '8', '10'),
(188, 'aaaaaaaaaaaaaaaaa', '2020-03-29 16:32:39', 19, '8', '10'),
(189, 'aaaaaaaaaaaaaaaaa', '2020-03-29 16:33:14', 19, '8', '10'),
(190, 'aaaaaaaaaaaaaaaaa', '2020-03-29 16:43:31', 19, '8', '10'),
(191, 'aaaaaaaaaaaaaaaaa', '2020-03-30 13:27:21', 19, '8', '10'),
(192, 'aaaaaaaaaaaaaaaaa', '2020-03-30 13:28:00', 19, '8', '10'),
(193, 'aaaaaaaaaaaaaaaaa', '2020-03-30 13:28:42', 25, '8', '10'),
(194, 'Minecraft', '2020-04-01 09:06:43', 19, '3', '52');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_menu`
--

DROP TABLE IF EXISTS `site_menu`;
CREATE TABLE IF NOT EXISTS `site_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_icon` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `menu_isim` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `menu_link` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_menu`
--

INSERT INTO `site_menu` (`menu_id`, `menu_icon`, `menu_isim`, `menu_link`) VALUES
(1, 'fas fa-home', 'Anasayfa', '/'),
(2, 'fas fa-shopping-cart', 'Market', 'store-catalog-alt.php'),
(7, 'fas fa-chart-pie', 'Çarkıfelek', 'carkifelek.php'),
(6, 'fas fa-gamepad', 'Oyunlar', 'oyunlar.php'),
(8, 'fas fa-box-open', 'Şans Kutusu', 'sans-kutusu.php');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_satis`
--

DROP TABLE IF EXISTS `site_satis`;
CREATE TABLE IF NOT EXISTS `site_satis` (
  `satis_id` int(11) NOT NULL AUTO_INCREMENT,
  `satis_baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`satis_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_satis`
--

INSERT INTO `site_satis` (`satis_id`, `satis_baslik`) VALUES
(1, 'asdasd');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_slider`
--

DROP TABLE IF EXISTS `site_slider`;
CREATE TABLE IF NOT EXISTS `site_slider` (
  `slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_foto` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `slider_baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `slider_icerik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_slider`
--

INSERT INTO `site_slider` (`slider_id`, `slider_foto`, `slider_baslik`, `slider_icerik`) VALUES
(13, 'dimg/28427168589-Minecraft-render-screenshots-lake.jpg', 'asdasd', 'asdasdasdf'),
(16, 'dimg/25197asd.PNG', 'Lorem Ipsum', 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı'),
(6, 'dimg/26553b41cea694877fb02690ae06385ed7a59.jpg', 'Gereksiz Her şeyi kaldırdık!', 'Göz yoran eski tasarımımızı sildik. Oyuncuların sevdiği koyu bir temaya geçiş yaptık! Gereksiz ıvır zıvırları kaldırdık!');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_sosyalmedya`
--

DROP TABLE IF EXISTS `site_sosyalmedya`;
CREATE TABLE IF NOT EXISTS `site_sosyalmedya` (
  `sosyalmedya_id` int(11) NOT NULL AUTO_INCREMENT,
  `sosyalmedya_icon` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `sosyalmedya_isim` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `sosyalmedya_link` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`sosyalmedya_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_sosyalmedya`
--

INSERT INTO `site_sosyalmedya` (`sosyalmedya_id`, `sosyalmedya_icon`, `sosyalmedya_isim`, `sosyalmedya_link`) VALUES
(1, 'fa fa-twitch', 'twitch', 'https://www.twitch.tv/ksinc'),
(2, 'fab fa-youtube', 'youtube', 'https://www.youtube.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_sunucu`
--

DROP TABLE IF EXISTS `site_sunucu`;
CREATE TABLE IF NOT EXISTS `site_sunucu` (
  `sunucu_id` int(11) NOT NULL AUTO_INCREMENT,
  `sunucu_isim` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `sunucu_ip` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `sunucu_port` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `sunucu_konsolport` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `sunucu_konsolsifre` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`sunucu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_sunucu`
--

INSERT INTO `site_sunucu` (`sunucu_id`, `sunucu_isim`, `sunucu_ip`, `sunucu_port`, `sunucu_konsolport`, `sunucu_konsolsifre`) VALUES
(8, 'BedWars', '104.320.205.82', '25565', '1410', 'asddas'),
(3, 'Umut Sw', 'mc.mineclaks.net', '25565', '1410', 'acumk6001');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_urun`
--

DROP TABLE IF EXISTS `site_urun`;
CREATE TABLE IF NOT EXISTS `site_urun` (
  `urun_id` int(11) NOT NULL AUTO_INCREMENT,
  `urun_baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urun_fiyat` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urun_genelaciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `urun_ozellikler` text COLLATE utf8_turkish_ci NOT NULL,
  `urun_kategori` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urun_foto` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urun_stok` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urun_etiket` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urun_tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `urun_komut` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urun_komut2` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`urun_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_urun`
--

INSERT INTO `site_urun` (`urun_id`, `urun_baslik`, `urun_fiyat`, `urun_genelaciklama`, `urun_ozellikler`, `urun_kategori`, `urun_foto`, `urun_stok`, `urun_etiket`, `urun_tarih`, `urun_komut`, `urun_komut2`) VALUES
(12, 'aaaaaaaaaaaaaaaaa', '10', '<p>aaaaaaaa</p>\r\n', '<p>aaaaaaaaaaaaaaaaa</p>\r\n', '8', 'https://productimages.hepsiburada.net/s/33/431/10425592938546.jpg', 'ssssssssssss', 'sssssssssss', '2020-03-27 10:16:56', 'aaa', 'aaaaaaaaaaaaaa'),
(13, 'ffffffffffffffffffff', '2', '<p>fffff</p>\r\n', '<p>ffffffffffffffffffffffffffffff</p>\r\n', '8', 'dimg/270697YGDlM8L_400x400.jpg', 'fffffffffffffffffffffffffffff', 'ffffffffff', '2020-03-27 10:17:13', 'fffffffffffffffffffffffffffffffff', 'ffffffffffffff'),
(11, 'Minecraft', '52', '<p>asdasdasd</p>\r\n', '<p>asdasd</p>\r\n', '3', 'https://productimages.hepsiburada.net/s/33/431/10425592938546.jpg', 'mc-04559', 'vip', '2020-03-24 22:32:54', 'give $user diamond 1', 'cobblestone 5');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_user`
--

DROP TABLE IF EXISTS `site_user`;
CREATE TABLE IF NOT EXISTS `site_user` (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_ad` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `user_eposta` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `user_sifre` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `user_username` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `user_yas` int(250) NOT NULL DEFAULT 14,
  `user_discord` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `user_kredi` int(250) NOT NULL DEFAULT 0,
  `user_tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_yetki` int(250) NOT NULL DEFAULT 1,
  PRIMARY KEY (`users_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_user`
--

INSERT INTO `site_user` (`users_id`, `user_ad`, `user_eposta`, `user_sifre`, `user_username`, `user_yas`, `user_discord`, `user_kredi`, `user_tarih`, `user_yetki`) VALUES
(23, 'fgggggg', 'ggggggggggg', 'fdc68ea4cf2763996cf215451b291c63', 'ggggggggggggggggg', 0, '0', 0, '2020-03-26 08:45:05', 1),
(24, 'fsa', 'fsa', '3c518eeb674c71b30297f072fde7eba5', 'asd', 0, '0', 0, '2020-03-26 13:02:02', 1),
(22, 'ffffff', 'ffffffffffffffffff', '5da0aebaeea0108d794303443b2490f7', 'fffffffffffffff', 0, '0', 0, '2020-03-26 08:43:25', 1),
(21, 'aysel arda', 'asdasdas', '8277e0910d750195b448797616e091ad', 'dasdasd', 0, '0', 0, '2020-03-26 08:38:26', 1),
(20, 'asd', 'asd', '0d43fefdde03fc1d207c35ca6bc0ae6b', 'rootasd', 0, '0', 0, '2020-03-26 08:37:33', 1),
(25, 'Serhat Can Yalçın', 'serhat@sero.comasfasf', '0cc175b9c0f1b6a831c399e269772661', 'AluzeTheKing', 12, 'asd', 1966, '2020-03-27 09:29:30', 1),
(19, 'Umut Can Arda', 'umutkonurinso@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'FlySquare', 18, 'Umut Can Arda#7080', 134, '2020-03-25 21:43:03', 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_userkod`
--

DROP TABLE IF EXISTS `site_userkod`;
CREATE TABLE IF NOT EXISTS `site_userkod` (
  `userkod_id` int(11) NOT NULL AUTO_INCREMENT,
  `userkod_kod` varchar(250) NOT NULL,
  `userkod_adet` varchar(250) NOT NULL,
  `userkod_zaman` timestamp NOT NULL DEFAULT current_timestamp(),
  `userkod_sahip` varchar(250) NOT NULL,
  `userkod_urun` varchar(250) NOT NULL,
  PRIMARY KEY (`userkod_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `site_userkod`
--

INSERT INTO `site_userkod` (`userkod_id`, `userkod_kod`, `userkod_adet`, `userkod_zaman`, `userkod_sahip`, `userkod_urun`) VALUES
(1, 'asd', '0', '2020-03-29 12:08:54', '', '12');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_userkodkullanan`
--

DROP TABLE IF EXISTS `site_userkodkullanan`;
CREATE TABLE IF NOT EXISTS `site_userkodkullanan` (
  `userkodkullanan_id` int(11) NOT NULL AUTO_INCREMENT,
  `userkodkullanan_user` varchar(250) NOT NULL,
  `userkodkullanan_zaman` timestamp NOT NULL DEFAULT current_timestamp(),
  `userkodkullanan_kod` varchar(250) NOT NULL,
  PRIMARY KEY (`userkodkullanan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `site_userkodkullanan`
--

INSERT INTO `site_userkodkullanan` (`userkodkullanan_id`, `userkodkullanan_user`, `userkodkullanan_zaman`, `userkodkullanan_kod`) VALUES
(17, 'AluzeTheKing', '2020-03-30 13:28:42', 'flysukru'),
(16, 'FlySquare', '2020-03-29 16:43:31', 'u'),
(15, 'FlySquare', '2020-03-29 16:33:14', 'asd');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_yorum`
--

DROP TABLE IF EXISTS `site_yorum`;
CREATE TABLE IF NOT EXISTS `site_yorum` (
  `yorum_id` int(11) NOT NULL AUTO_INCREMENT,
  `yorum_username` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `yorum_icerik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `yorum_durum` int(250) NOT NULL DEFAULT 0,
  `yorum_blogid` int(250) NOT NULL,
  `yorum_zaman` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`yorum_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_yorum`
--

INSERT INTO `site_yorum` (`yorum_id`, `yorum_username`, `yorum_icerik`, `yorum_durum`, `yorum_blogid`, `yorum_zaman`) VALUES
(10, 'FlySquare', 'aısfhnşasfml', 1, 13, '2020-03-30 13:30:36'),
(11, 'AluzeTheKing', 'çok iyi bi haber', 1, 13, '2020-03-30 13:31:09'),
(8, 'FlySquare', 'Merhaba siteniz çok başarılı olmuş tebrik ederim', 1, 7, '2020-03-28 09:49:26');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

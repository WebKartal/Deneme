-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 20 May 2017, 12:36:38
-- Sunucu sürümü: 5.6.15-log
-- PHP Sürümü: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `gorevler`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tum_gorevler`
--

CREATE TABLE IF NOT EXISTS `tum_gorevler` (
  `grv_id` int(10) NOT NULL AUTO_INCREMENT,
  `grv_baslik` varchar(400) NOT NULL,
  `grv_icerik` text NOT NULL,
  `grv_icerik_yonetici` text NOT NULL,
  `grv_baslama_tarih` datetime NOT NULL,
  `grv_bitis_tarih` datetime NOT NULL,
  `grv_onemi` varchar(30) NOT NULL,
  `grv_sonuc` varchar(30) NOT NULL,
  PRIMARY KEY (`grv_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `tum_gorevler`
--

INSERT INTO `tum_gorevler` (`grv_id`, `grv_baslik`, `grv_icerik`, `grv_icerik_yonetici`, `grv_baslama_tarih`, `grv_bitis_tarih`, `grv_onemi`, `grv_sonuc`) VALUES
(1, 'denmee1', 'açıklama', 'içerik', '2017-02-27 20:17:12', '2017-05-20 12:34:47', 'Önemsiz', 'İşleme Alındı...'),
(2, 'denmee2', 'Açıklama..', 'içerik', '2017-02-27 20:17:12', '2017-05-20 12:34:46', 'Acil', 'Bitmedi!'),
(3, 'denmee3', 'açıklama', 'içerik', '2017-02-27 20:17:12', '2017-05-20 12:34:45', 'Normal', 'Bitti');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

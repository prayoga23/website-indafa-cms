-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for osx10.10 (x86_64)
--
-- Host: localhost    Database: kampus_cms
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `academic_calendars`
--

INSERT INTO `academic_calendars` VALUES (1,'ganjil','Daftar Ulang & Pembayaran UKT','1 Sept - 2 Des 2026',NULL,1,'2026-06-23 13:32:18','2026-06-23 13:32:18'),(2,'genap','Daftar Ulang & Pembayaran UKT','1 Sept - 2 Des 2026',NULL,1,'2026-06-24 20:43:40','2026-06-24 20:43:40');

--
-- Dumping data for table `academic_documents`
--

INSERT INTO `academic_documents` VALUES (1,'Buku avatar','documents/1782298957_ufil_suciati.pdf','pdf',2026,'2026-06-24 04:02:37','2026-06-24 04:02:37');

--
-- Dumping data for table `academic_guidebooks`
--

INSERT INTO `academic_guidebooks` VALUES (1,'Buku Saku Mahasiswa','Edisi Terbaru','bg-gold-badge','bi-book-half','bg-light-gold text-gold','Berisi aturan hak-kewajiban, kode etik, dan sanksi kedisiplinan kampus.','guidebooks/6e7bNozri7wFQR1EVaYMv91mCix8HQGeiEHlli2U.pdf','2026-06-24 01:27:54','2026-06-24 01:27:54'),(2,'Pedoman Mahasiswa','Edisi Terbaru','bg-dark-green text-white','bi-book-half','bg-light-gold text-gold','Tidak ada ringkasan','guidebooks/L3CaQvIbCqkpNJPb7a3plW7Y1wsD7gHByD6Fy4E3.pdf','2026-06-24 20:53:15','2026-06-24 20:53:15');

--
-- Dumping data for table `academic_procedure_steps`
--

INSERT INTO `academic_procedure_steps` VALUES (1,'krs',1,'Konsultasi Dosen PA','Temui Dosen Penasihat Akademik (PA) secara daring/luring untuk mendiskusikan rencana mata kuliah yang akan diambil berdasarkan IPS semester lalu.','2026-06-24 01:28:49','2026-06-24 01:28:49'),(2,'skripsi',1,'Kosultasi','Tidak ada uraian','2026-06-24 20:52:03','2026-06-24 20:52:03');

--
-- Dumping data for table `academic_settings`
--

INSERT INTO `academic_settings` VALUES (1,'academic/0S33xwfnS86Lx7SrJGJ6RJZRbaG1Smrzg8dFtds1.pdf','2026-06-23 13:32:35','2026-06-23 13:33:00');

--
-- Dumping data for table `agendas`
--

INSERT INTO `agendas` VALUES (1,'Seminar Nasional Menjadi Pemimpin y','seminar-nasional-kecerdasan-buatan-big-data-2025-9882','2026-06-25','09:30:00','10:00:00','Aula Lantai 3','Lainnya','2026-06-23 10:52:48','2026-06-24 15:26:39');

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` VALUES (1,'PENGUMUMAN LIBURAN','pengumuman-liburan-1781308121',NULL,'OKE','2026-06-13','publish',1,'2026-06-12 16:48:41','2026-06-25 00:54:59'),(2,'PENGUMUMAN LIBUR LEBARAN','pengumuman-libur-lebaran-1782369964',NULL,'TIDAK ADJFKAJLKDFA','2026-06-25','publish',1,'2026-06-24 23:46:04','2026-06-25 00:54:45');

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` VALUES (2,NULL,NULL,NULL,NULL,NULL,'banners/jTQu0I8jg55J5UlybLFMFel0eSckKg23kKGHM0bN.png',NULL,NULL,'publish',1,2,'2026-06-15','2026-07-11','2026-06-16 04:20:55','2026-06-16 06:49:58'),(6,1,2,NULL,NULL,NULL,'banners/6aIpVRH0QOdSyqRZA9T2uFSqXIxFMBhqE2ZhooJR.png',NULL,NULL,'publish',1,1,'2026-06-01','2026-07-11','2026-06-21 09:38:13','2026-06-21 09:38:13');

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` VALUES ('kampus@gmail.com|127.0.0.1','i:1;',1782390149),('kampus@gmail.com|127.0.0.1:timer','i:1782390149;',1782390149);

--
-- Dumping data for table `cache_locks`
--


--
-- Dumping data for table `campus_statistics`
--

INSERT INTO `campus_statistics` VALUES (1,200,20,500,2,'2026-06-23 11:20:02','2026-06-23 11:20:02');

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` VALUES (1,'siapa aja','23284827','Layanan Akademik & KRS','tidak ada',0,'2026-06-25 05:07:21','2026-06-25 05:07:21');

--
-- Dumping data for table `course_schedules`
--

INSERT INTO `course_schedules` VALUES (1,'Senin','07:30','Bahasa Indonesia','ari','Ruang 2a','Semester I','2026-06-24 01:55:06','2026-06-24 01:55:06'),(2,'Senin','07:30','Bahasa Arab','ari','Ruang 2a','Semester I','2026-06-24 02:29:36','2026-06-24 02:29:36');

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` VALUES (1,1,'USK401001','Al-Qur\'an dan Hadis',2,'Wajib','2026-06-23 13:05:27','2026-06-23 13:05:27'),(2,2,'USK401004','coba',2,'Wajib','2026-06-23 13:06:25','2026-06-23 13:06:25');

--
-- Dumping data for table `curriculum_infos`
--

INSERT INTO `curriculum_infos` VALUES (1,'Mulai Tahun Akademik 2026/2027 Institut Agama Islam Darul Falah Bondowoso memberlakukan Kurikulum Mengacu Kerangka Kualifikasi Nasional Indonesia (KKNI) dan Standar Nasional Pendidikan Tinggi (SN-DIKTI) dengan mengintegrasikan dan menginterkoneksikan ilmu keislaman dan ilmu umum. Menurut Peraturan Presiden Nomor 8 Tahun 2012 dan Undang-Undang Nomor 12 Tahun 2012 tentang Pendidikan Tinggi yang dimaksud KKNI adalah kerangka penjenjangan kualifikasi kompetensi yang dapat menyandingkan, menyetarakan dan mengintegrasikan antara bidang pendidikan dan bidang pelatihan kerja serta pengalaman kerja dalam rangka pemberian pengakuan kompetensi kerja sesuai dengan struktur pekerjaan di berbagai sektor.','2026-06-23 13:03:30','2026-06-23 13:03:30');

--
-- Dumping data for table `exam_schedules`
--


--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` VALUES (1,'FAKULTAS ILMU SYARI\'AH','fakultas-ilmu-syariah','Test Bro','faculties/Rsysum0G0OmOm4ypOmyb8yluy39IJ5bFgImZaa9V.png','fakultas ilmu syari\'ah4',1,'2026-06-11 23:41:59','2026-07-15 22:21:34'),(2,'FAKULTAS SAINS DAN TEKNOLOGI','fakultas-sains-dan-teknologi','Ari','faculties/c5BHfxMd4YGLuQikUySR14w1RhZszkxb2NostlZq.png','didirikan pada tanggal',1,'2026-06-16 06:51:41','2026-06-16 06:51:41'),(3,'FAKULTAS TARBIYAH','fakultas-tarbiyah','Ari','faculties/tW7Ogc2RVpIiVP3XIwTb3CYgZ0bTn5OpZ7fKIWTn.png','oke',1,'2026-06-16 06:52:11','2026-06-16 06:52:11');

--
-- Dumping data for table `failed_jobs`
--


--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` VALUES (1,NULL,NULL,'aku dan dia','aku-dan-dia-1781311320','adfa','galleries/hPTvv9DxOgJEftSZwSF0rgNd0JDFym6WwWz66mpN.jpg','publish','2026-06-12 17:42:00','2026-06-12 17:42:00');

--
-- Dumping data for table `gallery_photos`
--

INSERT INTO `gallery_photos` VALUES (1,1,'gallery-photos/BqV7csLGLJoGelFrqldZCV4427I2aCtUz9VEailf.jpg',NULL,0,'2026-06-12 17:47:45','2026-06-12 17:47:45'),(3,1,'gallery-photos/jJnZHCikpfngXhfmMjw8HaDS0leqV3JI77JZEH7u.jpg',NULL,0,'2026-06-12 17:48:26','2026-06-12 17:48:26');

--
-- Dumping data for table `graduate_learning_outcomes`
--

INSERT INTO `graduate_learning_outcomes` VALUES (1,'sikap','KK2','Bertaqwa kepada Tuhan Yang Maha Esa dan mampu menunjukkan sikap religius dalam kehidupan bermasyarakat.',1,'2026-06-23 13:18:54','2026-06-23 13:18:54');

--
-- Dumping data for table `history_infos`
--

INSERT INTO `history_infos` VALUES (1,'Profil Sejarah','Program Studi Hukum Keluarga Islam Institut Agama Islam (IAI) Darul Falah Bondowoso hadir sebagai pusat pengembangan keilmuan hukum keluarga yang berlandaskan nilai-nilai Islam, keilmuan, dan kemasyarakatan. Melalui kurikulum yang relevan dan pembelajaran yang berkualitas, program studi berkomitmen mencetak lulusan yang kompeten, berintegritas, serta mampu menjawab berbagai persoalan hukum keluarga dalam kehidupan masyarakat.','Sebagai bagian dari pelaksanaan Tri Dharma Perguruan Tinggi, Program Studi Hukum Keluarga Islam terus mendorong pengembangan pendidikan, penelitian, dan pengabdian kepada masyarakat. Dengan dukungan dosen yang profesional dan lingkungan akademik yang kondusif, program studi berupaya menjadi pusat kajian hukum keluarga Islam yang unggul serta memberikan kontribusi nyata bagi terwujudnya keadilan dan kemaslahatan umat.','history/lkFWjyLK1L9Dqic4uxXfGitU7NwLBH3cqWvMo3PZ.png','2026-06-23 11:48:49','2026-06-25 19:38:47');

--
-- Dumping data for table `history_timelines`
--


--
-- Dumping data for table `job_batches`
--


--
-- Dumping data for table `jobs`
--


--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` VALUES (1,1,2,'Dr. Syaiful Bakri, S.H., M.H','3944768669130402','Dosen Tetap (Lektor)','Doktor (S3)','lecturers/9WymSw0Bxta1sxuOgzRIjBZMmKCXpzKbBTh1iVjh.png',NULL,1,'2026-06-12 02:32:17','2026-06-25 06:41:36'),(2,1,2,'Dr. Abdul Basid, S.Pd.I., M.Pd.I','0243759661200033','Dosen Tetap','Doktor (S3)','lecturers/u3YCsysV66RsAKjYgVR9VnnyKLJOXgjEzfuK54MF.png',NULL,1,'2026-06-25 06:29:59','2026-06-25 06:41:28'),(3,1,2,'Iklil Hasbiyalla, S.Sy., M.H','9342769670130573','Dosen Tetap (Lektor)','Magister (S2)','lecturers/4aGdYumJLv1zF9gkf8FmB8eIrFFvVW5m276855wf.png',NULL,1,'2026-06-25 06:37:30','2026-06-25 06:37:30'),(4,1,2,'Saifullah, S.Ag., M.Hi','4633757658200012','Dosen Tetap (Lektor)','Magister (S2)','lecturers/6JoCLclW82FxgpaWECt7zrsqmH9I3OTbOkA7zzeK.png',NULL,1,'2026-06-25 06:40:57','2026-06-25 06:41:19'),(5,1,2,'Musram Doso, S.H., M.H','1148762663130283','Dosen Tetap (Lektor)','Magister (S2)','lecturers/WohhN9mL8bcLmSznlkKLM5zvOZO2fd99oPl5Isee.png',NULL,1,'2026-06-25 06:43:12','2026-06-25 06:43:12'),(6,1,2,'Sutriyono, S.Ag., M.M','0454752653130072`','Dosen Tetap (Lektor)','Magister (S2)','lecturers/gmbO4dZvPeQ7hswsn6fSSu51eLizM2eTOghOW6gp.png',NULL,1,'2026-06-25 06:45:00','2026-06-25 06:45:00'),(7,1,2,'Zubandi','-','Dosen Tetap','Magister (S2)','lecturers/TPJQMWlAN9cG77L0j1FpjhHZp6GKZC3kL8xJH2gS.png',NULL,1,'2026-06-25 06:47:31','2026-06-25 06:47:31'),(8,1,2,'Usman, S.Sy., M.H','0443765666130252','Dosen Tetap (Lektor)','Magister (S2)','lecturers/g8yAid8dsuerBkvBPbEJ1nfC2nXTNFEm79C9paeg.png',NULL,1,'2026-06-25 06:48:30','2026-06-25 06:48:30'),(9,1,2,'Faizin','-','Dosen Tetap','Magister (S2)','lecturers/7y6QjoRt91IO84EPSrZtevwyw7Hr3rATcXp0pO9n.png',NULL,1,'2026-06-25 06:49:48','2026-06-25 06:49:48'),(10,1,2,'Dr. Akik Zaman','7753742643131102','Dosen Tetap','Doktor (S3)','lecturers/3EjN4NWfMRn1AN2wWVV53chufmz3j88IDpHMBeSb.png',NULL,1,'2026-06-25 06:51:21','2026-06-25 06:51:21');

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_06_12_032808_create_permission_tables',2),(5,'2026_06_12_034428_create_faculties_table',3),(6,'2026_06_12_064353_create_study_programs_table',4),(7,'2026_06_12_075449_create_lecturers_table',5),(8,'2026_06_12_093439_create_news_table',6),(9,'2026_06_12_233825_create_announcements_table',7),(10,'2026_06_13_003254_create_galleries_table',8),(11,'2026_06_13_003304_create_gallery_photos_table',8),(12,'2026_06_13_012713_create_pages_table',9),(13,'2026_06_13_133254_create_banners_table',10),(14,'2026_06_13_140441_create_website_settings_table',11),(15,'2026_06_23_084618_create_welcome_messages_table',12),(16,'2026_06_23_174205_create_agendas_table',13),(17,'2026_06_23_180443_create_campus_statistics_table',14),(18,'2026_06_23_183949_create_history_infos_table',15),(19,'2026_06_23_184005_create_history_timelines_table',15),(20,'2026_06_23_185431_create_visions_table',16),(21,'2026_06_23_185439_create_vision_mission_items_table',16),(22,'2026_06_23_190904_create_organizational_structures_table',17),(23,'2026_06_23_195345_create_curriculum_infos_table',18),(24,'2026_06_23_195354_create_courses_table',18),(25,'2026_06_23_201205_create_graduate_learning_outcomes_table',19),(26,'2026_06_23_202609_create_academic_calendars_table',20),(27,'2026_06_23_202618_create_academic_settings_table',20),(28,'2026_06_24_082137_create_academic_guidebooks_table',21),(29,'2026_06_24_082148_create_academic_procedure_steps_table',21),(30,'2026_06_24_084741_create_course_schedules_table',22),(31,'2026_06_24_084752_create_exam_schedules_table',22),(32,'2026_06_24_084801_create_thesis_defense_schedules_table',22),(33,'2026_06_24_102953_create_photo_galleries_table',23),(34,'2026_06_24_104633_create_video_galleries_table',24),(35,'2026_06_24_105903_create_academic_documents_table',25),(36,'2026_06_25_120205_create_contact_messages_table',26),(37,'2026_07_16_055422_add_cta_fields_to_website_settings_table',27),(38,'2026_07_20_085000_add_faculty_id_and_program_studi_id_to_banners_table',28);

--
-- Dumping data for table `model_has_permissions`
--


--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',2);

--
-- Dumping data for table `news`
--

INSERT INTO `news` VALUES (3,NULL,NULL,2,'COBA ONLINE','coba-online','news/Jc1Xd5yLphNqIqrgEC80BtSmDCSZvdidVkEhyOVf.png','<p>SAYA PERCOBAAN</p>','publish',0,'2026-06-24 23:47:13','2026-06-24 23:47:13');

--
-- Dumping data for table `organizational_structures`
--

INSERT INTO `organizational_structures` VALUES (4,'management','Ketua Program Studi','Saifullah, S.Ag., M.Hi','4633757658200012','organization/jUCVhfUq35NAN4Uwe6AdOjBvRElyCSsN8e7Wu0Mn.jpg',1,'2026-06-25 06:11:34','2026-06-25 06:11:34'),(5,'management','Sekretaris Program Studi','Ahmad Mujahid Lidinillah, S.H., M.H','2860777678130202','organization/jJFIslr0zqJ6HiZ86qdzN70Oguot07UG9japYy2x.jpg',1,'2026-06-25 06:14:00','2026-06-25 06:14:00'),(6,'staff','Dosen','Dr. Syaiful Bakri, S.H., M.H','3944768669130402','organization/DM5CxHJVhHw5zcF7ZbrqmQYOrflv6nl3Se3DizO5.png',1,'2026-06-25 06:17:36','2026-06-25 06:17:36');

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` VALUES (1,NULL,NULL,'Profil kampus','profil-kampus-1781317924',NULL,'Rumusan misi biasanya berupa daftar poin yang selaras dengan visi:Menyelenggarakan pendidikan dan pengajaran berkualitas tinggi yang berorientasi pada pengembangan keterampilan profesional mahasiswa.Melaksanakan penelitian dan publikasi ilmiah yang aplikatif untuk memecahkan masalah dan meningkatkan kesejahteraan masyarakat.Melaksanakan pengabdian kepada masyarakat sebagai wujud kepedulian terhadap kondisi sosial, ekonomi, dan pendidikan.Mengembangkan tata kelola kampus yang transparan, akuntabel, dan berbudaya akademik yang sehat','pages/Zz8xrYvkFyRMFOLFxlNw7wq8z52tSbnKg26uFco0.jpg','publish','2026-06-12 18:44:11','2026-06-12 19:32:04'),(2,NULL,NULL,'visi-misi','visi-misi-1781613705',NULL,'ini adalah halaman visi misi','pages/4LApPoQ1lgnxY646bLOrIaedUNX8LFbTjjBPpym2.jpg','publish','2026-06-16 05:41:45','2026-06-16 05:41:45'),(3,3,2,'Profil','profil-1782045768',NULL,'profil keluarga hukum islam','pages/XCgeTdTtw4alG8teTGmJLUmy6tghCmgq2sZB4yWm.png','publish','2026-06-21 05:42:48','2026-06-21 05:42:48'),(4,NULL,NULL,'Lembaga Penjaminan Mutu (LPM)','lpm',NULL,'<p>Konten halaman Lembaga Penjaminan Mutu (LPM) sedang dalam perbaikan.</p>',NULL,'publish','2026-07-15 22:40:57','2026-07-15 22:40:57'),(5,NULL,NULL,'Lembaga Penelitian dan Pengabdian kepada Masyarakat (LP2M)','lp2m',NULL,'<p>Konten halaman Lembaga Penelitian dan Pengabdian kepada Masyarakat (LP2M) sedang dalam perbaikan.</p>',NULL,'publish','2026-07-15 22:40:59','2026-07-15 22:40:59'),(6,NULL,NULL,'Organisasi Mahasiswa (ORMAWA)','ormawa',NULL,'<p>Konten halaman Organisasi Mahasiswa (ORMAWA) sedang dalam perbaikan.</p>',NULL,'publish','2026-07-15 22:41:00','2026-07-15 22:41:00');

--
-- Dumping data for table `password_reset_tokens`
--


--
-- Dumping data for table `permissions`
--


--
-- Dumping data for table `photo_galleries`
--

INSERT INTO `photo_galleries` VALUES (2,'Simulasi','Praktik Peradilan','gallery/1782297524_images (1).jpg','2026-06-24','2026-06-24 03:38:44','2026-06-24 03:38:44'),(3,'coba','coba','gallery/1782375065_Gemini_Generated_Image_cn1rhucn1rhucn1r.png','2026-06-25','2026-06-25 01:11:05','2026-06-25 01:11:05');

--
-- Dumping data for table `role_has_permissions`
--


--
-- Dumping data for table `roles`
--

INSERT INTO `roles` VALUES (1,'Super Admin','web','2026-06-11 20:32:04','2026-06-11 20:32:04'),(2,'Admin Fakultas','web','2026-06-11 20:32:04','2026-06-11 20:32:04'),(3,'Editor','web','2026-06-11 20:32:04','2026-06-11 20:32:04');

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` VALUES ('hIXpyAMXL8JbFwCnu3id3i96xR18quzSqkgI0qom',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoicldudDRsdDViZTFsTjgxVFFKa0VSRUNkUU9IQVFjQ2ZwU0hEMW90TSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1784509082),('JjMlqKvmXhi93W7JjkbotMWoGTlzUFQNllAvDapk',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiOEVzUzZGYXUzbFFNTFh1cHI2V3VtcEIyYmJKUHhsUDRTQTFzbjh5SiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=',1784181075),('onquLkY6ktP1bRhYsPYECUwSy5R1QBLco5xfR4Ij',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoib2d0aXN5VVVWdkRZaGhLNXR6eHZjd3dRNkZKdWtQTGh2dXYzcEl2QiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1784279950);

--
-- Dumping data for table `study_programs`
--

INSERT INTO `study_programs` VALUES (1,1,'PENDIDIKAN AGAMA','pendidikan-agama','S1','B','ARI','study-programs/5znLvpkbBOGN0Gh5R0tksBfVa25TEUoGN98sW1MX.png','NO','VIL','BAIK',1,'2026-06-12 00:15:06','2026-07-15 22:26:58'),(2,1,'HUKUM KELUARGA ISLAM','hukum-keluarga-islam','S1','BAIK','ARI','study-programs/sFJURZ5Ebfoe6UtiQODtI7p2vqNuz40mBYjRk5EX.png','- Menjung jung tinggi keadilan','melaksanakan kegiatan mbg','tidak ada',1,'2026-06-21 05:33:18','2026-06-21 05:33:18');

--
-- Dumping data for table `thesis_defense_schedules`
--


--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES (1,'Test User','test@example.com','2026-06-11 20:32:04','$2y$12$CcWlPefUnqDactJeO.XijOB4vwKL3YRkax16zxndc5LZ0I9yWoWBa','0DeDfzdRTB','2026-06-11 20:32:04','2026-06-11 20:32:04'),(2,'Super Admin','admin@kampus.com',NULL,'$2y$12$iBxJWOM8hG8F7hyrYxQX2egO4ueFPoGtAEg7FNgsgyLJBmTMXVruG','u20NZ5KIpl7w99s13SFaMxiOCrrGMFt5atAHsapWyBEjCN6oq0OMi922sZlK','2026-06-11 20:33:07','2026-06-11 20:33:07');

--
-- Dumping data for table `video_galleries`
--

INSERT INTO `video_galleries` VALUES (1,'Seminar Nasional','ObW5hWD9bVQ','Seminar','1 jam','seminar nasional di adakan di darul falah',1,'2026-06-24 03:53:07','2026-06-24 03:53:07'),(2,'PEMBUKAAN HARLAH PP DARUL FALAH KE - 57','B1a09gs8L08','Aktivitas','1 jam',NULL,0,'2026-06-25 01:35:54','2026-06-25 01:35:54');

--
-- Dumping data for table `vision_mission_items`
--

INSERT INTO `vision_mission_items` VALUES (1,'mission','Menyelenggarakan pendidikan dan pengajaran di bidang Hukum Keluarga Islam secara integratif berbasis nilai luhur pesantren',1,'2026-06-23 12:03:28','2026-06-23 12:03:28'),(2,'objective','Melahirkan lulusan Sarjana Hukum (S.H) yang hafidh, profesional, berintegritas, serta berakhlak karimah.',1,'2026-06-23 12:03:44','2026-06-23 12:03:44');

--
-- Dumping data for table `visions`
--

INSERT INTO `visions` VALUES (1,'Menjadi Program Studi Hukum Keluarga Islam yang Unggul, Kompetitif, dan Berbasis Nilai Pesantren di Tingkat Nasional pada Tahun 2030','2026-06-23 12:02:56','2026-06-23 12:02:56');

--
-- Dumping data for table `website_settings`
--

INSERT INTO `website_settings` VALUES (1,'IAII DARUL FALA','bersama kita berjuang','adalah kampus','website/logo/qNo3J9f51iIJFy6rtAy6D5qJ4mWabrh54q1nSmnp.png','website/favicon/hC3ive8GkSEA5VDhOyyvStRqMkyIOcZ64leYV51K.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2026-06-13 07:14:52','2026-06-16 04:04:14');

--
-- Dumping data for table `welcome_messages`
--

INSERT INTO `welcome_messages` VALUES (1,'Saifullah, S.Ag., M.Hi','Ketua Prodi Hukum Keluarga Islam','welcome/lW3wjS7cuCj2Sy1SYxc6MVRj80aJcuJEC1Onw63V.jpg','Kami berkomitmen menghasilkan sarjana Hukum Keluarga Islam yang profesional, berakhlak mulia, menguasai teori dan praktik hukum keluarga, serta adaptif terhadap perkembangan masyarakat dan regulasi hukum.','Selamat datang di Program Studi Hukum Keluarga Islam. Kami berkomitmen menyelenggarakan pendidikan yang berkualitas melalui kurikulum yang adaptif terhadap perkembangan hukum dan sosial masyarakat, didukung oleh tenaga pengajar profesional serta sarana pembelajaran yang memadai.',NULL,'https://www.instagram.com/indafabws/','https://www.instagram.com/indafabws/','2026-06-23 02:22:41','2026-06-25 05:49:42');
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-07-20 13:33:41

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;
SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
SET time_zone = '+00:00';

CREATE DATABASE IF NOT EXISTS `cftp_l2c_gestion`
  DEFAULT CHARACTER SET utf8mb4
  DEFAULT COLLATE utf8mb4_unicode_ci;

USE `cftp_l2c_gestion`;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id`        INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(255) NOT NULL,
  `batch`     INT          NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id`                BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`              VARCHAR(255)    NOT NULL,
  `email`             VARCHAR(255)    NOT NULL,
  `role`              VARCHAR(255)    NOT NULL DEFAULT 'user',
  `email_verified_at` TIMESTAMP       NULL     DEFAULT NULL,
  `password`          VARCHAR(255)    NOT NULL,
  `remember_token`    VARCHAR(100)    NULL     DEFAULT NULL,
  `created_at`        TIMESTAMP       NULL     DEFAULT NULL,
  `updated_at`        TIMESTAMP       NULL     DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_index` (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email`      VARCHAR(255) NOT NULL,
  `token`      VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP    NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id`            VARCHAR(255)    NOT NULL,
  `user_id`       BIGINT UNSIGNED NULL DEFAULT NULL,
  `ip_address`    VARCHAR(45)     NULL DEFAULT NULL,
  `user_agent`    TEXT            NULL DEFAULT NULL,
  `payload`       LONGTEXT        NOT NULL,
  `last_activity` INT             NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key`        VARCHAR(255) NOT NULL,
  `value`      MEDIUMTEXT   NOT NULL,
  `expiration` BIGINT       NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key`        VARCHAR(255) NOT NULL,
  `owner`      VARCHAR(255) NOT NULL,
  `expiration` BIGINT       NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id`           BIGINT UNSIGNED   NOT NULL AUTO_INCREMENT,
  `queue`        VARCHAR(255)      NOT NULL,
  `payload`      LONGTEXT          NOT NULL,
  `attempts`     SMALLINT UNSIGNED NOT NULL,
  `reserved_at`  INT UNSIGNED      NULL DEFAULT NULL,
  `available_at` INT UNSIGNED      NOT NULL,
  `created_at`   INT UNSIGNED      NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id`             VARCHAR(255) NOT NULL,
  `name`           VARCHAR(255) NOT NULL,
  `total_jobs`     INT          NOT NULL,
  `pending_jobs`   INT          NOT NULL,
  `failed_jobs`    INT          NOT NULL,
  `failed_job_ids` LONGTEXT     NOT NULL,
  `options`        MEDIUMTEXT   NULL DEFAULT NULL,
  `cancelled_at`   INT          NULL DEFAULT NULL,
  `created_at`     INT          NOT NULL,
  `finished_at`    INT          NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id`         BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid`       VARCHAR(255)    NOT NULL,
  `connection` TEXT            NOT NULL,
  `queue`      TEXT            NOT NULL,
  `payload`    LONGTEXT        NOT NULL,
  `exception`  LONGTEXT        NOT NULL,
  `failed_at`  TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`(255), `queue`(255), `failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `filieres`;
CREATE TABLE `filieres` (
  `id`          BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom`         VARCHAR(255)    NOT NULL,
  `description` TEXT            NULL DEFAULT NULL,
  `duree`       VARCHAR(120)    NOT NULL,
  `created_at`  TIMESTAMP       NULL DEFAULT NULL,
  `updated_at`  TIMESTAMP       NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `filieres_nom_unique` (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `apprenants`;
CREATE TABLE `apprenants` (
  `id`               BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `matricule`        VARCHAR(255)    NOT NULL,
  `nom`              VARCHAR(255)    NOT NULL,
  `prenom`           VARCHAR(255)    NOT NULL,
  `sexe`             VARCHAR(20)     NOT NULL,
  `date_naissance`   DATE            NOT NULL,
  `email`            VARCHAR(255)    NOT NULL,
  `telephone`        VARCHAR(30)     NOT NULL,
  `adresse`          TEXT            NOT NULL,
  `photo`            VARCHAR(255)    NOT NULL,
  `date_inscription` DATE            NOT NULL,
  `filiere_id`       BIGINT UNSIGNED NOT NULL,
  `created_at`       TIMESTAMP       NULL DEFAULT NULL,
  `updated_at`       TIMESTAMP       NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `apprenants_matricule_unique` (`matricule`),
  UNIQUE KEY `apprenants_email_unique` (`email`),
  KEY `apprenants_filiere_id_foreign` (`filiere_id`),
  CONSTRAINT `apprenants_filiere_id_foreign`
    FOREIGN KEY (`filiere_id`)
    REFERENCES `filieres` (`id`)
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `notes`;
CREATE TABLE `notes` (
  `id`           BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `apprenant_id` BIGINT UNSIGNED NOT NULL,
  `module`       VARCHAR(255)    NOT NULL,
  `note`         DECIMAL(5,2)    NOT NULL,
  `coefficient`  INT UNSIGNED    NOT NULL,
  `created_at`   TIMESTAMP       NULL DEFAULT NULL,
  `updated_at`   TIMESTAMP       NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notes_apprenant_id_foreign` (`apprenant_id`),
  CONSTRAINT `notes_apprenant_id_foreign`
    FOREIGN KEY (`apprenant_id`)
    REFERENCES `apprenants` (`id`)
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id`              CHAR(36)        NOT NULL,
  `type`            VARCHAR(255)    NOT NULL,
  `notifiable_type` VARCHAR(255)    NOT NULL,
  `notifiable_id`   BIGINT UNSIGNED NOT NULL,
  `data`            TEXT            NOT NULL,
  `read_at`         TIMESTAMP       NULL DEFAULT NULL,
  `created_at`      TIMESTAMP       NULL DEFAULT NULL,
  `updated_at`      TIMESTAMP       NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`, `notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`migration`, `batch`) VALUES
  ('0001_01_01_000000_create_users_table',         1),
  ('0001_01_01_000001_create_cache_table',         1),
  ('0001_01_01_000002_create_jobs_table',          1),
  ('2026_05_26_193311_create_filieres_table',      1),
  ('2026_05_26_193313_create_apprenants_table',    1),
  ('2026_05_26_193314_create_notes_table',         1),
  ('2026_05_26_193423_create_notifications_table', 1);

INSERT INTO `users`
  (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
  (1, 'Administrateur CFTP-L2C', 'admin@cftp-l2c.test', 'admin', '2026-01-01 00:00:00', '$2y$12$hFNjo53ZVaOB6yy4Jxm5X.XExfxvzO0MPhqDupuRmj3b6xgc4ZoN6', NULL, '2026-01-01 00:00:00', '2026-01-01 00:00:00'),
  (2, 'Utilisateur Lecture',      'user@cftp-l2c.test',  'user',  '2026-01-01 00:00:00', '$2y$12$hFNjo53ZVaOB6yy4Jxm5X.XExfxvzO0MPhqDupuRmj3b6xgc4ZoN6', NULL, '2026-01-01 00:00:00', '2026-01-01 00:00:00');

INSERT INTO `filieres`
  (`id`, `nom`, `description`, `duree`, `created_at`, `updated_at`)
VALUES
  (1, 'Développement Web',      'Formation orientée applications web et architecture logicielle.',    '12 mois', '2026-01-31 00:00:00', '2026-01-31 00:00:00'),
  (2, 'Génie Logiciel',         'Parcours axé conception, qualité et cycle de vie logiciel.',        '10 mois', '2026-01-31 00:00:00', '2026-01-31 00:00:00'),
  (3, 'Informatique de Gestion','Programme centré sur les outils numériques et la gestion des données.', '9 mois', '2026-01-31 00:00:00', '2026-01-31 00:00:00');

INSERT INTO `apprenants`
  (`id`, `matricule`, `nom`, `prenom`, `sexe`, `date_naissance`, `email`, `telephone`, `adresse`, `photo`, `date_inscription`, `filiere_id`, `created_at`, `updated_at`)
VALUES
  (1, 'CFTP-2026-001', 'Diallo', 'Aminata', 'feminin',   '2001-04-16', 'aminata.diallo@example.test', '+221700000001', 'Dakar, Médina',        'photos/default-avatar.svg', '2026-01-31', 1, '2026-01-31 00:00:00', '2026-01-31 00:00:00'),
  (2, 'CFTP-2026-002', 'Sow',    'Moussa',  'masculin',  '2000-11-03', 'moussa.sow@example.test',     '+221700000002', 'Thiès, Grand Standing','photos/default-avatar.svg', '2026-02-28', 2, '2026-02-28 00:00:00', '2026-02-28 00:00:00'),
  (3, 'CFTP-2026-003', 'Ba',     'Fatou',   'feminin',   '2002-02-22', 'fatou.ba@example.test',       '+221700000003', 'Saint-Louis, Sor',     'photos/default-avatar.svg', '2026-03-31', 3, '2026-03-31 00:00:00', '2026-03-31 00:00:00');

INSERT INTO `notes`
  (`id`, `apprenant_id`, `module`, `note`, `coefficient`, `created_at`, `updated_at`)
VALUES
  (1, 1, 'Algorithmique',     14.50, 3, '2026-02-15 00:00:00', '2026-02-15 00:00:00'),
  (2, 1, 'Base de données',   12.00, 2, '2026-02-15 00:00:00', '2026-02-15 00:00:00'),
  (3, 1, 'Développement web', 15.25, 4, '2026-02-15 00:00:00', '2026-02-15 00:00:00'),
  (4, 2, 'Algorithmique',     14.50, 3, '2026-03-10 00:00:00', '2026-03-10 00:00:00'),
  (5, 2, 'Base de données',   12.00, 2, '2026-03-10 00:00:00', '2026-03-10 00:00:00'),
  (6, 2, 'Développement web', 15.25, 4, '2026-03-10 00:00:00', '2026-03-10 00:00:00'),
  (7, 3, 'Algorithmique',     14.50, 3, '2026-04-05 00:00:00', '2026-04-05 00:00:00'),
  (8, 3, 'Base de données',   12.00, 2, '2026-04-05 00:00:00', '2026-04-05 00:00:00'),
  (9, 3, 'Développement web', 15.25, 4, '2026-04-05 00:00:00', '2026-04-05 00:00:00');

SET FOREIGN_KEY_CHECKS = 1;

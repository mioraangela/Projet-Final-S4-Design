CREATE DATABASE IF NOT EXISTS mobile_money CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE mobile_money;

CREATE TABLE IF NOT EXISTS prefixes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prefixe VARCHAR(20) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    telephone VARCHAR(20) NOT NULL UNIQUE,
    solde DECIMAL(12,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS types_operation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS baremes_frais (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type_operation_id INT NOT NULL,
    montant_minimum DECIMAL(12,2) NOT NULL,
    montant_maximum DECIMAL(12,2) NOT NULL,
    frais DECIMAL(12,2) NOT NULL DEFAULT 0.00,
    CONSTRAINT fk_baremes_type_operation
        FOREIGN KEY (type_operation_id) REFERENCES types_operation(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS operations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT NOT NULL,
    type_operation_id INT NOT NULL,
    destinataire VARCHAR(20) DEFAULT NULL,
    montant DECIMAL(12,2) NOT NULL,
    frais DECIMAL(12,2) NOT NULL DEFAULT 0.00,
    date_operation DATETIME NOT NULL,
    CONSTRAINT fk_operations_client
        FOREIGN KEY (client_id) REFERENCES clients(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    CONSTRAINT fk_operations_type
        FOREIGN KEY (type_operation_id) REFERENCES types_operation(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO prefixes (prefixe) VALUES
('032'),
('033'),
('034'),
('035'),
('037'),
('038'),
('+26132'),
('+26133'),
('+26134'),
('+26135'),
('+26137'),
('+26138');

INSERT INTO clients (telephone, solde) VALUES
('0341234567', 50000.00),
('0387654321', 30000.00);

INSERT INTO types_operation (nom) VALUES
('Dépôt'),
('Retrait'),
('Transfert');

-INSERT INTO baremes_frais (type_operation_id, montant_minimum, montant_maximum, frais) VALUES
(1, 1, 5000, 0),
(1, 5001, 10000, 0),
(1, 10001, 50000, 0),
(1, 50001, 100000, 0),
(1, 100001, 500000, 0),
(1, 500001, 1000000, 0),
(1, 1000001, 2000000, 0),
(2, 1, 5000, 150),
(2, 5001, 10000, 300),
(2, 10001, 50000, 800),
(2, 50001, 100000, 1500),
(2, 100001, 500000, 3000),
(2, 500001, 1000000, 5000),
(2, 1000001, 2000000, 8000),
(3, 1, 5000, 100),
(3, 5001, 10000, 200),
(3, 10001, 50000, 500),
(3, 50001, 100000, 1000),
(3, 100001, 500000, 2000),
(3, 500001, 1000000, 3500),
(3, 1000001, 2000000, 5000);

INSERT INTO operations (client_id, type_operation_id, destinataire, montant, frais, date_operation) VALUES
(1, 1, NULL, 20000.00, 500.00, '2026-07-20 10:00:00'),
(2, 3, '0341234567', 5000.00, 1000.00, '2026-07-20 11:00:00'),
(1, 2, NULL, 7000.00, 200.00, '2026-07-20 12:00:00');

CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    role ENUM('etudiant', 'entreprise', 'admin') NOT NULL,
    fullname VARCHAR(150) NOT NULL,
    email VARCHAR(190) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE student_profiles (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL UNIQUE,
    university VARCHAR(190) NULL,
    level VARCHAR(100) NULL,
    skills TEXT NULL,
    city VARCHAR(120) NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE company_profiles (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL UNIQUE,
    company_name VARCHAR(190) NOT NULL,
    sector VARCHAR(120) NULL,
    city VARCHAR(120) NULL,
    description TEXT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE offers (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    company_user_id BIGINT UNSIGNED NOT NULL,
    title VARCHAR(190) NOT NULL,
    contract_type ENUM('stage', 'cdd', 'job_etudiant') NOT NULL,
    city VARCHAR(120) NOT NULL,
    description TEXT NOT NULL,
    deadline DATE NULL,
    status ENUM('open', 'closed') NOT NULL DEFAULT 'open',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (company_user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE applications (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    offer_id BIGINT UNSIGNED NOT NULL,
    student_user_id BIGINT UNSIGNED NOT NULL,
    cv_path VARCHAR(255) NULL,
    cover_letter TEXT NULL,
    status ENUM('sent', 'reviewed', 'accepted', 'rejected') NOT NULL DEFAULT 'sent',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY uniq_offer_student (offer_id, student_user_id),
    FOREIGN KEY (offer_id) REFERENCES offers(id) ON DELETE CASCADE,
    FOREIGN KEY (student_user_id) REFERENCES users(id) ON DELETE CASCADE
);

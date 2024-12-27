CREATE DATABASE NeoBank;

CREATE TABLE Account (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name_user VARCHAR(50) NOT NULL,
    account_type ENUM('savings', 'current', 'business') NOT NULL,
    nmr_compte VARCHAR(50) NOT NULL,
    balance DECIMAL(10, 2) NOT NULL
);

CREATE TABLE SavingAccount (
    account_id INT PRIMARY KEY,
    taux_Interet DECIMAL(5, 2),
    FOREIGN KEY (account_id) REFERENCES Account(id) ON DELETE CASCADE
);

CREATE TABLE CurrentAccount (
    account_id INT PRIMARY KEY,
    retrait DECIMAL(10, 2),
    FOREIGN KEY (account_id) REFERENCES Account(id) ON DELETE CASCADE
);

CREATE TABLE BusinessAccount (
    account_id INT PRIMARY KEY,
    frais DECIMAL(10, 2),
    FOREIGN KEY (account_id) REFERENCES Account(id) ON DELETE CASCADE 
);

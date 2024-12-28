CREATE DATABASE bankneo;

CREATE TABLE account (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulaire VARCHAR(255) NOT NULL,
    soldeInit DECIMAL(10, 2) NOT NULL
);

CREATE TABLE savingaccount (
    id INT AUTO_INCREMENT PRIMARY KEY,
    minimumSolde DECIMAL(10, 2) NOT NULL,
    accountNum INT NOT NULL,
    FOREIGN KEY (accountNum) REFERENCES account(id)
);

CREATE TABLE currentaccount (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sommeLimit DECIMAL(10, 2) NOT NULL,
    accountNum INT NOT NULL,
    FOREIGN KEY (accountNum) REFERENCES account(id)
);

CREATE TABLE businessaccount (
    id INT AUTO_INCREMENT PRIMARY KEY,
    limitCredit DECIMAL(10, 2) NOT NULL,
    accountNum INT NOT NULL,
    FOREIGN KEY (accountNum) REFERENCES account(id)
);

CREATE DATABASE bank;

CREATE TABLE Account (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nmr_compte VARCHAR(50),
    balance FLOAT
);

CREATE TABLE SavingAccount (
    id INT AUTO_INCREMENT PRIMARY KEY,
    taux_Intert VARCHAR(10),
    account_id int,
    FOREIGN KEY (account_id) REFERENCES account(id)
);

CREATE TABLE CURRENTAccount (
    id INT AUTO_INCREMENT PRIMARY KEY,
    retrait FLOAT,
    account_id int,
    FOREIGN KEY (account_id) REFERENCES account(id)
);

CREATE TABLE businessAccount (
    id INT AUTO_INCREMENT PRIMARY KEY,
    frias VARCHAR(10),
    account_id int,
    FOREIGN KEY (account_id) REFERENCES account(id)
);
CREATE TABLE library (
    id INT AUTO_INCREMENT PRIMARY KEY,
    userID varchar(255),
    slokaID VARCHAR(10),
    book ENUM('gita', 'ramayanam') NOT NULL,
    savedAt DATETIME,
    FOREIGN KEY (userID) REFERENCES users(userID)
);
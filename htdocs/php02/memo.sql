-- create
CREATE TABLE gs_bm_table (
    id int(12) NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (id),
    書籍名 varchar(64) NOT NULL,
    書籍URL text NOT NULL,
    書籍コメント text DEFAULT NULL,
    登録日時 datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
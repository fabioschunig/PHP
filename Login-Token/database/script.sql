-- tabela `user`
CREATE TABLE IF NOT EXISTS user (
    id INTEGER PRIMARY KEY,
    login TEXT NOT NULL UNIQUE,
    password TEXT
);

CREATE DATABASE project_etacarinae; 
USE project_etacarinae;

CREATE TABLE tb_usuario(
    cd INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nm_usuario VARCHAR(100),
    email_usuario VARCHAR(100),
    senha VARCHAR(30),
    admin INT,
    status_usuario VARCHAR(30)
);

CREATE TABLE tb_tags(
    cd INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nm_tag VARCHAR(100)
);

CREATE TABLE tb_atividade(
    cd INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nm_atividade VARCHAR(100),
    ds_atividade LONGTEXT, 
    status_atividade VARCHAR(30),
    dt_postagem DATE,
    dt_entrega DATE,
    id_admin INT,
    id_tag INT,
    FOREIGN KEY (id_admin) REFERENCES tb_usuario (cd),
    FOREIGN KEY (id_tag) REFERENCES tb_tags (cd)
);

CREATE TABLE tb_arquivo(
    cd INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nm_arquivo VARCHAR(100),
    ds_arquivo VARCHAR(500)
);

CREATE VIEW vwAtividades AS 
    SELECT a.*, tag.nm_tag AS nm_tag
        FROM tb_tags tag, atividade a
			WHERE a.id_tag = tag.cd;
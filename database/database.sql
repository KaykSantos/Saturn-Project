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

CREATE TABLE tb_empresa(
    cd INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nm_empresa VARCHAR(100),
    ds_empresa LONGTEXT,
    id_share VARCHAR(20)
);

CREATE TABLE tb_empresa_usuario(
    id_empresa INT,
    id_usuario INT,
    FOREIGN KEY (id_empresa) REFERENCES tb_empresa (cd),
    FOREIGN KEY (id_usuario) REFERENCES tb_usuario (cd)
);

CREATE TABLE tb_empresa_tag(
    id_empresa INT,
    id_tag INT,
    FOREIGN KEY (id_empresa) REFERENCES tb_empresa (cd),
    FOREIGN KEY (id_tag) REFERENCES tb_tags (cd)
);

CREATE VIEW vwAtividades AS 
    SELECT a.*, tag.nm_tag AS nm_tag,e.cd AS nm_empresa
        FROM tb_tags tag, tb_atividade a,tb_empresa e
			WHERE a.id_tag = tag.cd 
			AND e.cd = a.id_empresa;
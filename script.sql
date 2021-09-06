-- auto-generated definition
create schema phprss collate utf8_general_ci;

USE phprss;

create table curso
(
    id                int auto_increment
        primary key,
    nome              varchar(255)     not null,
    descricao         varchar(255)     null,
    vagas             int  default 0   null,
    vagas_preenchidas int  default 0   null,
    inicio            datetime         null,
    fim               datetime         null,
    status            char default 'A' null,
    imagem            varchar(255)     null
) CHARACTER SET utf8 COLLATE utf8_general_ci
    comment 'Tabela de entidade de curso';



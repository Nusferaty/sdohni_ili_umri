create table Goods (id_goods serial PRIMARY KEY,
    name character varying(150) NOT NULL,
    price real NOT NULL,
    info text NOT NULL,
    picture CHARACTER varying(200) NOT NULL);
create table Messages (id_message serial PRIMARY KEY,
    person_name character varying(100) NOT NULL,
    message text NOT NULL,
    id_good integer NOT NULL REFERENCES goods (id_goods) ON UPDATE CASCADE ON DELETE RESTRICT);
create table Tegs (id_teg serial PRIMARY KEY,
    name_teg character varying(50) NOT NULL);
create table Good_teg (id_good integer NOT NULL REFERENCES goods (id_goods) ON UPDATE CASCADE ON DELETE RESTRICT,
    id_teg integer NOT NULL REFERENCES tegs (id_teg) ON UPDATE CASCADE ON DELETE RESTRICT,
    constraint good_teg_pk PRIMARY KEY (id_good, id_teg));
create table Model (id_model serial PRIMARY KEY,
    model_name character varying(200) NOT NULL);
create table Carving (id_carving serial PRIMARY KEY,
    carving_name character varying(200) NOT NULL);
create table Lego (id_lego uuid PRIMARY KEY,
    id_model integer NOT NULL REFERENCES model (id_model) ON UPDATE CASCADE ON DELETE RESTRICT,
    id_carving integer NOT NULL REFERENCES carving (id_carving) ON UPDATE CASCADE ON DELETE RESTRICT,
    place real NOT NULL,
    amount integer NOT NULL,
    description character varying(2000) NOT NULL);
create table Carte (id_carte serial PRIMARY KEY,
    amount integer NOT NULL,
    id_good uuid REFERENCES goods (id_goods) ON UPDATE CASCADE ON DELETE RESTRICT,
    date DATE NOT NULL,
    id_account integer NOT NULL REFERENCES account (id_account) ON UPDATE CASCADE ON DELETE RESTRICT,
    id_lego uuid REFERENCES lego (id_lego) ON UPDATE CASCADE ON DELETE RESTRICT);
create table Variant_pay (id_variant_pay serial PRIMARY KEY,
    pay_name character varying(100) NOT NULL);
create table Account (id_account serial PRIMARY KEY,
    person_name character varying(150) NOT NULL,
    login character varying(100) NOT NULL,
    password character(10) NOT NULL,
    phone character(10) NOT NULL);
create table Make_order (id_make_order uuid PRIMARY KEY,
    address text NOT NULL,
    id_variant_pay integer NOT NULL REFERENCES variant_pay (id_variant_pay) ON UPDATE CASCADE ON DELETE RESTRICT,
    id_carte integer NOT NULL unique references carte (id_carte));

CREATE EXTENSION IF NOT EXISTS "uuid-ossp";

INSERT INTO goods (name, price, info) VALUES ('Деревянный вечный календарь', 2200, 'Необычный деревянный календарь станет прекрасным украшением на вашем рабочем столе. Специальная конструкция позволит использовать его на протяжении многих лет, что лишит вас необходимости обновлять свой календарь каждый новый год. Так же он может стать прекрасным подарок ко дню учителя!'); 
INSERT INTO goods (name, price, info) VALUES ('Деревянный блокнот с гравировкой', 2550, 'Кравтовый блокнот станет прекрасным подарком для ваших близких. Уникальный дизайн и деревянная оплетка будут радовать своего владельца очень много времени!'); 
INSERT INTO goods ( name, price, info) VALUES ('Деревянный купюрница с отделениями', 1800, 'Можно не только дарить деньги, но и то, где их хранить. Данный подарок возволит сделать столь простой подарок достаточно оригинальным и запоминающимся!'); 
INSERT INTO goods (name, price, info) VALUES ('Деревянная коробчка "С Днем Рождения!"', 2100, 'Главная часть подарка это его упаковка! Уникальная резная коробочка позволит украсить ваш подарок!'); 
INSERT INTO goods (name, price, info) VALUES ('Планшет деревянный', 3200, 'Данный товар обладает уникальным дизайном и отлично подойдет как для личного пользования, так и для подарко близким!');

INSERT INTO tegs (name_teg) VALUES ('Новинка'), ('Популярно'), ('Необычно'), ('Лучший выбор'), ('На 8 марта'), ('На 23 февраля');

INSERT INTO messages (person_name, message, id_good) VALUES ('Александр', 'Спасибо большое! Очень качественная работа! Для подарка самое то.', '42966de2-f1b1-4ed2-ae43-f6d5d150e06c'), ('Елена', 'Красивая и аккуратная работа.', '42966de2-f1b1-4ed2-ae43-f6d5d150e06c'), ('Николай', 'Супер подарок! Маме понравился', 'a71b3470-c8b7-492f-9ee6-ab4e37f2f4a7');
INSERT INTO messages (person_name, message, id_good) VALUES ('Александр', 'Классный сервис, всем советую!', '42966de2-f1b1-4ed2-ae43-f6d5d150e06c'), ('Любитель отзывов', 'Быстро,четко, по заказку. Спасибо!', '17b58787-f162-42a2-b6e6-92d2cfea6945');

INSERT INTO carving (carving_name) VALUES ('По стеклу'), ('По дереву небольшая'),('По дереву объемная');

INSERT INTO carving (carving_name) VALUES ('По дереву сборная'),('Пользовательская');

INSERT INTO model (model_name) VALUES ('Квадратная'), ('Круглая'), ('Своя');
INSERT INTO model (model_name) VALUES ('Сборная');

INSERT INTO lego VALUES (5, 10, 0.1, 5, 'Необходимы подставки для тортов, гравировка должна быть ближе к краю, чтобы ее было видно при осмотре торта.');
INSERT INTO lego VALUES (8, 10, 0.1, 2, 'Необходимо нанести гравировку на рюмки, желательно неглубоку.');
INSERT INTO lego VALUES (8, 6, 0.1, 100, 'Нужны визитки для распространения рекламы.');
INSERT INTO lego VALUES (7, 6, 0.1, 10, 'Как на фото');
INSERT INTO lego VALUES (6, 9, 0.1, 2, 'Нужна заготовка для тортницы');

INSERT INTO account (person_name, login, password, phone) VALUES ('Лусико Екатерина Владимировна', 'lucik23@mail.ru', 'bdjhg773k!', 9258763498);
INSERT INTO account (person_name, login, password, phone) VALUES ('Молкин Антон Семенович', 'pork_dream@mail.ru', 'bde465fk!d', 9064563289);
INSERT INTO account (person_name, login, password, phone) VALUES ('Вило Маргарита Алексеевна', 'uopinf@yandex.ru', '3dfr7jh!pd', 9917653309);
INSERT INTO account (person_name, login, password, phone) VALUES ('Латунь Николай Аркадьевич', 'lohdyr@mail.ru', 'bdjhjf63k!', 9258764862);
INSERT INTO account (person_name, login, password, phone) VALUES ('Филькова Юлия Борисовна', 'foiso43s@mail.ru', 'bcjdjf87k!', 9258757198);

INSERT INTO variant_pay (pay_name) VALUES ('Онлайн'),('Картой при получении'),('Наличными при получении');

INSERT INTO carte (amount, date, id_account, id_lego) VALUES (100, '12.12.2022', 6, 'ea6a5d9c-3521-436f-9b35-bc44a746fd78');
INSERT INTO carte (amount, id_good, date, id_account) VALUES (2, '8081d12a-9438-4c64-af4b-f07ed8826aa5', '12.12.2022', 10);
INSERT INTO carte (amount, id_good, date, id_account) VALUES (5, '8081d12a-9438-4c64-af4b-f07ed8826aa5', '11.12.2022', 6);
INSERT INTO carte (amount, id_good, date, id_account) VALUES (23, '4d624d63-b640-4242-a026-9493b03a3e79', '12.12.2022', 9);
INSERT INTO carte (amount, id_lego, date, id_account) VALUES (23, '77d558e6-0d5d-4cca-9941-4a5ce86ee346', '12.12.2022', 6);

INSERT INTO make_order (id_make_order, address, id_variant_pay, id_carte) VALUES ('г.Тутово ул.Тамова д.34 кв.56', '5', 9);

INSERT INTO good_teg VALUES ('7', 10);
INSERT INTO good_teg VALUES ('7', 8);
INSERT INTO good_teg VALUES ('10', 7);
INSERT INTO good_teg VALUES ('9', 10);
INSERT INTO good_teg VALUES ('8', 9);

cdbf42b0-2751-4a16-ad42-4ec595aab6a0
d3ee4524-6851-4938-a371-bce564703b74
8081d12a-9438-4c64-af4b-f07ed8826aa5
19000b39-70ea-4082-b508-d533578cbe80
4d624d63-b640-4242-a026-9493b03a3e79

SELECT * FROM account WHERE login = 'pork_dream@mail.ru' and password = 'bde465fk!d';



TRUNCATE TABLE account CASCADE;
TRUNCATE TABLE carte CASCADE;
TRUNCATE TABLE carving CASCADE;
TRUNCATE TABLE good_teg CASCADE;
TRUNCATE TABLE goods CASCADE;      
TRUNCATE TABLE lego CASCADE;       
TRUNCATE TABLE make_order CASCADE; 
TRUNCATE TABLE messages CASCADE;   
TRUNCATE TABLE model CASCADE;      
TRUNCATE TABLE tegs CASCADE;       
TRUNCATE TABLE variant_pay CASCADE;

alter table account add address character varying(300);

insert into goods (picture) values ("./uploads/image_1.jpg");
insert into goods (picture) values ("./uploads/image_2.jpg");
insert into goods (picture) values ("./uploads/image_3.jpg");
insert into goods (picture) values ("./uploads/image_4.jpg");
insert into goods (picture) values ("./uploads/image_5.jpg");

INSERT INTO goods (name, price, info, picture) VALUES ('Деревянный вечный календарь', 2200, 'Необычный деревянный календарь станет прекрасным украшением на вашем рабочем столе. Специальная конструкция позволит использовать его на протяжении многих лет, что лишит вас необходимости обновлять свой календарь каждый новый год. Так же он может стать прекрасным подарок ко дню учителя!', './uploads/image_1.jpg'); 
INSERT INTO goods (name, price, info, picture) VALUES ('Деревянный блокнот с гравировкой', 2550, 'Кравтовый блокнот станет прекрасным подарком для ваших близких. Уникальный дизайн и деревянная оплетка будут радовать своего владельца очень много времени!', './uploads/image_2.jpg'); 
INSERT INTO goods (name, price, info, picture) VALUES ('Деревянный купюрница с отделениями', 1800, 'Можно не только дарить деньги, но и то, где их хранить. Данный подарок возволит сделать столь простой подарок достаточно оригинальным и запоминающимся!', './uploads/image_3.jpg'); 
INSERT INTO goods (name, price, info, picture) VALUES ('Деревянная коробчка "С Днем Рождения!"', 2100, 'Главная часть подарка это его упаковка! Уникальная резная коробочка позволит украсить ваш подарок!', './uploads/image_4.jpg'); 
INSERT INTO goods (name, price, info, picture) VALUES ('Планшет деревянный', 3200, 'Данный товар обладает уникальным дизайном и отлично подойдет как для личного пользования, так и для подарко близким!', './uploads/image_5.jpg');

INSERT INTO messages (person_name, message, id_good) VALUES ('Александр', 'Спасибо большое! Очень качественная работа! Для подарка самое то.', 10), ('Елена', 'Красивая и аккуратная работа.', 7), ('Николай', 'Супер подарок! Маме понравился', 6);
INSERT INTO messages (person_name, message, id_good) VALUES ('Александр', 'Классный сервис, всем советую!', 10), ('Любитель отзывов', 'Быстро,четко, по заказку. Спасибо!', 8);

ALTER TABLE goods ALTER COLUMN id_goods TYPE serial;
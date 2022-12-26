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
create table Account (id_account serial PRIMARY KEY,
    person_name character varying(150) NOT NULL,
    login character varying(100) NOT NULL,
    password character(10) NOT NULL,
    phone character(10) NOT NULL);
create table Lego (id_lego serial PRIMARY KEY,
    id_model integer NOT NULL REFERENCES model (id_model) ON UPDATE CASCADE ON DELETE RESTRICT,
    id_carving integer NOT NULL REFERENCES carving (id_carving) ON UPDATE CASCADE ON DELETE RESTRICT,
    place real NOT NULL,
    amount integer NOT NULL,
    description character varying(2000) NOT NULL,
    id_account integer NOT NULL REFERENCES account (id_account) ON UPDATE CASCADE ON DELETE RESTRICT);
create table Carte (id_carte serial PRIMARY KEY,
    amount integer NOT NULL,
    id_good integer REFERENCES goods (id_goods) ON UPDATE CASCADE ON DELETE RESTRICT,
    date DATE NOT NULL,
    id_account integer NOT NULL REFERENCES account (id_account) ON UPDATE CASCADE ON DELETE RESTRICT,
    id_lego integer REFERENCES lego (id_lego) ON UPDATE CASCADE ON DELETE RESTRICT);
create table Variant_pay (id_variant_pay serial PRIMARY KEY,
    pay_name character varying(100) NOT NULL);
create table Make_order (id_make_order serial PRIMARY KEY,
    address text NOT NULL,
    id_variant_pay integer NOT NULL REFERENCES variant_pay (id_variant_pay) ON UPDATE CASCADE ON DELETE RESTRICT);
INSERT INTO goods (name, price, info, picture) VALUES ('Деревянный вечный календарь', 2200, 'Необычный деревянный календарь станет прекрасным украшением на вашем рабочем столе. Специальная конструкция позволит использовать его на протяжении многих лет, что лишит вас необходимости обновлять свой календарь каждый новый год. Так же он может стать прекрасным подарок ко дню учителя!', './uploads/image_1.jpg'); 
INSERT INTO goods (name, price, info, picture) VALUES ('Деревянный блокнот с гравировкой', 2550, 'Кравтовый блокнот станет прекрасным подарком для ваших близких. Уникальный дизайн и деревянная оплетка будут радовать своего владельца очень много времени!', './uploads/image_2.jpg'); 
INSERT INTO goods (name, price, info, picture) VALUES ('Деревянный купюрница с отделениями', 1800, 'Можно не только дарить деньги, но и то, где их хранить. Данный подарок возволит сделать столь простой подарок достаточно оригинальным и запоминающимся!', './uploads/image_3.jpg'); 
INSERT INTO goods (name, price, info, picture) VALUES ('Деревянная коробчка "С Днем Рождения!"', 2100, 'Главная часть подарка это его упаковка! Уникальная резная коробочка позволит украсить ваш подарок!', './uploads/image_4.jpg'); 
INSERT INTO goods (name, price, info, picture) VALUES ('Планшет деревянный', 3200, 'Данный товар обладает уникальным дизайном и отлично подойдет как для личного пользования, так и для подарко близким!', './uploads/image_5.jpg');
INSERT INTO messages (person_name, message, id_good) VALUES ('Александр', 'Спасибо большое! Очень качественная работа! Для подарка самое то.', 2), ('Елена', 'Красивая и аккуратная работа.', 2), ('Николай', 'Супер подарок! Маме понравился', 4);
INSERT INTO messages (person_name, message, id_good) VALUES ('Александр', 'Классный сервис, всем советую!', 1), ('Любитель отзывов', 'Быстро,четко, по заказку. Спасибо!', 3);
INSERT INTO tegs (name_teg) VALUES ('Новинка'), ('Популярно'), ('Необычно'), ('Лучший выбор'), ('На 8 марта'), ('На 23 февраля');
INSERT INTO good_teg VALUES ('1', 2);
INSERT INTO good_teg VALUES ('2', 3);
INSERT INTO good_teg VALUES ('5', 4);
INSERT INTO good_teg VALUES ('5', 2);
INSERT INTO good_teg VALUES ('3', 5);
INSERT INTO carving (carving_name) VALUES ('По стеклу'), ('По дереву небольшая'),('По дереву объемная'), ('По дереву сборная'),('Пользовательская');
INSERT INTO model (model_name) VALUES ('Квадратная'), ('Круглая'), ('Своя'), ('Сборная');
INSERT INTO account (person_name, login, password, phone) VALUES ('Лусико Екатерина Владимировна', 'lucik23@mail.ru', 'bdjhg773k!', 9258763498);
INSERT INTO account (person_name, login, password, phone) VALUES ('Молкин Антон Семенович', 'pork_dream@mail.ru', 'bde465fk!d', 9064563289);
INSERT INTO account (person_name, login, password, phone) VALUES ('Вило Маргарита Алексеевна', 'uopinf@yandex.ru', '3dfr7jh!pd', 9917653309);
INSERT INTO account (person_name, login, password, phone) VALUES ('Латунь Николай Аркадьевич', 'lohdyr@mail.ru', 'bdjhjf63k!', 9258764862);
INSERT INTO account (person_name, login, password, phone) VALUES ('Филькова Юлия Борисовна', 'foiso43s@mail.ru', 'bcjdjf87k!', 9258757198);
INSERT INTO variant_pay (pay_name) VALUES ('Онлайн'),('Картой при получении'),('Наличными при получении');

CREATE OR REPLACE FUNCTION public.lego_carte_fnc()
RETURNS trigger AS
$$
BEGIN
insert into "carte" ("id_lego", "amount", "date", "id_account")
values(new."id_lego", new."amount", current_date, new."id_account");
return new;
end;
$$
language 'plpgsql';

CREATE TRIGGER lego_carte
AFTER INSERT
ON lego
FOR EACH ROW
EXECUTE FUNCTION lego_carte_fnc();

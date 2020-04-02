drop database if exists herkkuhetki;
create database herkkuhetki;
use herkkuhetki;

create table customer (
  id int primary key auto_increment,
  firstname varchar(50) not null,
  lastname varchar(100) not null,
  address varchar(100) not null,
  postcode char(5) not null,
  town varchar(100) not null,
  email varchar(255) not null,
  phone varchar(20)
);

create table registeredCustomer (
  id int primary key auto_increment,
  username varchar(30) not null,
  password varchar(255) not null,
  customer_id int not null,
  index (customer_id),
  foreign key (customer_id) references customer(id)
);

create table productCategory (
  categoryID int primary key auto_increment,
  parentID int,
  foreign key (parentID) references productCategory(categoryID)
  on delete restrict,
  name varchar(255) not null unique
);

create table product (
  id int primary key auto_increment,
  name varchar(255) not null unique,
  price decimal(5,2) not null,
  description text,
  image varchar(50),
  stock int not null,
  category_id int not null,
  index (category_id),
  foreign key (category_id) references productCategory(categoryID)
  on delete restrict
);

create table newsletter (
  email varchar(255) primary key
);

create table orders (
  id int primary key auto_increment,
  status enum ('ordered','shipped'),
  orderDate timestamp default current_timestamp,
  customer_id int not null,
  index (customer_id),
  foreign key (customer_id) references customer(id)
  on delete restrict
);

create table orderDetail (
  order_id int not null,
  index (order_id),
  foreign key (order_id) references orders(id)
  on delete restrict,
  product_id int not null,
  index (product_id),
  foreign key (product_id) references product(id)
  on delete restrict,
  amount smallint
);

create table review (
  id int primary key auto_increment,
  product_id int not null,
  foreign key (product_id) references product(id)
  on delete cascade,
  reviewDate timestamp default current_timestamp,
  review text,
  stars enum ('1','2','3','4','5')
);

create table offer (
  id int primary key auto_increment,
  product_id int not null,
  foreign key (product_id) references product(id)
  on delete cascade,
  startDate date,
  endDate date,
  discount smallint
);

create table adminUser (
  username varchar(30) primary key,
  password varchar(255)
);

insert into productcategory (name) values ('Irtokarkit');
insert into productcategory (name) values ('Pakatut makeiset');
insert into productcategory (name) values ('Suklaat');
insert into productcategory (name) values ('Teemakarkit');
insert into productcategory (parentID, name) values (1, 'Salmiakit');
insert into productcategory (parentID, name) values (1, 'Kirpeät karkit');
insert into productcategory (parentID, name) values (1, 'Kovat karkit');
insert into productcategory (parentID, name) values (1, 'Lakritsit');
insert into productcategory (parentID, name) values (1, 'Vaahtokarkit');
insert into productcategory (parentID, name) values (1, 'Toffeet');
insert into productcategory (parentID, name) values (1, 'Viinikumit');
insert into productcategory (parentID, name) values (1, 'Irtosuklaat');
insert into productcategory (parentID, name) values (2, 'Karkkipussit');
insert into productcategory (parentID, name) values (2, 'Karkkilaatikot');
insert into productcategory (parentID, name) values (2, 'Latupatukat');
insert into productcategory (parentID, name) values (3, 'Suklaalevyt');
insert into productcategory (parentID, name) values (3, 'Suklaapatukat');
insert into productcategory (parentID, name) values (3, 'Suklaamunat');
insert into productcategory (parentID, name) values (4, 'Joulu');
insert into productcategory (parentID, name) values (4, 'Pääsiäinen');
insert into productcategory (parentID, name) values (4, 'Halloweenkarkit');
insert into productcategory (parentID, name) values (4, 'Ystävänpäivä');


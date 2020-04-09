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

create table themeCategory (
  id int primary key auto_increment,
  name varchar(255) not null unique
);

alter table themecategory AUTO_INCREMENT=1000;

create table product (
  id int primary key auto_increment,
  name varchar(255) not null unique,
  price decimal(5,2) not null,
  description text,
  image varchar(50),
  stock int not null,
  type enum('kpl', '100 g') not null,
  category_id int not null,
  index (category_id),
  foreign key (category_id) references productCategory(categoryID)
  on delete restrict,
  theme_id int,
  foreign key (theme_id) references themeCategory(id)
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
  on delete restrict,
  delivery enum('P', 'N') not null
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
insert into productcategory (parentID, name) values (2, 'Lakupatukat');
insert into productcategory (parentID, name) values (3, 'Suklaalevyt');
insert into productcategory (parentID, name) values (3, 'Suklaapatukat');
insert into productcategory (parentID, name) values (3, 'Suklaamunat');
insert into productcategory (parentID, name) values (3, 'Suklaakonvehdit');

insert into themecategory (name) values ('Joulu');
insert into themecategory (name) values ('Pääsiäinen');
insert into themecategory (name) values ('Halloween');
insert into themecategory (name) values ('Ystävänpäivä');

insert into product (name,price,description,image,stock,type,category_id, theme_id) values ('Irtosalmiakki',1.45,'Väkevä ja kova salmiakki. Kestävimmälläkin uroolla nousee vesi silmiin tätä imeskellessä. Ei heikoille!','images/imagenotfound', 67,'100 g', 4,NULL);
insert into product (name,price,description,image,stock,type,category_id, theme_id) values ('Kirpeä hedelmä',1.65,'Aivot räjäyttävä kirpeä hedelmäkaramelli. Tätä maistaessasi tiedät, miltä tuntuu avaruuskävelyllä ilman avaruuspukua.','images/imagenotfound', 643,'100 g', 5,1002);
insert into product (name,price,description,image,stock,type,category_id, theme_id) values ('Extrakova karkki',1.65,'Älä puraise, jos hampaasi ovat sinulle mieluisat.','images/imagenotfound', 3,'100 g', 6,NULL);
insert into product (name,price,description,image,stock,type,category_id, theme_id) values ('Pehmeä tuorelaku',1.85,'Laita suuhusi tämä pilvenpehmoinen lakritsi niin mietit, oletko kuollut ja taivaassa, niin herkullista se on.','images/imagenotfound', 34,'100 g', 7,NULL);
insert into product (name,price,description,image,stock,type,category_id, theme_id) values ('Vaaleanpunaiset sydämet',1.15,'Makeaa, pehmeää sokeria. Jos haluat ostaa rakkaallesi romanttisen lahjan, tässä hyvä valinta','images/imagenotfound', 39,'100 g', 8,1003);
insert into product (name,price,description,image,stock,type,category_id, theme_id) values ('Ihana kermatoffee',2.15,'Niin kermaista ja pehmeää, että aivan sulaa suussa. Sulattaa myös paatuneimman toffeenvihaajan sydämen.','images/imagenotfound', 76,'100 g', 9, NULL);
insert into product (name,price,description,image,stock,type,category_id, theme_id) values ('Hedelmäinen viinikumi',2.15,'Sitkeä ja teollisen makuinen. Sisältää runsaasti keinotekoisia aromeja, mutta ei mitään luonnollista.','images/imagenotfound', 56,'100 g', 10, NULL);
insert into product (name,price,description,image,stock,type,category_id, theme_id) values ('Toffeetäytesuklaa',1.95,'Pehmeä kermatoffeetäyte suussa sulavan suklaan sisässä. Näitä kannattaa tilata kerralla niin paljon, että oksentaa.','images/imagenotfound', 98,'100 g', 11, 1000);
insert into product (name,price,description,image,stock,type,category_id, theme_id) values ('Jättimätti',3.15,'Suurtakin suurempi karkkipussi, tästä riittää (ehkä) kavereillekin.','images/imagenotfound', 0,'kpl', 12, NULL);
insert into product (name,price,description,image,stock,type,category_id, theme_id) values ('Kissimirrin kikkareet',0.99,'Lasten suosiossa oleva pieni salmiakkikarkkilaatikko. Paino 23g.','images/imagenotfound', 34,'kpl', 13, 1001);
insert into product (name,price,description,image,stock,type,category_id, theme_id) values ('Lakupatukka',3.56,'Hyvänmakuinen lakupatukka. Mustaa ja makeaa. Tehty Suomessa.','images/imagenotfound', 24,'kpl', 14, NULL);
insert into product (name,price,description,image,stock,type,category_id, theme_id) values ('Se perussininen',3.56,'Tämä ei esittelyjä kaipaa. Tehty Suomessa.','images/imagenotfound', 25,'kpl', 15, NULL);
insert into product (name,price,description,image,stock,type,category_id, theme_id) values ('Paha patukka',3.56,'Jotain ulkomaalaista kakkaa.','images/imagenotfound', 1,'kpl', 16, NULL);
insert into product (name,price,description,image,stock,type,category_id, theme_id) values ('Yllätysmuna',3.56,'Laita suuhusi ja saat yllätyksen, vaikka et ehkä haluaisikaan.','images/imagenotfound', 19,'kpl', 17, 1001);
insert into product (name,price,description,image,stock,type,category_id, theme_id) values ('Konvehtirasia',3.56,'Sisältää erilaisia suklaakonvehteja. Suurin osa niistä on todennäköisiä sellaisia, joista et tykkää.','images/imagenotfound', 67,'kpl', 18, 1000);
insert into product (name,price,description,image,stock,type,category_id, theme_id) values ('Tepolla on asiaa',1000.0,'Koska Teppo soitti Jounille.','images/tepollaonasiaa', 1,'kpl', 12, NULL) 
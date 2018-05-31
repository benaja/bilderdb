create database picturecloud;

create table user(id int PRIMARY key auto_increment, firstname text, lastname text, email text, password text);

create table gallery(id int PRIMARY key auto_increment, createdate date, name text, description text, user_id int, share_link text, foreign key(user_id) references user(id) on delete cascade);

create table picture(id int PRIMARY key auto_increment, name text, description text, url text, user_id int, gallery_id int, created date, foreign key(user_id) references user(id) on delete cascade, foreign key(gallery_id) references gallery(id) on delete cascade);
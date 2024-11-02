CREATE TABLE store(
    store_id INT(4) NOT NULL AUTO_INCREMENT,
    store_name VARCHAR(20) NOT NULL,
    store_img VARCHAR(150) NOT NULL,
    store_info TEXT NOT NULL,
    store_lat DOUBLE(10, 6) NOT NULL,
    store_lng DOUBLE(10, 6) NOT NULL,
    store_ad VARCHAR(40) NOT NULL,
    user_id VARCHAR(20) NOT NULL,
    store_category VARCHAR(20),
    PRIMARY KEY(store_id));

CREATE TABLE store_auth(
    document_id INT(4) NOT NULL AUTO_INCREMENT,
    document VARCHAR(20) NOT NULL,
    user_id VARCHAR(20) NOT NULL,
    PRIMARY KEY(document_id)
);

CREATE TABLE cupon(
    cupon_id INT(4) NOT NULL AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    start DATE NOT NULL,
    end DATE NOT NULL,
    discount VARCHAR(20) NOT NULL,
    store_id INT(4) NOT NULL,
    PRIMARY KEY(cupon_id)
);

CREATE TABLE user(
    user_id VARCHAR(25) NOT NULL,
    user_name VARCHAR(20) NOT NULL,
    user_phone VARCHAR(20) NOT NULL,
    user_pw VARCHAR(25) NOT NULL,
    user_type INT(4) NOT NULL,
    user_img VARCHAR(100) NOT NULL,
    PRIMARY KEY(user_id)
);

CREATE TABLE user_cupon(
    cupon_id INT(4) NOT NULL,
    user_id INT(20) NOT NULL
);

CREATE TABLE user_type(
    type_id INT(4) NOT NULL,
    type_name VARCHAR(20) NOT NULL,
    PRIMARY KEY(type_id)
);

CREATE TABLE store_board(
   num int not null auto_increment,
   id char(20) not null ,     
   name char(20) not null,
   subject char(200) not null,
   content text not null,
   regist_day char(20),
   file_name text,
   file_type char(40),
   file_copied char(40),   
   primary key(num)
);

CREATE TABLE attend(
    time INT(2) NOT NULL, 
    store_id INT(4) NOT NULL,
    user_id VARCHAR(20) NOT NULL
);

CREATE TABLE attend_cupon(
    cupon_id INT(2) NOT NULL AUTO_INCREMENT,
    cupon_info VARCHAR(50) NOT NULL,
    store_id int(2) not null,
    primary key(cupon_id)
);
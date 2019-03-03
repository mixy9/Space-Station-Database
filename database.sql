CREATE TABLE record (
   user_id int(11) AUTO_INCREMENT PRIMARY KEY not null,
   type varchar(256) not null,
   name varchar(256) not null,
   date TIMESTAMP
   );

INSERT INTO record (type, name)
VALUES ('Value 1', 'Ship 1');

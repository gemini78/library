USE library_db;

CREATE TABLE writer (
  id INT NOT NULL AUTO_INCREMENT,
  firstname VARCHAR(80) NOT NULL,
  lastname VARCHAR(80) NOT NULL,
  birthday DATE NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE book (
  id INT NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  isbn VARCHAR(255) NOT NULL,
  publish_at DATE NOT NULL,
  writer_id INT NOT NULL,
  PRIMARY KEY (id)
);

ALTER TABLE book
ADD CONSTRAINT fk_book_writer 
FOREIGN KEY (writer_id) 
REFERENCES writer(id);

USE library_db;

ALTER TABLE book
ADD path_image VARCHAR(255) DEFAULT 'noCover.jpg';
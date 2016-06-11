CREATE TABLE IF NOT EXISTS payment_processors (
  id int NOT NULL AUTO_INCREMENT,
  name varchar(255),
  type varchar(255),
  apiKey varchar(255),
  merchantAccount varchar(255),
  loginAccount varchar(255),
  loginPassword varchar(255),
  secretKey varchar(255),
  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS payment_sources (
  id int,
  type varchar(255),
  account_number varchar(255),
  routing_number varchar(255),
  user_id int,
  address_id int,
  security_number varchar(255),
  payment_processor_id int,
  PRIMARY KEY (id)
);

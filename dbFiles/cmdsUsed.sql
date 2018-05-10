insert into user_type(description) values("admin");
insert into user_type(description) values("user");

insert into user_status(description) values("active");
insert into user_status(description) values("inactive");

insert into order_status(description) values("pending");
insert into order_status(description) values("delivered");
insert into order_status(description) values("done");

insert into users(username, password, email, first_name, last_name, gender, user_type,birthdate) 
values("admin", "test123", "laotabudlong@gmail.com", "Kynt", "Tabudlong", "male",1,"1992-06-29");

insert into categories(name) values("PS4");
insert into categories(name) values("XONE");
insert into categories(name) values("SWITCH");
insert into categories(name) values("PS4 ACC");
insert into categories(name) values("XONE ACC");
insert into categories(name) values("SWITCH ACC");
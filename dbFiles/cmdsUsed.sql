insert into user_type(role) values("admin");
insert into user_type(role) values("user");

insert into user_status(status) values("active");
insert into user_status(status) values("inactive");

insert into order_status(status) values("pending");
insert into order_status(status) values("completed");

//admin
insert into users(username, password, email, first_name, last_name, gender, user_type) 
values("admin", "test123", "laotabudlong@gmail.com", "Kynt", "Tabudlong", "male",1);

//sampleuser
insert into users(username, password, email, first_name, last_name, gender, user_type) 
values("knythiey", "test123", "kynt.tabudlong@gmail.com", "Zoom", "Simoy", "male",2);

//categories
insert into categories(name) values("PS4");
insert into categories(name) values("XONE");
insert into categories(name) values("SWITCH");
insert into categories(name) values("PS4 ACC");
insert into categories(name) values("XONE ACC");
insert into categories(name) values("SWITCH ACC");
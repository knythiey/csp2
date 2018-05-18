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


//products
insert into products(product_name, product_image, description, price_each, category_id, product_feedback) 
	values(
	"Monster Hunter: World", 
	"assets/img/uploads/mhw.jpg", 
	"Battle gigantic monsters in epic locales.

As a hunter, you'll take on quests to hunt monsters in a variety of habitats.
Take down these monsters and receive materials that you can use to create stronger weapons and armor in order to hunt even more dangerous monsters.

In Monster Hunter: World, the latest installment in the series, you can enjoy the ultimate hunting experience, using everything at your disposal to hunt monsters in a new world teeming with surprises and excitement.",
	60.00,
	1, 
	1
	);

//product_feedback
insert into product_feedback
	(product_feedback, product_rating, user_id)
	values
	("This game is so hard to put down",
	 5,
	 3);
insert into product_feedback
	(product_feedback, product_rating, user_id)
	values
	("This game is so hard to put down",
	 4,
	 3);
insert into product_feedback
	(product_feedback, product_rating, user_id)
	values
	("This game is so hard to put down",
	3,
	9);
insert into product_feedback
	(product_feedback, product_rating, user_id)
	values
	("This game is so hard to put down",
	2,
	9);
insert into product_feedback
	(product_feedback, product_rating, user_id) 
	values 
	("bad game, not recommended.",
	1,
	9);
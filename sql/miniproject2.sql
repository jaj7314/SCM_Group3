CREATE TABLE "address" (
  "id" serial PRIMARY KEY,
  "datetime" varchar(100) NOT NULL,
  "address1" varchar(100) NOT NULL,
  "address2" varchar(100) NOT NULL,
  "city" varchar(50) NOT NULL,
  "state" varchar(50) NOT NULL,
  "postal" int NOT NULL,
  "username" varchar(50) NOT NULL
);

CREATE TABLE "feedback" (
  "id" serial PRIMARY KEY,
  "name" varchar(100) NOT NULL,
  "datetime" varchar(100) NOT NULL,
  "email" varchar(100) NOT NULL,
  "comment" text NOT NULL
);

CREATE TABLE "orders" (
  "id" int NOT NULL,
  "datetime" varchar(100) NOT NULL,
  "fk_user_id" int NOT NULL,
  "price" decimal(11,2) NOT NULL,
  "quantity" int NOT NULL,
  "fk_address_id" int NOT NULL
);

CREATE TABLE "orders_line" (
  "id" serial PRIMARY KEY,
  "fk_order_id" int NOT NULL,
  "fk_product_code" varchar(50) NOT NULL,
  "quantity" int NOT NULL,
  "subtotal" decimal(11,2) NOT NULL
);

CREATE TABLE "products" (
  "id" serial PRIMARY KEY,
  "name" varchar(255) NOT NULL,
  "code" varchar(255) NOT NULL,
  "image" text NOT NULL,
  "price" decimal(10,2) NOT NULL,
  "description" text,
  "category" varchar(50) NOT NULL
);

CREATE TABLE "users" (
  "id" serial PRIMARY KEY,
  "username" varchar(50) NOT NULL,
  "email" varchar(100) NOT NULL,
  "password" varchar(50) NOT NULL,
  "confirmcode" varchar(32) NOT NULL,
  "status" char(10) NOT NULL
);


INSERT INTO products ("name", "code", "image", "price", "description", "category") VALUES
('Mama Mia Meatballs', 'SIDE01', 'img/Mama-Mia-Meatballs-1486730948.png', 10.50, 'Chicken meatballs cooked with mozzarella cheese, cream, napolitana sauce.', 'sides'),
('New Orleans Drumettes', 'SIDE02', 'img/New-Orleans-Drummets-1486730923.png', 10.50, 'Roasted chicken drumettes.', 'sides'),
('Molten Lava Cake', 'SIDE03', 'img/Molten-Lava-Cake-1486731026.png', 6.00, 'Chocolate lava cake filled with warm chocolate sauce.', 'sides'),
('Tempura Prawns', 'SIDE04', 'img/Tempura-King-Prawns-1486730731.png', 10.30, 'Juicy king prawns fried in tempura batter.', 'sides'),
('Cheesy Chicken Fingers', 'SIDE05', 'img/Cheesy-Chicken-Fingers-1486731210.png', 8.50, 'Fried chicken tenders filled with cheese.', 'sides'),
('Cinnamon Twist', 'SIDE06', 'img/Cinnamon_Twist_6pcs-1490002457.png', 8.20, 'Twisty bread sprinkled with cinnamon sugar.', 'sides'),
('Garlic Twist', 'SIDE07', 'img/Garlic_twist_6pcs-1490002437.png', 8.20, 'Twisted bread with garlic flavour.', 'sides'),
('Smoked Deli Wings', 'SIDE08', 'img/Smoked-Deli-Wings-1486730752.png', 7.50, 'Smoked chicken wings marinated in aromatic spices.', 'sides'),
('Criss Cut Fries', 'SIDE09', 'img/Criss-Cut-Fries-1486731129.png', 5.50, 'Criss-cut potato fries.', 'sides'),
('Soup', 'SIDE10', 'img/Cream_of_Mushroom_Soup-1489547423.png', 2.10, 'A bowl of rich mushroom soup.', 'sides'),
('Garlic Bread', 'SIDE11', 'img/Garlic-Bread-1486731087.png', 5.50, 'Oven-fresh garlic bread sprinkled with sesame seeds.', 'sides'),
('BBQ Criss Cut Fries', 'SIDE12', 'img/image-03.png', 6.00, 'Cries-cut potato fries drizzled with BBQ sauce.', 'sides'),
('Cheesy Chili Fries', 'SIDE13', 'img/image-01-1491478261.png', 6.00, 'Golden fried potato fries drizzled with mozzarella cheese and arrabiata sauce.', 'sides'),
('Crispy Fries', 'SIDE14', 'img/image-02-1491478307.png', 5.80, 'Golden fried potato fries.', 'sides'),
('TUSCANI &reg Chicken Alfredo Pasta', 'PASTA01', 'img/Tuscani_Chicken_Alfredo_Pasta.png', 15.50, 'Grilled chicken breast strips and rotini pasta baked in alfredo sauce with a layer of cheese. Served with an order of breadsticks. Serves 2.', 'pasta'),
('TUSCANI &reg Meaty Marinara Pasta ', 'PASTA02', 'img/Tuscani_Meaty_Marinara_Pasta.png', 15.50, 'Italian-seasoned meat sauce and rotini pasta topped with cheese. Served with an order of breadsticks. Serves 2.', 'pasta'),
('Chicken Bolognaise Spaghetti', 'SPAG01', 'img/Meatball-Bolognaise-Spaghetti-Chicken.png', 13.80, '&#9679 Chicken meatballs\r\n&#9679 Onions', 'pasta'),
('Creamy Carbonara Spaghetti', 'SPAG02', 'img/Creamy-Carbonara-Spaghetti.png', 13.80, '&#9679 Chicken rolls\r\n&#9679 Mushrooms\r\n&#9679 Roasted garlic\r\n&#9679 Onions', 'pasta'),
('Beef Arrabiata Spaghetti', 'SPAG03', 'img/Beef-Arrabiata-Spaghetti.png', 13.80, '&#9679 Beef brisket strips\r\n&#9679 Mushrooms\r\n&#9679 Capsicums\r\n&#9679 Roasted garlic \r\n&#9679 Onions', 'pasta'),
('Lipton Ice Lemon Tea', 'BEV01', 'img/Lipton-Ice-Lemon-Tea-can-1486731646.png', 2.00, NULL, 'beverage'),
('Mineral Water', 'BEV02', 'img/Mineral-Water-1486731578.png', 1.50, NULL, 'beverage'),
('Pepsi', 'BEV03', 'img/Pepsi-can-1486730043.png', 2.20, NULL, 'beverage'),
('7Up Revive', 'BEV04', 'img/7UP-Revive-can-1486731416.png', 2.20, NULL, 'beverage'),
('Tropicana Twister (Apple)', 'BEV05', 'img/Tropicana-Twister-Apple-1486731393.png', 4.30, NULL, 'beverage'),
('Tropicana Twister (Orange)', 'BEV06', 'img/Tropicana-Twister-Orange-1486731371.png', 4.30, NULL, 'beverage');

INSERT INTO "users" ("username", "email", "password", "confirmcode", "status") VALUES
('admin', 'zzzykf@gmail.com', 'admin', '1679091c5a880faf6fb5e6087eb1b2dc', 'Active'),
('zzzykf', 'zzzykf@gmail.com', '123', '1679091c5a880faf6fb5e6087eb1b2dc', 'Active');


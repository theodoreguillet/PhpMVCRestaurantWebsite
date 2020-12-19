CREATE TABLE usercred
(
	pseudo VARCHAR(50) PRIMARY KEY NOT NULL,
    email VARCHAR(255),
    passwd VARCHAR(255)
);

CREATE TABLE category
(
    catcode VARCHAR(50) PRIMARY KEY NOT NULL,
    pos INT,
    name VARCHAR(50),
    txt VARCHAR(255),
    img VARCHAR(50)
);

CREATE TABLE dish
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	/*id SERIAL PRIMARY KEY,*/
    name VARCHAR(50),
    txt VARCHAR(255),
    price FLOAT,
    img VARCHAR(50),
    catcode VARCHAR(50),
    FOREIGN KEY (catcode) REFERENCES Category(catcode)
);

INSERT INTO category(catcode, pos, name, img, txt)
values
	('starters', 0, 'Starters', 'starters.jpg', 'Enough to give yourself an appetite and taste the Italian gastronomy.'),
    ('pizzas', 1, 'Pizzas', 'pizzas.jpg', 'We bake our pizza in a stone-oven and it is pre-baked just long enough to allow its full flavour to develop.'),
    ('pastas', 2, 'Pastas', 'pastas.jpg', 'Home-made pasta, which can be combined with the wide choice of wines our cellar has to offer.'),
    ('cakes', 3, 'Cakes', 'cakes.jpg', 'We offer a wide choice of homemade cakes and pastries accompanied by coffee and other beverages.'),
    ('drinks', 4, 'Drinks', 'drinks.jpg', 'A fresh fruit juice or a glass of an Italian PDO wine.');

INSERT INTO dish(name, img, price, catCode, txt)
VALUES
    ('Margherita', 'margherita.jpg', 13, 'pizzas', 'San Marzano tomatoes, Mozzarella di Bufala Campana, fresh basil, extra-virgin olive oil'),
    ('Prosciutto e funghi', 'prosciutto_e_funghi.jpg', 16, 'pizzas', 'San Marzano tomatoes, Mozzarella di Bufala Campana, Prosciutto, sliced fresh champignon mushrooms, extra-virgin olive oil'),
    ('Ortolana', 'ortolana.jpg', 15, 'pizzas', 'San Marzano tomatoes, Mozzarella di Bufala Campana, marinated artichoke hearts, sliced red onion, sliced fresh champignon mushrooms, origan, extra-virgin olive oil'),
    ('Boscaiola', 'boscaiola.jpg', 16, 'pizzas', 'San Marzano tomatoes, Mozzarella di Bufala Campana, slices of sausage, sliced fresh champignon mushrooms, extra-virgin olive oil'),
    ('Frutti di Mare', 'frutti_di_mare.jpg', 22, 'pizzas', 'San Marzano tomatoes, Mozzarella di Bufala Campana, shrimps, mussels, squid, garlic, parsley, extra-virgin olive oil'),
    ('Fettuccine al pomodoro', 'fettuccine_al_pomodoro.jpg', 13, 'pastas', 'Fettuccine, San Marzano tomatoes, Parmigiano Reggiano PDO, fresh basil'),
    ('Pesto', 'pesto.jpg', 14, 'pastas', 'Linguine, home made pesto with fresh Genovese basil, Parmigiano Reggiano PDO'),
    ('Carbonara', 'carbonara.jpg', 15, 'pastas', 'Spaghetti, eggs, Pancetta, Pecorino Romano, extra-virgin olive oil'),
    ('Amatriciana', 'amatriciana.jpg', 16, 'pastas', 'Linguine, San Marzano tomatoes, onion, chilli flakes, Guincele Pecorino Romano, extra-virgin olive oil'),
    ('Feliciano', 'feliciano.jpg', 20, 'pastas', 'Spaghetti, shrimps, mussels, squid, Parmigiano Reggiano PDO, onion, capers, basil, extra-virgin olive oil'),
    ('Insalata', 'insalata.jpg', 15, 'starters', 'Cups Chopped Lettuce, Salami, Provolone, Mini Mozzarella, Jar Roasted Red Peppers, Cucumber, Red Onion, Cherry Tomatoes, Kalamata Olives, Basil'),
    ('Meat Plate', 'meat_plate.jpg', 12, 'starters', 'Sliced Prosciutto, Sausage, Grissini and Parmesan'),
    ('Panna Cotta', 'panna_cotta.jpg', 7, 'cakes', 'Traditionnal panna cotta with berries'),
    ('Tiramisu', 'tiramisu.jpg', 8, 'cakes', 'Homemade tiramisu with coffee and mascarpone cream'),
    ('Orange juice', 'orange_juice.jpg', 5, 'drinks', 'Fresh orange juice'),
    ('Wines', 'wines.jpg', NULL, 'drinks', 'You may ask for our wine list to discover a selection of wines from various areas.');

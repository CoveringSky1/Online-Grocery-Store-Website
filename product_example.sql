CREATE DATABASE assignment1;
use assignment1;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` int(10) unsigned DEFAULT NULL,
  `product_name` varchar(20) DEFAULT NULL,
  `unit_price` float(8,2) DEFAULT NULL,
  `unit_quantity` varchar(15) DEFAULT NULL,
  `in_stock` int(10) unsigned DEFAULT NULL,
  `category2` varchar(20) DEFAULT NULL,
  `category1` int(5) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of products
-- ----------------------------
BEGIN;
INSERT INTO `products` VALUES (1000, 'Fish Fingers', 2.55, '500 gram', 1500, "Seafood", 1, "FishFinger.png");
INSERT INTO `products` VALUES (1001, 'Fish Fingers', 5.00, '1000 gram', 750, "Seafood", 1, "FishFinger.png");
INSERT INTO `products` VALUES (1002, 'Hamburger Patties', 2.35, 'Pack 10', 1200 , "Meat", 1, "Hamburger.png");
INSERT INTO `products` VALUES (1003, 'Shelled Prawns', 6.90, '250 gram', 300, "Seafood", 1, "Prawns.png");
INSERT INTO `products` VALUES (1004, 'Tub Ice Cream', 1.80, 'I Litre', 800, "icecream", 4, "IceCream.png");
INSERT INTO `products` VALUES (1005, 'Tub Ice Cream', 3.40, '2 Litre', 1200, "icecream", 4, "IceCream.png");
INSERT INTO `products` VALUES (2000, 'Panadol', 3.00, 'Pack 24', 2000, "Medicine", 2, "Panadol.png");
INSERT INTO `products` VALUES (2001, 'Panadol', 5.50, 'Bottle 50', 1000, "Medicine", 2, "Panadol.png");
INSERT INTO `products` VALUES (2002, 'Bath Soap', 2.60, 'Pack 6', 500, "Beauty", 2, "Soap.png");
INSERT INTO `products` VALUES (2003, 'Garbage Bags Small', 1.50, 'Pack 10', 500, "Cleaning", 2, "Bag.png");
INSERT INTO `products` VALUES (2004, 'Garbage Bags Large', 5.00, 'Pack 50', 300, "Cleaning", 2, "Bag.png");
INSERT INTO `products` VALUES (2005, 'Washing Powder', 4.00, '1000 gram', 800, "Cleaning", 2, "Washing.png");
INSERT INTO `products` VALUES (3000, 'Cheddar Cheese', 8.00, '500 gram', 1000, "Milk&Butter", 1, "Cheese.png");
INSERT INTO `products` VALUES (3001, 'Cheddar Cheese', 15.00, '1000 gram', 1000, "Milk&Butter", 1, "Cheese.png");
INSERT INTO `products` VALUES (3002, 'T Bone Steak', 7.00, '1000 gram', 200 , "Meat", 1, "Steak.png");
INSERT INTO `products` VALUES (3003, 'Navel Oranges', 3.99, 'Bag 20', 200, "Friut", 3, "Orange.png");
INSERT INTO `products` VALUES (3004, 'Bananas', 1.49, 'Kilo', 400, "Friut", 3, "Bananas.png");
INSERT INTO `products` VALUES (3005, 'Peaches', 2.99, 'Kilo', 500, "Friut", 3, "Peach.png");
INSERT INTO `products` VALUES (3006, 'Grapes', 3.50, 'Kilo', 200, "Friut", 3, "Grape.png");
INSERT INTO `products` VALUES (3007, 'Apples', 1.99, 'Kilo', 500, "Friut", 3, "Apple.png");
INSERT INTO `products` VALUES (4000, 'Earl Grey Tea Bags', 2.49, 'Pack 25', 1200, "Tea&Coffee", 4, "Tea.png");
INSERT INTO `products` VALUES (4001, 'Earl Grey Tea Bags', 7.25, 'Pack 100', 1200, "Tea&Coffee", 4, "Tea.png");
INSERT INTO `products` VALUES (4002, 'Earl Grey Tea Bags', 13.00, 'Pack 200', 800, "Tea&Coffee", 4, "Tea.png");
INSERT INTO `products` VALUES (4003, 'Instant Coffee', 2.89, '200 gram', 500, "Tea&Coffee", 4, "Coffee.png");
INSERT INTO `products` VALUES (4004, 'Instant Coffee', 5.10, '500 gram', 500, "Tea&Coffee", 4, "Coffee.png");
INSERT INTO `products` VALUES (4005, 'Chocolate Bar', 2.50, '500 gram', 300, "Snacks", 4, "Chocolate.png");
INSERT INTO `products` VALUES (5000, 'Dry Dog Food', 5.95, '5 kg Pack', 400, "DogFood", 5, "DogFood.png");
INSERT INTO `products` VALUES (5001, 'Dry Dog Food', 1.95, '1 kg Pack', 400, "DogFood", 5, "DogFood.png");
INSERT INTO `products` VALUES (5002, 'Bird Food', 3.99, '500g packet', 200, "BirdFood", 5, "BirdFood.png");
INSERT INTO `products` VALUES (5003, 'Cat Food', 2.00, '500g tin', 200, "CatFood", 5, "CatFood.png");
INSERT INTO `products` VALUES (5004, 'Fish Food', 3.00, '500g packet', 200, "FishFood", 5, "FishFood.png");
INSERT INTO `products` VALUES (2006, 'Laundry Bleach', 3.55, '2 Litre Bottle', 500, "Cleaning", 2, "Bleach.png");
INSERT INTO `products` VALUES (6001, 'Garlic', 1.50, 'Kilo', 300, "Vegetable", 3, "Garlic.png");
INSERT INTO `products` VALUES (6002, 'Potato', 2.00, 'Kilo', 200, "Vegetable", 3, "Potato.png");
INSERT INTO `products` VALUES (6003, 'Tomato', 2.50, 'Kilo', 150, "Vegetable", 3, "Tomato.png");
INSERT INTO `products` VALUES (6004, 'Coleslaw', 2.00, 'A Bag', 110, "Salad", 3, "Coleslaw.png");
INSERT INTO `products` VALUES (6005, 'Chicken Breast', 7.00, '150 gram', 200, "Chicken", 1, "Breast.png");
INSERT INTO `products` VALUES (6006, 'Chicken Drumsticks', 4.50, 'Kilo', 150, "Chicken", 1, "Drumsticks.png");
COMMIT;

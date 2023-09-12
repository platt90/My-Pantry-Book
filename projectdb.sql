-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2023 at 04:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `favourite_id` int(10) UNSIGNED NOT NULL,
  `iduser` int(10) UNSIGNED NOT NULL,
  `recipe_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`favourite_id`, `iduser`, `recipe_id`) VALUES
(41, 1, 17);

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE `ingredient` (
  `ingredient_id` int(10) UNSIGNED NOT NULL,
  `ingredient_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`ingredient_id`, `ingredient_name`) VALUES
(1, 'Flour'),
(2, 'Sugar'),
(3, 'Salt'),
(4, 'Baking powder'),
(5, 'Baking soda'),
(6, 'Yeast'),
(7, 'Eggs'),
(8, 'Milk'),
(9, 'Butter'),
(10, 'Olive Oil'),
(11, 'Vinegar'),
(12, 'Mustard'),
(13, 'Soy sauce'),
(14, 'Worcestershire sauce'),
(15, 'Ketchup'),
(16, 'Mayonnaise'),
(17, 'Honey'),
(18, 'Vanilla extract'),
(19, 'Cinnamon'),
(20, 'Nutmeg'),
(21, 'Garlic Cloves'),
(22, 'Onions'),
(23, 'Ginger'),
(24, 'Turmeric'),
(25, 'Paprika'),
(26, 'Cayenne pepper'),
(27, 'Black pepper'),
(28, 'Salt'),
(29, 'Lemon juice'),
(30, 'Lime juice'),
(31, 'Orange juice'),
(32, 'Tomatoes'),
(33, 'Lettuce'),
(34, 'Cucumber'),
(35, 'Carrots'),
(36, 'Potatoes'),
(38, 'Garlic'),
(39, 'Bell peppers'),
(40, 'Broccoli'),
(41, 'Cauliflower'),
(42, 'Green beans'),
(43, 'Peas'),
(44, 'Corn'),
(45, 'Mushrooms'),
(46, 'Chicken'),
(47, 'Beef'),
(48, 'Pork'),
(49, 'Fish'),
(50, 'Shrimp'),
(51, 'Tofu'),
(52, 'Rice'),
(53, 'Pasta'),
(54, 'Bread'),
(55, 'Tortillas'),
(56, 'Cheese'),
(57, 'Yogurt'),
(58, 'Nuts'),
(59, 'Seeds'),
(60, 'Chocolate'),
(61, 'Chicken Thighs'),
(62, 'Squid'),
(63, 'Saffron'),
(64, 'Chicken Stock'),
(65, 'Paella Rice'),
(66, 'King Prawns'),
(67, 'Mussels'),
(68, 'Red Pepper'),
(69, 'Lemon'),
(70, 'Bacon'),
(71, 'Thyme'),
(72, 'Leek'),
(73, 'Chorizo'),
(74, 'Yellow Pepper'),
(75, 'Bay Leaf'),
(76, 'Celery'),
(77, 'Fish Stock'),
(78, 'Parsley'),
(79, 'Clams'),
(80, 'Egg Yolk'),
(81, 'Beef Mince'),
(82, 'Spaghetti'),
(83, 'Parsnips'),
(84, ' Self Raising Flour'),
(85, 'Sage'),
(86, 'Sweet Potatoes'),
(87, 'Shallots'),
(88, 'Walnuts'),
(89, 'Parmesan'),
(90, 'Oregano'),
(91, 'Vegetarian Mince'),
(93, 'Vegan Dried Macaroni'),
(94, 'Oat Milk'),
(95, 'Vegan Cheese');

-- --------------------------------------------------------

--
-- Table structure for table `pantry`
--

CREATE TABLE `pantry` (
  `pantry_id` int(10) UNSIGNED NOT NULL,
  `iduser` int(10) DEFAULT NULL,
  `ingredient_id` int(10) UNSIGNED NOT NULL,
  `unit_id` int(10) UNSIGNED NOT NULL,
  `amount` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pantry`
--

INSERT INTO `pantry` (`pantry_id`, `iduser`, `ingredient_id`, `unit_id`, `amount`) VALUES
(2, 1, 10, 11, 500),
(3, 1, 22, 1, 6),
(4, 1, 70, 1, 12),
(5, 1, 45, 12, 500),
(6, 1, 35, 1, 12),
(7, 1, 1, 12, 251),
(8, 1, 71, 12, 50),
(9, 1, 64, 1, 6),
(10, 1, 72, 1, 12),
(11, 1, 81, 13, 1),
(12, 1, 32, 12, 500),
(14, 2, 61, 1, 9),
(15, 2, 10, 14, 1),
(16, 2, 22, 1, 3),
(17, 2, 36, 1, 12),
(18, 2, 35, 1, 12),
(19, 2, 83, 1, 6),
(20, 2, 1, 12, 250),
(21, 2, 64, 1, 4),
(22, 2, 12, 12, 250),
(23, 2, 84, 12, 250),
(24, 2, 85, 12, 50),
(25, 1, 82, 12, 400),
(27, 1, 61, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `recipe_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `method` text DEFAULT NULL,
  `featured` bit(1) NOT NULL DEFAULT b'0',
  `vegetarian` bit(1) NOT NULL DEFAULT b'0',
  `vegan` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`recipe_id`, `name`, `image`, `description`, `method`, `featured`, `vegetarian`, `vegan`) VALUES
(1, 'Chicken And Seafood Paella', 'chicken_and_seafood_62744_16x9.jpg', 'Many families in Spain have their own version of paella, each slightly different from the last. Some include rabbit or chicken, while others focus on seafood. This paella is a homage to my family from Mallorca and is made with both meat and fish.\r\n\r\nResist the temptation to stir the rice while it cooks, else you won\'t get the all-important crispy base (called the socarrat). You do not need a paella dish to make this recipe: a large, flat non-stick frying pan – around 33cm/13in – will do.', 'Heat the olive oil in a large non-stick frying pan (around 33cm/13in) on high heat. Once hot, fry the chicken for 5 minutes or until golden on the outside. Add the garlic and tomatoes and stir to combine, then add the paprika and fry for a minute until fragrant. Add the slices of squid and stir-fry for around 5 minutes until they start to colour, being careful to not overcook the garlic.\r\n\r\nAdd the saffron to the hot chicken stock and leave it to infuse for 1–2 minutes, then pour the stock into the pan. Bring the stock to the boil, then gently stir in the rice and season with salt and pepper. Reduce the temperature to a medium heat, give the rice one final stir then leave to cook, uncovered, for 15–20 minutes. Do not be tempted to stir the paella again – you want the caramelised socarrat to form on the base.\r\n\r\nArrange the king prawns, mussels and roasted pepper on the top of the paella in a spiral pattern. Cover the pan with foil, increase the heat to medium-high and cook for a further 5–7 minutes, until the rice is al dente and the prawns have become pink and opaque (the increased heat will also help create the crunchy socarrat).\r\n\r\nRemove the pan from the heat and allow the paella to rest for 10 minutes, still covered.\r\n\r\nUncover the paella and serve with the lemon wedges, to squeeze on top.', b'1', b'0', b'0'),
(2, 'Beachside Paella', 'beachside_paella_41859_16x9.jpg', 'We cooked this on a beach in Northumberland and some said it was the best paella they’d ever tasted – dieting or not. You know what? We have to agree.', 'Heat the oil in a 38cm/15in paella pan – ideally non-stick. A paella pan is best, but if you don’t have one, use a very wide, shallow non-stick saucepan, flameproof casserole dish or sauté pan.\r\n\r\nPlace the pan over a medium heat. Season the chicken thighs with salt and black pepper and fry them for about five minutes, turning every now and then until lightly coloured. Add the chorizo and cook for 30 seconds more, turning once. Transfer the chicken and chorizo to a large heatproof bowl with a slotted spoon, leaving the fat in the pan.\r\n\r\nAdd the onions to the pan and fry gently for 4–5 minutes until softened and very lightly browned, stirring occasionally. Add the peppers and green beans to the onions and cook for two minutes until they are beginning to soften. Stir in the garlic, smoked paprika, saffron, bay leaf and rice and cook for 1–2 minutes until the rice is glistening all over.\r\n\r\nReturn the chicken and chorizo to the pan, along with any juices. Stir well, then pour in the chicken stock and season with black pepper. Stir once or twice and bring to a simmer over a medium heat. Cook for 12 minutes, stirring occasionally.\r\n\r\nTip the mussels into the partly cooked rice mixture and stir once more, making sure they are well tucked into the hot rice and steaming liquid. Return to a simmer and cook for three minutes or until most of the mussels have opened, stirring occasionally.\r\n\r\nScatter the squid and prawns over the top of the paella and stir well. Continue cooking for 4–5 minutes until the squid and prawns are cooked, the rice is tender and almost all the liquid has been absorbed. The prawns should be completely pink when cooked.\r\n\r\nIt’s important not to keep stirring after the squid and prawns are added – you want the rice to become lightly browned and a bit sticky at the sides of the pan as this adds flavour. Keep an eye on the heat though, as you don’t want the rice to burn. Add a splash more water if the paella begins to look very dry before the rice is ready. Pick out any mussels that haven’t opened by the end of the cooking time and chuck them away. Serve hot with lemon wedges for squeezing.', b'0', b'0', b'0'),
(3, 'Arroz Verde', 'arroz_verde_49624_16x9.jpg', 'Bring the flavours of the sea and the holiday vibes to your table with this arroz verde recipe inspired by Rick Stein\'s trip to Cadiz. It\'s packed with shellfish and garlic - perfect for an early autumn dinner party as the clams come back in season.', 'For the fish stock, put all the ingredients and 2½ litres/4½ pints water in a large pan and simmer gently for 30 minutes. Strain through a fine or muslin-lined sieve. If not using immediately, leave to cool, then refrigerate or freeze.\r\n\r\nFor the arroz verde, heat the oil in a 28–30cm/11–12in shallow flameproof casserole over medium heat. Add the shallots and fry for 5 minutes, or until soft. Add the garlic and fry for 40–60 seconds, then stir in the fish stock, parsley and salt and bring to the boil.\r\n\r\nSprinkle in the rice, stir once, then leave to simmer vigorously over medium–high heat for 6 minutes. Put the clams and prawns on top and shake the pan briefly so they sink into the rice a little. Lower the heat and simmer gently for 12 minutes. Almost all the liquid should be absorbed and the rice should be pitted with small holes. Discard any clams that do not open after cooking.\r\n\r\nMeanwhile, for the aioli, mix the garlic and salt together to form a paste. Put in a food processor and add the yolk. Turn on the machine and very slowly trickle the oil through the hole in the lid until you have a thick emulsion.\r\n\r\nServe the arroz verde with the aioli.', b'1', b'0', b'0'),
(4, 'Easy Chicken Casserole', 'chickencasserole_85719_16x9.jpg', 'An easy chicken casserole recipe should be in every cook\'s little black book and this one will go down well with all of the family. Serve with mashed or boiled potatoes, or rice.\r\n\r\nEach serving provides 425 kcal, 48g protein, 13g carbohydrates (of which 7.5g sugars), 19g fat (of which 5g saturates), 5g fibre and 2.4g salt.', 'Preheat the oven 190C/170C Fan/Gas 5. Season the chicken thighs all over with a little salt and lots of black pepper.\r\n\r\nHeat the oil in a large non-stick casserole pan over a medium heat and fry the chicken for 7–8 minutes, skin-side down, or until the skin is nicely browned. Turn and cook on the other side for 3 minutes more. Transfer to a plate.\r\n\r\nReturn the pan to the heat and add the onion, bacon and mushrooms. Fry over a medium-high heat for 4–5 minutes, or until lightly browned, stirring regularly. Add the carrots and flour and toss together well.\r\n\r\nSprinkle with the thyme, then pour in the stock, a little at a time, stirring well between each addition. Add the chicken pieces back to the pan and bring to a gentle simmer. Cover the pan with a lid.\r\n\r\nPlace in the oven and cook for 45 minutes. Take out of the oven and stir in the leeks.\r\n\r\nReturn to the oven for a further 15 minutes, or until the chicken and leeks are tender and the sauce has thickened. Serve.', b'1', b'0', b'0'),
(5, 'Easy Spaghetti Bolognese', 'easy_spaghetti_bolognese_93639_16x9.jpg', 'Everyone needs a basic spaghetti bolognese recipe that still tastes great, no matter how simple. Get that depth of flavour by cooking the sauce very gently until it’s super rich. This spag bol is designed to be a low cost recipe.\r\n\r\nEach serving provides 787 kcal, 35g protein, 103g carbohydrates (of which 19g sugars), 24g fat (of which 8g saturates), 8.5g fibre and 1.5g salt.', 'Heat a large saucepan over a medium heat. Add a tablespoon of olive oil and once hot add the beef mince and a pinch of salt and pepper. Cook the mince until well browned over a medium-high heat (be careful not to burn the mince. It just needs to be a dark brown colour). Once browned, transfer the mince to a bowl and set aside.\r\n\r\nAdd another tablespoon of oil to the saucepan you browned the mince in and turn the heat to medium. Add the onions and a pinch of salt and fry gently for 5-6 minutes, or until softened and translucent. Add the garlic and cook for another 2 minutes. Add the grated carrot then pour the mince and any juices in the bowl back into the saucepan.\r\n\r\nAdd the tomatoes to the pan and stir well to mix. Pour in the stock, bring to a simmer and then reduce the temperature to simmer gently for 45 minutes, or until the sauce is thick and rich. Taste and adjust the seasoning as necessary.\r\n\r\nWhen ready to cook the spaghetti, heat a large saucepan of water and add a pinch of salt. Cook according to the packet instructions. Once the spaghetti is cooked through, drain and add to the pan with the bolognese sauce. Mix well and serve.', b'1', b'0', b'0'),
(6, 'Slow Cooker Chicken Casserole with Dumplings', 'somerset_chicken_36937_16x9.jpg', 'Adding dumplings to this simple, slow-cooker chicken casserole makes it great value when feeding the family.\r\n\r\nEquipment and preparartion: For this recipe you will need a 6.5 litre/11½ pints electric slow-cooker. Each serving provides 1034 kcal, 53g protein, 98g carbohydrates (of which 16g sugars), 41g fat (of which 17g saturates), 12.5g fibre and 2.3g salt.', 'Season the chicken thighs all over with a little salt and pepper. Heat the oil in a large, heavy-based, non-stick frying pan over a medium heat. Add the chicken thighs skin-side down and fry for 6-8 minutes, or until deep golden-brown.\r\n\r\nTurn the chicken over and fry for 2-3 minutes. Transfer the chicken to a plate and set aside.\r\n\r\nPut the vegetables in the slow-cooker. Sprinkle over the flour and stir to coat. Add the chicken and pour over the stock and cider. Stir in the mustard. Cover and cook on high for 4½ hours.\r\n\r\nWhen the casserole has been cooking for about 4 hours, make the dumplings. Mix together the flour, suet and sage in a large mixing bowl. Season with salt and pepper.\r\n\r\nMake a well and gradually pour in 125ml/4fl oz cold water in a thin stream, slowly bringing the dry ingredients into the pool of water and stirring using a wooden spoon until the mixture comes together as a soft, squidgy dough.\r\n\r\nTurn the dough out onto a lightly floured work surface and divide it into 12 pieces. Roll the pieces into balls.\r\n\r\nRemove the lid from the slow-cooker and skim off any fat that has risen to the surface. Arrange the dumplings on top of the casserole and cover. Cook for 30 minutes, or until the dumplings puff up.\r\n\r\nSpoon the casserole and dumplings onto plates and serve with steamed kale, shredded cabbage or green beans.', b'0', b'0', b'0'),
(16, 'Vegetarian Cottage Pie', 'vegetariancottagepie_92035_16x9.jpg', 'A vegetarian take on a classic cottage pie. Beans and veggie mince replace meat, and root vegetables give the mash a unique twist.', 'Preheat the oven to 190C/170C Fan/Gas 5.\r\n\r\nTo make the topping, place the potatoes and parsnips or swede into a large pan of water. Bring to the boil and cook for 12–15 minutes, or until tender. Drain well.\r\n\r\nAdd the butter and mash using a potato masher or ricer. Add the milk, a little at a time, and continue to mash until smooth. Season, to taste, with salt and freshly ground black pepper. Set aside.\r\n\r\nTo make the filling, heat the oil in a large pan over a low to medium heat. Add the onion and fry for 10 minutes, or until softened. Add the garlic, carrot, leek and thyme and continue to fry for a further 5 minutes, or until softened. Add the vegetarian mince to the pan and fry for a further 3 minutes, stirring continuously, or until golden-brown.\r\n\r\nAdd the drained cannellini beans, chopped tomatoes and tomato purée and stir well to combine. Simmer for 5 minutes, or until the sauce has thickened. Season, to taste, with salt and freshly ground black pepper. Taste and add a little sugar to the mixture if needed.\r\n\r\nSpoon the filling into a large ovenproof dish. Spread the mashed potato and parsnip (or swede) mixture over the filling in a smooth, even layer.\r\n\r\nBake for 20 minutes, or until the topping is golden-brown and the filling is cooked through. Serve with steamed green vegetables.', b'0', b'1', b'0'),
(17, 'Vegetarian Egg Fried Rice', 'egg_and_vegetable_fried_44022_16x9.jpg', 'Packed with vegetables and ready in minutes, this vegetarian fried rice is a great quick and easy mid-week meal.', 'Heat the oil to smoking point in a large wok. Add the eggs and swirl with a ladle or spoon, breaking them up as they cook.\r\n\r\nAdd the spring onions and peppers and stir-fry for 1 minute. Add the remaining vegetables, season with salt and pepper, and stir-fry for a couple of minutes until they are softened, but still have a bite.\r\n\r\nAdd the rice and stir-fry for a few minutes until the rice is piping hot. Season with soy sauce and serve.', b'0', b'1', b'0'),
(18, 'Vegan Mac and Cheese', 'vegan_mac_and_cheese_32466_16x9.jpg', 'Comfort food at its best, this creamy and indulgent vegan mac and cheese is a pure crowd pleaser. You could also use truffle oil instead of olive oil for a luxuriously fragrant sauce.\r\n\r\nIf you don\'t use it already, nutritional yeast is a \"cheesy\" substitute. It often comes in flakes, which makes it brilliant to stir into warm sauces like this one. It creates a luxurious, tangy, silky sauce. It is also a vegan source of vitamin b12. Each serving provides 490kcal, 10g protein, 58g carbohydrate (of which 2g sugars), 23g fat (of which 8g saturates), 5g fibre and 2.1g salt.', 'Bring a large pan of salted water to the boil. Add the macaroni and cook until just al dente.\r\n\r\nTo make the sauce, put all the ingredients apart from the vegan cheese into a bowl or blender and whisk or blend until smooth. Tip into a large pan over a low–medium heat. Add 100g/3½oz vegan cheese and cook until melted – but be careful not to bring it to a simmer.\r\n\r\nPreheat the grill to medium–high. Drain the pasta, then add to the cheese sauce and mix until coated. Tip into a 30cm/12in oval baking dish and top with the remaining 20g/½oz vegan cheese. Grill for 5–10 minutes, or until golden.\r\n\r\nIf making the topping, heat the oil in a heavy-based pan. Add the garlic, sprouts and a pinch of salt and fry for 5 minutes. Scatter the topping over the mac and cheese before serving.', b'0', b'1', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_ingredient`
--

CREATE TABLE `recipe_ingredient` (
  `recipe_ingredient_id` int(10) UNSIGNED NOT NULL,
  `recipe_id` int(10) UNSIGNED NOT NULL,
  `ingredient_id` int(10) UNSIGNED NOT NULL,
  `unit_id` int(10) UNSIGNED NOT NULL,
  `amount` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipe_ingredient`
--

INSERT INTO `recipe_ingredient` (`recipe_ingredient_id`, `recipe_id`, `ingredient_id`, `unit_id`, `amount`) VALUES
(1, 1, 10, 2, 4),
(2, 1, 61, 1, 4),
(3, 1, 21, 1, 3),
(4, 1, 32, 12, 500),
(5, 1, 25, 3, 2),
(6, 1, 62, 1, 2),
(7, 1, 63, 3, 2),
(8, 1, 64, 11, 600),
(9, 1, 65, 12, 300),
(10, 1, 66, 12, 300),
(11, 1, 67, 12, 250),
(12, 1, 68, 1, 1),
(13, 1, 69, 1, 1),
(14, 2, 10, 2, 1),
(15, 2, 61, 1, 6),
(16, 2, 73, 12, 75),
(17, 2, 22, 1, 2),
(18, 2, 68, 1, 1),
(19, 2, 74, 1, 1),
(20, 2, 42, 12, 150),
(21, 2, 21, 1, 3),
(22, 2, 25, 3, 2),
(23, 2, 63, 3, 1),
(24, 2, 75, 1, 1),
(25, 2, 65, 12, 175),
(26, 2, 64, 14, 1),
(27, 2, 67, 12, 500),
(28, 2, 62, 1, 1),
(29, 2, 66, 1, 12),
(30, 2, 69, 1, 1),
(31, 3, 22, 1, 1),
(32, 3, 76, 12, 100),
(33, 3, 35, 12, 100),
(34, 3, 45, 12, 25),
(35, 3, 71, 3, 1),
(36, 3, 10, 2, 4),
(37, 3, 87, 12, 60),
(38, 3, 21, 1, 12),
(39, 3, 77, 14, 1),
(40, 3, 78, 12, 100),
(41, 3, 65, 12, 400),
(42, 3, 79, 1, 30),
(43, 3, 66, 12, 200),
(44, 3, 80, 1, 1),
(45, 3, 21, 1, 4),
(46, 3, 10, 11, 175),
(47, 4, 61, 1, 8),
(48, 4, 10, 2, 1),
(49, 4, 22, 1, 1),
(50, 4, 70, 1, 4),
(51, 4, 45, 12, 150),
(52, 4, 35, 1, 3),
(53, 4, 1, 12, 20),
(54, 4, 71, 3, 1),
(55, 4, 64, 11, 500),
(56, 4, 72, 1, 1),
(57, 5, 10, 2, 2),
(58, 5, 81, 12, 400),
(59, 5, 22, 1, 1),
(60, 5, 35, 12, 100),
(61, 5, 32, 12, 400),
(62, 5, 64, 11, 400),
(63, 5, 82, 12, 400),
(64, 6, 61, 1, 8),
(65, 6, 10, 2, 2),
(66, 6, 22, 1, 2),
(67, 6, 36, 12, 600),
(68, 6, 35, 1, 3),
(69, 6, 83, 1, 2),
(70, 6, 1, 2, 3),
(71, 6, 64, 11, 200),
(72, 6, 12, 2, 1),
(73, 6, 84, 12, 200),
(74, 6, 85, 2, 3),
(75, 8, 1, 12, 100),
(76, 15, 2, 12, 100),
(77, 15, 5, 12, 250),
(78, 16, 10, 2, 1),
(79, 16, 22, 1, 1),
(80, 16, 21, 1, 1),
(81, 16, 35, 1, 1),
(82, 16, 72, 1, 1),
(83, 16, 71, 2, 2),
(84, 16, 91, 12, 300),
(85, 16, 32, 12, 400),
(86, 17, 10, 2, 3),
(87, 17, 7, 1, 2),
(88, 17, 68, 1, 1),
(89, 17, 74, 1, 1),
(90, 17, 35, 1, 1),
(91, 17, 42, 1, 6),
(92, 17, 45, 1, 10),
(93, 17, 52, 12, 500),
(94, 18, 10, 2, 5),
(95, 18, 21, 1, 4),
(96, 18, 27, 3, 1),
(97, 18, 3, 3, 1),
(98, 18, 25, 3, 1),
(99, 18, 93, 12, 250),
(100, 18, 94, 11, 400),
(101, 18, 95, 12, 120);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_list`
--

CREATE TABLE `shopping_list` (
  `shopping_list_id` int(10) UNSIGNED NOT NULL,
  `iduser` int(10) DEFAULT NULL,
  `ingredient_id` int(10) UNSIGNED NOT NULL,
  `unit_id` int(10) UNSIGNED NOT NULL,
  `amount` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shopping_list`
--

INSERT INTO `shopping_list` (`shopping_list_id`, `iduser`, `ingredient_id`, `unit_id`, `amount`) VALUES
(13, 1, 1, 13, 1),
(14, 1, 7, 1, 12),
(15, 1, 86, 1, 12),
(16, 1, 81, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(10) UNSIGNED NOT NULL,
  `unit_name` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_name`) VALUES
(1, ' '),
(2, 'tablespoons'),
(3, 'teaspoons'),
(4, 'ounces'),
(5, 'fluid ounces'),
(6, 'cups'),
(7, 'quarts'),
(8, 'pints'),
(9, 'gallons'),
(10, 'pounds'),
(11, 'milliliters'),
(12, 'grams'),
(13, 'kilograms'),
(14, 'liters');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `privilege` int(11) DEFAULT 0,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `creation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `privilege`, `name`, `email`, `creation`) VALUES
(1, 'Jon', 'qwerty', 1, 'Jon', 'jon.platt@ljmu.com', '2023-03-10 19:21:37'),
(2, 'Test', 'qwerty', 1, 'Test_Account', 'test@ljmu.ac.uk', '2023-03-11 09:26:47'),
(8, 'Test123', '1234', 1, '1234', '1234', '2023-04-17 20:27:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`favourite_id`);

--
-- Indexes for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`ingredient_id`);

--
-- Indexes for table `pantry`
--
ALTER TABLE `pantry`
  ADD PRIMARY KEY (`pantry_id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recipe_id`);

--
-- Indexes for table `recipe_ingredient`
--
ALTER TABLE `recipe_ingredient`
  ADD PRIMARY KEY (`recipe_ingredient_id`);

--
-- Indexes for table `shopping_list`
--
ALTER TABLE `shopping_list`
  ADD PRIMARY KEY (`shopping_list_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `favourite_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `ingredient_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `pantry`
--
ALTER TABLE `pantry`
  MODIFY `pantry_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipe_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `recipe_ingredient`
--
ALTER TABLE `recipe_ingredient`
  MODIFY `recipe_ingredient_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `shopping_list`
--
ALTER TABLE `shopping_list`
  MODIFY `shopping_list_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

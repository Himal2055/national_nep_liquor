-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2015 at 03:11 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminuser` varchar(32) NOT NULL,
  `adminpass` varchar(32) NOT NULL,
`adminid` int(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminuser`, `adminpass`, `adminid`) VALUES
('21232f297a57a5a743894a0e4a801fc3', '5f4dcc3b5aa765d61d8327deb882cf99', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`id` int(6) NOT NULL,
  `name` varchar(45) NOT NULL,
  `drink` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `cl` float NOT NULL,
  `abv` float NOT NULL,
  `price` float NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(40) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `drink`, `type`, `cl`, `abv`, `price`, `description`, `image`, `created`) VALUES
(1, 'Jack Daniel&#39;s Old No. 7 Half Bottle', 'Whiskey', 'Tennessee Whiskey', 35, 40, 12.95, 'A half bottle of Jack Daniel&#39;s best selling old no.7 Tennessee Whiskey, famous worldwide thanks to the sweet smoothness imparted by the Lincoln County Process of charcoal-mellowing the spirit before maturation.', 'bourbon/jackdanielsno7half.jpg', '2014-12-23 16:43:42'),
(2, 'Jim Beam White Label', 'Whiskey', 'Bourbon', 70, 40, 16.95, 'Made to the same formula since 1795, this giant of the category is aged for four years in oak barrels to create a smooth, mellow taste with hints of spice.', 'bourbon/jimbeam.jpg', '2014-12-23 16:43:42'),
(3, 'Heaven Hill', 'Whiskey', 'Bourbon', 70, 40, 19.75, 'The flagship brand produced by the Heaven Hill distillery in Kentucky. A solid 4 year old bourbon.', 'bourbon/heavenhill.jpg', '2014-12-23 16:43:42'),
(11, 'Four Roses Yellow Label', 'Whiskey', 'Bourbon', 70, 40, 20.95, 'Very popular bourbon, aged a minimum of five years in oak barrels for extra smoothness and carefully blended for a consistently smooth, creamy flavour.', 'bourbon/fourroses.jpg', '2014-12-29 20:35:16'),
(12, 'Jim Beam Red Stag', 'Whiskey', 'Bourbon', 70, 40, 23.35, 'A love-it-or-hate-it whiskey from Jim Beam, who have flavoured their bourbon with natural cherry flavour to make Red Stag.', 'bourbon/redstag.jpg', '2014-12-29 20:36:23'),
(13, 'Buffalo Trace Bourbon', 'Whiskey', 'Bourbon', 70, 40, 23.95, 'Buffalo Trace is a really classy bourbon from the eponymous distillery that has been responsible for some truly outstanding products in recent years. A must-stock for any bar worthy of the name and probably the best all-rounder around twenty quid.', 'bourbon/buffalotrace.jpg', '2014-12-29 20:38:45'),
(14, 'Bulleit Bourbon', 'Whiskey', 'Bourbon', 70, 45, 28.45, 'Packaged in an old-style bottle, Bulleit bourbon has developed a loyal following in the decade or so since its arrival on UK shores. The high rye content (around 30%) gives this a spicy kick. Now bottled at 45% in line with the strength seen in the Americas.', 'bourbon/bulleit.jpg', '2014-12-29 20:39:48'),
(15, 'Old Crow', 'Whiskey', 'Bourbon', 100, 40, 31.95, 'A litre bottle of Old Crow, named after James Crow, the Scottish doctor who changed the course of American whiskey production by inventing the sour mash process.', 'bourbon/oldcrow.jpg', '2014-12-29 20:40:31'),
(16, 'Johnnie Walker 12 Year Old Black Label Small', 'Whiskey', 'Scotch', 20, 43, 7.65, 'A 20cl bottle of Johnnie Walker&#39;s much loved, slightly smoky Black Label blended whisky, originally launched in 1909 and still one of the world&#39;s most popular blended Scotches.', 'scotch/johnniewalker12small.jpg', '2014-12-29 20:49:26'),
(17, 'Famous Grouse Half Bottle', 'Whiskey', 'Scotch', 35, 40, 9.15, 'A half bottle of Famous Grouse&#39;s immensely popular blended Scotch Whisky. First released in 1860, as of the 2010s, it has been Scotland&#39;s most popular Scotch for 30 years.', 'scotch/famousgrousehalf.jpg', '2014-12-29 20:50:18'),
(18, 'Isle Of Jura 12 Year Old Half Bottle', 'Whiskey', 'Scotch', 35, 40, 18.95, 'A half bottle of 12 year old whisky from Jura distillery. Finished in a combination of American white oak and European sherry casks, this is complex with notes of pineapple, toffee and spice.', 'scotch/juraelixirhalf.jpg', '2014-12-29 20:52:09'),
(19, 'Aberlour 10 Year Old', 'Whiskey', 'Scotch', 70, 40, 25.75, 'Aberlour 10yo is a great entry-level malt, ideal for beginners, with a fine sherried spiciness. Pound for pound, this is one of the best that Speyside has to offer.', 'scotch/aberlour10.jpg', '2014-12-29 20:53:13'),
(20, 'Bowmore 15 Year Old Half Bottle', 'Whiskey', 'Scotch', 35, 43, 26.45, 'A half bottle of Bowmore&#39;s sherry finished 15 year old. It&#39;s finished for three years in oloroso sherry casks for rich, chocolatey and spicy flavour along with Bowmore&#39;s trademark maritime peatiness.', 'scotch/bowmorehalf.jpg', '2014-12-29 20:55:04'),
(21, 'Isle Of Jura 10 Year Old', 'Whiskey', 'Scotch', 70, 40, 27.25, 'Isle of Jura 10yo is an accessible, easy-drinking malt. Medium-bodied with a delicate sweet palate, with a hint of brine developing on the finish. A great introductory malt.', 'scotch/jura10.jpg', '2014-12-29 20:56:31'),
(22, 'Old Pulteney 12 Year Old', 'Whiskey', 'Scotch', 70, 40, 27.45, 'A very popular Highland dram, with a big sherry presence alongside sweet citrus fruit notes and a faint whiff of brine. Picked up the top prize in its category at the World Whisky Awards 2010.', 'scotch/oldpulteney12.jpg', '2014-12-29 20:57:35'),
(23, 'Bulldog London Dry Gin', 'Gin', 'Wheat', 70, 40, 22.95, 'A modern super premium gin from Norfolk wheat, Welsh water and 12 botanicals: Chinese dragon eye, Turkish white poppy seeds, Italian juniper, Moroccan coriander, German angelica, Spanish lemon, Chinese liquorice, Italian orris, Spanish almonds, Asian cassia, French lavender and Asian lotus leaves.', 'gin/bulldog.jpg', '2015-01-04 16:41:52'),
(24, 'Boxer Gin', 'Gin', 'Wheat', 70, 40, 28.49, 'Boxer Gin is a wheat based gin which uniquely steam distils the juniper berries in the Himalayas to extract more flavour. The other botanicals are bergamot, cinnamon, nutmeg, coriander, angelica, sweet lemon, orris root, liquorice root, sweet Seville oranges and cassia bark. The luxurious texture lends it to be an excellent martini gin.', 'gin/boxer.jpg', '2015-01-04 16:42:41'),
(25, 'Death&#39;s Door Gin', 'Gin', 'Wheat', 70, 40, 41.65, 'Another arrival from the US, where specialist gins made in micro-distilleries across the country have really invigorated what was a previously a fairly moribund category. Death&#39;s Door is made with organic red winter wheat on Washington Island in Wisconsin, and has been bottled at a higher than usual strength, so use a bit less or add more tonic.', 'gin/deathsdoor.jpg', '2015-01-04 16:43:35'),
(26, 'Plymouth Navy Strength Gin', 'Gin', '', 70, 57, 44.95, 'At a hefty strength of 57% abv, Navy Strength offers a more intense and rich taste to the Original Strength. As supplied to the British Royal Navy for almost two centuries.', 'gin/plymouthnavy.jpg', '2015-01-04 16:58:43'),
(27, 'Portobello Road No.171 London Dry Gin', 'Gin', '', 70, 42, 23.95, 'A gin specially designed by Jake Burger from the Portobello Star, home of the London Ginstitute. A solid and traditional London Dry Gin, distilled in West London.', 'gin/portobello.jpg', '2015-01-04 16:59:54'),
(28, 'Hendrick&#39;s Gin', 'Gin', '', 70, 41.4, 27.65, 'A superb, and utterly unique, pink-tinged gin from William Grant&#39;s. Infused with rose petals and cucumber as well as the normal botanicals, this is a must for all gin-lovers. In the Summertime, Hendrick&#39;s makes a fantastically refreshing Gin & Tonic: serve in a tall glass with plenty of ice and garnish with thinly-sliced cucumber - delicious!', 'gin/hendricks.jpg', '2015-01-04 17:00:53'),
(29, 'Plymouth Gin', 'Gin', '', 70, 41.2, 24.95, 'An elegant redesign of Plymouth, matching up their much respected and geographically protected gin with an old-school chunky bottle and their traditional branding. A must have for any home cocktail bar or lovers of a gin and tonic.', 'gin/plymouth.jpg', '2015-01-04 17:02:10'),
(30, 'No.3 London Dry Gin', 'Gin', 'Grain', 70, 46, 32.45, 'An impressive-looking premium gin from famous wine & spirits merchants Berry Bros & Rudd, No. 3 London Dry is distilled in copper potstills in Holland, counts cardamom seeds and grapefruit peel among its botanicals, and has been bottled at an invigorating 46%.', 'gin/no3.jpg', '2015-01-04 17:04:57'),
(31, 'NB Gin', 'Gin', 'Grain', 70, 42, 28.45, 'NB Gin is produced in batches of less than 100-litres in North Berwick, Scotland. Made using grain spirit, and eight botanicals â€“ juniper, coriander seed, angelica, root, grains of paradise, lemon peel, cassia bark, cardamom and orris root.', 'gin/nb.jpg', '2015-01-04 17:10:04'),
(32, 'Gordon&#39;s London Dry Gin', 'Gin', 'Grain', 70, 37.5, 15.95, 'NB Gin is produced in batches of less than 100-litres in North Berwick, Scotland. Made using grain spirit, and eight botanicals â€“ juniper, coriander seed, angelica, root, grains of paradise, lemon peel, cassia bark, cardamom and orris root.', 'gin/gordons.jpg', '2015-01-04 17:10:59'),
(33, 'Ancient Mariner London Cut Dry Gin', 'Gin', 'Grain', 50, 50, 28.95, 'Ancient Mariner is a London Dry Gin from Hebridean Spirits & Liqueurs. Made from grain in London, this has a classic juniper-heavy aroma.', 'gin/mariner.jpg', '2015-01-04 17:11:50'),
(34, 'Remy Martin Louis XIII Cognac', 'Cognac', 'Baccarat Crystal', 70, 40, 1850, 'A legendary Cognac from the prestigious house of Remy Martin, containing Grande Champagne eaux-de-vie aged between 40 and 100 years and packaged in a gorgeous Baccarat decanter.', 'misc/remymartinbaccarat.jpg', '2015-01-10 17:33:45'),
(35, 'Remy Martin Centaure De Diamant', 'Cognac', 'Grande Champagne', 70, 40, 899, 'RÃ©my Martin&#39;s Centaure De Diamant is an exquisite blend of eaux-de-vie from Grande and Petite Champagne, matured for between 20 and 50 years. A rich Cognac that&#39;s presented in a diamond decanter with a cabochon stopper.', 'misc/remymartindiamant.jpg', '2015-01-10 17:35:08'),
(36, 'Delamain Pale & Dry XO Cognac', 'Cognac', 'Grande Champagne', 70, 40, 76.45, 'A blend of long-aged XO Grande Champagne cognacs, Delamain Pale & Dry benefits from a lengthy two-year marriage period in cask after assemblage before being bottled, resulting in a beautifully smooth roundness and flavour integration on the palate.', 'misc/delamain.jpg', '2015-01-10 17:36:14'),
(37, 'Hennessy Paradis Extra Cognac', 'Cognac', 'XO', 70, 40, 699, 'An old presentation of Hennessy Paradis, the &#39;Extra&#39; was dropped in 2009 and replaced with &#39;Rare&#39;.', 'misc/hennessyparadis.jpg', '2015-01-10 17:37:16'),
(38, 'Croizet 40 Years Old &#34;Bonaparte&#34; Cogn', 'Cognac', 'Croizet', 70, 40, 399, 'An extremely rare old cognac from an excellent house.', 'misc/croizet40.jpg', '2015-01-10 17:38:52'),
(39, 'Remy Martin XO Special', 'Cognac', 'XO', 70, 40, 275, 'An older presentation of RÃ©my Martin XO Special. We estimate that this was bottled sometime in the 1980s.', 'misc/remymartinxo1980.jpg', '2015-01-10 17:39:51'),
(40, 'Martell Napoleon Special Reserve Cognac', 'Cognac', 'XO', 100, 40, 150, 'An old litre bottling of Martell Napoleon Special Reserve Cognac. Napoleon is an old classification that is equal to XO.', 'misc/napoleon.jpg', '2015-01-10 17:41:52'),
(41, 'Merlet Brothers Blend Cognac', 'Cognac', 'Blend', 70, 40, 37.65, 'A cognac from liqueur experts Merlet, distillers since 1850. This has been created to express the characters of Gilles Merlet&#39;s sons Pierre and Luc - enthusiastic and determined. It&#39;s a blend of eaux-de-vie aged between 4 and 10 years and should work well on it&#39;s own or as an ingredient in a brandy showcasing cocktail.', 'misc/merlet.jpg', '2015-01-10 17:43:08'),
(42, 'Frapin Signature Cognac', 'Cognac', 'Grande Champagne', 70, 40, 64.95, 'Frapin&#39;s Signature Cognac is produced entirely from grapes grown in the house&#39;s own vineyards, which lie within the Grande Champagne area, the top &#39;cru&#39; of the Cognac region. The family settled in South West France in 1270 as wine growers and have now been distilling for 20 generations.', 'misc/frapin.jpg', '2015-01-10 17:44:13'),
(43, 'Havana Club Rum 15 Year Old', 'Rum', 'XO', 70, 40, 145, 'Getting very hard to find due to the lack of aged stock at the distillery itself, this is a masterpiece of Cuban rum-making. Simply awesome.', 'misc/havana15.jpg', '2015-01-10 17:52:28'),
(44, 'Bacardi Superior', 'Rum', 'Blanco', 70, 37.5, 17.45, 'The best-selling spirit brand worldwide, enjoyed in more than 170 countries. Bacardi Carta Blanca was created in 1862 and is still, remarkably, a family-controlled brand.', 'misc/bacardi.jpg', '2015-01-10 17:53:28'),
(45, 'Havana Club 3 Year Old Rum', 'Rum', 'Anejo', 70, 40, 18.85, 'Probably the most prestigious light Cuban rum, Havana Club 3 year old infuses an extra touch of quality into rum cocktails and is great with just about any mixer we can think of.', 'misc/havana3.jpg', '2015-01-10 17:54:16'),
(46, 'Sailor Jerry Spiced Rum', 'Rum', 'Spiced', 70, 40, 18.95, 'This is the latest version of Sailor Jerry rum, which was re-formulated in early 2010 to bring it into line with the US recipe. This version contains less vanilla and lime than the previous edition and is more popular with bartenders. Try with cola or ginger beer with a squeeze of fresh lime, or mix with Red Bull for a &#39;Popeye&#39;.', 'misc/sailorjerry.jpg', '2015-01-10 17:55:29'),
(47, 'Havana Club 7 Year Old Rum', 'Rum', 'Anejo', 70, 40, 23.15, 'Havana Club 7yo is a full-flavoured, rich and sophisticated Cuban rum with a high degree of elegance and class. A deservedly popular rum.', 'misc/havana7.jpg', '2015-01-10 17:56:14'),
(48, 'Ron Centenario Anejo Especial 7 Year Old Rum', 'Whiskey', 'Anejo', 70, 40, 29.95, 'Not to be confused with Zacapa Centenario, this Rum is made by Centenario Internacional, who hail from Costa Rica. Aged in white oak barrels for 7 years, this is equally at home in cocktails or sipped on its own.', 'misc/ron.jpg', '2015-01-10 17:57:14'),
(49, 'El Dorado Rum 15 Year Old', 'Rum', 'XO', 70, 43, 42.95, 'El Dorado 15yo is a remarkable rum, whose greatest achievement was collecting the Wray & Nephew Trophy for Best Rum in the World at the International Wine & Spirits Challenge for an unprecedented four years running.', 'misc/eldorado.jpg', '2015-01-10 17:59:54'),
(50, 'Ketel One Citroen Vodka', 'Vodka', 'Flavoured', 40, 70, 27.45, 'Probably the best Lemon vodka on the market, Ketel One Citroen is made by blending natural lemon and lime extracts with &#39;normal&#39; Ketel One.', 'misc/ketelone.jpg', '2015-01-10 18:04:36'),
(51, 'Russian Standard Platinum Vodka', 'Vodka', '', 70, 40, 21.95, 'Having originally benefited from a major marketing spend, Russian Standard Platinum has gone from strength to strength. Pop it in the freezer for a delicious frozen shot.', 'misc/rsplatinum.jpg', '2015-01-10 18:06:26'),
(52, 'Zubrowka Bisongrass Vodka', 'Vodka', 'Flavoured', 70, 40, 19.45, 'Zubrowka is one of the best Polish vodkas available, flavoured with a special kind of aromatic bisongrass that is so prized that it costs Â£400 per kilo. Long-renowned for its luxurious flavours and stellar quality, Zubrowka is simply outstanding with apple juice, especially the posh cloudy stuff.', 'misc/zubrowka.jpg', '2015-01-10 18:07:07'),
(53, 'Absolut Vodka', 'Vodka', 'Vodka', 70, 40, 16.95, 'It&#39;s vodka, what do you want?', 'misc/absolut.jpg', '2015-01-10 18:07:43'),
(54, 'Don Julio 1942 Tequila', 'Tequila', 'Anejo', 75, 40, 139, 'A small batch Anejo named after founder Don Julio Gonzalez-Frausto Estrada, who first distilled Tequila at the age of just 17 in 1942. Aged for at least 30 months in American white-oak, this is a remarkably smooth and incredibly complex Tequila with notes of tropical fruit, agave and a hint of cinnamon spice.', 'misc/donjulio1942.jpg', '2015-01-10 18:12:24'),
(55, 'Don Julio Reposado', 'Tequila', 'Reposado', 70, 38, 42.75, 'A superbly smooth reposado, Don Julio is made with 100% agave and is aged just under a year in ex-bourbon barrels. A bit more special than your average repo tequila.', 'misc/donjulio.jpg', '2015-01-10 18:13:30'),
(56, 'Patron Reposado', 'Tequila', 'Reposado', 70, 40, 45.15, 'A halfway house between the delicious Patron Blanco and the sublime Anejo, this reposado is one of the finest available anywhere. A really excellent tequila.', 'misc/patronreposado.jpg', '2015-01-10 18:14:05'),
(57, 'Jose Cuervo Tradicional Silver', 'Tequila', 'Blanco', 70, 38, 29.75, 'Jose Cuervo Traditional is made in limited amounts each year. A pale straw-coloured reposado made from 100% blue agave and rested in white oak barrels.', 'misc/josecuervo.jpg', '2015-01-10 18:14:59');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(5) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `gender`, `email`, `password`) VALUES
(7, 'Johnny', 'Lees', 'Male', 'johnnylees@hotmail.com', '363b122c528f54df4a0446b6bab05515'),
(8, 'Jenny', 'Hose', 'Female', 'jenny@pop.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(13, 'Simeon', 'Lees', 'Male', 'sim_lees@hotmail.co.uk', '5f4dcc3b5aa765d61d8327deb882cf99');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `adminid` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

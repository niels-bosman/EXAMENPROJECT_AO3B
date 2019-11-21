/*TAFEL*/
INSERT INTO `tables` (`table_id`, `seats`, `minimum_guests`, `reservable`) VALUES 
('01', '2', '1', '0'),
('02', '2', '1', '1'),
('03', '2', '1', '1'),
('04', '4', '2', '1'),
('05', '4', '2', '1'),
('06', '4', '2', '1'),
('07', '4', '2', '1'),
('08', '4', '2', '0'),
('09', '4', '2', '0'),
('10', '4', '2', '1'),
('11', '8', '5', '1'),
('12', '8', '5', '0'),
('13', '8', '5', '1');

/*TYPE*/
INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES 
(1, 'Voorgerecht', NULL, NULL),
(2, 'Hoofdgerecht', NULL, NULL),
(3, 'Nagerecht', NULL, NULL),
('4', 'Dranken', NULL, NULL),
('5', 'Hapjes', NULL, NULL);

/*SUBTYPE*/
INSERT INTO `subtypes` (`id`, `name`, `type_id`, `created_at`, `updated_at`) VALUES 
(1, 'Warme voorgerechten', '1', NULL, NULL),
(2, 'Koude voorgerechten', '1', NULL, NULL),
(3, 'Visgerechten', '2', NULL, NULL),
(4, 'Vleesgerechten', '2', NULL, NULL),
(5, 'Vegatarische gerechten', '2', NULL, NULL),
(6, 'Ijs', '3', NULL, NULL),
(7, 'Mousse', '3', NULL, NULL),
('8', 'Warme dranken', '4', NULL, NULL),
('9', 'Bieren', '4', NULL, NULL),
('10', 'Huiswijnen', '4', NULL, NULL),
('11', 'Frisdranken', '4', NULL, NULL),
('12', 'Warme hapjes', '5', NULL, NULL),
('13', 'Koude hapjes', '5', NULL, NULL);

/*PRODUCTEN*/
INSERT INTO `products` (`id`, `name`, `subtype`, `price`, `created_at`, `updated_at`) VALUES
(01, 'Tomatensoep', '1', '4.95', NULL, NULL),
(02, 'Groentesoep', '1', '3.95', NULL, NULL),
(03, 'Aspergersoep', '1', '4.95', NULL, NULL),
(04, 'Uiensoep', '1', '3.95', NULL, NULL),
(05, 'Salade met gijtenkaas', '2', '4.95', NULL, NULL),
(06, 'Tonijnsalade', '2', '5.95', NULL, NULL),
(07, 'Zalmsalade', '2', '4.95', NULL, NULL),
(08, 'Gebakken Makreel', '3', '8.95', NULL, NULL),
(09, 'Mosselen uit pan', '3', '9.95', NULL, NULL),
(10, 'Biefstuk in champignonsaus', '4', '11.95', NULL, NULL),
(11, 'Wienerschnitzel', '4', '9.95', NULL, NULL),
(12, 'Bonengerecht met diverse groenten', '5', '11.95', NULL, NULL),
(13, 'Gebakken banaan', '5', '10.95', NULL, NULL),
(14, 'Black Lady', '6', '4.95', NULL, NULL),
(15, 'Vruchtenijs', '6', '2.95', NULL, NULL),
(16, 'Chocolademousse', '7', '4.95', NULL, NULL),
(17, 'Vanillemouse', '7', '3.95', NULL, NULL),
('18', 'Koffie', '8', '2.45', NULL, NULL),
('19', 'Thee', '8', '2.45', NULL, NULL),
('20', 'Chocolademelk', '8', '2.95', NULL, NULL),
('21', 'Espresso', '8', '2.45', NULL, NULL),
('22', 'Cappucino', '8', '2.75', NULL, NULL),
('23', 'Koffie verkeerd', '8', '2.95', NULL, NULL),
('24', 'Late Macchiato', '8', '3.95', NULL, NULL),
('25', 'Pilsner', '9', '2.95', NULL, NULL),
('26', 'Weizen', '9', '3.95', NULL, NULL),
('27', 'Stender', '9', '2.95', NULL, NULL),
('28', 'Palm', '9', '3.60', NULL, NULL),
('29', 'Kasteel donker', '9', '4.75', NULL, NULL),
('30', 'Brugse Zotte', '9', '3.95', NULL, NULL),
('31', 'Grimbergen dubbel', '9', '3.95', NULL, NULL),
('32', 'Per glas', '10', '3.95', NULL, NULL),
('33', 'Per fles', '10', '17.95', NULL, NULL),
('34', 'Seizoenswijn', '10', '3.95', NULL, NULL),
('35', 'Rode port', '10', '3.95', NULL, NULL),
('36', 'Tonic', '11', '2.95', NULL, NULL),
('37', 'Seven Up', '11', '2.95', NULL, NULL),
('38', 'Verse Jus', '11', '3.95', NULL, NULL),
('39', 'Chaudfontaine rood', '11', '2.75', NULL, NULL),
('40', 'Chaudfontaine rood', '11', '2.75', NULL, NULL),
('41', 'Bitterballen met mosterd', '12', '4.00', NULL, NULL),
('42', 'Vlammetjse met chilisaus', '12', '4.00', NULL, NULL),
('43', 'Kipbites', '12', '5.00', NULL, NULL),
('44', 'Portie kaas met mosterd', '13', '4.00', NULL, NULL),
('45', 'Brood met kruidenboter', '13', '5.00', NULL, NULL),
('46', 'Portie salami worst', '13', '4.00', NULL, NULL);

/*USERS*/
INSERT INTO `users` (`id`, `name`, `email`, `password`, `tel_number`, `street`, `house_number`, `city`, `zipcode`, `blocked`, `access_token`, `access_token_expires`, `email_verified_at`, `remember_token`, `wrong_count`, `auth_level`, `created_at`, `updated_at`) VALUES
(1, 'Niels Bosman', 'niels@mail.nl', '$2y$10$VlDwP8T.WEPLL1MSAszXeumQujvwGDz4GcTWDAl9eV8ZhUHTnOsMO',
 '+31 06 1234567', NULL, NULL, NULL, NULL, '0', NULL, NULL, NOW(), NULL, 0, 1, NULL, NULL),
(2, 'Majd Wenni', 'majd@mail.nl', '$2y$10$VlDwP8T.WEPLL1MSAszXeumQujvwGDz4GcTWDAl9eV8ZhUHTnOsMO',
 '+31 06 7654321', NULL, NULL, NULL, NULL, '0', NULL, NULL, NOW(), NULL, 0, 1, NULL, NULL),
(3, 'Clemens van Marwijk', 'clemens@mail.nl', '$2y$10$VlDwP8T.WEPLL1MSAszXeumQujvwGDz4GcTWDAl9eV8ZhUHTnOsMO',
 '+31 06 9876543', NULL, NULL, NULL, NULL, '0', NULL, NULL, NOW(), NULL, 0, 1, NULL, NULL),
(4, 'Sietse Noordbruis', 'sietse@mail.nl', '$2y$10$VlDwP8T.WEPLL1MSAszXeumQujvwGDz4GcTWDAl9eV8ZhUHTnOsMO',
 '+31 06 3456789', NULL, NULL, NULL, NULL, '0', NULL, NULL, NOW(), NULL, 0, 1, NULL, NULL),
(5, 'Rik', 'rik@mail.nl', '$2y$10$VlDwP8T.WEPLL1MSAszXeumQujvwGDz4GcTWDAl9eV8ZhUHTnOsMO',
 '+03 98 1234567', NULL, NULL, NULL, NULL, '1', NULL, NULL, NOW(), NULL, 0, 1, NULL, NULL),
('6', 'Mike', 'mike@mail.nl', '$2y$10$VlDwP8T.WEPLL1MSAszXeumQujvwGDz4GcTWDAl9eV8ZhUHTnOsMO',
 '+35989876543', 'Geldweg', '1', 'Blutstad', '1234 AB', '0', NULL, NULL, NOW(), NULL, 0, 1, NULL, NULL),
('7', NULL, 'anonymous@mail.nl', '$2y$10$VlDwP8T.WEPLL1MSAszXeumQujvwGDz4GcTWDAl9eV8ZhUHTnOsMO',
 '+4321 1234567', NULL, NULL, NULL, NULL, '0', NULL, NULL, NOW(), NULL, 0, 1, NULL, NULL),
('8', 'Lex Verhoeve', 'restaurantDeGraaf@gmail.nl', '$2y$10$VlDwP8T.WEPLL1MSAszXeumQujvwGDz4GcTWDAl9eV8ZhUHTnOsMO',
 '+4321 1234567', NULL, NULL, NULL, NULL, '0', NULL, NULL, NOW(), NULL, 0, 3, NULL, NULL);

/*RESERVATIONS*/
INSERT INTO `reservations` (`reservation_code`, `UserID`, `date`, `duration`, `comment`, `payed_price`, `guest_amount`, `created_at`, `updated_at`) VALUES 
('20191111102', '1', '2019-11-11 19:30:00', '90', 'Een historische reservering. 1 tafel en bestelde producten', '50', '2', NULL, NULL),
('20201231021', '3', '2020-12-31 12:30:00', '60', 'Lunch afspraak die nog moet komen', NULL, '4', NULL, NULL),
('20201231043', '6', '2020-12-31 19:00:00', '120', 'Reservering met meerde tafels.', NULL, '8', NULL, NULL);

/*TABLE_RESERVATIONS*/
INSERT INTO `table_reservations` (`id`, `table_id`, `reservation_code`, `created_at`, `updated_at`) VALUES 
('1', '2', '20191111102', NULL, NULL), 
('2', '5', '20201231021', NULL, NULL),
('3', '4', '20201231043', NULL, NULL),
('4', '5', '20201231043', NULL, NULL);

/*RESERVATION_PRODUCTS*/
INSERT INTO `reservation_products` (`id`, `reservation_code`, `product_id`, `created_at`, `updated_at`) VALUES 
('1', '20191111102', '3', NULL, NULL),
('2', '20191111102', '4', NULL, NULL),
('3', '20191111102', '11', NULL, NULL),
('4', '20191111102', '12', NULL, NULL),
('5', '20191111102', '14', NULL, NULL),
('6', '20191111102', '14', NULL, NULL); 
--
-- PostgreSQL database dump
--

-- Dumped from database version 13.2
-- Dumped by pg_dump version 13.2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Data for Name: reservation; Type: TABLE DATA; Schema: public; Owner: mdl_admin
--

INSERT INTO public.reservation VALUES (1, 'Salle de futsal', 'Réserver la salle de futsal pour votre lycée', '2022-05-24 00:00:00', '2022-05-19 08:00:00', '2022-05-19 19:00:00', 'Reims', 'Futsal');
INSERT INTO public.reservation VALUES (2, 'Salle de basket', 'Réserver la salle de basket pour votre lycée', '2022-05-24 00:00:00', '2022-05-26 10:00:00', '2022-05-26 20:00:00', 'Charleville-Mézières', 'Basketball');
INSERT INTO public.reservation VALUES (3, 'Salle de handball', 'Réserver la salle de handball pour votre lycée', '2022-05-24 00:00:00', '2022-06-02 07:00:00', '2022-06-02 18:00:00', 'Châlons en Champagne', 'Handball');
INSERT INTO public.reservation VALUES (4, 'Salle de tennis', 'Réserver la salle de tennis pour votre lycée', '2022-05-24 00:00:00', '2022-06-09 10:00:00', '2022-06-09 21:00:00', 'Nancy', 'Tennis');
INSERT INTO public.reservation VALUES (5, 'Salle de volley', 'Réserver la salle de volley pour votre lycée', '2022-05-24 00:00:00', '2022-05-24 08:00:00', '2022-05-24 16:00:00', 'Charleville-Mézières', 'Volleyball');
INSERT INTO public.reservation VALUES (6, 'Salle d''athlétisme', 'Réserver la salle pour faire de l''athlétisme', '2022-05-30 00:00:00', '2022-05-30 12:00:00', '2022-05-30 20:00:00', 'Reims', 'Sprint ');


--
-- Data for Name: choix; Type: TABLE DATA; Schema: public; Owner: mdl_admin
--

INSERT INTO public.choix VALUES (1, '2022-05-19 09:00:00', '2022-05-19 12:00:00', 1);
INSERT INTO public.choix VALUES (2, '2022-05-26 14:00:00', '2022-05-26 18:00:00', 2);
INSERT INTO public.choix VALUES (3, '2022-06-02 08:00:00', '2022-06-02 12:00:00', 3);
INSERT INTO public.choix VALUES (4, '2022-06-09 15:00:00', '2022-06-09 18:00:00', 4);
INSERT INTO public.choix VALUES (5, '2022-05-24 10:00:00', '2022-05-24 12:00:00', 5);
INSERT INTO public.choix VALUES (6, '2022-05-30 13:00:00', '2022-05-30 16:00:00', 6);


--
-- Data for Name: membre; Type: TABLE DATA; Schema: public; Owner: mdl_admin
--

INSERT INTO public.membre VALUES (1, 'Lycée Saint Paul', 'Charleville-Mézières', '08000', 'ce.0080082W@ac-reims.fr', '0324334206', 'st_paul', 'cd650b63a422050f2e8e5c16c4a59231');
INSERT INTO public.membre VALUES (2, 'Lycée Chanzy', 'Charleville-Mézières', '08000', 'ce.0080006n@ac-reims.fr', '0324599101', 'l_chanzy', '6af1e9302c4ddd46420d59050e12556f');
INSERT INTO public.membre VALUES (3, 'Lycée Monge', 'Charleville-Mézières', '08000', 'lyc-monge@ac-reims.fr', '0324526978', 'l_monge', '692d38c7336c857facb192d98c359154');
INSERT INTO public.membre VALUES (4, 'Lycée Sévigné', 'Charleville-Mézières', '08000', 'ce.0080007P@ac-reims.fr', '0324598307', 'l_sevigne', 'ec3d383b9d7b1513969dd3071067d666');
INSERT INTO public.membre VALUES (8, 'Lycée Bazin', 'Charleville-Mézières', '08000', 'lyc-francois-bazin@ac-reims.fr', '0324568157', 'l_bazin', '2045ca354f3218e8f268324b66a0ee4f');
INSERT INTO public.membre VALUES (9, 'Lycée Armand Malaise', 'Charleville-Mézières', '08000', 'ce.0080028m@ac-reims.fr', '0324370500', 'l_armandma', '441880cd557c979852c10ca5d6646e4a');
INSERT INTO public.membre VALUES (10, 'Lycée Etion', 'Charleville-Mézières', '08000', 'ce.0080010T@ac-reims.fr', '0324333966', 'l_etion', 'fdb617be7f9ba67f014d8efecc915b0c');
INSERT INTO public.membre VALUES (11, 'Lycée Franklin Roosevelt', 'Reims', '51100', 'ce.0510034K@ac-reims.fr', '0326867090', 'l_roosevel', '664991a80cca40e5e32cbf8f5eef3e0c');
INSERT INTO public.membre VALUES (12, 'Lycée Clemenceau', 'Reims', '51100', 'ce.0510031g@ac-reims.fr', '0326822003', 'l_clemence', '9032672f0ba20cb09a11dd1c773de1a9');
INSERT INTO public.membre VALUES (13, 'Lycée Colbert', 'Reims', '51100', 'lyc-colbert@ac-reims.fr', '0326093446', 'l_colbert', 'ebd88c5509355a2a46e4a447bbf619ec');
INSERT INTO public.membre VALUES (14, 'Lycée Jean Jaurès', 'Reims', '51100', 'jaures51.secretariat@wanadoo.fr', '0326476796', 'l_jjaures', '281cebda2ea5748a9f9696c0f2674cfb');
INSERT INTO public.membre VALUES (15, 'Lycée Libergier', 'Reims', '51100', 'lycee.libergier@libergier.net', '0326776162', 'l_libergie', '18dbe07dfd178e9119b176c743e4619e');
INSERT INTO public.membre VALUES (16, 'Lycée Marc Chagall', 'Reims', '51100', 'lyc-marc-chagall@ac-reims.fr', '0326820074', 'l_mchagall', 'f5c54f60d8d849e6481943cb7aaddfab');
INSERT INTO public.membre VALUES (17, 'Lycée François Arago', 'Reims', '51100', 'lyc-francois-arago@ac-reims.fr', '0326066528', 'l_farago', '02eff819141369774f715355fa6589d7');
INSERT INTO public.membre VALUES (18, 'Lycée Val de Murigny', 'Reims', '51100', 'ce.0511884w@ac-reims.fr', '0326835059', 'l_vmurigny', '7b326f83f3cdcd6e5158bd892de00ef1');
INSERT INTO public.membre VALUES (19, 'Lycée Saint-Jean-Baptiste de La Salle', 'Reims', '51100', 'ce.0511146u@ac-reims.fr', '0326771701', 'l_stjeanbd', 'a085f86881af498e06045a02a1b1bd67');
INSERT INTO public.membre VALUES (20, 'Lycée Saint-Michel', 'Reims', '51100', 'stmichel51.secretariat@wanadoo.fr', '0326776288', 'l_stmichel', '7835f5914fee060eece60fa1a4cc95c7');
INSERT INTO public.membre VALUES (21, 'Lycée Gustave Eiffel', 'Reims', '51100', 'ce.0510036m@ac-reims.fr', '0326506529', 'l_geiffel', '5c2482b3c18c3199a2576be731f2efec');
INSERT INTO public.membre VALUES (22, 'Lycée Joliot-Curie', 'Reims', '51100', 'ce.0511430c@ac-reims.fr', '0326060838', 'l_joliotc', '1dbacbd7b954558cdcbc775e59490c95');
INSERT INTO public.membre VALUES (23, 'Lycée Yser', 'Reims', '51100', 'ce.0510037n@ac-reims.fr', '0326855052', 'l_yser', 'c14b487595026f596c33b5a4979aec4d');
INSERT INTO public.membre VALUES (24, 'Lycée Europe', 'Reims', '51100', 'ce.0510038P@ac-reims.fr', '0326857364', 'l_europe', '7612e84033b6f5f1a8b8039d9e25d9b5');
INSERT INTO public.membre VALUES (25, 'Lycée Pierre Bayen', 'Châlons-en-Champagne', '51000', 'ce.0510006e@ac-reims.fr', '0326692341', 'l_pierreb', 'c45adc73ff2518b6c77cd87416a46cfd');
INSERT INTO public.membre VALUES (26, 'Lycée Etienne Oehmichen', 'Châlons-en-Champagne', '51000', 'ce.0510007f@ac-reims.fr', '0326692322', 'l_etienneo', '23462d7efab439481b6988cf146eacbe');
INSERT INTO public.membre VALUES (27, 'Lycée Frédéric Ozanam Mont-Héry', 'Châlons-en-Champagne', '51000', 'ce.0511147@ac-reims.fr', '0326683449', 'l_frederic', '654ffbbd44d888f8bbb05b6312b604b6');
INSERT INTO public.membre VALUES (28, 'Lycée Jean Talon', 'Châlons-en-Champagne', '51000', 'lyc-jean-talon@ac-reims.fr', '0326692798', 'l_jtalon', 'a7f1363f0d9772b527216eeb1f0956d3');
INSERT INTO public.membre VALUES (30, 'Lycée Camille Claudel', 'Troyes', '10000', 'lyc-camille-claudel@ac-reims.fr', '0325737909', 'l_cclaudel', 'e264d2afa943346d774c70a59b769b5b');
INSERT INTO public.membre VALUES (31, 'Lycée Saint-Bernard', 'Troyes', '10000', 'saint-bernard@wanadoo.fr', '0325734216', 'l_stbernar', 'a33cf6e901e107f1fc042f91b639eb2b');
INSERT INTO public.membre VALUES (32, 'Lycée Saint-François de Sales', 'Troyes', '10000', 'bvs.stfrancois@orange.fr', '0325739316', 'l_stfranco', '21797bc6173a9fda2533e963c6f7fa4e');
INSERT INTO public.membre VALUES (33, 'Lycée Chrestien', 'Troyes', '10000', 'lyc-chrestien-de-troyes@ac-reims.fr', '0325715309', 'l_chrestie', 'cebaf42a4da9e5cf53344140708e0af0');
INSERT INTO public.membre VALUES (34, 'Lycée Les Lombards', 'Troyes', '10000', 'lyc-les-lombards@ac-reims.fr', '0325714666', 'l_leslomba', 'f40e62f3b5309f7995d954026b93b1b5');
INSERT INTO public.membre VALUES (35, 'Lycée Marie de Champagne', 'Troyes', '10000', 'lyc-marie-de-champagne@ac-reims.fr', '0325499722', 'l_mariedec', 'c22de413afab1c1ce1453f64b5f76966');
INSERT INTO public.membre VALUES (36, 'Lycée La Salle', 'Troyes', '10000', 'contact@saintjoseph-troyes.org', '0325721531', 'l_lasalle', 'b22693003bb7ffa1e274ef5abb9f1441');
INSERT INTO public.membre VALUES (37, 'Lycée Blaise Pascal', 'Saint-Dizier', '52100', 'ce.0520028y@ac-reims.fr', '0325065051', 'l_blaisep', '66ea84d7e67320d1257ee41535406cc5');
INSERT INTO public.membre VALUES (38, 'Lycée Saint-Exupéry', 'Saint-Dizier', '52100', 'ce.0520027x@ac-reims.fr', '0325561534', 'l_stexuper', '4b0e493a779eee80f91998862cb93aea');
INSERT INTO public.membre VALUES (39, 'Lycée Assomption', 'Saint-Dizier', '52100', 'lycee-assomption@wanadoo.fr', '0325063938', 'l_assompti', '8a308e7c74e90e9fdc45112dddc8c7ea');


--
-- Data for Name: participation; Type: TABLE DATA; Schema: public; Owner: mdl_admin
--

INSERT INTO public.participation VALUES (5, 3, '5eodEA', 5);
INSERT INTO public.participation VALUES (6, 11, '35j*Ee', NULL);
INSERT INTO public.participation VALUES (6, 4, '35j*Ee', 6);


--
-- Name: choix_id_choix_seq; Type: SEQUENCE SET; Schema: public; Owner: mdl_admin
--

SELECT pg_catalog.setval('public.choix_id_choix_seq', 1, false);


--
-- Name: membre_id_membre_seq; Type: SEQUENCE SET; Schema: public; Owner: mdl_admin
--

SELECT pg_catalog.setval('public.membre_id_membre_seq', 39, true);


--
-- Name: participation_id_reservation_seq; Type: SEQUENCE SET; Schema: public; Owner: mdl_admin
--

SELECT pg_catalog.setval('public.participation_id_reservation_seq', 1, false);


--
-- Name: reservation_id_reservation_seq; Type: SEQUENCE SET; Schema: public; Owner: mdl_admin
--

SELECT pg_catalog.setval('public.reservation_id_reservation_seq', 1, false);


--
-- PostgreSQL database dump complete
--


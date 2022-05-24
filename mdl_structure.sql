begin transaction;

create table membre
	(
	id_membre		serial			primary key,
	etablissement	varchar(30),
	ville			varchar(20),
	code_postal		varchar(5),
	email			varchar(254)	unique,
	tel 			varchar(10)		unique,
	login			varchar(10)		unique,
	mdp				char(32)		not null
	);
	
create table reservation
	(
	id_reservation		serial			primary key,
	nom					varchar(100),	
	commentaire			varchar(400),
	date_creation		timestamp,	
	date_debut			timestamp,	
	date_fin			timestamp,
	lieu				varchar(30),
	activite			varchar(20)
	);	
	
create table choix
	(
	id_choix			serial			primary key,
	horaire_debut		timestamp,
	horaire_fin			timestamp,
	id_reservation		integer			references reservation
	);

create table participation
	(
	id_reservation		serial			references reservation,
	id_membre			integer			references membre,
	cle					varchar(6),	
	id_choix			integer			references choix,
	primary key (id_reservation, id_membre)	
	);

commit;
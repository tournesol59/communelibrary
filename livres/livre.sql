CREATE TABLE 'auteur' (
   'id' tinyint(4) NOT NULL auto_increment,
   'nom' varchar(50) NOT NULL,
  PRIMARY KEY('id')
);

insert into 'auteur' values
  (1,'Clive Cussler'),
  (2,'Harlan Coben'),
  (3, 'Franck Herbert'),
  (4, 'Pierre Bordages');

CREATE TABLE 'livre' (
   'id' tinyint(4) NOT NULL auto_increment,
   'titre' varchar(50) NOT NULL,
   'idAuteur' tinyint(4) default NULL,
  PRIMARY KEY('id')
);

insert into 'livre' values
  (1,'Odyssee',1),
  (2,'Sahara',1),
  (3,'Dragon',1),
  (4,'Une chance de trop',2),
  (5,'Ne le dis a personnes',2),
  (6,'Disparu a jamais',2),
  (7,'Dune',3),
  (8,'La barriere de santagora',3),
  (9,'les guerriers du silence',4),
  (10,'La citadelle hyponeros',4),
  (11,'Terra mater',4);


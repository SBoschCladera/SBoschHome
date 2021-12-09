SET AUTOCOMMIT=1;

CREATE DATABASE IF NOT EXISTS imdb;

USE imdb; 

CREATE TABLE IF NOT EXISTS genero (
	generoId 	INT(5) PRIMARY KEY, 
	descripcion 	VARCHAR(15) );
    
      
CREATE TABLE  IF NOT EXISTS pais (
	paisId	INT(5) PRIMARY KEY, 
	nombre	VARCHAR(50));


CREATE TABLE  IF NOT EXISTS actor (
	actorId	INT(5) PRIMARY KEY,
	nombre 		VARCHAR(30), 
    apellidos   VARCHAR(50),
    imagen	VARCHAR(450),
    oscars	int (5),
    anyoNacimiento VARCHAR (50),
    lugarNacimiento int (5),
     FOREIGN KEY (lugarNacimiento) REFERENCES pais(paisId));   
    
CREATE TABLE IF NOT EXISTS director (
	directorId	INT(5) PRIMARY KEY, 
	nombre	VARCHAR(50), 
    apellidos VARCHAR (50),
    imagen VARCHAR(450),
    oscars int (5),
	anyoNacimiento VARCHAR (50),
    lugarNacimiento int (5),
		FOREIGN KEY (lugarNacimiento) REFERENCES pais(paisId));   
        
        
CREATE TABLE IF NOT EXISTS pelicula (
	peliculaId	INT(5) PRIMARY KEY,
	titulo		VARCHAR(100),
    director1Id  int(5),
    director2Id int(5),
	genero1Id	INT(5),
    genero2Id	INT(5),
    genero3Id	INT(5),
	actor1Id	INT(5),
    actor2Id	INT(5),
    actor3Id	INT(5),
    imagen VARCHAR(450),
    nota float(5),
    estreno int(10),
    trailer VARCHAR(650),
    sinopsis VARCHAR (1000),
		FOREIGN KEY (director1Id) REFERENCES director(directorId),
        FOREIGN KEY (director2Id) REFERENCES director(directorId),
        FOREIGN KEY (genero1Id) REFERENCES genero(generoId),
        FOREIGN KEY (genero2Id) REFERENCES genero(generoId),
        FOREIGN KEY (genero3Id) REFERENCES genero(generoId),
        FOREIGN KEY (actor1Id) REFERENCES actor(actorId),
        FOREIGN KEY (actor2Id) REFERENCES actor(actorId),
        FOREIGN KEY (actor3Id) REFERENCES actor(actorId));


INSERT INTO genero VALUES (1, 'Terror');
INSERT INTO genero VALUES (2, 'Comedia');
INSERT INTO genero VALUES (3, 'Drama');
INSERT INTO genero VALUES (4, 'Acción');
INSERT INTO genero VALUES (5, 'Aventura');
INSERT INTO genero VALUES (6, 'Ciencia ficción');
INSERT INTO genero VALUES (7, 'Triller');
INSERT INTO genero VALUES (8, 'Animación');
INSERT INTO genero VALUES (9, 'Fantasía');
INSERT INTO genero VALUES (10, 'Musical');
INSERT INTO genero VALUES (11, 'Suspense');
INSERT INTO genero VALUES (12, 'Crimen');
INSERT INTO genero VALUES (13, 'Biografía');
INSERT INTO genero VALUES (14, 'Bélica');
INSERT INTO genero VALUES (15, 'Romance');


INSERT INTO pais VALUES (1, 'Nueva Zelanda');
INSERT INTO pais VALUES (2, 'Puerto Rico');
INSERT INTO pais VALUES (3, 'Dinamarca');
INSERT INTO pais VALUES (4, 'Inglaterra');
INSERT INTO pais VALUES (5, 'USA');
INSERT INTO pais VALUES (6, 'Alemania');
INSERT INTO pais VALUES (7, 'Canada');
INSERT INTO pais VALUES (8, 'Israel');
INSERT INTO pais VALUES (9, 'República Eslovaca');
INSERT INTO pais VALUES (10, 'Australia');
INSERT INTO pais VALUES (11, 'Austria');
INSERT INTO pais VALUES (12, 'Líbano');
INSERT INTO pais VALUES (13, 'Irlanda');

		

INSERT INTO actor VALUES (1, 'Russell', 'Crowe','https://es.web.img3.acsta.net/c_310_420/medias/nmedia/18/35/23/05/19609725.jpg', 1 ,'07-04-1964',1);
INSERT INTO actor VALUES (2, 'Joaquin', 'Phoenix','https://es.web.img3.acsta.net/c_310_420/pictures/17/05/29/11/47/593823.jpg', 1 , '28-10-1974',2);
INSERT INTO actor VALUES (3, 'Connie', 'Nielsen','https://es.web.img3.acsta.net/c_310_420/pictures/16/03/29/14/51/281019.jpg', 0, '03-07-1965',3);
INSERT INTO actor VALUES (4, 'Robert', 'De Niro','https://es.web.img3.acsta.net/c_310_420/medias/nmedia/18/35/23/00/19264083.jpg', 2 , '17-08-1943',5);
INSERT INTO actor VALUES (5, 'Zazie', 'Beetz','https://es.web.img3.acsta.net/c_310_420/pictures/19/11/26/23/20/0444545.jpg', 0 , '25-05-19910',6);
INSERT INTO actor VALUES (6, 'Ryan', 'Reynolds','https://es.web.img3.acsta.net/c_310_420/pictures/15/07/28/17/15/280194.jpg', 0, '23-10-1976',7);
INSERT INTO actor VALUES (7, 'Justice', 'Smith','https://es.web.img2.acsta.net/c_310_420/pictures/20/02/25/10/58/0163565.jpg', 0, '09-08-1991',5);
INSERT INTO actor VALUES (8, 'Kathryb', 'Newton','https://es.web.img2.acsta.net/c_310_420/pictures/17/02/08/12/17/097684.jpg', 0, '08-02-1997',5);
INSERT INTO actor VALUES (9, 'Gal', 'Gadot','https://es.web.img2.acsta.net/c_310_420/pictures/16/03/22/12/38/275927.jpg', 0, '30-04-1985',8);
INSERT INTO actor VALUES (10, 'Chris', 'Pine','https://es.web.img3.acsta.net/c_310_420/pictures/14/01/22/17/44/539448.jpg', 0, '26-08-1980',5);
INSERT INTO actor VALUES (11, 'Kristen', 'Wiig','https://es.web.img3.acsta.net/c_162_216/medias/nmedia/18/69/64/64/19786911.jpg', 0, '22-08-1973',5);
INSERT INTO actor VALUES (12, 'Bill', 'Murray','https://es.web.img3.acsta.net/c_310_420/pictures/15/11/16/16/15/344464.jpg', 0, '21-09-1950',5);
INSERT INTO actor VALUES (13, 'Dan', 'AyKroyd','https://es.web.img2.acsta.net/c_310_420/medias/nmedia/18/35/30/02/20196307.jpg', 0, '01-07-1952',7);
INSERT INTO actor VALUES (14, 'Leonardo', 'Di Caprio','https://es.web.img3.acsta.net/c_310_420/medias/nmedia/18/35/52/66/20426137.jpg', 1, '11-11-1974',5);
INSERT INTO actor VALUES (15, 'Jonah', 'Hill','https://es.web.img3.acsta.net/c_310_420/pictures/18/09/12/12/03/5412955.jpg', 0, '20-12-1983',5);
INSERT INTO actor VALUES (16, 'Margot', 'Robbie','https://es.web.img3.acsta.net/c_310_420/pictures/19/11/12/22/54/0812791.jpg', 0, '02-07-1990',10);
INSERT INTO actor VALUES (17, 'Sigourney', 'Weaver','https://es.web.img2.acsta.net/c_310_420/pictures/15/07/27/13/14/152942.jpg', 0, '08-10-1949',5);
INSERT INTO actor VALUES (18, 'Zach', 'Galligan','https://es.web.img2.acsta.net/c_310_420/pictures/16/12/05/14/54/286084.jpg', 0, '14-02-1964',5);
INSERT INTO actor VALUES (19, 'Phoebe', 'Cats','https://es.web.img3.acsta.net/c_310_420/medias/nmedia/18/90/90/52/20119289.jpg', 0, '16-07-1963',5);
INSERT INTO actor VALUES (20, 'Hoyt', 'Axton','https://es.web.img2.acsta.net/c_310_420/medias/nmedia/18/90/08/41/20080219.jpg', 0, '25-03-1938',5);
INSERT INTO actor VALUES (21, 'Brad', 'Pitt','https://es.web.img3.acsta.net/c_310_420/pictures/19/05/22/10/42/3773139.jpg', 2, '18-12-1963',5);
INSERT INTO actor VALUES (22, 'Diane', 'Kruger','https://es.web.img3.acsta.net/c_310_420/pictures/19/02/25/16/25/4588357.jpg', 0, '15-07-1976',6);
INSERT INTO actor VALUES (23, 'Christoph', 'Waltz','https://es.web.img3.acsta.net/c_310_420/pictures/15/07/23/09/37/293613.jpg', 2, '04-10-1956',11);
INSERT INTO actor VALUES (24, 'Keanu', 'Reeves','https://es.web.img2.acsta.net/c_310_420/pictures/17/02/06/17/01/343859.jpg', 0, '02-09-1964',12);
INSERT INTO actor VALUES (25, 'Laurence', 'Fishburne','https://es.web.img2.acsta.net/c_310_420/pictures/189/446/18944660_20130820132312794.jpg', 0, '30-07-1961',5);
INSERT INTO actor VALUES (26, 'Carrie-Anne', 'Moss','https://es.web.img2.acsta.net/c_310_420/pictures/15/11/18/14/21/140336.jpg', 0, '04-10-1956',7);
INSERT INTO actor VALUES (27, 'Sam', 'Neill','https://es.web.img2.acsta.net/c_310_420/medias/nmedia/18/35/36/64/19994825.jpg', 0, '14-09-1947',13);
INSERT INTO actor VALUES (28, 'Laura', 'Dern','https://es.web.img3.acsta.net/c_310_420/pictures/17/09/13/17/30/0919496.jpg', 1, '10-02-1960',5);
INSERT INTO actor VALUES (29, 'Jeff', 'Golblum','https://es.web.img3.acsta.net/c_310_420/pictures/17/09/13/17/23/2630896.jpg', 0, '22-10-1952',5);
INSERT INTO actor VALUES (30, 'Roy', 'Schneider','https://es.web.img2.acsta.net/c_310_420/pictures/17/10/16/12/38/4139658.jpg', 0, '10-11-1932',5);
INSERT INTO actor VALUES (31, 'Robert', 'Shaw','https://images-na.ssl-images-amazon.com/images/I/51astNk8emL.__AC_SX300_SY300_QL70_ML2_.jpg', 1, '09-08-1927',4);
INSERT INTO actor VALUES (32, 'Richard', 'Dreyfuss','https://es.web.img3.acsta.net/c_310_420/pictures/17/03/20/16/47/209368.jpg', 1, '29-10-1947',5);
INSERT INTO actor VALUES (33, 'Tom', 'Hanks','https://es.web.img3.acsta.net/c_310_420/pictures/16/04/26/10/00/472541.jpg', 2, '09-07-1956',5);
INSERT INTO actor VALUES (34, 'Christopher', 'Walken','https://es.web.img3.acsta.net/c_310_420/pictures/15/08/25/16/59/485578.jpg', 1, '31-03-1943',5);
INSERT INTO actor VALUES (35, 'Harrison', 'Ford','https://es.web.img2.acsta.net/c_310_420/pictures/15/10/13/11/06/006332.jpg',0, '13-07-1942',5);
INSERT INTO actor VALUES (36, 'Karen', 'Allen','https://es.web.img3.acsta.net/c_310_420/pictures/15/03/13/20/23/330894.jpg', 1, '05-10-1951',5);
INSERT INTO actor VALUES (37, 'Paul', 'Freeman','https://es.web.img2.acsta.net/c_310_420/medias/nmedia/18/93/59/44/20265928.jpg/', 1, '18-07-1943',4);
INSERT INTO actor VALUES (38, 'Mark', 'Hamill','https://es.web.img2.acsta.net/c_310_420/pictures/15/10/27/12/10/549232.jpg', 0, '25-09-1951',5);
INSERT INTO actor VALUES (39, 'Carrie', 'Fisher','https://es.web.img2.acsta.net/c_310_420/pictures/15/12/17/10/09/354978.jpg', 0, '21-10-1956',4);
INSERT INTO actor VALUES (40, 'Morgan', 'Freeman','https://es.web.img2.acsta.net/c_310_420/pictures/16/01/19/17/12/251122.jpg', 1, '01-06-1937',5);
INSERT INTO actor VALUES (41, 'Kevin', 'Spacey','https://es.web.img2.acsta.net/c_310_420/pictures/15/03/11/14/20/129429.jpg', 2, '26-07-1959',5);
INSERT INTO actor VALUES (42, 'Kenneth', 'Branagh','https://es.web.img2.acsta.net/c_310_420/medias/nmedia/18/35/27/03/19725717.jpg', 0, '10-12-1960',13);
INSERT INTO actor VALUES (43, 'Emma', 'Thompson','https://es.web.img3.acsta.net/c_310_420/pictures/15/12/08/11/17/523873.jpg', 2, '15-04-1959',4);
			

INSERT INTO director VALUES (1, 'Ridley', 'Scott', 'https://es.web.img3.acsta.net/r_1920_1080/pictures/14/12/10/16/47/273365.jpg', 1 ,'30-11-1937', 4);
INSERT INTO director VALUES (2, 'Todd', 'Phillips', 'https://es.web.img3.acsta.net/c_310_420/pictures/16/09/07/16/51/188884.jpg', 0 , '20-12-1970', 5);
INSERT INTO director VALUES (3, 'Rob', 'Letterman', 'https://m.media-amazon.com/images/M/MV5BMTkxMDA0MDMyMF5BMl5BanBnXkFtZTcwMjkwNzMzOA@@._V1_SX600_.jpg', 0 , '31-01-1970', 5);
INSERT INTO director VALUES (4, 'Patty', 'Jenkins', 'https://es.web.img3.acsta.net/c_310_420/pictures/16/03/29/15/10/352803.jpg', 0 , '24-07-1971', 5);
INSERT INTO director VALUES (5, 'Ivan', 'Reitman', 'https://es.web.img3.acsta.net/c_310_420/medias/nmedia/18/36/27/80/19636913.jpg', 0 , '27-10-1946', 9);
INSERT INTO director VALUES (6, 'Martin', 'Scorsese', 'https://es.web.img2.acsta.net/c_310_420/pictures/15/10/19/09/54/276049.jpg', 1 , '17-11-1942', 5);
INSERT INTO director VALUES (7, 'Joe', 'Dante', 'https://es.web.img3.acsta.net/c_310_420/medias/nmedia/18/79/49/41/19504968.jpg', 0 , '28-11-1946', 5);
INSERT INTO director VALUES (8, 'Quentin', 'Tarantino', 'https://es.web.img3.acsta.net/c_310_420/medias/nmedia/18/35/21/35/19999556.jpg', 2 , '27-03-1963', 5);
INSERT INTO director VALUES (9, 'Lana', 'Wachowsky', 'https://es.web.img2.acsta.net/c_310_420/pictures/16/03/09/16/29/317444.jpg', 0 , '21-06-1965', 5);
INSERT INTO director VALUES (10, 'Lilly', 'Wachowsky', 'https://es.web.img3.acsta.net/c_310_420/pictures/17/05/05/14/35/553894.jpg', 0 , '29-12-1967', 5);
INSERT INTO director VALUES (11, 'Steven', 'Spielberg', 'https://es.web.img3.acsta.net/c_310_420/pictures/16/05/17/11/39/453609.jpg', 3 , '18-12-1946', 5);
INSERT INTO director VALUES (12, 'George', 'Lucas', 'https://es.web.img3.acsta.net/c_310_420/pictures/210/242/21024283_20130802182448382.jpg', 0 , '14-05-1944', 5);
INSERT INTO director VALUES (13, 'David', 'Fincher', 'https://es.web.img2.acsta.net/c_310_420/medias/nmedia/18/64/19/48/19965756.jpg', 0 , '28-08-1962', 5);
INSERT INTO director VALUES (14, 'Kenneth', 'Branagh', 'https://es.web.img2.acsta.net/c_310_420/medias/nmedia/18/35/27/03/19725717.jpg', 0 , '10-12-1960', 13);


INSERT INTO pelicula VALUES (1, 'Gladiator', 1, null , 4, 5, 3, 1, 2, 3, 'https://m.media-amazon.com/images/M/MV5BMDliMmNhNDEtODUyOS00MjNlLTgxODEtN2U3NzIxMGVkZTA1L2ltYWdlXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_FMjpg_UX1000_.jpg', 8.5, 2000, 'https://www.youtube.com/watch?v=uePBwv_s6gM', 'En el año 180, el Imperio Romano domina todo el mundo conocido. Tras una gran victoria sobre los bárbaros del norte, el anciano emperador Marco Aurelio decide transferir el poder a Máximo, bravo general de sus ejércitos y hombre de inquebrantable lealtad al imperio. Pero su hijo Cómodo, que aspiraba al trono, no lo acepta y trata de asesinar a Máximo.' );
INSERT INTO pelicula VALUES (2, 'Joker', 2, null , 12, 3, 7, 2, 4, 5, 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/joker-poster-2-1567070106.jpg?crop=1xw:1xh;center,top&resize=980:*&keepGifs=1', 8.4, 2019, 'https://www.youtube.com/watch?v=ygUHhImN98w', 'Arthur Fleck es un hombre ignorado por la sociedad, cuya motivación en la vida es hacer reír. Pero una serie de trágicos acontecimientos le llevarán a ver el mundo de otra forma. Película basada en Joker, el popular personaje de DC Comics y archivillano de Batman, pero que en este film toma un cariz más realista y oscuro.');
INSERT INTO pelicula VALUES (3, 'Detective Pikachu', 3, null, 2, 4, 5, 6, 7, 8, 'https://es.web.img3.acsta.net/r_1920_1080/pictures/19/05/08/15/49/4294662.jpg', 6.6, 2019, 'https://www.youtube.com/watch?v=8PvyIAEfPgE', 'Ryme City, una metrópoli futurista en la que los humanos y los Pokémon conviven en armonía. Tras la misteriosa desaparición de su padre, toda una leyenda en la ciudad, el joven Tim Goodman (Justice Smith) comienza una investigación para buscarle y averiguar lo que le ha sucedido. En esta misión le ayudará el adorable súper-detective Pikachu, un inteligente Pokémon que habla, aunque curiosamente el chico es el único que puede entenderle. Ambos unirán sus fuerzas y trabajarán juntos para resolver este gran misterio, con la ayuda de Lucy (Kathryn Newton), una reportera que trabaja en su primera gran historia. Será una aventura en la que descubrirán a entrañables personajes del universo Pokémon, además de una trama espeluznante que podría amenazar la convivencia pacífica de todo este universo.');
INSERT INTO pelicula VALUES (4, 'Wonder Woman', 4, null, 4, 5, 9, 9, 10, 3, 'https://es.web.img3.acsta.net/r_1920_1080/pictures/17/05/22/10/23/162388.jpg', 7.4, 2017, 'https://www.youtube.com/watch?v=gOfmwQijKFg', 'Diana, princesa de las Amazonas, entrenada para ser una guerrera invencible, fue criada en una isla paradisíaca protegida, hasta que un día, un piloto norteamericano, que tuvo un accidente y acabó en sus costas, le habló de un gran conflicto existente en el mundo, la Primera Guerra Mundial. Diana decidió salir de la isla, convencida de que podía detener la terrible amenaza. Ahora lucha como Wonder Woman, junto a los hombres, en la guerra que acabará con todas las guerras y descubre todos sus poderes y su verdadero destino.');
INSERT INTO pelicula VALUES (5, 'Wonder Woman 1984', 4, null, 4, 5, 9, 9, 10, 11,  'https://es.web.img3.acsta.net/r_1920_1080/pictures/20/06/23/20/57/4275033.jpg', 5.4, 2020, 'https://www.youtube.com/watch?v=uaPbtACMxdQ', 'En 1984, en plena guerra fría, Diana Prince, conocida como Wonder Woman se enfrenta al empresario Maxwell Lord y a su antigua amiga Barbara Minerva / Cheetah, una villana que posee fuerza y agilidad sobrehumanas.');
INSERT INTO pelicula VALUES (6, 'Ghostbusters', 5, null, 2, 4, 9, 12, 13, 17,  'https://es.web.img3.acsta.net/r_1920_1080/medias/nmedia/18/85/63/71/20532250.jpg', 7.8, 1984, 'https://www.youtube.com/watch?v=6hDkhw5Wkasi', 'Los Drs. Venkman, Stantz y Epengler, son tres doctores en parapsicología que se quedan sin empleo tras quedar excluidos de una beca universitaria de investigación. Entonces deciden formar la empresa "Los Cazafantasmas", dedicada a limpiar Nueva York de ectoplasmas. El aumento repentino de apariciones espectrales en la Gran Manzana será el presagio de la llegada de un peligroso y poderoso demonio.');
INSERT INTO pelicula VALUES (7, 'El lobo de Wall Street', 6, null, 13, 2, 12, 14, 15, 16,  'https://es.web.img3.acsta.net/r_1920_1080/img/37/4f/374f264b6bb0a2333d5747d274fbadc3.jpg', 8.2, 2013, 'https://www.youtube.com/watch?v=PaAvUOXUohk', 'Película basada en hechos reales del corredor de bolsa neoyorquino Jordan Belfort. A mediados de los años 80, Belfort era un joven honrado que perseguía el sueño americano, pero pronto en la agencia de valores aprendió que lo más importante no era hacer ganar a sus clientes, sino ser ambicioso y ganar una buena comisión. Su enorme éxito y fortuna le valió el mote de "El lobo de Wall Street". Dinero. Poder. Mujeres. Drogas. Las tentaciones abundaban y el temor a la ley era irrelevante. Jordan y su manada de lobos consideraban que la discreción era una cualidad anticuada; nunca se conformaban con lo que tenían.');
INSERT INTO pelicula VALUES (8, 'Gremlins', 7, null, 2, 10, null, 18, 19, 20, 'https://es.web.img3.acsta.net/r_1920_1080/medias/nmedia/18/36/21/08/18462089.jpg', 7.3, 1984, 'https://www.youtube.com/watch?v=XBEVwaJEgaA', 'Rand es un viajante que un día regala a su hijo Billy una tierna y extraña criatura, un mogwai. El inocente regalo, sin embargo, será el origen de toda una ola de gamberradas y fechorías en un pequeño pueblo de Estados Unidos. Todo empieza cuando son infringidas, una tras otra, las tres reglas básicas que deben seguirse para cuidar a un mogwai: no darle de comer después de medianoche, no mojarlo y evitar que le dé la luz del Sol.');
INSERT INTO pelicula VALUES (9, 'Érase una vez en... Hollywood', 8, null, 2, 3, null, 14, 16, 21, 'https://es.web.img3.acsta.net/r_1920_1080/img/a0/5e/a05e0a72d6a1a86f984e97a15cd59777.jpg', 7.6, 2019, 'https://www.youtube.com/watch?v=J0rFGJV3cYw', 'Los Angeles, 1969. La estrella de televisión Rick Dalton, un actor en horas bajas especializado en westerns, y el doble de acción Cliff Booth, su mejor amigo, tratan de sobrevivir a una industria cinematográfica en constante cambio. Dalton es vecino de la joven y prometedora actriz y modelo Sharon Tate, que acaba de casarse con el prestigioso director polaco Roman Polanski…');
INSERT INTO pelicula VALUES (10, 'Malditos Bastardos', 8, null , 3, 5, 14, 21, 22, 23, 'https://es.web.img2.acsta.net/r_1920_1080/medias/nmedia/18/70/45/22/19123474.jpg', 8.3, 2009, 'https://www.youtube.com/watch?v=2jcTRi8D80k', 'Segunda Guerra Mundial. Durante la ocupación de Francia por los alemanes, Shosanna Dreyfus presencia la ejecución de su familia por orden del coronel nazi Hans Landa. Ella consigue huir a París, donde adopta una nueva identidad como propietaria de un cine. En otro lugar de Europa, el teniente Aldo Raine adiestra a un grupo de soldados judíos "Los bastardos" para atacar objetivos concretos. Los hombres de Raine y una actriz alemana, que trabaja para los aliados, deben llevar a cabo una misión que hará caer a los jefes del Tercer Reich. El destino quiere que todos se encuentren bajo la marquesina de un cine donde Shosanna espera para vengarse.');
INSERT INTO pelicula VALUES (11, 'Matrix', 9, 10 , 4, 6, null, 24, 25, 26, 'https://es.web.img3.acsta.net/r_1920_1080/medias/nmedia/18/72/16/76/20065616.jpg', 8.7, 1999, 'https://www.youtube.com/watch?v=vN_Hx_It3r0', 'Thomas Anderson lleva una doble vida: por el día es programador en una importante empresa de software, y por la noche un hacker informático llamado Neo. Su vida no volverá a ser igual cuando unos misteriosos personajes le inviten a descubrir la respuesta a la pregunta que no le deja dormir: ¿qué es Matrix?');
INSERT INTO pelicula VALUES (12, 'Jurassic Park', 11, null , 4, 5, 6, 27, 28, 29, 'https://es.web.img2.acsta.net/r_1920_1080/pictures/14/03/25/09/25/346980.jpg', 8.1, 1993, 'https://www.youtube.com/watch?v=QWBKEmWWL38', 'El multimillonario John Hammond tiene una idea para un espectacular parque temático: una isla retirada donde los visitantes puedan observar dinosaurios reales. Con la última tecnología en el desarrollo de ADN, los científicos pueden clonar braquiosaurios, triceratops, velociraptors y un tiranosaurio rex, utilizando para ello la sangre fosilizada en ámbar contenida en insectos que los mordieron hace millones de años. Los paleontólogos Alan Grant, Ellie Sattler y Ian Malcolm visitan el parque y quedan muy sorprendidos con los resultados obtenidos. Pero cuando un problemático empleado manipula el sofisticado sistema de seguridad los dinosaurios escapan, obligando a los visitantes a luchar por su supervivencia.');
INSERT INTO pelicula VALUES (13, 'Jaws', 11, null , 5, 7, null, 30, 31, 32, 'https://es.web.img3.acsta.net/r_1920_1080/pictures/14/03/17/10/10/562887.jpg', 8.0, 1975, 'https://www.youtube.com/watch?v=U1fu_sA7XhE', 'En la costa de un pequeño pueblo del Este de Estados Unidos, un enorme tiburón ataca a varias personas. Temiendo las fatales consecuencias que esto puede provocar en el negocio turístico, el alcalde se niega a cerrar las playas y a difundir la noticia. Pero un nuevo ataque del tiburón, en la propia playa, termina con la vida de otro bañista. El terror se ha hecho público, así que un veterano cazador de tiburones, un científico y el jefe de la policía local se unen para dar caza al temible escualo...');
INSERT INTO pelicula VALUES (14, 'Atrápame si puedes', 11, null , 13, 12, 3, 14, 33, 34, 'https://es.web.img3.acsta.net/r_1920_1080/medias/nmedia/18/68/88/61/20071858.jpg', 8.1, 2002, 'https://www.youtube.com/watch?v=s-7pyIxz8Qg', 'Frank Abagnale Jr. trabajó como médico, abogado y copiloto de una de las grandes líneas aéreas, todo ello antes de cumplir los dieciocho años. También fue un genial falsificador y sus habilidades le otorgaron una plaza en la historia. A la edad de 17 años, Frank Abagnale Jr. se convirtió en el ladrón de bancos de más éxito en la historia de Estados Unidos. El agente del FBI Carl Hanratty dedicó la mayor parte de su tiempo a perseguir a Frank para llevarle ante la justicia, pero Frank siempre estaba un paso por delante, retándole a continuar la caza.');
INSERT INTO pelicula VALUES (15, 'Indiana Jones', 11, null , 4, 5, null, 35 , 36, 37, 'https://es.web.img3.acsta.net/r_1920_1080/medias/nmedia/18/67/73/70/20250064.jpg', 8.4, 1981, 'https://www.youtube.com/watch?v=PFhSIQO7fw0', 'Año 1936. Indiana Jones es un profesor de arqueología, dispuesto a correr peligrosas aventuras con tal de conseguir valiosas reliquias históricas. Después de una infructuosa misión en Sudamérica, el gobierno estadounidense le encarga la búsqueda del Arca de la Alianza, donde se conservan las Tablas de la Ley que Dios entregó a Moisés. Según la leyenda, quien las posea tendrá un poder absoluto, razón por la cual también la buscan los nazis.');
INSERT INTO pelicula VALUES (16, 'Star Wars', 12, null , 4, 5, 9, 35, 38, 39, 'https://es.web.img3.acsta.net/r_1920_1080/medias/nmedia/18/71/18/12/20136728.jpg', 8.6, 1977, 'https://www.youtube.com/watch?v=beAH5vea99k', 'La princesa Leia, líder del movimiento rebelde que desea reinstaurar la República en la galaxia en los tiempos ominosos del Imperio, es capturada por las malévolas Fuerzas Imperiales, capitaneadas por el implacable Darth Vader, el sirviente más fiel del emperador. El intrépido Luke Skywalker, ayudado por Han Solo, capitán de la nave espacial "El Halcón Milenario", y los androides, R2D2 y C3PO, serán los encargados de luchar contra el enemigo y rescatar a la princesa para volver a instaurar la justicia en el seno de la Galaxia.');
INSERT INTO pelicula VALUES (17, 'Star Wars - Return of the Jedi', 12, null , 4, 5, 9, 35, 38, 39, 'https://es.web.img3.acsta.net/r_1920_1080/medias/nmedia/18/78/91/11/20136910.jpg', 8.3, 1983, 'https://www.youtube.com/watch?v=yhuKapE-Bio', 'Luke Skywalker y la princesa Leia deben viajar a Tatooine para liberar a Han Solo. Para conseguirlo, deben infiltrarse en la peligrosa guarida de Jabba the Hutt, el gángster más temido de la galaxia. Una vez reunidos, el equipo recluta a tribus de Ewoks para combatir a las fuerzas imperiales en los bosques de la luna de Endor. Mientras tanto, el Emperador y Darth Vader conspiran para convertir a Luke al lado oscuro, pero el joven Skywalker, por su parte, está decidido a reavivar el espíritu del Jedi en su padre. La guerra civil galáctica culmina en un último enfrentamiento entre las fuerzas rebeldes unificadas y una segunda Estrella de la Muerte, indefensa e incompleta, en una batalla que decidirá el destino de la galaxia.');
INSERT INTO pelicula VALUES (18, 'Star Wars - The Empire Strikes Back', 12, null , 4, 5, 9, 35, 38, 39, 'https://es.web.img2.acsta.net/r_1920_1080/medias/nmedia/18/72/73/89/20535462.jpg', 8.7, 1980, 'https://www.youtube.com/watch?v=xr3hPFJAHO4','Tras un ataque sorpresa de las tropas imperiales a las bases camufladas de la alianza rebelde, Luke Skywalker, en compañía de R2D2, parte hacia el planeta Dagobah en busca de Yoda, el último maestro Jedi, para que le enseñe los secretos de la Fuerza. Mientras, Han Solo, la princesa Leia, Chewbacca, y C3PO esquivan a las fuerzas imperiales y piden refugio al antiguo propietario del Halcón Milenario, Lando Calrissian, en la ciudad minera de Bespin, donde les prepara una trampa urdida por Darth Vader.');
INSERT INTO pelicula VALUES (19, 'Seven', 13, null , 12, 2, 7, 21, 40, 41, 'https://es.web.img3.acsta.net/r_1920_1080/medias/nmedia/18/76/03/18/19277893.jpg', 8.6, 1995, 'https://www.youtube.com/watch?v=xhzBmjdehPA', 'El veterano teniente Somerset (Morgan Freeman), del departamento de homicidios, está a punto de jubilarse y ser reemplazado por el ambicioso e impulsivo detective David Mills (Brad Pitt). Ambos tendrán que colaborar en la resolución de una serie de asesinatos cometidos por un psicópata que toma como base la relación de los siete pecados capitales: gula, pereza, soberbia, avaricia, envidia, lujuria e ira. Los cuerpos de las víctimas, sobre los que el asesino se ensaña de manera impúdica, se convertirán para los policías en un enigma que les obligará a viajar al horror y la barbarie más absoluta. ');
INSERT INTO pelicula VALUES (20, 'Mucho ruido y pocas nueces', 14, null , 2, 3, 15, 24, 42, 43, 'https://es.web.img3.acsta.net/r_1920_1080/medias/nmedia/18/74/26/38/20415479.jpg', 7.3, 1993, 'https://www.youtube.com/watch?v=LNe-O8OCI4g', 'Adaptación de una comedia de Shakespeare. El Príncipe Don Pedro de Aragón (Denzel Washington) regresa victorioso de una batalla acompañado de su hermano bastardo Don Juan (Keanu Reeves), de Benedicto (Kenneth Branagh) y de Claudio (Robert Sean Leonard), un joven florentino que ha sido colmado de honores por el gran valor mostrado en el campo de batalla. Son recibidos con gran regocijo por el caballero Leonato, que vive con su hija Hero (Beckinsale) y su sobrina Beatriz (Emma Thompson) en una paradisíaca villa de la campiña siciliana (Mesina). En el siglo XV, Sicilia formaba parte de los dominios de la Corona de Aragón, lo que explica el nombre de alguno de los personajes.');


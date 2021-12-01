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

CREATE TABLE IF NOT EXISTS actores_pelicula (
	peliculaId	INT(5) PRIMARY KEY,
	actor1Id	INT(5),
    actor2Id	INT(5),
    actor3Id	INT(5),
        FOREIGN KEY (actor1Id) REFERENCES actor(actorId),
        FOREIGN KEY (actor2Id) REFERENCES actor(actorId),
        FOREIGN KEY (actor3Id) REFERENCES actor(actorId));
        
        
CREATE TABLE IF NOT EXISTS directores_pelicula (
	peliculaId	INT(5) PRIMARY KEY,
	director1Id  int(5),
    director2Id int(5),
        FOREIGN KEY (director1Id) REFERENCES director(directorId),
        FOREIGN KEY (director2Id) REFERENCES director(directorId));

CREATE TABLE IF NOT EXISTS generos_pelicula (
	peliculaId	INT(5) PRIMARY KEY,
	genero1Id	INT(5),
    genero2Id	INT(5),
    genero3Id	INT(5),
        FOREIGN KEY (genero1Id) REFERENCES genero(generoId),
        FOREIGN KEY (genero2Id) REFERENCES genero(generoId),
        FOREIGN KEY (genero3Id) REFERENCES genero(generoId));

        
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
INSERT INTO genero VALUES (999, '');

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
INSERT INTO pais VALUES (999, '');


INSERT INTO actor VALUES (1, 'Russell', 'Crowe','https://www.imdb.com/name/nm0000128/mediaviewer/rm2298720512/', 1 ,'07-04-1964',1);
INSERT INTO actor VALUES (2, 'Joaquin', 'Phoenix','https://www.imdb.com/name/nm0001618/mediaviewer/rm521242113/', 1 , '28-10-1974',2);
INSERT INTO actor VALUES (3, 'Connie', 'Nielsen','https://www.imdb.com/name/nm0001567/mediaviewer/rm848773120/', 0, '03-07-1965',3);
INSERT INTO actor VALUES (4, 'Robert', 'De Niro','https://www.imdb.com/name/nm0000134/mediaviewer/rm418418432/', 2 , '17-08-1943',5);
INSERT INTO actor VALUES (5, 'Al', 'Pacino','https://www.imdb.com/name/nm0000199/mediaviewer/rm3894385408/', 1 , '25-04-1940',5);
INSERT INTO actor VALUES (6, 'Ryan', 'Reynolds','https://www.imdb.com/name/nm0005351/mediaviewer/rm1820887040/', 0, '23-10-1976',7);
INSERT INTO actor VALUES (7, 'Justice', 'Smith','https://www.imdb.com/name/nm6819854/mediaviewer/rm13342209/', 0, '09-08-1991',5);
INSERT INTO actor VALUES (8, 'Kathryb', 'Newton','https://www.imdb.com/name/nm1105980/mediaviewer/rm3069006592/', 0, '08-02-1997',5);
INSERT INTO actor VALUES (9, 'Gal', 'Gadot','https://www.imdb.com/name/nm2933757/mediaviewer/rm1174257921/', 0, '30-04-1985',8);
INSERT INTO actor VALUES (10, 'Chris', 'Pine','https://www.imdb.com/name/nm1517976/mediaviewer/rm1684776448/', 0, '26-08-1980',5);
INSERT INTO actor VALUES (11, 'Kristen', 'Wiig','https://www.imdb.com/name/nm1325419/mediaviewer/rm2859458816/', 0, '22-08-1973',5);
INSERT INTO actor VALUES (12, 'Bill', 'Murray','https://www.imdb.com/name/nm0000195/mediaviewer/rm1144888064/', 0, '21-09-1950',5);
INSERT INTO actor VALUES (13, 'Dan', 'AyKroyd','https://www.imdb.com/name/nm0000101/mediaviewer/rm689609216/', 0, '01-07-1952',7);
INSERT INTO actor VALUES (14, 'Leonardo', 'Di Caprio','https://www.imdb.com/name/nm0000138/mediaviewer/rm487490304/', 1, '11-11-1974',5);
INSERT INTO actor VALUES (15, 'Jonah', 'Hill','https://www.imdb.com/name/nm1706767/mediaviewer/rm4139364608/', 0, '20-12-1983',5);
INSERT INTO actor VALUES (16, 'Margot', 'Robbie','https://www.imdb.com/name/nm3053338/mediaviewer/rm1008443648/', 0, '02-07-1990',10);
INSERT INTO actor VALUES (17, 'Sigourney', 'Weaver','https://www.imdb.com/name/nm0000244/mediaviewer/rm355673344/', 0, '08-10-1949',5);
INSERT INTO actor VALUES (18, 'Zach', 'Galligan','https://www.imdb.com/name/nm0002090/mediaviewer/rm1369027328/?context=default', 0, '14-02-1964',5);
INSERT INTO actor VALUES (19, 'Phoebe', 'Cats','https://www.imdb.com/name/nm0000121/mediaviewer/rm969463553/?context=default', 0, '16-07-1963',5);
INSERT INTO actor VALUES (20, 'Hoyt', 'Axton','https://www.imdb.com/name/nm0001924/mediaviewer/rm1473745665/?context=default', 0, '25-03-1938',5);
INSERT INTO actor VALUES (21, 'Brad', 'Pitt','https://www.imdb.com/name/nm0000093/mediaviewer/rm864335360/', 2, '18-12-1963',5);
INSERT INTO actor VALUES (22, 'Diane', 'Kruger','https://www.imdb.com/name/nm1208167/mediaviewer/rm369790720/', 0, '15-07-1976',6);
INSERT INTO actor VALUES (23, 'Christoph', 'Waltz','https://www.imdb.com/name/nm0910607/mediaviewer/rm252355072/', 2, '04-10-1956',11);
INSERT INTO actor VALUES (24, 'Keanu', 'Reeves','hhttps://www.imdb.com/name/nm0000206/mediaviewer/rm487770369/', 0, '02-09-1964',12);
INSERT INTO actor VALUES (25, 'Laurence', 'Fishburne','https://www.imdb.com/name/nm0000401/mediaviewer/rm1925683200/', 0, '30-07-1961',5);
INSERT INTO actor VALUES (26, 'Carrie-Anne', 'Moss','https://www.imdb.com/name/nm0005251/mediaviewer/rm3251024384/', 0, '04-10-1956',7);
INSERT INTO actor VALUES (27, 'Sam', 'Neill','https://www.imdb.com/name/nm0000554/mediaviewer/rm3722343936/', 0, '14-09-1947',13);
INSERT INTO actor VALUES (28, 'Laura', 'Dern','https://www.imdb.com/name/nm0000368/mediaviewer/rm4228886528/', 1, '10-02-1960',5);
INSERT INTO actor VALUES (29, 'Jeff', 'Golblum','https://www.imdb.com/name/nm0000156/mediaviewer/rm1305587713/', 0, '22-10-1952',5);
INSERT INTO actor VALUES (30, 'Roy', 'Schneider','https://www.imdb.com/name/nm0001702/mediaviewer/rm1028495616/', 0, '10-11-1932',5);
INSERT INTO actor VALUES (31, 'Robert', 'Shaw','https://www.imdb.com/name/nm0001727/mediaviewer/rm1583851520/', 1, '09-08-1927',4);
INSERT INTO actor VALUES (32, 'Richard', 'Dreyfuss','https://www.imdb.com/name/nm0000377/mediaviewer/rm3311045376/', 1, '29-10-1947',5);
INSERT INTO actor VALUES (33, 'Tom', 'Hanks','https://www.imdb.com/name/nm0000158/mediaviewer/rm3040001536/', 2, '09-07-1956',5);
INSERT INTO actor VALUES (34, 'Christopher', 'Walken','https://www.imdb.com/name/nm0000686/mediaviewer/rm2301401600/', 1, '31-03-1943',5);
INSERT INTO actor VALUES (35, 'Harrison', 'Ford','https://www.imdb.com/name/nm0000148/mediaviewer/rm2542519041/?context=default',0, '13-07-1942',5);
INSERT INTO actor VALUES (36, 'Karen', 'Allen','https://www.imdb.com/name/nm0000261/mediaviewer/rm3908474624/', 1, '05-10-1951',5);
INSERT INTO actor VALUES (37, 'Paul', 'Freeman','https://www.imdb.com/name/nm0293550/mediaviewer/rm370707968/', 1, '18-07-1943',4);
INSERT INTO actor VALUES (38, 'Mark', 'Hamill','https://www.imdb.com/name/nm0000434/mediaviewer/rm1572940288/', 0, '25-09-1951',5);
INSERT INTO actor VALUES (39, 'Carrie', 'Fisher','https://www.imdb.com/name/nm0000402/mediaviewer/rm3972020992/', 0, '21-10-1956',4);
INSERT INTO actor VALUES (40, 'Morgan', 'Freeman','https://www.imdb.com/name/nm0000151/mediaviewer/rm3587479040/', 1, '01-06-1937',5);
INSERT INTO actor VALUES (41, 'Kevin', 'Spacey','https://www.imdb.com/name/nm0000228/mediaviewer/rm1382175232/', 2, '26-07-1959',5);
INSERT INTO actor VALUES (42, 'Kenneth', 'Branagh','https://www.imdb.com/name/nm0000110/mediaviewer/rm2013376768/', 0, '10-12-1960',13);
INSERT INTO actor VALUES (43, 'Emma', 'Thompson','https://www.imdb.com/name/nm0000668/mediaviewer/rm118653440/', 2, '15-04-1959',4);


INSERT INTO director VALUES (1, 'Ridley', 'Scott', 'https://www.imdb.com/name/nm0000631/mediaviewer/rm1374618368/', 1 ,'30-11-1937', 4);
INSERT INTO director VALUES (2, 'Todd', 'Phillips', 'https://www.imdb.com/name/nm0680846/mediaviewer/rm2385862656/', 0 , '20-12-1970', 5);
INSERT INTO director VALUES (3, 'Rob', 'Letterman', 'https://www.imdb.com/name/nm1224299/mediaviewer/rm1631168512/', 0 , '31-01-1970', 5);
INSERT INTO director VALUES (4, 'Patty', 'Jenkins', 'https://www.imdb.com/name/nm0420941/mediaviewer/rm1541732608/', 0 , '24-07-1971', 5);
INSERT INTO director VALUES (5, 'Ivan', 'Reitman', 'https://www.imdb.com/name/nm0718645/mediaviewer/rm1135251200/', 0 , '27-10-1946', 9);
INSERT INTO director VALUES (6, 'Martin', 'Scorsese', 'https://www.imdb.com/name/nm0000217/mediaviewer/rm1221431040/', 1 , '17-11-1942', 5);
INSERT INTO director VALUES (7, 'Joe', 'Dante', 'https://www.imdb.com/name/nm0001102/mediaviewer/rm1826930688/', 0 , '28-11-1946', 5);
INSERT INTO director VALUES (8, 'Quentin', 'Tarantino', 'https://www.imdb.com/name/nm0000233/mediaviewer/rm4146963200/', 2 , '27-03-1963', 5);
INSERT INTO director VALUES (9, 'Lana', 'Wachowsky', 'https://www.imdb.com/name/nm0905154/mediaviewer/rm3382618368/', 0 , '21-06-1965', 5);
INSERT INTO director VALUES (10, 'Lilly', 'Wachowsky', 'https://www.imdb.com/name/nm0905152/mediaviewer/rm1928797184/', 0 , '29-12-1967', 5);
INSERT INTO director VALUES (11, 'Steven', 'Speilberg', 'https://www.imdb.com/name/nm0000229/mediaviewer/rm4050361088/', 3 , '18-12-1946', 5);
INSERT INTO director VALUES (12, 'George', 'Lucas', 'https://www.imdb.com/name/nm0000184/mediaviewer/rm1722651904/', 0 , '14-05-1944', 5);
INSERT INTO director VALUES (13, 'David', 'Fincher', 'https://www.imdb.com/name/nm0000399/mediaviewer/rm1913489920/', 0 , '28-08-1962', 5);
INSERT INTO director VALUES (14, 'Kenneth', 'Branagh', 'https://www.imdb.com/name/nm0000110/mediaviewer/rm2013376768/', 0 , '10-12-1960', 13);
INSERT INTO director VALUES (999,'','','',0 ,'',999);

INSERT INTO pelicula VALUES (1, 'Gladiator', 1, 999 , 4, 5, 3, 1, 2, 3, 'https://www.imdb.com/title/tt0172495/mediaviewer/rm2442542592/', 8.5, 2000, 'https://www.imdb.com/video/vi2628367897/?ref_=tt_vi_i_1', 'En el año 180, el Imperio Romano domina todo el mundo conocido. Tras una gran victoria sobre los bárbaros del norte, el anciano emperador Marco Aurelio decide transferir el poder a Máximo, bravo general de sus ejércitos y hombre de inquebrantable lealtad al imperio. Pero su hijo Cómodo, que aspiraba al trono, no lo acepta y trata de asesinar a Máximo.' );
INSERT INTO pelicula VALUES (2, 'Joker', 2, 999 , 12, 3, 7, 2, 5, 6, 'https://www.imdb.com/title/tt7286456/mediaviewer/rm3353122305/', 8.4, 2019, 'https://www.imdb.com/video/vi1723318041?playlistId=tt7286456&ref_=tt_ov_vi', 'Arthur Fleck es un hombre ignorado por la sociedad, cuya motivación en la vida es hacer reír. Pero una serie de trágicos acontecimientos le llevarán a ver el mundo de otra forma. Película basada en Joker, el popular personaje de DC Comics y archivillano de Batman, pero que en este film toma un cariz más realista y oscuro.');
INSERT INTO pelicula VALUES (3, 'Detective Pikachu', 3, 999, 2, 4, 5, 6, 7, 8, 'https://www.imdb.com/title/tt5884052/mediaviewer/rm2806279168/', 6.6, 2019, 'https://www.imdb.com/video/vi3254238233?playlistId=tt5884052&ref_=tt_pr_ov_vi', 'Ryme City, una metrópoli futurista en la que los humanos y los Pokémon conviven en armonía. Tras la misteriosa desaparición de su padre, toda una leyenda en la ciudad, el joven Tim Goodman (Justice Smith) comienza una investigación para buscarle y averiguar lo que le ha sucedido. En esta misión le ayudará el adorable súper-detective Pikachu, un inteligente Pokémon que habla, aunque curiosamente el chico es el único que puede entenderle. Ambos unirán sus fuerzas y trabajarán juntos para resolver este gran misterio, con la ayuda de Lucy (Kathryn Newton), una reportera que trabaja en su primera gran historia. Será una aventura en la que descubrirán a entrañables personajes del universo Pokémon, además de una trama espeluznante que podría amenazar la convivencia pacífica de todo este universo.');
INSERT INTO pelicula VALUES (4, 'Wonder Woman', 4, 999, 4, 5, 9, 9, 10, 3, 'https://www.imdb.com/title/tt0451279/mediaviewer/rm1317819648/', 7.4, 2017, 'https://www.imdb.com/video/vi3944268057?playlistId=tt0451279&ref_=tt_ov_vi', 'Diana, princesa de las Amazonas, entrenada para ser una guerrera invencible, fue criada en una isla paradisíaca protegida, hasta que un día, un piloto norteamericano, que tuvo un accidente y acabó en sus costas, le habló de un gran conflicto existente en el mundo, la Primera Guerra Mundial. Diana decidió salir de la isla, convencida de que podía detener la terrible amenaza. Ahora lucha como Wonder Woman, junto a los hombres, en la guerra que acabará con todas las guerras y descubre todos sus poderes y su verdadero destino.');
INSERT INTO pelicula VALUES (5, 'Wonder Woman 1984', 4, 999, 4, 5, 9, 10, 3, 11,  'https://www.imdb.com/title/tt7126948/mediaviewer/rm1442963201/', 5.4, 2020, 'https://www.imdb.com/video/vi1782890009/?ref_=tt_vi_i_2', 'En 1984, en plena guerra fría, Diana Prince, conocida como Wonder Woman se enfrenta al empresario Maxwell Lord y a su antigua amiga Barbara Minerva / Cheetah, una villana que posee fuerza y agilidad sobrehumanas.');
INSERT INTO pelicula VALUES (6, 'Ghostbusters', 5, 999, 2, 4, 9, 12, 13, 17,  'https://www.imdb.com/title/tt0087332/mediaviewer/rm1280169216/', 7.8, 1984, 'https://www.imdb.com/video/vi2800593945?playlistId=tt0087332&ref_=tt_ov_vi', 'Los Drs. Venkman, Stantz y Epengler, son tres doctores en parapsicología que se quedan sin empleo tras quedar excluidos de una beca universitaria de investigación. Entonces deciden formar la empresa "Los Cazafantasmas", dedicada a limpiar Nueva York de ectoplasmas. El aumento repentino de apariciones espectrales en la Gran Manzana será el presagio de la llegada de un peligroso y poderoso demonio.');
INSERT INTO pelicula VALUES (7, 'El lobo de Wall Street', 6, 999, 13, 2, 12, 14, 15, 16,  'https://www.imdb.com/title/tt0993846/mediaviewer/rm2842940160/', 8.2, 2013, 'https://www.imdb.com/video/vi2312218649?playlistId=tt0993846&ref_=tt_ov_vi', 'Película basada en hechos reales del corredor de bolsa neoyorquino Jordan Belfort. A mediados de los años 80, Belfort era un joven honrado que perseguía el sueño americano, pero pronto en la agencia de valores aprendió que lo más importante no era hacer ganar a sus clientes, sino ser ambicioso y ganar una buena comisión. Su enorme éxito y fortuna le valió el mote de "El lobo de Wall Street". Dinero. Poder. Mujeres. Drogas. Las tentaciones abundaban y el temor a la ley era irrelevante. Jordan y su manada de lobos consideraban que la discreción era una cualidad anticuada; nunca se conformaban con lo que tenían.');
INSERT INTO pelicula VALUES (8, 'Gremlins', 7, 999, 2, 10, 999, 18, 19, 20, 'https://www.imdb.com/title/tt0087363/mediaviewer/rm1389894144/', 7.3, 1984, 'https://www.imdb.com/video/vi2626338585?playlistId=tt0087363&ref_=tt_pr_ov_vi', 'Rand es un viajante que un día regala a su hijo Billy una tierna y extraña criatura, un mogwai. El inocente regalo, sin embargo, será el origen de toda una ola de gamberradas y fechorías en un pequeño pueblo de Estados Unidos. Todo empieza cuando son infringidas, una tras otra, las tres reglas básicas que deben seguirse para cuidar a un mogwai: no darle de comer después de medianoche, no mojarlo y evitar que le dé la luz del Sol.');
INSERT INTO pelicula VALUES (9, 'Érase una vez en... Hollywood', 8, 999, 2, 3, 999, 14, 16, 21, 'https://www.imdb.com/title/tt7131622/mediaviewer/rm1947703297/', 7.6, 2019, 'https://www.imdb.com/video/vi1385741849?playlistId=tt7131622&ref_=tt_ov_vi', 'Los Angeles, 1969. La estrella de televisión Rick Dalton, un actor en horas bajas especializado en westerns, y el doble de acción Cliff Booth, su mejor amigo, tratan de sobrevivir a una industria cinematográfica en constante cambio. Dalton es vecino de la joven y prometedora actriz y modelo Sharon Tate, que acaba de casarse con el prestigioso director polaco Roman Polanski…');
INSERT INTO pelicula VALUES (10, 'Malditos Bastardos', 8, 999 , 3, 5, 14, 21, 22, 23, 'https://www.imdb.com/title/tt0361748/mediaviewer/rm3163035648/', 8.3, 2009, 'https://www.imdb.com/video/vi3738173977?playlistId=tt0361748&ref_=tt_ov_vi', 'Segunda Guerra Mundial. Durante la ocupación de Francia por los alemanes, Shosanna Dreyfus presencia la ejecución de su familia por orden del coronel nazi Hans Landa. Ella consigue huir a París, donde adopta una nueva identidad como propietaria de un cine. En otro lugar de Europa, el teniente Aldo Raine adiestra a un grupo de soldados judíos "Los bastardos" para atacar objetivos concretos. Los hombres de Raine y una actriz alemana, que trabaja para los aliados, deben llevar a cabo una misión que hará caer a los jefes del Tercer Reich. El destino quiere que todos se encuentren bajo la marquesina de un cine donde Shosanna espera para vengarse.');
INSERT INTO pelicula VALUES (11, 'Matrix', 9, 10 , 4, 6, 999, 24, 25, 26, 'https://www.imdb.com/title/tt0133093/mediaviewer/rm525547776//', 8.7, 1999, 'https://www.imdb.com/video/vi1032782617?playlistId=tt0133093&ref_=tt_ov_vi', 'Thomas Anderson lleva una doble vida: por el día es programador en una importante empresa de software, y por la noche un hacker informático llamado Neo. Su vida no volverá a ser igual cuando unos misteriosos personajes le inviten a descubrir la respuesta a la pregunta que no le deja dormir: ¿qué es Matrix?');
INSERT INTO pelicula VALUES (12, 'Jurassic Park', 11, 999 , 4, 5, 6, 27, 28, 29, 'https://www.imdb.com/title/tt0107290/mediaviewer/rm3913805824/', 8.1, 1993, 'https://www.imdb.com/video/vi177055257?playlistId=tt0107290&ref_=tt_ov_vi', 'El multimillonario John Hammond tiene una idea para un espectacular parque temático: una isla retirada donde los visitantes puedan observar dinosaurios reales. Con la última tecnología en el desarrollo de ADN, los científicos pueden clonar braquiosaurios, triceratops, velociraptors y un tiranosaurio rex, utilizando para ello la sangre fosilizada en ámbar contenida en insectos que los mordieron hace millones de años. Los paleontólogos Alan Grant, Ellie Sattler y Ian Malcolm visitan el parque y quedan muy sorprendidos con los resultados obtenidos. Pero cuando un problemático empleado manipula el sofisticado sistema de seguridad los dinosaurios escapan, obligando a los visitantes a luchar por su supervivencia.');
INSERT INTO pelicula VALUES (13, 'Jaws', 11, 999 , 5, 7, 999, 30, 31, 32, 'https://www.imdb.com/title/tt0073195/mediaviewer/rm1449540864/', 8.0, 1975, 'https://www.imdb.com/video/vi4242122009?playlistId=tt0073195&ref_=tt_ov_vi', 'En la costa de un pequeño pueblo del Este de Estados Unidos, un enorme tiburón ataca a varias personas. Temiendo las fatales consecuencias que esto puede provocar en el negocio turístico, el alcalde se niega a cerrar las playas y a difundir la noticia. Pero un nuevo ataque del tiburón, en la propia playa, termina con la vida de otro bañista. El terror se ha hecho público, así que un veterano cazador de tiburones, un científico y el jefe de la policía local se unen para dar caza al temible escualo...');
INSERT INTO pelicula VALUES (14, 'Atrápame si puedes', 11, 999 , 13, 12, 3, 14, 33, 34, 'https://www.imdb.com/title/tt0264464/mediaviewer/rm3911489536/', 8.1, 2002, 'https://www.imdb.com/video/vi1220346137?playlistId=tt0264464&ref_=tt_ov_vi', 'Frank Abagnale Jr. trabajó como médico, abogado y copiloto de una de las grandes líneas aéreas, todo ello antes de cumplir los dieciocho años. También fue un genial falsificador y sus habilidades le otorgaron una plaza en la historia. A la edad de 17 años, Frank Abagnale Jr. se convirtió en el ladrón de bancos de más éxito en la historia de Estados Unidos. El agente del FBI Carl Hanratty dedicó la mayor parte de su tiempo a perseguir a Frank para llevarle ante la justicia, pero Frank siempre estaba un paso por delante, retándole a continuar la caza.');
INSERT INTO pelicula VALUES (15, 'Indiana Jones', 11, 999 , 4, 5, 999, 35 , 36, 37, 'https://www.imdb.com/title/tt0082971/mediaviewer/rm1612744448/', 8.4, 1981, 'https://www.imdb.com/video/vi3747396377?playlistId=tt0082971&ref_=tt_ov_vi', 'Año 1936. Indiana Jones es un profesor de arqueología, dispuesto a correr peligrosas aventuras con tal de conseguir valiosas reliquias históricas. Después de una infructuosa misión en Sudamérica, el gobierno estadounidense le encarga la búsqueda del Arca de la Alianza, donde se conservan las Tablas de la Ley que Dios entregó a Moisés. Según la leyenda, quien las posea tendrá un poder absoluto, razón por la cual también la buscan los nazis.');
INSERT INTO pelicula VALUES (16, 'Star Wars', 12, 999 , 4, 5, 9, 35, 38, 39, 'https://www.imdb.com/title/tt0076759/mediaviewer/rm3263717120/', 8.6, 1977, 'https://www.imdb.com/video/vi1317709849?playlistId=tt0076759&ref_=tt_ov_vi', 'La princesa Leia, líder del movimiento rebelde que desea reinstaurar la República en la galaxia en los tiempos ominosos del Imperio, es capturada por las malévolas Fuerzas Imperiales, capitaneadas por el implacable Darth Vader, el sirviente más fiel del emperador. El intrépido Luke Skywalker, ayudado por Han Solo, capitán de la nave espacial "El Halcón Milenario", y los androides, R2D2 y C3PO, serán los encargados de luchar contra el enemigo y rescatar a la princesa para volver a instaurar la justicia en el seno de la Galaxia.');
INSERT INTO pelicula VALUES (17, 'Star Wars - Return of the Jedi', 12, 999 , 4, 5, 9, 35, 38, 39, 'hhttps://www.imdb.com/title/tt0086190/mediaviewer/rm602420224/', 8.3, 1983, 'https://www.imdb.com/video/vi1702936345?playlistId=tt0086190&ref_=tt_pr_ov_vi', 'Luke Skywalker y la princesa Leia deben viajar a Tatooine para liberar a Han Solo. Para conseguirlo, deben infiltrarse en la peligrosa guarida de Jabba the Hutt, el gángster más temido de la galaxia. Una vez reunidos, el equipo recluta a tribus de Ewoks para combatir a las fuerzas imperiales en los bosques de la luna de Endor. Mientras tanto, el Emperador y Darth Vader conspiran para convertir a Luke al lado oscuro, pero el joven Skywalker, por su parte, está decidido a reavivar el espíritu del Jedi en su padre. La guerra civil galáctica culmina en un último enfrentamiento entre las fuerzas rebeldes unificadas y una segunda Estrella de la Muerte, indefensa e incompleta, en una batalla que decidirá el destino de la galaxia.');
INSERT INTO pelicula VALUES (18, 'Star Wars - The Empire Strikes Back', 12, 999 , 4, 5, 9, 35, 38, 39, 'https://www.imdb.com/title/tt0080684/mediaviewer/rm3114097664/', 8.7, 1980, 'https://www.imdb.com/video/vi221753881?playlistId=tt0080684&ref_=tt_ov_vi','Tras un ataque sorpresa de las tropas imperiales a las bases camufladas de la alianza rebelde, Luke Skywalker, en compañía de R2D2, parte hacia el planeta Dagobah en busca de Yoda, el último maestro Jedi, para que le enseñe los secretos de la Fuerza. Mientras, Han Solo, la princesa Leia, Chewbacca, y C3PO esquivan a las fuerzas imperiales y piden refugio al antiguo propietario del Halcón Milenario, Lando Calrissian, en la ciudad minera de Bespin, donde les prepara una trampa urdida por Darth Vader.');
INSERT INTO pelicula VALUES (19, 'Seven', 13, 999 , 12, 2, 7, 21, 40, 41, 'https://www.imdb.com/title/tt0114369/mediaviewer/rm3116368640//', 8.6, 1995, 'https://www.imdb.com/video/vi2508831257?playlistId=tt0114369&ref_=tt_ov_vi1', 'El veterano teniente Somerset (Morgan Freeman), del departamento de homicidios, está a punto de jubilarse y ser reemplazado por el ambicioso e impulsivo detective David Mills (Brad Pitt). Ambos tendrán que colaborar en la resolución de una serie de asesinatos cometidos por un psicópata que toma como base la relación de los siete pecados capitales: gula, pereza, soberbia, avaricia, envidia, lujuria e ira. Los cuerpos de las víctimas, sobre los que el asesino se ensaña de manera impúdica, se convertirán para los policías en un enigma que les obligará a viajar al horror y la barbarie más absoluta. ');
INSERT INTO pelicula VALUES (20, 'Mucho ruido y pocas nueces', 14, null , 2, 3, 15, 24, 42, 43, 'https://www.imdb.com/title/tt0107616/mediaviewer/rm375920640/', 7.3, 1993, 'https://www.imdb.com/video/vi1402667289?playlistId=tt0107616&ref_=tt_ov_vi', 'Adaptación de una comedia de Shakespeare. El Príncipe Don Pedro de Aragón (Denzel Washington) regresa victorioso de una batalla acompañado de su hermano bastardo Don Juan (Keanu Reeves), de Benedicto (Kenneth Branagh) y de Claudio (Robert Sean Leonard), un joven florentino que ha sido colmado de honores por el gran valor mostrado en el campo de batalla. Son recibidos con gran regocijo por el caballero Leonato, que vive con su hija Hero (Beckinsale) y su sobrina Beatriz (Emma Thompson) en una paradisíaca villa de la campiña siciliana (Mesina). En el siglo XV, Sicilia formaba parte de los dominios de la Corona de Aragón, lo que explica el nombre de alguno de los personajes.');




INSERT INTO actores_pelicula VALUES (1, 1, 2, 3);
INSERT INTO actores_pelicula VALUES (2, 2, 5, 6);
INSERT INTO actores_pelicula VALUES (3, 6, 7, 8);
INSERT INTO actores_pelicula VALUES (4, 9, 10, 3);
INSERT INTO actores_pelicula VALUES (5, 10, 3, 11);
INSERT INTO actores_pelicula VALUES (6, 12, 13, 17);
INSERT INTO actores_pelicula VALUES (7, 14, 15, 16);
INSERT INTO actores_pelicula VALUES (8, 18, 19, 20);
INSERT INTO actores_pelicula VALUES (9, 14, 16, 21);
INSERT INTO actores_pelicula VALUES (10, 21, 22, 23);
INSERT INTO actores_pelicula VALUES (11, 24, 25, 26);
INSERT INTO actores_pelicula VALUES (12, 27, 28, 29);
INSERT INTO actores_pelicula VALUES (13, 30, 31, 32);
INSERT INTO actores_pelicula VALUES (14, 14, 33, 34);
INSERT INTO actores_pelicula VALUES (15, 35, 36, 37);
INSERT INTO actores_pelicula VALUES (16, 35, 38, 39);
INSERT INTO actores_pelicula VALUES (17, 35, 38, 39);
INSERT INTO actores_pelicula VALUES (18, 35, 38, 39);
INSERT INTO actores_pelicula VALUES (19, 21, 40, 41);
INSERT INTO actores_pelicula VALUES (20, 24, 42, 43);

INSERT INTO directores_pelicula VALUES (1, 1, 999);
INSERT INTO directores_pelicula VALUES (2, 2, 999);
INSERT INTO directores_pelicula VALUES (3, 3, 999);
INSERT INTO directores_pelicula VALUES (4, 4, 999);
INSERT INTO directores_pelicula VALUES (5, 4, 999);
INSERT INTO directores_pelicula VALUES (6, 5, 999);
INSERT INTO directores_pelicula VALUES (7, 6, 999);
INSERT INTO directores_pelicula VALUES (8, 7, 999);
INSERT INTO directores_pelicula VALUES (9, 8, 999);
INSERT INTO directores_pelicula VALUES (10, 8, 999);
INSERT INTO directores_pelicula VALUES (11, 9, 10);
INSERT INTO directores_pelicula VALUES (12, 11, 999);
INSERT INTO directores_pelicula VALUES (13, 11, 999);
INSERT INTO directores_pelicula VALUES (14, 11, 999);
INSERT INTO directores_pelicula VALUES (15, 11, 999);
INSERT INTO directores_pelicula VALUES (16, 12, 999);
INSERT INTO directores_pelicula VALUES (17, 12, 999);
INSERT INTO directores_pelicula VALUES (18, 12, 999);
INSERT INTO directores_pelicula VALUES (19, 13, 999);
INSERT INTO directores_pelicula VALUES (20, 14, 999);

INSERT INTO generos_pelicula VALUES (1, 4, 5, 3);
INSERT INTO generos_pelicula VALUES (2, 12, 3, 7);
INSERT INTO generos_pelicula VALUES (3, 2, 4, 5);
INSERT INTO generos_pelicula VALUES (4, 4, 5, 9);
INSERT INTO generos_pelicula VALUES (5, 4, 5, 9);
INSERT INTO generos_pelicula VALUES (6, 2, 4, 9);
INSERT INTO generos_pelicula VALUES (7, 13, 2, 12);
INSERT INTO generos_pelicula VALUES (8, 2, 10, 999);
INSERT INTO generos_pelicula VALUES (9, 2, 3, 999);
INSERT INTO generos_pelicula VALUES (10, 3, 5, 14);
INSERT INTO generos_pelicula VALUES (11, 4, 6, 999);
INSERT INTO generos_pelicula VALUES (12, 4, 5, 6);
INSERT INTO generos_pelicula VALUES (13, 5, 7, 999);
INSERT INTO generos_pelicula VALUES (14, 13, 12, 3);
INSERT INTO generos_pelicula VALUES (15, 4, 5, 999);
INSERT INTO generos_pelicula VALUES (16, 4, 5, 9);
INSERT INTO generos_pelicula VALUES (17, 4, 5, 9);
INSERT INTO generos_pelicula VALUES (18, 4, 5, 9);
INSERT INTO generos_pelicula VALUES (19, 12, 2, 7);
INSERT INTO generos_pelicula VALUES (20, 2, 3, 15);

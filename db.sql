CREATE TABLE Users(
	id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT, 
	firstname VARCHAR(50),
	lastname VARCHAR(50),
	email VARCHAR(150),
	phoneN VARCHAR(10),
	statut BOOLEAN,
	admin BOOLEAN,
	subscription VARCHAR(25),
	idSubscription INTEGER UNSIGNED,
	PRIMARY KEY(id)
);

CREATE TABLE Subscription(
	id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	name VARCHAR(50),
	description TEXT(1000),
	hourRate FLOAT,
	studentRate FLOAT,
	engagementRate FLOAT,
	notEngagementRate FLOAT,
	engagementTime DATE,
	PRIMARY KEY(id)

);

CREATE TABLE UserSub(
	id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	engagement BOOLEAN,
	dateStart DATE,
	dateEnd DATE,
	idUser INTEGER UNSIGNED,
	idSub INTEGER UNSIGNED,
	PRIMARY KEY(id),
	FOREIGN KEY(idUser) REFERENCES Users(id),
	FOREIGN KEY(idSub) REFERENCES Subscription(id)

);

CREATE TABLE ServiceCommand(
	id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	serviceType VARCHAR(100),
	informationService TEXT(1000),
	serviceRate FLOAT,
	quantity INTEGER UNSIGNED,
	PRIMARY KEY(id)
);

CREATE TABLE ServiceCommandList(
	idUser INTEGER UNSIGNED,
	idServiceCommand INTEGER UNSIGNED,
	quantity INTEGER,
	PRIMARY KEY(idUser, idServiceCommand),
	FOREIGN KEY(idUser) REFERENCES Users(id),
	FOREIGN KEY(idServiceCommand) REFERENCES ServiceCommand(id) 
);

CREATE TABLE HardwareCommand(
	id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	hardwareType VARCHAR(100), 
	information TEXT(1000),
	statut VARCHAR(50),
	price FLOAT,
	quantity INTEGER NOT NULL,
	PRIMARY KEY(id)
);

CREATE TABLE HardwareCommandList(
	idUser INTEGER UNSIGNED,
	idHardware INTEGER UNSIGNED,
	quantity INTEGER UNSIGNED,
	dateStart DATE,
	dateEnd DATE,
	PRIMARY KEY(idUser, idHardware),
	FOREIGN KEY(idUser) REFERENCES Users(id),
	FOREIGN KEY(idHardware) REFERENCES HardwareCommand(id)
);


CREATE TABLE Room(
	id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	description TEXT(1000),
	roomNumber INTEGER UNSIGNED,
	site VARCHAR(150),
	roomStatut VARCHAR(100),
	PRIMARY KEY(id)
);

CREATE TABLE ReservationRoom(
	id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	idRoom INTEGER UNSIGNED,
	dateStart DATETIME,
	dateEnd DATETIME,
	originalState VARCHAR(100),
	afterState VARCHAR(100),
	PRIMARY KEY(id),
	FOREIGN KEY(idRoom) REFERENCES Room(id)
);

CREATE TABLE MakeReservation(
	idUser INTEGER UNSIGNED,
	idReservation INTEGER UNSIGNED,
	PRIMARY KEY(idUser, idReservation),
	FOREIGN KEY(idUser) REFERENCES Users(id),
	FOREIGN KEY(idReservation) REFERENCES ReservationRoom(id)
);

#------------------------------------------------------------
# Table: article
#------------------------------------------------------------

CREATE TABLE article(
        idArticle Int  Auto_increment  NOT NULL ,
        nom       Varchar (50) NOT NULL ,
        prix      Int NOT NULL ,
        quantite  Int NOT NULL ,
        taille    Varchar (50) DEFAULT NULL,
        couleur   Varchar (50) NOT NULL ,
        type      Varchar (50) NOT NULL ,
        photo     Varchar (50) NOT NULL,
        description Varchar (255) NOT NULL
	,CONSTRAINT article_PK PRIMARY KEY (idArticle)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Membre_BDE
#------------------------------------------------------------

CREATE TABLE Membre_BDE(
        idMembre Int  Auto_increment  NOT NULL
	,CONSTRAINT Membre_BDE_PK PRIMARY KEY (idMembre)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: client
#------------------------------------------------------------

CREATE TABLE client(
        idClient   Int  Auto_increment  NOT NULL ,
        nom        Varchar (50) NOT NULL ,
        email      Varchar (50) NOT NULL ,
        motDepasse Varchar (50) NOT NULL ,
        centre     Varchar (50) NOT NULL ,
        photo      Varchar (50) NOT NULL ,
        idMembre   Int NOT NULL
	,CONSTRAINT client_PK PRIMARY KEY (idClient)

	,CONSTRAINT client_Membre_BDE_FK FOREIGN KEY (idMembre) REFERENCES Membre_BDE(idMembre)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: panier
#------------------------------------------------------------

CREATE TABLE panier(
        idPanier     Int  Auto_increment  NOT NULL ,
        valider      Bool NOT NULL ,
        facture      Varchar (50) NOT NULL ,
        date_facture Date NOT NULL ,
        idClient     Int NOT NULL
	,CONSTRAINT panier_PK PRIMARY KEY (idPanier)

	,CONSTRAINT panier_client_FK FOREIGN KEY (idClient) REFERENCES client(idClient)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: boiteIdee
#------------------------------------------------------------

CREATE TABLE boiteIdee(
        idBoiteIdee Int  Auto_increment  NOT NULL ,
        Lieux       Varchar (50) NOT NULL ,
        Date        Date NOT NULL ,
        Description Longtext NOT NULL ,
        idClient    Int NOT NULL
	,CONSTRAINT boiteIdee_PK PRIMARY KEY (idBoiteIdee)

	,CONSTRAINT boiteIdee_client_FK FOREIGN KEY (idClient) REFERENCES client(idClient)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: likes
#------------------------------------------------------------

CREATE TABLE likes(
        idLikes       Int  Auto_increment  NOT NULL ,
        Actif    Bool NOT NULL ,
        idClient Int NOT NULL
	,CONSTRAINT likes_PK PRIMARY KEY (idLikes)

	,CONSTRAINT likes_client_FK FOREIGN KEY (idClient) REFERENCES client(idClient)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: commentairePhoto
#------------------------------------------------------------

CREATE TABLE commentairePhoto(
        idCommentairePhoto          Int  Auto_increment  NOT NULL ,
        Description                 Longtext NOT NULL ,
        idClient                    Int NOT NULL
	,CONSTRAINT commentairePhoto_PK PRIMARY KEY (idCommentairePhoto)

	,CONSTRAINT commentairePhoto_client_FK FOREIGN KEY (idClient) REFERENCES client(idClient)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Comporter
#------------------------------------------------------------

CREATE TABLE Comporter(
        idPanier  Int NOT NULL ,
        idArticle Int NOT NULL
	,CONSTRAINT Comporter_PK PRIMARY KEY (idPanier,idArticle)

	,CONSTRAINT Comporter_panier_FK FOREIGN KEY (idPanier) REFERENCES panier(idPanier)
	,CONSTRAINT Comporter_article0_FK FOREIGN KEY (idArticle) REFERENCES article(idArticle)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Ajouter_au_panier
#------------------------------------------------------------

CREATE TABLE Ajouter_au_panier(
        idClient  Int NOT NULL ,
        idArticle Int NOT NULL
	,CONSTRAINT Ajouter_au_panier_PK PRIMARY KEY (idClient,idArticle)

	,CONSTRAINT Ajouter_au_panier_client_FK FOREIGN KEY (idClient) REFERENCES client(idClient)
	,CONSTRAINT Ajouter_au_panier_article0_FK FOREIGN KEY (idArticle) REFERENCES article(idArticle)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Ajouter_a_la_liste
#------------------------------------------------------------

CREATE TABLE Ajouter_a_la_liste(
        idArticle Int NOT NULL ,
        idMembre  Int NOT NULL
	,CONSTRAINT Ajouter_a_la_liste_PK PRIMARY KEY (idArticle,idMembre)

	,CONSTRAINT Ajouter_a_la_liste_article_FK FOREIGN KEY (idArticle) REFERENCES article(idArticle)
	,CONSTRAINT Ajouter_a_la_liste_Membre_BDE0_FK FOREIGN KEY (idMembre) REFERENCES Membre_BDE(idMembre)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: evenement
#------------------------------------------------------------

CREATE TABLE evenement(
        idEvenement Int  Auto_increment  NOT NULL ,
        Date        Date NOT NULL ,
        Lieux       Varchar (50) NOT NULL ,
        URLImage    Varchar (50) NOT NULL ,
        Description Longtext NOT NULL ,
        nbParticipant   Int NOT NULL DEFAULT 0,
        nbPlace         Int NOT NULL,
        idMembre        Int NOT NULL
	,CONSTRAINT evenement_PK PRIMARY KEY (idEvenement)

	,CONSTRAINT evenement_Membre_BDE_FK FOREIGN KEY (idMembre) REFERENCES Membre_BDE(idMembre)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: photo
#------------------------------------------------------------

CREATE TABLE photo(
        idPhoto     Int  Auto_increment  NOT NULL ,
        URLImage    Varchar (50) NOT NULL ,
        idClient    Int NOT NULL ,
        idEvenement Int NOT NULL
	,CONSTRAINT photo_PK PRIMARY KEY (idPhoto)

	,CONSTRAINT photo_client_FK FOREIGN KEY (idClient) REFERENCES client(idClient)
	,CONSTRAINT photo_evenement0_FK FOREIGN KEY (idEvenement) REFERENCES evenement(idEvenement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: commentaireEvent
#------------------------------------------------------------

CREATE TABLE commentaireEvent(
        idCommentaireEvent Int  Auto_increment  NOT NULL ,
        description        Longtext NOT NULL ,
        idClient           Int NOT NULL ,
        idEvenement        Int NOT NULL
	,CONSTRAINT commentaireEvent_PK PRIMARY KEY (idCommentaireEvent)

	,CONSTRAINT commentaireEvent_client_FK FOREIGN KEY (idClient) REFERENCES client(idClient)
	,CONSTRAINT commentaireEvent_evenement0_FK FOREIGN KEY (idEvenement) REFERENCES evenement(idEvenement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Devenir
#------------------------------------------------------------

CREATE TABLE Devenir(
        idEvenement Int NOT NULL ,
        idBoiteIdee Int NOT NULL
	,CONSTRAINT Devenir_PK PRIMARY KEY (idEvenement,idBoiteIdee)

	,CONSTRAINT Devenir_evenement_FK FOREIGN KEY (idEvenement) REFERENCES evenement(idEvenement)
	,CONSTRAINT Devenir_boiteIdee0_FK FOREIGN KEY (idBoiteIdee) REFERENCES boiteIdee(idBoiteIdee)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Participer
#------------------------------------------------------------

CREATE TABLE Participer(
        idClient    Int NOT NULL ,
        idEvenement Int NOT NULL
	,CONSTRAINT Participer_PK PRIMARY KEY (idClient,idEvenement)

	,CONSTRAINT Participer_client_FK FOREIGN KEY (idClient) REFERENCES client(idClient)
	,CONSTRAINT Participer_evenement0_FK FOREIGN KEY (idEvenement) REFERENCES evenement(idEvenement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: salarier
#------------------------------------------------------------

CREATE TABLE salarier(
        idSalarier Int  Auto_increment  NOT NULL ,
        nom        Varchar (50) NOT NULL
	,CONSTRAINT salarier_PK PRIMARY KEY (idSalarier)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Signaler
#------------------------------------------------------------

CREATE TABLE Signaler(
        idPhoto    Int NOT NULL ,
        idSalarier Int NOT NULL
	,CONSTRAINT Signaler_PK PRIMARY KEY (idPhoto,idSalarier)

	,CONSTRAINT Signaler_photo_FK FOREIGN KEY (idPhoto) REFERENCES photo(idPhoto)
	,CONSTRAINT Signaler_salarier0_FK FOREIGN KEY (idSalarier) REFERENCES salarier(idSalarier)
)ENGINE=InnoDB;


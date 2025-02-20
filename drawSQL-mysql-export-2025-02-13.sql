CREATE TABLE `Entreprise`(
    `email` VARCHAR(255) NOT NULL,
    `nom` VARCHAR(255) NOT NULL,
    `telephone` VARCHAR(255) NOT NULL,b
    `address` VARCHAR(255) NOT NULL,
    `activite` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `ville` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`email`)
);
CREATE TABLE `Categorie`(
    `id_cat` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`id_cat`)
);
CREATE TABLE `Offres`(
    `id_off` VARCHAR(255) NOT NULL,
    `titre` VARCHAR(255) NOT NULL,
    `ville` VARCHAR(255) NOT NULL,
    `description` TEXT NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `id_cat` VARCHAR(255) NOT NULL,
    `date` TIMESTAMP NOT NULL,
    PRIMARY KEY(`id_off`)
);
CREATE TABLE `Postulation`(
    `id_po` VARCHAR(255) NOT NULL,
    `id_off` VARCHAR(255) NOT NULL,
    `email_con` VARCHAR(255) NOT NULL,
    `date` TIMESTAMP NOT NULL,
    `statut` ENUM(' en cours ', ' annuler ', ' accepter ') NOT NULL,
    PRIMARY KEY(`id_po`)
);
CREATE TABLE `Condidats`(
    `email_con` VARCHAR(255) NOT NULL,
    `nom` VARCHAR(255) NOT NULL,
    `diplome` VARCHAR(255) NOT NULL,
    `url_cv` VARCHAR(255) NOT NULL,
    `telephone` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `photo` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`email_con`)
);
CREATE TABLE `User`(
    `email_user` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`email_user`)
);
ALTER TABLE
    `Postulation` ADD CONSTRAINT `postulation_id_po_foreign` FOREIGN KEY(`id_po`) REFERENCES `Offres`(`id_off`);
ALTER TABLE
    `Offres` ADD CONSTRAINT `offres_id_cat_foreign` FOREIGN KEY(`id_cat`) REFERENCES `Categorie`(`id_cat`);
ALTER TABLE
    `Offres` ADD CONSTRAINT `offres_email_foreign` FOREIGN KEY(`email`) REFERENCES `Entreprise`(`email`);
ALTER TABLE
    `Postulation` ADD CONSTRAINT `postulation_email_con_foreign` FOREIGN KEY(`email_con`) REFERENCES `Condidats`(`email_con`);
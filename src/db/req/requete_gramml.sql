-- Creator:       MySQL Workbench 6.3.9/ExportSQLite Plugin 0.1.0
-- Author:        crolin
-- Caption:       New Model
-- Project:       Name of the project
-- Changed:       2018-03-15 13:32
-- Created:       2018-02-15 11:40
PRAGMA foreign_keys = OFF;

-- Schema: GramML
ATTACH "GramML.sdb" AS "GramML";
BEGIN;
CREATE TABLE "GramML"."Sections"(
  "pk_section" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "nom_section" VARCHAR(45)
);
CREATE TABLE "GramML"."TypesExercice"(
  "pk_typeExercice" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "nom_typeExercice" VARCHAR(45)
);
CREATE TABLE "GramML"."Classes"(
  "pk_classe" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "nom_classe" VARCHAR(45),
  "fk_section" INTEGER,
  "nombre_eleves" INTEGER,
  "code_classe" VARCHAR(45),
  "description_classe" VARCHAR(45),
  CONSTRAINT "fk_section"
    FOREIGN KEY("fk_section")
    REFERENCES "Sections"("pk_section")
);
CREATE INDEX "GramML"."Classes.fk_section_idx" ON "Classes" ("fk_section");
CREATE TABLE "GramML"."Niveaux"(
  "pk_niveaux" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "nom_niveau" VARCHAR(45)
);
CREATE TABLE "GramML"."Matieres"(
  "pk_matiere" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "nom_matiere" VARCHAR(45),
  "code_matiere" VARCHAR(45)
);
CREATE TABLE "GramML"."Fonctions"(
  "pk_fonction" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "nom_fonction" VARCHAR(45),
  "code_fonction" VARCHAR(45)
);
CREATE TABLE "GramML"."Lecons"(
  "pk_lecon" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "nom_lecon" VARCHAR(45),
  "lecon" VARCHAR(45)
);
CREATE TABLE "GramML"."Utilisateurs"(
  "pk_utilisateurs" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "id_utilisateur" INTEGER,
  "mdp_utilisateur" VARCHAR(45),
  "mail_utilisateur" VARCHAR(45),
  "nom_utilisateur" VARCHAR(45),
  "prenom_utilisateur" VARCHAR(45),
  "fk_fonction" INTEGER,
  CONSTRAINT "fk_fonction"
    FOREIGN KEY("fk_fonction")
    REFERENCES "Fonctions"("pk_fonction")
);
CREATE INDEX "GramML"."Utilisateurs.fk_fonction_idx" ON "Utilisateurs" ("fk_fonction");
CREATE TABLE "GramML"."MatieresUtilisateur"(
  "pk_matiereUtilisateur" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "fk_utilisateur" INTEGER,
  "fk_matiere" INTEGER,
  CONSTRAINT "fk_utilisateur"
    FOREIGN KEY("fk_utilisateur")
    REFERENCES "Utilisateurs"("pk_utilisateurs"),
  CONSTRAINT "fk_matiere"
    FOREIGN KEY("fk_matiere")
    REFERENCES "Matieres"("pk_matiere")
);
CREATE INDEX "GramML"."MatieresUtilisateur.fk_utilisateur_idx" ON "MatieresUtilisateur" ("fk_utilisateur");
CREATE INDEX "GramML"."MatieresUtilisateur.fk_matiere_idx" ON "MatieresUtilisateur" ("fk_matiere");
CREATE TABLE "GramML"."Professeurs"(
  "pk_professeur" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "fk_utilisateur" INTEGER,
  CONSTRAINT "fk_utilisateur"
    FOREIGN KEY("fk_utilisateur")
    REFERENCES "Utilisateurs"("pk_utilisateurs")
);
CREATE INDEX "GramML"."Professeurs.fk_utilisateur_idx" ON "Professeurs" ("fk_utilisateur");
CREATE TABLE "GramML"."Exercices"(
  "pk_exercice" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "nom_exercice" VARCHAR(45),
  "fk_niveau" INTEGER,
  "fk_classe" INTEGER,
  "enonce" VARCHAR(45),
  "fk_section" INTEGER,
  "fk_typeExercice" INTEGER,
  "fk_professeur" INTEGER,
  "phrase" LONGTEXT,
  CONSTRAINT "fk_niveau"
    FOREIGN KEY("fk_niveau")
    REFERENCES "Niveaux"("pk_niveaux"),
  CONSTRAINT "fk_classe"
    FOREIGN KEY("fk_classe")
    REFERENCES "Classes"("pk_classe"),
  CONSTRAINT "fk_section"
    FOREIGN KEY("fk_section")
    REFERENCES "Sections"("pk_section"),
  CONSTRAINT "fk_typeExercice"
    FOREIGN KEY("fk_typeExercice")
    REFERENCES "TypesExercice"("pk_typeExercice"),
  CONSTRAINT "fk_professeur"
    FOREIGN KEY("fk_professeur")
    REFERENCES "Professeurs"("pk_professeur")
);
CREATE INDEX "GramML"."Exercices.fk_niveau_idx" ON "Exercices" ("fk_niveau");
CREATE INDEX "GramML"."Exercices.fk_classe_idx" ON "Exercices" ("fk_classe");
CREATE INDEX "GramML"."Exercices.fk_section_idx" ON "Exercices" ("fk_section");
CREATE INDEX "GramML"."Exercices.fk_typeExercice_idx" ON "Exercices" ("fk_typeExercice");
CREATE INDEX "GramML"."Exercices.fk_professeur_idx" ON "Exercices" ("fk_professeur");
CREATE TABLE "GramML"."Eleves"(
  "pk_eleve" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "fk_utilisateur" INTEGER,
  "fk_classe" INTEGER,
  CONSTRAINT "fk_utilisateur"
    FOREIGN KEY("fk_utilisateur")
    REFERENCES "Utilisateurs"("pk_utilisateurs"),
  CONSTRAINT "fk_classe"
    FOREIGN KEY("fk_classe")
    REFERENCES "Classes"("pk_classe")
);
CREATE INDEX "GramML"."Eleves.fk_utilisateur_idx" ON "Eleves" ("fk_utilisateur");
CREATE INDEX "GramML"."Eleves.fk_classe_idx" ON "Eleves" ("fk_classe");
CREATE TABLE "GramML"."Corrections"(
  "pk_correction" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "correction" VARCHAR(45),
  "fk_exercice" INTEGER,
  CONSTRAINT "fk_exercice"
    FOREIGN KEY("fk_exercice")
    REFERENCES "Exercices"("pk_exercice")
);
CREATE INDEX "GramML"."Corrections.fk_exercice_idx" ON "Corrections" ("fk_exercice");
CREATE TABLE "GramML"."LeconsExercice"(
  "pk_leconExercice" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "fk_lecon" INTEGER,
  "fk_exercice" INTEGER,
  CONSTRAINT "fk_lecon"
    FOREIGN KEY("fk_lecon")
    REFERENCES "Lecons"("pk_lecon"),
  CONSTRAINT "fk_exercice"
    FOREIGN KEY("fk_exercice")
    REFERENCES "Exercices"("pk_exercice")
);
CREATE INDEX "GramML"."LeconsExercice.fk_lecon_idx" ON "LeconsExercice" ("fk_lecon");
CREATE INDEX "GramML"."LeconsExercice.fk_exercice_idx" ON "LeconsExercice" ("fk_exercice");
CREATE TABLE "GramML"."ClassesProfesseurs"(
  "pk_classeProfesseur" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "fk_professeur" INTEGER,
  "fk_classe" INTEGER,
  CONSTRAINT "fk_professeur"
    FOREIGN KEY("fk_professeur")
    REFERENCES "Professeurs"("pk_professeur"),
  CONSTRAINT "fk_classe"
    FOREIGN KEY("fk_classe")
    REFERENCES "Classes"("pk_classe")
);
CREATE INDEX "GramML"."ClassesProfesseurs.fk_professeur_idx" ON "ClassesProfesseurs" ("fk_professeur");
CREATE INDEX "GramML"."ClassesProfesseurs.fk_classe_idx" ON "ClassesProfesseurs" ("fk_classe");
CREATE TABLE "GramML"."ReponsesEnCours"(
  "pk_reponseEnCours" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "fk_eleve" INTEGER,
  "fk_exercice" INTEGER,
  "reponseEnCours" VARCHAR(45),
  CONSTRAINT "fk_eleve"
    FOREIGN KEY("fk_eleve")
    REFERENCES "Eleves"("pk_eleve"),
  CONSTRAINT "fk_exercice"
    FOREIGN KEY("fk_exercice")
    REFERENCES "Exercices"("pk_exercice")
);
CREATE INDEX "GramML"."ReponsesEnCours.fk_eleve_idx" ON "ReponsesEnCours" ("fk_eleve");
CREATE INDEX "GramML"."ReponsesEnCours.fk_exercice_idx" ON "ReponsesEnCours" ("fk_exercice");
CREATE TABLE "GramML"."Reponses"(
  "pk_reponse" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "fk_eleve" INTEGER,
  "fk_exercice" INTEGER,
  "reponse" VARCHAR(45),
  "note" FLOAT,
  CONSTRAINT "fk_eleve"
    FOREIGN KEY("fk_eleve")
    REFERENCES "Eleves"("pk_eleve"),
  CONSTRAINT "fk_exercice"
    FOREIGN KEY("fk_exercice")
    REFERENCES "Exercices"("pk_exercice")
);
CREATE INDEX "GramML"."Reponses.fk_eleve_idx" ON "Reponses" ("fk_eleve");
CREATE INDEX "GramML"."Reponses.fk_exercice_idx" ON "Reponses" ("fk_exercice");
COMMIT;

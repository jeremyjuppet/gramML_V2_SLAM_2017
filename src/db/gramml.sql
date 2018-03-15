
CREATE TABLE "Sections"(
  "pk_section" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "nom_section" VARCHAR(45)
);
CREATE TABLE "TypesExercice"(
  "pk_typeExercice" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "nom_typeExercice" VARCHAR(45)
);
CREATE TABLE "Corrections"(
  "pk_correction" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "correction" VARCHAR(45)
);
CREATE TABLE "Classes"(
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
CREATE INDEX "Classes.fk_section_idx" ON "Classes" ("fk_section");
CREATE TABLE "Niveaux"(
  "pk_niveaux" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "nom_niveau" VARCHAR(45)
);
CREATE TABLE "Matieres"(
  "pk_matiere" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "nom_matiere" VARCHAR(45),
  "code_matiere" VARCHAR(45)
);
CREATE TABLE "Fonctions"(
  "pk_fonction" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "nom_fonction" VARCHAR(45),
  "code_fonction" VARCHAR(45)
);
CREATE TABLE "Lecons"(
  "pk_lecon" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "nom_lecon" VARCHAR(45),
  "lecon" VARCHAR(45)
);
CREATE TABLE "Utilisateurs"(
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
CREATE INDEX "Utilisateurs.fk_fonction_idx" ON "Utilisateurs" ("fk_fonction");
CREATE TABLE "MatieresUtilisateur"(
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
CREATE INDEX "MatieresUtilisateur.fk_utilisateur_idx" ON "MatieresUtilisateur" ("fk_utilisateur");
CREATE INDEX "MatieresUtilisateur.fk_matiere_idx" ON "MatieresUtilisateur" ("fk_matiere");
CREATE TABLE "Professeurs"(
  "pk_professeur" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "fk_utilisateur" INTEGER,
  CONSTRAINT "fk_utilisateur"
    FOREIGN KEY("fk_utilisateur")
    REFERENCES "Utilisateurs"("pk_utilisateurs")
);
CREATE INDEX "Professeurs.fk_utilisateur_idx" ON "Professeurs" ("fk_utilisateur");
CREATE TABLE "Exercices"(
  "pk_exercice" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "nom_exercice" VARCHAR(45),
  "fk_niveau" INTEGER,
  "fk_classe" INTEGER,
  "enonce" VARCHAR(700),
  "phrase" VARCHAR(500),
  "fk_section" INTEGER,
  "fk_typeExercice" INTEGER,
  "fk_professeur" INTEGER,
  "fk_correction" INTEGER NOT NULL,
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
    REFERENCES "Professeurs"("pk_professeur"),
  CONSTRAINT "fk_Exercices_Corrections1"
    FOREIGN KEY("fk_correction")
    REFERENCES "Corrections"("pk_correction")
);
CREATE INDEX "Exercices.fk_niveau_idx" ON "Exercices" ("fk_niveau");
CREATE INDEX "Exercices.fk_classe_idx" ON "Exercices" ("fk_classe");
CREATE INDEX "Exercices.fk_section_idx" ON "Exercices" ("fk_section");
CREATE INDEX "Exercices.fk_typeExercice_idx" ON "Exercices" ("fk_typeExercice");
CREATE INDEX "Exercices.fk_professeur_idx" ON "Exercices" ("fk_professeur");
CREATE TABLE "Eleves"(
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
CREATE INDEX "Eleves.fk_utilisateur_idx" ON "Eleves" ("fk_utilisateur");
CREATE INDEX "Eleves.fk_classe_idx" ON "Eleves" ("fk_classe");
CREATE TABLE "CorrectionExercice"(
  "pk_correctionExercice" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "fk_exercice" INTEGER,
  "fk_correction" INTEGER,
  CONSTRAINT "fk_exercice"
    FOREIGN KEY("fk_exercice")
    REFERENCES "Exercices"("pk_exercice"),
  CONSTRAINT "fk_correction"
    FOREIGN KEY("fk_correction")
    REFERENCES "Corrections"("pk_correction")
);
CREATE INDEX "CorrectionExercice.fk_correction_idx" ON "CorrectionExercice" ("fk_correction");
CREATE INDEX "CorrectionExercice.fk_exercice_idx" ON "CorrectionExercice" ("fk_exercice");
CREATE TABLE "LeconsExercice"(
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
CREATE INDEX "LeconsExercice.fk_lecon_idx" ON "LeconsExercice" ("fk_lecon");
CREATE INDEX "LeconsExercice.fk_exercice_idx" ON "LeconsExercice" ("fk_exercice");
CREATE TABLE "ClassesProfesseurs"(
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
CREATE INDEX "ClassesProfesseurs.fk_professeur_idx" ON "ClassesProfesseurs" ("fk_professeur");
CREATE INDEX "ClassesProfesseurs.fk_classe_idx" ON "ClassesProfesseurs" ("fk_classe");
CREATE TABLE "ReponsesEnCours"(
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
CREATE INDEX "ReponsesEnCours.fk_eleve_idx" ON "ReponsesEnCours" ("fk_eleve");
CREATE INDEX "ReponsesEnCours.fk_exercice_idx" ON "ReponsesEnCours" ("fk_exercice");
CREATE TABLE "Reponses"(
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
CREATE INDEX "Reponses.fk_eleve_idx" ON "Reponses" ("fk_eleve");
CREATE INDEX "Reponses.fk_exercice_idx" ON "Reponses" ("fk_exercice");


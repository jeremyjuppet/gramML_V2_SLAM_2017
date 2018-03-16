SELECT 
	Exercices.pk_exercice, Corrections.fk_exercice, Corrections.correction
FROM
	Corrections, Exercices
WHERE 
	pk_exercice = fk_exercice;
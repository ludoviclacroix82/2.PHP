-- Affiche toutes les données.
SELECT * FROM students JOIN school ON students.school = school.idschool;
-- Affiche uniquement les prénoms.
SELECT prenom FROM students WHERE 1;
-- Affiche les prénoms, les dates de naissance et l’école de chacun.
SELECT prenom,datenaissance,school.school FROM students JOIN school ON students.school = school.idschool;
-- Affiche uniquement les élèves qui sont de sexe féminin.
SELECT nom,prenom FROM students WHERE genre = 'F';
-- Affiche uniquement les élèves qui font partie de l’école d'Addy.
SELECT nom,prenom FROM students 
JOIN school
ON students.school = school.idschool 
WHERE school.idschool = ( 
    SELECT school FROM students WHERE nom = 'Addy'
);
--Affiche uniquement les prénoms des étudiants, par ordre inverse à l’alphabet (DESC). 
SELECT prenom FROM students ORDER BY prenom DESC;
--Ensuite, la même chose mais en limitant les résultats à 2
SELECT prenom FROM students ORDER BY prenom DESC LIMIT 2;
--
--Ajoute Ginette Dalor, née le 01/01/1930 et affecte-la à Bruxelles, toujours en SQL.
INSERT INTO `students`( `nom`, `prenom`, `datenaissance`, `genre`, `school`) VALUES ('Dalor','Ginette','1930-01-01 ','F','1');
--Modifie Ginette (toujours en SQL) et change son sexe et son prénom en “Omer”.
UPDATE `students` SET`prenom`='Omer',`genre`='M' WHERE `prenom`='Ginette';
--Supprimer la personne dont l’ID est 3.
DELETE FROM `students` WHERE `idStudent` = 3;
--Modifier le contenu de la colonne School de sorte que "1" soit remplacé par "Liege" et "2" soit remplacé par "Gent". (attention au type de la colonne !)
ALTER TABLE students MODIFY school VARCHAR(80);
UPDATE students SET school = 'Liège' WHERE school = '1';
UPDATE students SET school = 'Gent' WHERE school = '2';


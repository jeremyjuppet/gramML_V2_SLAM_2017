<?php
$db = new SQLite3('mysqlitedb.db');
$requeteCreeTable =
'CREATE TABLE test (id INTEGER PRIMARY KEY,
 texte STRING
)';
$db->exec($requeteCreeTable);
$requeteInsert =
"INSERT INTO test (texte) VALUES ('This is a test')";
$db->exec($requeteInsert);
$result = $db->query('SELECT texte FROM test');
var_dump($result->fetchArray());
?>
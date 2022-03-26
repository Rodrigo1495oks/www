<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting up Database</title>
</head>
<body>
    <h3>Configurando...</h3>
<?php

require_once 'functions.php';

createTable('members',
            'user VARCHAR(16),
            pass VARCHAR(16),
            INDEX(user(6)) 
            ');
createTable('profiles',
            'user VARCHAR(16),
            text VARCHAR(4096),
            INDEX(user(6))
            ');
createTable('organism',
            'id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,
            name VARCHAR(16),
            description VARCHAR(255)
');
createTable('position',
            'id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,
            name VARCHAR(16),
            description VARCHAR(255)
            ');

createTable('typesAssembly',
            'id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,
            name VARCHAR(16),
            description VARCHAR(255)
            ');
createTable('departments',
            'id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,
            name VARCHAR(16),
            description VARCHAR(255)
            ');
createTable('itemsAssembly234',
            'id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,
            name VARCHAR(16),
            description VARCHAR(255)
            ');

createTable('itemsAssembly235',
            'id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,
            name VARCHAR(16),
            description VARCHAR(255)
            ');
createTable('cat',
            'id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,
            name VARCHAR(16),
            description VARCHAR(255)
            ');
createTable('city',
            'CP INT(4),
            name VARCHAR(16)
            ');
createTable('shareholders',
            'id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,
            name VARCHAR(16),
            surname VARCHAR(16),
            degree VARCHAR(16),
            typeShare VARCHAR(30),
            email VARCHAR(100),
            phone INT(16) UNSIGNED,
            country VARCHAR(16),
            state VARCHAR(16),
            city VARCHAR(16),
            specie VARCHAR(16),
            gender VARCHAR(16)
            ');

createTable('meetings',
            'id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,
            organism VARCHAR(16) PRIMARY KEY,
            department VARCHAR(16),
            hour TIME,
            fecha DATE,
            place VARCHAR(16),
            expenses INT(10) UNSIGNED,
            reason VARCHAR(100)
            ');
createTable('ASSEMBLY',
            'id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,
            hour TIME,
            fecha DATE,
            place VARCHAR(16),
            expenses INT(10) UNSIGNED,
            reason VARCHAR(16)
            ');
?>


<br><div class="done">Listo</div>

</body>
</html>
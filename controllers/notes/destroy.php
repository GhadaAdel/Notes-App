<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$currentUserId = 5;

$note = $db->query('select * from notes where id = :id', ['id' => $_POST['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);

header('location: /Demo/notes');
exit();

?>
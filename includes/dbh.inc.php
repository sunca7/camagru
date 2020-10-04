<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "sa8776";
$dBName = "loginsystem";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}


# PDO
//Set DSN
$dsn = 'mysql:host='. $servername .';dbname='. $dBName;

//Create a PDO instatnce
$pdo = new PDO($dsn, $dBUsername, $dBPassword);

# PDO QUERY

$stmt = $pdo->query('SELECT * FROM posts');

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $row['title']. '<br>';
} 

#Prepared statements (prepare & execute)


//Unsafe
// $sql = "SELECT * FROM posts WHERE author = '$$author'";

//Fetch multiple posts



$pdo-setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

//Positional Params
// ? is positional
$sql = 'SELECT * FROM posts WHERE author = ? && is_published = ? LIMIT ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$mailuid, $is_published, $limit]);
$posts = $stmt->fetchAll();

foreach($posts as $post){
    echo $post->title. '<br>';
}

// Named Params
$sql = 'SELECT * FROM posts WHERE author = :author && is_published = :is_published';
$stmt = $pdo->prepare($sql);
$stmt->execute(['author' => $author, 'is_published' => $is_published]);
$posts = $stmt->fetchAll();


//FETCH Single POST
$sql = 'SELECT * FROM posts WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$posts = $stmt->fetch(); 


//GET row COUNT
$stmt = $pdo->prepare('SELECT * FROM POSTS where author = ?');
$stmt->execute([$author]);
$postCount = $stmt->rowCount();


//INsert DATA
$title = 'Post Five';
$body = 'This is post five';
$author = 'Kevin';

$sql = 'INSERT INTO posts(title, body, author) VALUES(:title, :body, :author)';
$stmt= $pdo->prepare($sql);
$stmt->execute(['title' => $title, 'body' => $body, 'author' => $author]);
echo 'Post Added';


//Update DATA
$id = 1;
$body = 'This is the updated post';

$sql = 'UPDATE posts SET body = :body WHERE id = :id';
$stmt= $pdo->prepare($sql);
$stmt->execute(['body' => $body, 'id' => $id]);
echo 'Post UPdated';

//DELETE DATA
$id = 3;

$sql = 'DELETE FROM posts WHERE id = :id';
$stmt= $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
echo 'Post DELETeD ';

//SEARCH DATA 
$search = "%f%";
$sql = 'SELECT * FROM posts WHERE title LIKE ?';
$stmt = $pdo->prepare($sql);
$stmt-> execute([$search]);
$posts = $stmt->fetchAll();

foreach ($posts as $post) {
    echo $post->title. '<br>';
}



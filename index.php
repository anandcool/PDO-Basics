<?php
$host = 'localhost';
$user = 'root';
$password='';
$dbname = 'pdoposts';

//Set DSN
$dsn = 'mysql:host='.$host.';dbname='.$dbname;


//Create a PDO Instance
$pdo = new PDO($dsn,$user,$password);


//PDO Query

$stmt = $pdo->query('SELECT * FROM posts');

// while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
//     echo $row['title'].'<br>';
// }

// while($row = $stmt->fetch(PDO::FETCH_OBJ)){
//     echo $row->title.'<br>';
// }

//Fetch Mulitple Posts

//Positional Params
// $author = 'steve'; // User Input
// $sql = "SELECT * FROM posts where author = ?";
// $stmt = $pdo->prepare($sql);
// $stmt->execute([$author]);
// $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// var_dump($posts);
// foreach($posts as $post){
//     echo $post['title'].'<br>';
// }

//Named Params
// $author = 'steve'; //User Input
// $is_published = true;// User Input
// $sql = "SELECT * FROM posts where author = :author and is_published = :published";
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['author'=>'Anand Stephan','published'=>false ]);
// $posts = $stmt->fetchAll(PDO::FETCH_OBJ);

// foreach($posts as $post){
//     echo $post->title.'<br>';
// }


//Fetch Single Post
// $id = 1; //User Input
// $sql = "SELECT * FROM posts where id=:id";
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['id'=>$id]);
// $post = $stmt->fetch(PDO::FETCH_OBJ);

// echo $post->title.'<br>';

//Get Row Count
// $stmt = $pdo->prepare('SELECT * FROM posts WHERE author = ?');
// $stmt->execute(['steve']);
// $post_count = $stmt->rowCount();
// echo $post_count;


//Insert Data
// $title= 'Post Four';
// $body='This is Post Four';
// $author = 'kevin';

// $sql = "INSERT INTO posts(title,body,author) VALUES (:title,:body,:author)";
// $stmt=$pdo->prepare($sql);
// $stmt->execute(['title'=>$title,'body'=>$body,'author'=>$author]);
// echo 'Post Added';

//Post Update
// $id=3;
// $body='This is updated posts';

// $sql = "UPDATE posts SET body=:body where id=:id";
// $stmt=$pdo->prepare($sql);
// $stmt->execute(['id'=>$id,'body'=>$body]);
// echo 'Post Updated';

//Post Delete
// $id= 2;

// $sql = "DELETE FROM posts where id=:id";
// $stmt=$pdo->prepare($sql);
// $stmt->execute(['id'=>$id]);
// echo 'Post Delete';

//Search Data
$search = '%post%';
$sql = 'SELECT * FROM posts WHERE title LIKE ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$search]);
$posts = $stmt->fetchAll(PDO::FETCH_OBJ);

foreach($posts as $post){
    echo $post->body.'<br>';
}
?>
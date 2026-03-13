<?php 
if($_SERVER["REQUEST_METHOD" ] == 'POST' ){
    $minPrice = $_POST['minPrice'] ;



    try {
        require_once ('db.php') ; 

        $query = "SELECT * FROM library_books WHERE price > ? ; " ;

        $stmt =  $pdo->prepare($query) ;

        

        $stmt->execute([$minPrice]);

        $books = $stmt->fetchAll(PDO::FETCH_ASSOC) ;
        
        
    }catch(PDOException $e) {
        die( "Connection failed  ". $e->getMessage()) ;
 }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

</head>
<body>
    <form method="POST">
        <label for="minPrice">Minimum Price : </label>
        <input type="number" name="minPrice" id="minPrice" required>
        <button type="submit"> Fetch Books </button>
    </form>

    <?php 
    if($_SERVER["REQUEST_METHOD"] == 'POST' && !empty($books)) {
        echo "<h2>Books with price > $" . htmlspecialchars($minPrice) . "</h2>";
        echo "<ul>";
        foreach($books as $book) {
            echo "<li>" . htmlspecialchars($book['title']) . "</li>";
        }
        echo "</ul>";
    }
    ?>
</body>
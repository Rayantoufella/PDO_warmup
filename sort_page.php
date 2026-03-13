<?php
try{
    require_once ('db.php') ;
    
    $query = "SELECT * FROM categories ; " ;


    $stmt =  $pdo->prepare($query) ;

    $stmt->execute() ;  
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC) ;


    $pdo = null ;
    $stmt = null ;

}catch(PDOException $e){
    die( "Query failed  ". $e->getMessage()) ;
}
?>

<DOCTYPE html>
<html>
    <head>  

        <title>Sort Page</title>
    </head>
    <body>
        <h1>Categries Result</h1>
        <select>
            <?php
        if(empty($result)){
            echo "<div>";
            echo "<p>Category table is empty</p>" ;
            echo "</div>";
        }else{
            foreach($result as $row){
                echo "<option value=\"" . $row["id"] . "\">" . $row["name"] . "</option>";
            }
        }
        
        ?>      
        </select>
        

    </body>
</html>
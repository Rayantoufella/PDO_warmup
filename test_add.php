<?php 

$title = "TestBook " ;
$author ="person 1" ;
$price = 160.00 ;


try{
    require_once ('db.php') ; 

    $query = "INSERT INTO library_books ( title , author , price ) VALUE ( :title, :author,:price) ; " ;


   

    

    $stmt =  $pdo->prepare($query) ;

    $stmt ->bindParam(":title" ,  $title ) ; 
    $stmt ->bindParam(":author", $author ) ;
    $stmt ->bindParam(":price", $price ) ;

    $stmt->execute() ;

    echo "Success! Book added with ID " . $pdo->lastInsertId() ;
    

    $pdo = null ; 
    $stmt = null ; 

    die() ;

}catch(PDOException $e){
    die( "Querry failed  ". $e->getMessage()) ;
}
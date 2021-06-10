<?php
//gets the db instance
include 'utils/db.php';
//these classes will be used to create objects to store data for catagories
include 'utils/categoryClass.php';
include 'utils/generalCategory.php';


try {
    //this query will get the most expansive item, cheapest, and count of items in each category as well as a random example of each one.
    $query="SELECT c.id as id, c.name as name, 
    c.picture as picture, min(i.price) as cheapest, max(i.price) as expansive, 
    COUNT(i.name) as selection, 
    (SELECT name from items g 
    where g.categoryId=i.categoryId order by rand() 
    limit 1) as example                                         
    from category c left join items i 
    on c.id=i.categoryId 
    GROUP by categoryId 
    order by categoryId desc";
    //the db instance
    $statement = Db::getDb()->prepare($query);
    $statement->execute();
    $categoriesArray= $statement->fetchAll();
    // adn object that will be get data from the other objects and act like a real category object.
    $general=new generalCategory();
    $categories=[];
    //from the query all categories are made into objects and added to an array in the meanwhile thier data is added to the general object
    foreach ($categoriesArray as $categoryArray) {
        $category=new Category($categoryArray);
        $general->addCategory($category);
        
        $categories[]=$category;
    }
    // all data is calculated now a new catagory object is created and added to the catagory array.
    $general->finishObject();
    $categories[]=$general;
    
    $statement->closeCursor();

} catch (PDOException $e) {
    //if query fails a message will be displayed.
    $error = "Something went wrong " . $e->getMessage();
}
?>
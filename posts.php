<?php 
include("./backend/libraries/DBconn.php");
$database = new Database();
$connection = $database->getConnection();


$query = "SELECT jobs.title, jobs.created, jobs.description, types.name AS type 
          FROM jobs
          JOIN types ON jobs.type_id = types.id";

$statement = $connection->prepare($query);
$statement->execute();

$results = $statement->fetchAll(PDO::FETCH_ASSOC);


?>



    <!-- posts section -->
    <section class="job-posts">
    <h2 class="main-title">Latest Job Listings</h2>
    <?php foreach ($results as $row): ?>
            
                <span class="top-div">
                    <h3 class="job-title"><?php echo $row['title'] ?></h3>
                    <p class="job-type"><?php echo $row['type'] ?></p>

                </span>
                <span class="job-date"><?php echo $row['created'] ?></span>

                <p class="job-description">
                <?php echo $row['description'] ?>
                </p>

                <a href="#" class="btn-apply">Apply &rarr;</a>
    <?php endforeach; ?>
    </section> 
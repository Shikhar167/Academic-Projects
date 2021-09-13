<?php
    include('include/config.php');
    $title = $_GET['modal'];
    ?>
    <div class="table-wrap col-lg-12">
        <table class="schdule-table table table-bordered">
            <thead class="thead-light">
                <tr>
                <th class="head" scope="col">Title</th>
                <th class="head" scope="col">Domain</th>
                <th class="head" scope="col">Description</th>
                <th class="head" scope="col">status</th>
                </tr>
            </thead><br><br><br><br><br>
            <tbody>
                <?php
                    {
                        $qry2 = mysqli_query($con,"SELECT * FROM project where title='$title' ");
                        $qry1 = mysqli_fetch_array($qry2);
                    ?>
                    <tr>
                    <td><?php echo $qry1['title'];  ?></td>
                    <td><?php echo $qry1['domain'];  ?></td>
                    <td><?php echo $qry1['description'];  ?></td>
                    <td><?php echo $qry1['status'];  ?></td>
                    <?php
                    }
                    ?>
            </tbody>
        </table>
    </div>
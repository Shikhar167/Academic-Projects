<?php
    include('../include/config.php');
    $team_name = $_GET['team_name']
    ?>
    <div class="table-wrap col-lg-12">
    <table class="schdule-table table table-bordered">
        <thead class="thead-light">
            <tr>
            <th class="head" scope="col">type</th>
            <th class="head" scope="col">Registration no</th>
            <th class="head" scope="col">Name</th>
            <th class="head" scope="col">phone no</th>
            <th class="head" scope="col">Email</th>
            <th class="head" scope="col">college name</th>
            <th class="head" scope="col">team name</th>
            <th class="head" scope="col">stud uid</th>
            </tr>
        </thead><br><br><br><br><br>
        <tbody>
            <?php
                    $qry = mysqli_query($con,"SELECT * FROM student where team_name = '$team_name' ");
                    while($qry1 = mysqli_fetch_array($qry))
                    {
                ?>
                <tr>
                <td><?php echo $qry1['type'];  ?></td>
                <td><?php echo $qry1['reg_no'];  ?></td>
                <td><?php echo $qry1['name'];  ?></td>
                <td><?php echo $qry1['phone_no'];  ?></td>
                <td><?php echo $qry1['email'];  ?></td>
                <td><?php echo $qry1['college_name'];  ?></td>
                <td><?php echo $qry1['team_name'];  ?></td>
                <td><?php echo $qry1['std_uid'];  ?></td>
                </tr>
                <?php
                    }
                ?>
        </tbody>
    </table>
</div>

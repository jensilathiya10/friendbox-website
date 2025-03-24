<script src="actions.js"></script>
<form action="viewprofile.php" method="get">

            <ul class="nearby-contct">
                <?php
                session_start();
                require("config.php");
                if(isset($_GET["viewprofile"])){
                    $user = $_GET['viewprofile'];
                }else{
                $user = $_SESSION['username'];
                }
                $sql = "select * from followings INNER JOIN users where followings.username='$user' and users.username = followings.following";
                $followings = $conn->query($sql);
                $totalfollowing = mysqli_num_rows($followings); 
           
    foreach($followings as $row){
        ?>
                <li>
                    <div class="nearly-pepls">
                        <figure>
                            <!-- <input type="hidden" name="viewprofile"
                                value="<?php echo $row['username'] ?>"> -->
                            <button type="submit" name="viewprofile"
                                value="<?php echo $row['username'] ?>"
                                class="profilebtn"><img style="height:9vh;"
                                    src="./userdata/profileimg/<?php echo $row['profile']; ?>"
                                    alt=""></button>
                        </figure>
                        <div class="pepl-info">
                            <button type="submit" name="viewprofile"
                                value="<?php echo $row['username'] ?>"
                                class="profilebtn">
                                <h5><?php echo $row['name'] ?></h5>
                            </button>
                            <span><?php echo $row['username'] ?></span>

                            <button type="button" name="unfriend"
                                class="unfriend"
                                value="<?php echo $row['username'] ?>">unfriend</button>
                        </div>
                    </div>
                </li>
                <?php
    }
    ?>
    </ul>
</form>

<div class="lodmore"><button class="btn-view btn-load-more"></button></div>
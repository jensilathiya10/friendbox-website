    
<form action="viewprofile.php" method="get">
<?php
session_start();
require("config.php");
$user = $_SESSION['username'];
$sql = "select pid,uid,photos.username,users.name,source,caption,datetime,users.profile from photos JOIN users where photos.username IN (select following from followings where followings.username ='$user') and photos.username = users.username ORDER BY pid desc";
$feed = $conn->query($sql);
$sql = "select * from likes where username = '$user'";
$likedpost = $conn->query($sql);
foreach($feed as $row){
?>

<div class="central-meta item">
    <div class="user-post">
        <div class="friend-info">
            <figure>
                <img src="./userdata/profileimg/<?php echo $row['profile']?>" alt="">
            </figure>
            <div class="friend-name">
                <ins><button type="submit" name="viewprofile" value="<?php echo $row['username']; ?>"><?php echo $row['username']; ?></button></ins>
                <span>published: june,2 2018 19:PM</span>
            </div>
            <div class="post-meta">
                <img src="userdata/posts/<?php echo $row['source']; ?>" alt="">
                <div class="we-video-info">
                    <ul>
                        
                        <li>
                            <span class="comment" data-toggle="tooltip"
                                title="Comments">
                                <i class="fa fa-comments-o"></i>
                                <ins>52</ins>
                            </span>
                        </li>
                        <li>
                            <span class="like" data-toggle="tooltip"
                                title="like">
                                
                                <?php 
                                $pid = $row['pid'];
                                $sql = "select * from likes where likedby = '$user' and pid = '$pid'";
                                $likedpost = $conn->query($sql);
                                $isliked = mysqli_num_rows($likedpost);

                                $sql = "select * from likes where pid = '$pid'";
                                $result = $conn->query($sql);
                                $totalliked = mysqli_num_rows($result);
                                if($isliked>0){
                                ?>
                                <i class="fa fa-heart"></i>
                                <input type="hidden" value="<?php echo $row['pid'] ?>">
                                <?php 
                                }else{
                                ?>
                                <i class="fa fa-heart-o"></i>
                                <input type="hidden" value="<?php echo $row['pid'] ?>">
                                <?php  
                                }
                                ?>
                                <ins><?php echo $totalliked ?></ins>
                            </span>
                        </li>
                        <!-- <li>
                            <span class="dislike" data-toggle="tooltip"
                                title="dislike">
                                <i class="ti-solid ti-heart-broken"></i>
                                <ins>200</ins>
                            </span>
                        </li> -->

                    </ul>
                </div>
                <div class="description">

                    <p>
                        <?php echo $row['caption']; ?>
                    </p>
                </div>
            </div>
        </div>
        <!-- <div class="coment-area">
            <ul class="we-comet">
                <li>
                    <div class="comet-avatar">
                        <img src="images/resources/comet-1.jpg" alt="">
                    </div>
                    <div class="we-comment">
                        <div class="coment-head">
                            <h5><a href="time-line.html" title="">Jason
                                    borne</a></h5>
                            <span>1 year ago</span>
                            <a class="we-reply" href="#" title="Reply"><i
                                    class="fa fa-reply"></i></a>
                        </div>
                        <p>we are working for the dance and sing songs. this car
                            is very awesome for the youngster. please vote this
                            car and like our post</p>
                    </div>
                    <ul>
                        <li>
                            <div class="comet-avatar">
                                <img src="images/resources/comet-2.jpg" alt="">
                            </div>
                            <div class="we-comment">
                                <div class="coment-head">
                                    <h5><a href="time-line.html"
                                            title="">alexendra dadrio</a></h5>
                                    <span>1 month ago</span>
                                    <a class="we-reply" href="#"
                                        title="Reply"><i
                                            class="fa fa-reply"></i></a>
                                </div>
                                <p>yes, really very awesome car i see the
                                    features of this car in the official website
                                    of <a href="#" title="">#Mercedes-Benz</a>
                                    and really impressed :-)</p>
                            </div>
                        </li>
                        <li>
                            <div class="comet-avatar">
                                <img src="images/resources/comet-3.jpg" alt="">
                            </div>
                            <div class="we-comment">
                                <div class="coment-head">
                                    <h5><a href="time-line.html"
                                            title="">Olivia</a></h5>
                                    <span>16 days ago</span>
                                    <a class="we-reply" href="#"
                                        title="Reply"><i
                                            class="fa fa-reply"></i></a>
                                </div>
                                <p>i like lexus cars, lexus cars are most
                                    beautiful with the awesome features, but
                                    this car is really outstanding than lexus
                                </p>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <div class="comet-avatar">
                        <img src="images/resources/comet-1.jpg" alt="">
                    </div>
                    <div class="we-comment">
                        <div class="coment-head">
                            <h5><a href="time-line.html" title="">Donald
                                    Trump</a></h5>
                            <span>1 week ago</span>
                            <a class="we-reply" href="#" title="Reply"><i
                                    class="fa fa-reply"></i></a>
                        </div>
                        <p>we are working for the dance and sing songs. this
                            video is very awesome for the youngster. please vote
                            this video and like our channel
                            <i class="em em-smiley"></i>
                        </p>
                    </div>
                </li>
                <li>
                    <a href="#" title="" class="showmore underline">more
                        comments</a>
                </li>
                <li class="post-comment">
                    <div class="comet-avatar">
                        <img src="images/resources/comet-1.jpg" alt="">
                    </div>
                    <div class="post-comt-box">
                        <form method="post">
                            <textarea
                                placeholder="Post your comment"></textarea>
                            <div class="add-smiles">
                                <span class="em em-expressionless"
                                    title="add icon"></span>
                            </div>
                            <div class="smiles-bunch">
                                <i class="em em---1"></i>
                                <i class="em em-smiley"></i>
                                <i class="em em-anguished"></i>
                                <i class="em em-laughing"></i>
                                <i class="em em-angry"></i>
                                <i class="em em-astonished"></i>
                                <i class="em em-blush"></i>
                                <i class="em em-disappointed"></i>
                                <i class="em em-worried"></i>
                                <i class="em em-kissing_heart"></i>
                                <i class="em em-rage"></i>
                                <i class="em em-stuck_out_tongue"></i>
                            </div>
                            <button type="submit"></button>
                        </form>
                    </div>
                </li>
            </ul>
        </div> -->
    </div>
</div>

<?php
}
?>
</form> 
<script src="actions.js"></script>



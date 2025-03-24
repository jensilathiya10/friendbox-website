<?php
	session_start();
	require("config.php");
	$user = $_SESSION['username'];
    $sql = "SELECT * from users where users.username not in(select following from followings where followings.username='$user')
	and users.username <> '$user'";
    $result = $conn->query($sql);
	
	
?>
<aside class="sidebar sugg static">
			<div class="widget">
				<h4 class="widget-title">Suggestions</h4>
				<form action="" method="post">
				<ul class="followers">
						<?php
							foreach($result as $row){
						?>
							<li>
							<figure><img src="./userdata/profileimg/<?php echo $row['profile']; ?>" alt=""></figure>
							<div class="friend-meta">
								<h4><a href="" title=""><?php echo $row['name'] ?></a></h4>
								<button class="addbtn" type="button" name="addbtn" value="<?php echo $row['username']; ?>">Add Friend</button>
								<!-- <button class="add" type="button">hello</button> -->
								<!-- <h3 class="hello">jjvjt</h3> -->
							</div>
							</li>
						<?php
							}
							?>
				</ul>
				</form>
			</div>
		
			
		</aside>
<script src="actions.js"></script>

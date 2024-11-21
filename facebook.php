<?php
include ("db_connection.php");
include ("userinf.php");
include ("islike.php");
?>

<?php
include "db_connection.php";

$email = $_SESSION['email'];

$sql = "SELECT * FROM user WHERE Email = '$email'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $username = $row['Name'];
    $user_image = $row['image'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fb/style.css">
    <title>Facebook</title>
    <link rel="shortcut icon" href="fb/facebook (3).png">
</head>

<body>
    <div class="atoz">
        <div class="topbar">
            <div style="display: flex; gap: 5px;">
                <div>
                    <img src="fb/facebook (3).png" alt="sss">
                </div>

                <div class="Search">
                    <form action="search.php" method="get">
                        <input type="search" placeholder="search" name="search">
                    </form>
                </div>
            </div>
            <div class="home">
                <div>
                    <img src="fb/home (2).png" alt="sss">
                </div>
                <div>
                    <img src="fb/friends.png" alt="sss">
                </div>
                <div>
                    <img src="fb/people.png" alt="sss">
                </div>

            </div>
            <div style="display: flex; gap: 15px;">
                <div>
                    <p>Find Friend</p>
                </div>
                <div>
                    <img src="fb/dots-menu.png" alt="sss">
                </div>
                <div>
                    <img src="fb/messenger (1).png" alt="sss">
                </div>
                <div>
                    <img src="fb/notification-bell.png" alt="sss">
                </div>
                <div class="ppp">
                    <a href="upload_profile.php">
                        <img src="<?php echo $user_image; ?>" alt="">
                    </a>
                </div>
                <div>
                    <a href="logout.php">

                        <img src="fb/logout.png" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="main-container">
            <div class="sidebar">
                <ul type="none">
                    <div class="class">
                        <div>
                            <img src="<?php echo $user_image; ?>" alt="">
                        </div>
                        <li>
                            <a href="profile.php">
                                <?php echo $username; ?>
                            </a>
                        </li>
                    </div>
                    <li>Friends</li>
                    <li>Welcome</li>
                    <li>Memories</li>
                    <li>Saved</li>
                    <li>Groups</li>
                    <li>Videos</li>
                    <li>Marketplace</li>
                    <li>Feeds</li>
                    <li>Events</li>
                    <li>Ads Manager</li>
                    <li>Climate Science Centre</li>
                    <li>Fundraisers</li>
                    <li>Messenger</li>
                    <li>Messenger Kids</li>
                    <li>Orders and payments</li>
                    <li>Pages</li>
                    <li>Play Games</li>
                    <li>Recent ad activity</li>
                </ul>
            </div>
            <div class="newsfeed">

                <div>
                    <div class="story">
                        <div class="firststory">
                            <div class="plus">
                                <p>+</p>
                            </div>
                            <div class="Createstory">
                                <img src="<?php echo $user_image; ?>" alt="">
                                <div>
                                    <p>Create Story</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <img src="fb/440865584_1451658545723853_85608116514954418_n.jpg" alt="">
                        </div>
                        <div>
                            <img src="fb/444489913_997640868645687_4224050870233084636_n.jpg" alt="">
                        </div>
                        <div>
                            <img src="fb/443862337_472857521920400_7514410539097579023_n.jpg" alt="">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="mypppppp">
                    <div class="myppp">
                        <div>
                            <img src="<?php echo $user_image; ?>" alt="">
                        </div>
                        <div class="search1">
                            <a href="upload_post.php">
                                <input placeholder="What's on your mind,Sunny?" type="border radius=30px">
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="myppp1">
                        <div style="display: flex;">
                            <div>
                                <img src="fb/video-camera.png" alt="">
                            </div>
                            <div>
                                Live Video
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div>
                                <img src="fb/photos.png" alt="">
                            </div>
                            <div>
                                Photo/Video
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div>
                                <img src="fb/smile.png" alt="">
                            </div>
                            <div>
                                Feeling/activity
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="borderplace">
                    <div>
                        <?php
                        $sql = "SELECT * FROM post";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $user_id = $row["UserID"];
                                $post_id = $row["PostID"];
                                $content = $row["Content"];
                                $time = $row["Timestamp"];
                                $post_img = $row["image"];

                                ?>

                                <div class="post">

                                    <div class="Ronaldo">
                                        <div class="profile">
                                            <img src="<?php
                                            echo userinf($user_id, $conn)['image']
                                                ?>" alt="">
                                        </div>
                                        <div class="name">
                                            <div>
                                                <p>
                                                    <?php
                                                    echo userinf($user_id, $conn)['Name']
                                                        ?>
                                                </p>
                                                <p>
                                                    <?php
                                                    echo $time;
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post">
                                        <p>
                                            <?php
                                            echo $content;

                                            ?>
                                        </p>
                                        <div>
                                            <img src="<?php echo $post_img; ?> " alt="">
                                        </div>
                                    </div>
                                    <div class="people">

                                        <div>
                                            <img src="fb/heart.png" alt="">
                                            <img src="fb/thumb-up.png" alt="">
                                        </div>
                                        <div>
                                         <?php
                                         include_once 'gets_like.php';
                                         echo get_likes($post_id, $conn);
                                         ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="like">
                                        <div style="align-items: center;">
                                            <div>
                                                <img src="fb/thumb-up.png" alt="">
                                            </div>

                                            <form action="like.php" method="post">

                                                <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                                                <?php
                                                if (like_garo($post_id)) {


                                                    ?>
                                                    <input type="submit" value="Like"
                                                        style="color: blue; border: 0px; background-color: white;">

                                                    <?php
                                                } else {
                                                    ?>

                                                    <input type="submit" value="Like"
                                                        style="color: black; border: 0px; background-color: white;">
                                                    <?php

                                                }
                                                ?>


                                            </form>


                                        </div>
                                        <div style="align-items: center;">
                                            <div>
                                                <img src="fb/comment.png" alt="">
                                            </div>
                                            <p>Comment</p>
                                        </div>
                                        <div style="align-items: center;">
                                            <div>
                                                <img src="fb/share (1).png" alt="">
                                            </div>
                                            <p>Share</p>
                                        </div>
                                    </div>
                                </div>

                                <?php

                            }
                        }
                        ?>
                    </div>
                </div>



            </div>

            <div class="Friends">
                <div class="contacts">
                    <div>
                        <div>
                            Contacts
                        </div>
                    </div>
                    <div style="display: flex; gap: 5px;">
                        <div>
                            <img src="fb/search.png" alt="sss">
                        </div>
                        <div>
                            <img src="fb/more (1).png" alt="sss">
                        </div>
                    </div>
                </div>
                <div class="Name">
                    <div class="sachin">
                        <img src="fb/411473763_897162662026842_3257990545099218389_n.jpg" alt="sss">
                        <p>Sachin Manandhar</p>
                    </div>
                    <div class="sagar">
                        <img src="fb/440865584_1451658545723853_85608116514954418_n.jpg" alt="">
                        <p>सागर भुजु </p>
                    </div>
                    <div class="newz">
                        <img src="fb/405441633_670199491895717_4021952516958421624_n.jpg" alt="sss">
                        <p>Newz Manandhar</p>
                    </div>
                    <div class="sachin">
                        <img src="fb/411473763_897162662026842_3257990545099218389_n.jpg" alt="sss">
                        <p>Sachin Manandhar</p>
                    </div>
                    <div class="newz">
                        <img src="fb/405441633_670199491895717_4021952516958421624_n.jpg" alt="sss">
                        <p>Newz Manandhar</p>
                    </div>
                    <div class="sagar">
                        <img src="fb/440865584_1451658545723853_85608116514954418_n.jpg" alt="">
                        <p>सागर भुजु </p>
                    </div>
                    <div class="sagar">
                        <img src="fb/440865584_1451658545723853_85608116514954418_n.jpg" alt="">
                        <p>सागर भुजु </p>
                    </div>
                    <div class="sagar">
                        <img src="fb/440865584_1451658545723853_85608116514954418_n.jpg" alt="">
                        <p>सागर भुजु </p>
                    </div>
                    <div class="sagar">
                        <img src="fb/440865584_1451658545723853_85608116514954418_n.jpg" alt="">
                        <p>सागर भुजु </p>
                    </div>
                    <div class="group">
                        <div>
                            <div>
                                Group conversations
                            </div>
                        </div>
                        <div class="Group">
                            <div>
                                <img src="fb/add.png" alt="sss">
                            </div>
                            <div>
                                Create New Group
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
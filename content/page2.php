<?php
// require("../db/connect.php");
// if (isset($_POST["save-button"])) {
//     $started = $_POST['Started_Date'];
//     $ended = $_POST['Ended_Date'];
//     $title = $_POST['Title'];
//     $marked = $_POST['Marked'];

//     $sql = "INSERT INTO tracker(Started_Date,Ended_Date, Title, Marked) VALUES('$started', ' $ended', '$title', '$marked')";
//     $res = $conn->query($sql);

//     if ($res) {
//         echo "Sucessfully Inserted";
//         header("location: ../content/page2.php");
//     } else {
//         echo "Failed";
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Page</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montaga&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Luxurious+Script&family=Marck+Script&family=Poppins&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Luxurious+Script&display=swap" rel="stylesheet">
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
    
    <!-- Custom Css -->
    <link rel="stylesheet" href="content.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="tracker.css">
</head>

<body>
    <div id="block">
        <div class="L-block">
            <div>
                <a href="#" title="logo">
                    <img src="./image/logo.JPG" alt="logo" class="logo-block"></a>
            </div>
            <div class="title-block">
                <p>Web Journal</p>
            </div>
            <div class="button-block">
                <a href="../mainpage/index.php" class="button">Logout</a>
            </div>
        </div>

        <div class="background-image"></div>

        <div class="content-field">
            <nav class="nav-block">
                <ul>
                    <li><a title="Add your To-Do list"><img src="./image/todoo.png"> To-Do</a></li>
                    <li><a title="Track down your practices"><img src="./image/timg2.png" alt="">
                            Tracker</a></li>
                    <li><a title="Write down"><img src="./image/diary (2).png" alt="">Diary</a></li>
                </ul>
            </nav>
        </div>

        <div class="des-block">
            <h2>Welcome to Contents of Web Journal</h2>
            <p>Utilize chronicle of Web Journal tailored to meet your needs.</p>
            <ul>
                <li>The To-Dos section helps you prioritize and track your daily tasks.</li>
                <li>The tracker section enables you to monitor habits.</li>
                <li>The diary section allows you to jot down notable events.</li>
            </ul>

            <?Php
            // require("../db/connect.php");
            // $sql = "select * from tracker";
            // $res = $conn->query($sql);

            // if ($res){
            //     while($row = $res->fetch_assoc()){
            //         $marked_days = explode(",", $row["Marked"]);
            //         var_dump($marked_days);
            //         foreach ($marked_days as $key => $value) {

            //         }
            //     }
            // }
            ?>
        </div>

        <!-- To-Do Section -->
        <div class="todo-app">
            <h2>To-Do List <img src="../todolist/image/todolist.png"> </h2>
            <div class="row">
                <input type="text" id="input-box" placeholder="Add Your Text">
                <button onclick="addTask()">Add</button>
            </div>
            <ul id="list-container">
                <!-- <li class="checked">Task1</li>
                    <li>Task2</li>
                    <li>Task3</li> -->
            </ul>
        </div>

        <!-- Tracker Section -->
        <div class="containert">
            <button id="add" onclick="">Add</button>
            <button id="pop-up" onclick="openPopup()">How it works</button>

            <div id="popup" class="popup-box">
                <!-- <span class="close-btn" onclick="closePopup()">&times;</span>  -->

                <div class="popup-content">
                    <span class="close" id="closeSlider" onclick="closePopup()">&times;</span>
                    <div class="box">

                        <div class="content">
                            <div class="images">
                                <img src="./image/Started Date.jpg" class="img1">
                            </div>
                            <div class="images">
                                <img src="./image/Textfield.jpg">
                            </div>
                            <div class="images">
                                <img src="./image/Tracking table.jpg">
                            </div>
                            <div class="images">
                                <img src="./image/Ended Date.jpg">
                            </div>


                            <div class="slide-left" onclick="slide(-1)">
                                <span class="fa-solid fa-angle-left"></span>
                            </div>
                            <div class="slide-right" onclick="slide(1)">
                                <span class="fa-solid fa-angle-right"></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div id="contentContainer">
                <div class="containert2" id="templateContainer">
                    <form name="tracker_form" action="./trackerhandle.php" method="post">
                        <div class="datecontainer">
                            <div class="start">
                                <label for="">Started Date: </label>
                                <input type="date" id="d1" name="started_date" />
                            </div>
                            <div class="end">
                                <label for="">Ended Date: </label>
                                <input type="date" id="d2" name="ended_date" />
                            </div>
                        </div>

                        <div class="Tcontainer">
                            <textarea id="title" cols="0" rows="0" placeholder="write a title to track" name="title"></textarea>
                        </div>

                        <table>
                            <tr>
                                <td onclick="markCell(this)"> 1</td>
                                <td onclick="markCell(this)"> 2</td>
                                <td onclick="markCell(this)"> 3</td>
                                <td onclick="markCell(this)"> 4</td>
                                <td onclick="markCell(this)"> 5</td>
                                <td onclick="markCell(this)"> 6</td>
                                <td onclick="markCell(this)"> 7</td>
                                <td onclick="markCell(this)"> 8</td>
                                <td onclick="markCell(this)"> 9</td>
                                <td onclick="markCell(this)"> 10</td>
                                <td onclick="markCell(this)"> 11</td>
                                <td onclick="markCell(this)">12</td>
                                <td onclick="markCell(this)">13</td>
                                <td onclick="markCell(this)">14</td>
                                <td onclick="markCell(this)">15</td>
                            </tr>
                            <tr>
                                <td onclick="markCell(this)"> 16</td>
                                <td onclick="markCell(this)"> 17</td>
                                <td onclick="markCell(this)"> 18</td>
                                <td onclick="markCell(this)">19</td>
                                <td onclick="markCell(this)">20</td>
                                <td onclick="markCell(this)">21</td>
                                <td onclick="markCell(this)">22</td>
                                <td onclick="markCell(this)">23</td>
                                <td onclick="markCell(this)">24</td>
                                <td onclick="markCell(this)">25</td>
                                <td onclick="markCell(this)">26</td>
                                <td onclick="markCell(this)">27</td>
                                <td onclick="markCell(this)">28</td>
                                <td onclick="markCell(this)">29</td>
                                <td onclick="markCell(this)">30</td>
                            </tr>
                        </table>
                        <input type="hidden" name="marked" id="marked" value="" />


                        <button type="submit" id="save-button" name="save-button">Save</button>
                </div>
            </div>
            </form>
        </div>

        <!-- Diary Section -->
        <div class="container diary">
            <h1><img src="../notes/images/diary.png">Diary</h1>
            <button class="btn" id="diary-create"><img src="../notes/images/edit.png">Create </button>

            <form action="../notes/notes-handle.php" method="post">
                <div class="notes-container">
                    <label for="date-time-input">Date and Time:</label>
                    <input type="datetime-local" id="date-time-input" />
                </div>
                <!-- <input type="hidden" name="note-content" value=""/> -->
                <button type="submit" name="save-btn">Save</button>
            </form>
        </div>
    </div>

    <script src="../todolist/script.js"></script>
    <script src="tracker.js" type="text/javascript"></script>
    <script src="../notes/script.js"></script>
    <script src="alert.js"></script>


</body>

</html>
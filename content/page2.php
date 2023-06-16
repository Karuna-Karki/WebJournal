


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./content.css">
    <link href="https://fonts.googleapis.com/css2?family=Luxurious+Script&display=swap" rel="stylesheet">
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
    <title>Content Page</title>
</head>

<body>

    <head>
        <div id="block">
            <div class="L-block">
                <div>
                    <a href="#" title="logo">
                        <img src="./image/logo.JPG" alt="logo" class="logo-block"></a>
                </div>
                <div class="title-block">
                    <p>Web Journal</p>
                </div>
            </div>
            </header>
            <div class="background-image"></div>
            <div class="content-field">
                <nav class="nav-block">
                    <ul>
                        <li><a  title="Add your To-Do list"><img
                                    src="./image/todoo.png"> To-Dos</a></li>
                        <li><a  title="Track down your practices"><img src="./image/trackerr.png"
                                    alt="">
                                Tracker</a></li>
                        <li><a  title="Write down"><img
                                    src="./image/diary (2).png" alt="">Diary</a></li>
                    </ul>
                </nav>
            </div>
            
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
                <div class="container">
                    <h1><img src="../notes/images/diary.png">Diary</h1>
                    <button class="btn"><img src="../notes/images/edit.png">Create </button>
                    <div class="notes-container">
                        <!-- <p contenteditable="true" class="input-box">
                            <img src="../notes/images/delete.png">
                        </p> -->
                    </div>
                </div>
                
            
        </div>



        <script src="../todolist/script.js"></script>
        <script src="../notes/script.js"></script>

</body>

</html>
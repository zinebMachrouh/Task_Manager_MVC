<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/assets/brand.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/dashboard.css" type="text/css">
    <script src="https://kit.fontawesome.com/6e1faf1eda.js" crossorigin="anonymous"></script>
    <script src="<?php echo URLROOT; ?>/js/script.js" defer></script>
    <style>
        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            z-index: 1000;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 999;
        }

        .top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            margin: 0px 5px;
            flex-wrap: wrap;
            gap: 25px;
        }

        .top-btns {
            width: 400px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .top-btns a {
            width: 47%;
            text-align: center;
            padding: 10px 0px;
            background-color: #fafafa;
            border-radius: 5px;
            text-decoration: none;
            color: #308BE6;
        }

        .search-bar {
            width: 400px;
            display: flex;
            align-items: center;

        }

        .search-bar input {
            width: 90%;
            padding: 10px;
            background-color: #fafafa;
            border-radius: 5px 0px 0px 5px;
            border: none;
            color: #1e1e1e;
            font-size: 13px;
            outline: none;
            caret-color: #308BE6;
        }

        .search-bar i {
            width: 10%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #fafafa;
            padding: 12px 0px;
            border-radius: 0px 5px 5px 0px;
        }

        .tasks {
            margin: 20px 0px;
            display: flex;
            height: fit-content;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .container {
            display: flex;
            flex-direction: column;
            width: 430px;
            align-items: flex-start;
            padding: 20px;
            height: fit-content;
        }

        .content {
            display: flex;
            flex-direction: column;
            gap: 25px;
            width: 100%;
        }

        .stats {
            border-bottom: 3px solid #b6eaff;
            width: 100%;
            padding-bottom: 20px;
            margin-bottom: 25px;
        }

        .stats h4 {
            font-size: 19px;
            color: #fafafa;
        }

        .stats h4 span {
            color: #308BE6;
            font-size: 15px;
            background-color: #fafafa;
            padding: 2px 10px;
            border-radius: 200px;
        }

        .task {
            display: flex;
            overflow: hidden;
            border-radius: 5px;
            width: 100%;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
        }

        .task-side {
            width: 2%;
            height: 100%;
            background-color: #fafafa;
        }

        .data {
            padding: 10px;
            width: 98%;
            flex-grow: 1;
            background: rgba(250, 250, 250, 0.21);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .task-top {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .task-top h4 {
            color: #fafafa;
            font-size: 20px;
        }

        .task-top button {
            background-color: transparent;
            border: none;
            outline: none;
            font-size: 18px;
        }

        .task-description {
            color: #fafafa;
        }

        .task-btm {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 15px;
        }

        .task-btm p {
            /* opacity: 0.7; */
            color: #fafafa;
        }

        .capsule {
            border-radius: 16px;
            padding: 5px 15px;
            color: #308BE6;
            background-color: #b6eaff;
            text-decoration: none;
        }

        .popup-content {
            width: 550px;
        }

        .dropbtn {
            font-size: 16px;
            border: none;
            cursor: pointer;
            padding-left: 15px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 5;
        }

        .dropdown-content span {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        textarea {
            min-width: 100%;
            width: 100%;
            max-width: 100%;
            height: 100px;
            min-height: 100px;
            max-height: 100px;
        }

        @media screen and (max-width:700px) {
            .top {
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <header>
        <h2>Data<img src="<?php echo URLROOT; ?>/assets/brand.png" alt=brand />are</h2>
        <nav>
            <a href="<?php echo URLROOT; ?>/users/dashboard"><i class="fa-solid fa-house"></i> Home</a>
            <a href="#" onclick="openMyPopup()"><i class="fa-solid fa-user"></i> Profile</a>
            <a href="<?php echo URLROOT; ?>/users/logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> LogOut</a>
        </nav>
    </header>
    <div class="overlay" id="overlay"></div>

    <div class="modal" id="searchPopup">
        <h2 id="popupTitle"></h2>
        <p id="popupDescription"></p>
        <p>Status: <span id="popupStatus"></span></p>
        <p>Priority: <span id="popupPriority"></span></p>
        <button onclick="closeSearchModal()">Close</button>
    </div>
    <div id="myPopup" class="popup">
        <div class="popup-content">
            <div class="popup-header">
                <?php
                echo "
                        <h2>{$data['user']->fname} {$data['user']->lname}</h2>";
                ?>
                <span class="close" onclick="closeMyPopup()">&times;</span>
            </div>
            <div class="popup-body">
                <?php
                echo "
                    <h3>Personal information:</h3> <p>Birthdate : ";
                echo ($data['user']->birthdate === NULL) ? 'empty' : '' . $data['user']->birthdate . '';
                echo "</p><p>Phone Number : {$data['user']->tel}</p>
                    <p>Adress : ";
                echo ($data['user']->adress === NULL) ? 'empty' : '' . $data['user']->adress . '';
                echo "
                    </p><h3 class=pro>Professional information:</h3>
                    <p>Email : {$data['user']->email}</p>
                    <p>Service : {$data['user']->service}</p>
                    <p>Role : 
                ";
                echo ($data['user']->role === 0) ? "Member" : (($data['user']->role === 1) ? "Product Owner" : (($data['user']->role === 2) ? "Scrum Master" : "Admin"));
                echo "</p>";
                ?>
                <div class="popup-footer">
                    <a href="<?php echo URLROOT; ?>/users/deleteUser" style="background-color: #E33535;">Delete</a>
                    <a href="<?php echo URLROOT; ?>/users/modificationPage/<?php echo $data['user']->id; ?>">Modify</a>
                </div>
            </div>
        </div>
    </div>
    <main>
        <article>
            <div class="top">
                <div class="top-btns">
                    <a href="#" onclick="openTaskPopup()">Add Task</a>
                    <a href="#" onclick="openMultiPopup()">Add Multiple</a>
                </div>
                <div class="search-bar">
                    <input type="text" name="searchInput" id="searchInput" placeholder="Search..." onkeydown="handleEnterKey(event)">
                    <i class="fa-solid fa-magnifying-glass" style="color: #b0b0b0;"></i>
                </div>
            </div>
            <div class="tasks">
                <div class="container">
                    <div class="stats">
                        <h4><span><?php echo $data['backlogStats']->count; ?></span> | Backlog</h4>
                    </div>
                    <div class="content">
                        <?php
                        foreach ($data['backlog'] as $backlog) {
                            echo '<div class="task">
                                <div class="task-side">.</div>
                                <div class="data">
                                    <div class="task-top">
                                        <h4>' . $backlog->title . '</h4>
                                        <div class="dropdown" style="float:right;">
                                            <button class="dropbtn"><i class="fa-solid fa-ellipsis-vertical" style="color: #fafafa;"></i></button>
                                            <div class="dropdown-content">
                                                <span>
                                                    <a href="#" onclick="openModifyTask(' . $backlog->id . ')"><i class="fa-solid fa-pencil" style="color: #308be6;"></i></a>
                                                    <a href="' . URLROOT . '/tasks/deleteTask/' . $backlog->id . '"><i class="fa-solid fa-trash-can" style="color: #308be6;"></i></a>
                                                    <a href="' . URLROOT . '/tasks/archiveTask/' . $backlog->id . '"><i class="fa-solid fa-inbox" style="color: #308be6;"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="task-description">' . $backlog->description . '</p><div class="task-btm">';
                            echo ($backlog->priority === 0) ? '<a href="#" class="capsule low">Low</a>' : (($backlog->priority === 1) ? '<a href="#" class="capsule med">Medium</a>' : (($backlog->priority === 2) ? '<a href="#" class="capsule high">High</a>' :
                                ''));

                            echo '<p>' . $backlog->created_at . '</p></div></div>
                            </div>';
                        }
                        ?>
                    </div>
                </div>
                <div class="container">
                    <div class="stats">
                        <h4><span><?php echo $data['todoStats']->count; ?></span> | To-Do</h4>
                    </div>
                    <div class="content">
                        <?php
                        foreach ($data['todo'] as $todo) {
                            echo '<div class="task">
                                <div class="task-side">.</div>
                                <div class="data">
                                    <div class="task-top">
                                        <h4>' . $todo->title . '</h4>
                                        <div class="dropdown" style="float:right;">
                                            <button class="dropbtn"><i class="fa-solid fa-ellipsis-vertical" style="color: #fafafa;"></i></button>
                                            <div class="dropdown-content">
                                                <span>
                                                    <a href="#" onclick="openModifyTask(' . $todo->id . ')"><i class="fa-solid fa-pencil" style="color: #308be6;"></i></a>
                                                    <a href="' . URLROOT . '/tasks/deleteTask/' . $todo->id . '"><i class="fa-solid fa-trash-can" style="color: #308be6;"></i></a>
                                                    <a href="' . URLROOT . '/tasks/archiveTask/' . $todo->id . '"><i class="fa-solid fa-inbox" style="color: #308be6;"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="task-description">' . $todo->description . '</p><div class="task-btm">';
                            echo ($todo->priority === 0) ? '<a href="#" class="capsule low">Low</a>' : (($todo->priority === 1) ? '<a href="#" class="capsule med">Medium</a>' : (($todo->priority === 2) ? '<a href="#" class="capsule high">High</a>' :
                                ''));

                            echo '<p>' . $todo->created_at . '</p></div></div>
                            </div>';
                        }
                        ?>
                    </div>

                </div>
                <div class="container">
                    <div class="stats">
                        <h4><span><?php echo $data['doingStats']->count; ?></span> | Doing</h4>
                    </div>
                    <div class="content">
                        <?php
                        foreach ($data['doing'] as $doing) {
                            echo '<div class="task">
                                <div class="task-side">.</div>
                                <div class="data">
                                    <div class="task-top">
                                        <h4>' . $doing->title . '</h4>
                                        <div class="dropdown" style="float:right;">
                                            <button class="dropbtn"><i class="fa-solid fa-ellipsis-vertical" style="color: #fafafa;"></i></button>
                                            <div class="dropdown-content">
                                                <span>
                                                    <a href="#" onclick="openModifyTask(' . $doing->id . ')"><i class="fa-solid fa-pencil" style="color: #308be6;"></i></a>
                                                    <a href="' . URLROOT . '/tasks/deleteTask/' . $doing->id . '"><i class="fa-solid fa-trash-can" style="color: #308be6;"></i></a>
                                                    <a href="' . URLROOT . '/tasks/archiveTask/' . $doing->id . '"><i class="fa-solid fa-inbox" style="color: #308be6;"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="task-description">' . $doing->description . '</p><div class="task-btm">';
                            echo ($doing->priority === 0) ? '<a href="#" class="capsule low">Low</a>' : (($doing->priority === 1) ? '<a href="#" class="capsule med">Medium</a>' : (($doing->priority === 2) ? '<a href="#" class="capsule high">High</a>' :
                                ''));

                            echo '<p>' . $doing->created_at . '</p></div></div>
                            </div>';
                        }
                        ?>
                    </div>

                </div>
                <div class="container">
                    <div class="stats">
                        <h4><span><?php echo $data['doneStats']->count; ?></span> | Done</h4>
                    </div>
                    <div class="content">
                        <?php
                        foreach ($data['done'] as $done) {
                            echo '<div class="task">
                                <div class="task-side">.</div>
                                <div class="data">
                                    <div class="task-top">
                                        <h4>' . $done->title . '</h4>
                                        <div class="dropdown" style="float:right;">
                                            <button class="dropbtn"><i class="fa-solid fa-ellipsis-vertical" style="color: #fafafa;"></i></button>
                                            <div class="dropdown-content">
                                                <span>
                                                    <a href="#" onclick="openModifyTask(' . $done->id . ')"><i class="fa-solid fa-pencil" style="color: #308be6;"></i></a>
                                                    <a href="' . URLROOT . '/tasks/deleteTask/' . $done->id . '"><i class="fa-solid fa-trash-can" style="color: #308be6;"></i></a>
                                                    <a href="' . URLROOT . '/tasks/archiveTask/' . $done->id . '"><i class="fa-solid fa-inbox" style="color: #308be6;"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="task-description">' . $done->description . '</p><div class="task-btm">';
                            echo ($done->priority === 0) ? '<a href="#" class="capsule low">Low</a>' : (($done->priority === 1) ? '<a href="#" class="capsule med">Medium</a>' : (($done->priority === 2) ? '<a href="#" class="capsule high">High</a>' :
                                ''));

                            echo '<p>' . $done->created_at . '</p></div></div>
                            </div>';
                        }
                        ?>
                    </div>

                </div>
            </div>
        </article>
        <div id="taskPopup" class="popup">
            <div class="popup-content">
                <div class="popup-header">
                    <h2>Add Task</h2>
                    <span class="close" onclick="closeTaskPopup()">&times;</span>
                </div>
                <div class="popup-body">
                    <form action="<?php echo URLROOT; ?>/tasks/createTask" method="post">
                        <label for="title" style="color: #008fd4; font-size: 16px; font-weight: 600;">Task Title:</label><br>
                        <input type="text" id="title" name="title" required placeholder="Enter Task Name" style="width: 100%; padding: 10px 7px; font-size: 16px; border-radius: 5px; outline: none; border: #1e1e1e4c 1px solid; margin-bottom: 15px;"> <br>

                        <label for="description" style="color: #008fd4; font-size: 16px; font-weight: 600;">Task Description:</label><br>
                        <textarea id="description" name="description" required placeholder="Tell us about your task <3" style="width: 100%; padding: 10px 7px; font-size: 16px; border-radius: 5px; outline: none; border: #1e1e1e4c 1px solid; margin-bottom: 15px;"></textarea> <br>

                        <label for="priority" style="color: #008fd4; font-size: 16px; font-weight: 600;">Priority:</label><br>
                        <select name="priority" id="priority" required style="width: 100%; padding: 10px 7px; font-size: 16px; border-radius: 5px; outline: none; border: #1e1e1e4c 1px solid; margin-bottom: 15px;">
                            <option value="" hidden>Pick A Priority</option>
                            <option value="0">Low</option>
                            <option value="1">Medium</option>
                            <option value="2">High</option>
                        </select>

                        <label for="status" style="color: #008fd4; font-size: 16px; font-weight: 600;">Status:</label><br>
                        <select name="status" id="status" required style="width: 100%; padding: 10px 7px; font-size: 16px; border-radius: 5px; outline: none; border: #1e1e1e4c 1px solid; margin-bottom: 15px;">
                            <option value="" hidden>Pick A Status</option>
                            <option value="0">Backlog</option>
                            <option value="1">To-Do</option>
                            <option value="2">Doing</option>
                            <option value="3">Done</option>
                        </select>

                        <div class="popup-footer">
                            <button type="submit" class="btn btn-primary" name="setTeam">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="modifyTask" class="popup">
            <div class="popup-content">
                <div class="popup-header">
                    <h2>Modify Task</h2>
                    <span class="close" onclick="closeModifyTask()">&times;</span>
                </div>
                <div class="popup-body">
                    <form action="<?php echo URLROOT; ?>/tasks/createTask" method="post" id="myForm">
                        <label for="mtitle" style="color: #008fd4; font-size: 16px; font-weight: 600;">Task Title:</label><br>
                        <input type="text" id="mtitle" name="mtitle" required placeholder="Enter Task Name" style="width: 100%; padding: 10px 7px; font-size: 16px; border-radius: 5px; outline: none; border: #1e1e1e4c 1px solid; margin-bottom: 15px;"> <br>

                        <label for="mdescription" style="color: #008fd4; font-size: 16px; font-weight: 600;">Task Description:</label><br>
                        <textarea id="mdescription" name="mdescription" required placeholder="Tell us about your task <3" style="width: 100%; padding: 10px 7px; font-size: 16px; border-radius: 5px; outline: none; border: #1e1e1e4c 1px solid; margin-bottom: 15px;"></textarea> <br>

                        <label for="mpriority" style="color: #008fd4; font-size: 16px; font-weight: 600;">Priority:</label><br>
                        <select name="mpriority" id="mpriority" required style="width: 100%; padding: 10px 7px; font-size: 16px; border-radius: 5px; outline: none; border: #1e1e1e4c 1px solid; margin-bottom: 15px;">
                            <option value="" hidden>Pick A Priority</option>
                            <option value="0">Low</option>
                            <option value="1">Medium</option>
                            <option value="2">High</option>
                        </select>

                        <label for="status" style="color: #008fd4; font-size: 16px; font-weight: 600;">Status:</label><br>
                        <select name="mstatus" id="mstatus" required style="width: 100%; padding: 10px 7px; font-size: 16px; border-radius: 5px; outline: none; border: #1e1e1e4c 1px solid; margin-bottom: 15px;">
                            <option value="" hidden>Pick A Status</option>
                            <option value="0">Backlog</option>
                            <option value="1">To-Do</option>
                            <option value="2">Doing</option>
                            <option value="3">Done</option>
                        </select>

                        <div class="popup-footer">
                            <button type="submit" class="btn btn-primary" name="setTeam">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="addMulti" class="popup">
            <div class="popup-content">
                <div class="popup-header">
                    <h2>Add Multiple Tasks</h2>
                    <span class="close" onclick="closeMultiPopup()">&times;</span>
                </div>
                <div class="popup-body">
                    <form action="<?php echo URLROOT; ?>/tasks/addMulti" method="post">
                        <label for="count" style="color: #008fd4; font-size: 16px; font-weight: 600;">Enter Number Of New Tasks</label><br>
                        <input type="text" id="count" name="count" required placeholder="Enter Task Name" style="width: 100%; padding: 10px 7px; font-size: 16px; border-radius: 5px; outline: none; border: #1e1e1e4c 1px solid; margin-bottom: 15px;"> <br>
                        <div class="popup-footer">
                            <button type="submit" class="btn btn-primary" name="setTeam">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
            <script>
                function openMultiPopup() {
                    document.getElementById('addMulti').style.display = 'flex';
                }

                function closeMultiPopup() {
                    document.getElementById('addMulti').style.display = 'none';
                }


                function openTaskPopup() {
                    document.getElementById('taskPopup').style.display = 'flex';
                }

                function closeTaskPopup() {
                    document.getElementById('taskPopup').style.display = 'none';
                }

                function openModifyTask(taskId) {
                    document.getElementById('modifyTask').style.display = 'flex';
                    var form = document.getElementById('myForm');
                    form.action = '<?php echo URLROOT; ?>/tasks/modifyTask/' + taskId;

                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            var data = JSON.parse(xhr.responseText);
                            document.getElementById('mtitle').value = data.title;
                            document.getElementById('mdescription').value = data.description;
                            document.getElementById('mpriority').value = data.priority;
                            document.getElementById('mstatus').value = data.status;
                        }
                    };
                    xhr.open('GET', '<?php echo URLROOT; ?>/tasks/getTask/' + taskId, true);
                    xhr.send();
                }

                function closeModifyTask() {
                    document.getElementById('modifyTask').style.display = 'none';
                }

                function handleEnterKey(event) {
                    if (event.key === "Enter") {
                        event.preventDefault();
                        searchAndDisplay();
                    }
                }

                function displayPopupWithData(data) {
                    document.getElementById('popupTitle').innerText = data.title;
                    document.getElementById('popupDescription').innerText = data.description;
                    document.getElementById('popupStatus').innerText = data.status;
                    document.getElementById('popupPriority').innerText = data.priority;

                    if (data) {
                        document.getElementById('overlay').style.display = 'block';
                        document.getElementById('searchPopup').style.display = 'block';

                    }
                }

                function closeSearchModal() {
                    document.getElementById('overlay').style.display = 'none';
                    document.getElementById('searchPopup').style.display = 'none';
                    document.getElementById('searchInput').value = '';
                }

                function searchAndDisplay() {
                    var searchTerm = document.getElementById('searchInput').value;

                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            var data = JSON.parse(xhr.responseText);
                            displayPopupWithData(data);
                        }
                    };
                    xhr.open('GET', '<?php echo URLROOT; ?>/tasks/searchData/' + searchTerm, true);
                    xhr.send();
                }
            </script>
    </main>
</body>

</html>
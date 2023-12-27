<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify</title>
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/assets/brand.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins';
        }

        .login-body {
            width: 100%;
            height: 100vh;
            background-position: center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #00a6e8;
        }

        .create-form {
            width: 600px;
            height: 730px;
            background-color: #fafafa;
            border-radius: 20px;
            box-shadow: rgba(17, 17, 26, 0.1) 0px 0px 16px;
            overflow: hidden;
        }

        .create-form h2 {
            display: flex;
            align-items: center;
            color: #1e1e1e;
            font-size: 30px;
            justify-content: center;
            padding: 20px;
        }

        .create-form form {
            padding: 0px 30px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .back {
            position: absolute;
            top: 50px;
            left: 50px;
            background-color: #fafafa;
            border-radius: 200px;
            width: 50px;
            height: 50px;
            color: #00a6e8;
            padding: 10px 12px;
            letter-spacing: 2px;
            font-size: 24px;
        }

        .labels {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #1e1e1e;
        }

        .labels:not(.x-lg) label {
            width: 47%;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        label h4 {
            font-size: 20px;
            color: #1e1e1e;
        }

        .labels:not(.x-lg) label input {
            padding: 10px 5px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #1e1e1e;
            outline: none;
        }

        .sm {
            display: flex;
            flex-direction: column;
            gap: 5px;
            width: 100%;
        }

        .sm input {
            padding: 10px 5px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #1e1e1e;
            outline: none;
        }

        .labels:not(.x-lg) label input:focus {
            box-shadow: #00a6e83f 0px 2px 8px 0px;
            border: #00a6e8 1px solid;
            transition: all ease 0.3s;
        }

        label input:focus,
        label select:focus {
            box-shadow: #00a6e83f 0px 2px 8px 0px;
            border: #00a6e8 1px solid;
            transition: all ease 0.3s;
        }

        .x-lg label {
            width: 30%;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .x-lg input {
            padding: 10px 5px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #1e1e1e;
            outline: none;
        }

        .x-lg select {
            padding: 10px 5px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #1e1e1e;
            outline: none;
        }

        .btns {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 10px;
        }

        textarea {
            min-width: 100%;
            width: 100%;
            max-width: 100%;
            height: 100px;
            min-height: 100px;
            max-height: 100px;
        }

        .btns button {
            font-size: 18px;
            padding: 10px 15px;
            outline: none;
            border: none;
            cursor: pointer;
            font-weight: 500;
            width: 180px;
        }

        .btns button:first-child {
            border: #00a6e8 2px solid;
            background-color: transparent;
            color: #00a6e8;
            border-radius: 5px;
        }

        .btns button:last-child {
            border: #00a6e8 2px solid;
            background-color: #00a6e8;
            color: #fafafa;
            border-radius: 5px;
        }

        .btns button:first-child:hover,
        .btns button:last-child:hover {
            box-shadow: #00a6e83f 0px 2px 8px 0px;
            transition: all ease 0.3s;
        }

        .form-container {
            display: flex !important;
            flex-direction: column !important;
        }

        .form {
            display: none !important;
        }

        .active {
            display: flex !important;
        }
    </style>
</head>

<body class="login-body">
    <a href="<?php echo URLROOT; ?>/tasks/index/<?php echo $_SESSION['project_id']; ?>" class="bi bi-arrow-left back">Go Back</a>
    <div class="create-form">
        <h2>Data<img src="<?php echo URLROOT; ?>/assets/brand.png" alt=brand />are</h2>
        <div class="form-container">
            <?php
            $count = $data['count'];

            for ($i = 0; $i < $count; $i++) :
            ?>
                <form action="<?php echo URLROOT; ?>/tasks/insertTasks" method="POST" class="form <?php echo ($i === 0) ? 'active' : ''; ?>">
                    <label for="title_<?php echo $i; ?>" style="color: #008fd4; font-size: 16px; font-weight: 600;">Task Title:</label>
                    <input type="text" name="title_<?php echo $i; ?>" required placeholder="Enter Task Name" style="width: 100%; padding: 10px 7px; font-size: 16px; border-radius: 5px; outline: none; border: #1e1e1e4c 1px solid; margin-bottom: 15px;">

                    <label for="description_<?php echo $i; ?>" style="color: #008fd4; font-size: 16px; font-weight: 600;">Task Description:</label>
                    <textarea name="description_<?php echo $i; ?>" required placeholder="Tell us about your task <3" style="width: 100%; padding: 10px 7px; font-size: 16px; border-radius: 5px; outline: none; border: #1e1e1e4c 1px solid; margin-bottom: 15px;"></textarea>

                    <label for="priority_<?php echo $i; ?>">Priority:</label>
                    <select name="priority_<?php echo $i; ?>" required>
                        <option value="" hidden>Pick A Priority</option>
                        <option value="0">Low</option>
                        <option value="1">Medium</option>
                        <option value="2">High</option>
                    </select>

                    <label for="status_<?php echo $i; ?>">Status:</label>
                    <select name="status_<?php echo $i; ?>" required>
                        <option value="" hidden>Pick A Status</option>
                        <option value="0">Backlog</option>
                        <option value="1">To-Do</option>
                        <option value="2">Doing</option>
                        <option value="3">Done</option>
                    </select>

                    <input type="hidden" name="pagination_count" value="<?php echo $count; ?>">

                    <button type="submit">Submit Form <?php echo $i + 1; ?></button>
                </form>
            <?php endfor ?>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.form');

            forms.forEach((form, index) => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const formData = new FormData(form);

                    fetch(form.action, {
                            method: 'POST',
                            body: formData,
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data);
                            form.classList.remove('active');

                            if (index < forms.length - 1) {
                                forms[index + 1].classList.add('active');
                            } else {
                                if (data.success) {
                                    window.location.href = '<?php echo URLROOT; ?>/index/<?php echo $_SESSION['project_id']; ?>';
                                } else {
                                    console.error('Last form submission failed.');
                                }
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        });
    </script>
</body>

</html>
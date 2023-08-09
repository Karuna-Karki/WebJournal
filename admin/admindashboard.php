<?php
require_once("../db/connect.php");

$total_users = 0;
$res = $conn->query("SELECT COUNT(*) AS total FROM register;");
if ($res) {
    $row = $res->fetch_assoc();
    $total_users = $row['total'];
} else {
    echo "console.log('Error')";
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["updateUser"])) {
    $userId = $_POST["userId"];
    $updatedUsername = $_POST["updatedUsername"];
    $updatedEmail = $_POST["updatedEmail"];

    $stmt = $conn->prepare("UPDATE register SET username = ?, email = ? WHERE id = ?");
    $stmt->bind_param("ssi", $updatedUsername, $updatedEmail, $userId);
    $result = $stmt->execute();

    if ($result) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit; // Exit to prevent further execution
    } else {
        echo "Error updating user.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Add your CSS styles here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        nav {
            background-color: #333;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .row {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .col {
            flex-basis: 48%;
            padding: 20px;
            background-color: #f9f9f9;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-bottom: 20px;
        }

        h2 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 5px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="password"],
        form button[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <nav>
        <a href="#">Logo</a>
        <ul>
            <li><a href="#" id="users-link">Users</a></li>
            <li><a href="#">Categories</a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Total Users</h2>
                <h2 id="users" name="users"><?php echo $total_users ?></h2>

                <div id="users-section" class="col" style="display: none;">
                    <h2>Users</h2>
                    <ul>
                        <?php
                        $stmt = $conn->query("SELECT * FROM register;");
                        if ($stmt) {
                            while ($row = $stmt->fetch_assoc()) {
                                echo "<li>{$row['username']} ";
                                echo "<a href='#' class='edit-link' data-userid='{$row['id']}'>Edit</a>";
                                echo "<a href='?delete={$row['id']}'>Delete</a></li>";
                            }
                        } else {
                            echo "Error fetching users.";
                        }
                        ?>
                    </ul>

                    <h2>Update User</h2>
                    <?php
                    $editId = $_GET['edit'];
                    $stmt = $conn->prepare("SELECT * FROM register WHERE id = ?");
                    $stmt->bind_param("i", $editId);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $user = $result->fetch_assoc();
                    ?>
                    <form method="post" id="update-form">
                        <input type="hidden" name="userId" value="<?php echo $editId ?>">
                        <input type="text" name="updatedUsername" value="<?php echo $user['username'] ?>" required>
                        <input type="email" name="updatedEmail" value="<?php echo $user['email'] ?>" required>
                        <button type="submit" name="updateUser">Update</button>
                    </form>
                </div>
            </div>

            <div class="col">
                <h2>Categories</h2>
                <h2 id="categories" name="categories"></h2>

                <!-- Categories section -->
                <div id="categories-section" class="col" style="display: none;">
                    <h2>Categories</h2>
                    <ul>
                        <!-- Display categories here -->
                        <?php
                        $stmt = $conn->query("SELECT * FROM categories;");
                        if ($stmt) {
                            while ($row = $stmt->fetch_assoc()) {
                                echo "<li>{$row['title']} ";
                                echo "<a href='#' class='edit-category' data-categoryid='{$row['id']}'>Edit</a>";
                                echo "<a href='?delete_category={$row['id']}'>Delete</a></li>";
                            }
                        } else {
                            echo "Error fetching categories.";
                        }
                        ?>
                    </ul>
                    <!-- Add form to add categories -->
                    <form id="add-category-form">
                        <input type="text" name="categoryName" placeholder="New Category" required>
                        <button type="submit" name="addCategory">Add Category</button>
                    </form>
                    <!-- Edit category form (similar to user update form) -->
                    <form method="post" id="update-category-form" style="display: none;">
                        <input type="hidden" name="categoryId" value="">
                        <input type="text" name="updatedCategoryName" value="" required>
                        <button type="submit" name="updateCategory">Update Category</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>

    <script>
        const usersLink = document.querySelector("#users-link");
        const usersSection = document.querySelector("#users-section");
        const editLinks = document.querySelectorAll(".edit-link");
        const updateForm = document.querySelector("#update-form");

        usersLink.addEventListener("click", () => {
            if (usersSection.style.display === "none") {
                usersSection.style.display = "block";
            } else {
                usersSection.style.display = "none";
            }
        });

        document.addEventListener("DOMContentLoaded", () => {

            editLinks.forEach(link => {
                link.addEventListener("click", (event) => {
                    event.preventDefault();

                    const userId = link.getAttribute("data-userid");
                    const xhr = new XMLHttpRequest();
                    xhr.open("GET", `get_user.php?id=${userId}`, true);
                    xhr.onload = () => {
                        if (xhr.status === 200) {
                            const user = JSON.parse(xhr.responseText);
                            document.querySelector("#update-form input[name='userId']").value = user.id;
                            document.querySelector("#update-form input[name='updatedUsername']").value = user.username;
                            document.querySelector("#update-form input[name='updatedEmail']").value = user.email;
                            updateForm.style.display = "block";
                        } else {
                            // Handle error or show error message.
                        }
                    };
                    xhr.send();
                });
            });
            console.log(updateForm);

            // updateForm.addEventListener("submit", (event) => {
            //     event.preventDefault();

            //     const formData = new FormData(updateForm);
            //     const xhr = new XMLHttpRequest();
            //     xhr.open("POST", "update_user.php", true);
            //     xhr.onload = () => {
            //         if (xhr.status === 200 && xhr.responseText === "success") {
            //             updateForm.style.display = "none";
            //             window.location.reload(); // Refresh the page to reflect changes
            //         } else {
            //             // Handle error or show error message.
            //         }
            //     };
            //     xhr.send(formData);
            // });
        });

        const editCategoryLinks = document.querySelectorAll(".edit-category");

        editCategoryLinks.forEach(link => {
            console.log(link);
            link.addEventListener("click", (event) => {
                event.preventDefault();

                const categoryId = link.getAttribute("data-categoryid");
                const xhr = new XMLHttpRequest();
                xhr.open("GET", `get_category.php?id=${categoryId}`, true);
                xhr.onload = () => {
                    if (xhr.status === 200) {
                        const category = JSON.parse(xhr.responseText);
                        document.querySelector("#update-category-form input[name='categoryId']").value = category.id;
                        document.querySelector("#update-category-form input[name='updatedCategoryName']").value = category.category_name;
                        document.querySelector("#update-category-form").style.display = "block";
                    } else {
                        // Handle error or show error message.
                    }
                };
                xhr.send();
            });
        });

        // Handle Add category form submission
        const addCategoryForm = document.querySelector("#add-category-form");

        addCategoryForm.addEventListener("submit", (event) => {
            event.preventDefault();

            const formData = new FormData(addCategoryForm);
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "add_category.php", true);
            xhr.onload = () => {
                if (xhr.status === 200 && xhr.responseText === "success") {
                    window.location.reload();
                } else {
                    // Handle error or show error message.
                }
            };
            xhr.send(formData);
        });
    </script>
</body>

</html>
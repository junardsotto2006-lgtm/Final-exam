<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <link   rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
            <img src="../images/mylogo.jpg" id="logo" onclick="showSection('home')" ></img>
            <button class="navbarbuttons" onclick="showSection('create')">Create</button>
<button class="navbarbuttons" onclick="showSection('read')">Read</button>
<button class="navbarbuttons" onclick="showSection('update')">Update</button>
<button class="navbarbuttons" onclick="showSection('delete')">Delete</button>
    </nav>
    <section id="home" class="content"> 
        <h1 class="splash">Welcome to Student Management System</h1>
        <h2 class="splash">A Project in Integrative Programming Technologies</h2>
    </section>
    
    <section id="create" class="content">
        <h1 class="contenttitle"> Insert New Student </h1>

    <form action="../includes/insert.php" method="POST">
        <label for="surname" class="label">Surname</label>
        <input type="text" name="surname" id="surname" class="field" required><br/>

        <label for="name" class="label">Name</label>
        <input type="text" name="name" id="name" class="field" required><br/>

        <label for="middlename" class="label">Middle name</label>
        <input type="text" name="middlename" id="middlename" class="field"><br/>

        <label for="address" class="label">Address</label>
        <input type="text" name="address" id="address" class="field"><br/>

        <label for="contact" class="label">Mobile Number</label>
        <input type="text" name="contact" id="contact" class="field"><br/>

        <div id="btncontainer">
            <button type="button" id="clrbtn" class="btns">Clear Fields</button><br/>
            <button type="submit" id="savebtn" class="btns">Save</button>
        </div>

        <div id="success-toast" class="toast-hidden">
            Registration Successful!
        </div>
    </form>   

    </section>

<br/><br/><br/><br/>

   <section id="read" class="content">
    <h2 class="contenttitle">View Students</h2>

    <?php
    require_once '../includes/db.php';

    $stmt = $pdo->query("SELECT * FROM students");
    $students = $stmt->fetchAll();

    if ($students) {
        echo "<table>";
        echo "<tr>
                <th>ID</th>
                <th>Surname</th>
                <th>Name</th>
                <th>Middle Name</th>
                <th>Address</th>
                <th>Contact</th>
              </tr>";

        foreach ($students as $row) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['surname']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['middlename']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['contact_number']}</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "No records found.";
    }
    ?>
</section>
   <section id="update" class="content">
  <h1 class="contenttitle">Update Student</h1>

  <form action="../includes/update.php" method="POST">

    <label class="label">ID</label>
    <input type="number" name="id" class="field" required><br>

    <label class="label">Surname</label>
    <input type="text" name="surname" class="field"><br>

    <label class="label">Name</label>
    <input type="text" name="name" class="field"><br>

    <label class="label">Middle name</label>
    <input type="text" name="middlename" class="field"><br>

    <label class="label">Address</label>
    <input type="text" name="address" class="field"><br>

    <label class="label">Contact</label>
    <input type="text" name="contact" class="field"><br>

    <div id="btncontainer">
      <button type="submit" class="btns">Update</button>
    </div>

  </form>
</section>

   <section id="delete" class="content">
  <h1 class="contenttitle">Delete Student</h1>

  <form action="../includes/delete.php" method="POST">

    <label class="label">Enter ID</label>
    <input type="number" name="id" class="field" required><br>

    <div id="btncontainer">
      <button type="submit" class="btns">Delete</button>
    </div>

  </form>
</section>



    <script src="script.js"></script>
</body>
</html>
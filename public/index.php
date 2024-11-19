<?php
include_once "../app/model/Student.php";

$student = new Student();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['create'])) {
        $student->create($_POST['student_id'], $_POST['name'], $_POST['department'], $_POST['email'], $_POST['phone_number']);
    }

    elseif(isset($_POST['update'])) {
        $student->update($_POST['student_id'], $_POST['name'], $_POST['department'], $_POST['email'], $_POST['phone_number']);
    }

    elseif(isset($_POST['delete'])){
        $student->delete($_POST['student_id']);
    }
}

$students = $student->read();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <h1>Student Management System</h1>

    <h2>Add Student</h2>
    <form action="" method="POST">
        <input type="text" name="student_id" placeholder="Student ID" required>
        <input type="text" name="name" placeholder="Name" required>
        <input type="text" name="department" placeholder="Department" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="phone_number" placeholder="Phone Number" required>
        <button name="create" type="submit" class="btn btn-primary">Add</button>
    </form>

    <h2>Student List</h2>
    <table border="1">
        <tr>
            <th>Student ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Email</th>
            <th>Phone Number</th>
        </tr>

        <?php foreach ($students as $student): ?>

            <tr>
                <td><?php echo htmlspecialchars($student['student_id']); ?></td>
                <td><?php echo htmlspecialchars($student['name']); ?></td>
                <td><?php echo htmlspecialchars($student['department']); ?></td>
                <td><?php echo htmlspecialchars($student['email']); ?></td>
                <td><?php echo htmlspecialchars($student['phone_number']); ?></td>

                <td>
                    <form action="" method="POST" style="display:inline;">
                        <input type="hidden" name="student_id" value="<?php echo htmlspecialchars($student['student_id'])?>" required>
                        <input type="text" name="name" value="<?php echo htmlspecialchars($student['name'])?>" required>
                        <input type="text" name="department" value="<?php echo htmlspecialchars($student['department'])?>" required>
                        <input type="email" name="email" value="<?php echo htmlspecialchars($student['email'])?>" required>
                        <input type="text" name="phone_number" value="<?php echo htmlspecialchars($student['phone_number'])?>" required>
                        <button type="submit" name="update">Update</button>
                    </form>

                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="student_id" value="<?php echo htmlspecialchars($student['student_id'])?>" required>
                        <button type="submit" name="delete" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
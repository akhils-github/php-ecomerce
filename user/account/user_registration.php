
<?php
include('../../config/connect.php');
include('../../config/common_functions.php');
session_start();
$projectName = basename(dirname(__DIR__, 2)); // Adjusting to go four levels up from the current file's directory
// $baseUrl = "/$projectName";
$error_username = $error_password = $error_confirm_password = $error_phone = $error_role = $error_id = $error_user_id = $error_general = "";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <link rel="shortcut icon" href="<?php echo $baseUrl; ?>/public/favicon.svg" type="image/svg+xml"> -->
    <link rel="stylesheet" href="../../assets/css/login.css" />

</head>

<body style="overflow: hidden;">
<div class="container" id="container">
    
    <!-- right-panel-active -->
    <div class="form-container sign-up-container">
        <form method="post" enctype="multipart/form-data">
            <h1>Create Account</h1>
            <?php echo $error_general; ?>
            <span>or use your email for registration</span>
            <input type="hidden" name="action" value="register">

            <select id="role" name="role" required onchange="handleRoleChange(event)">
                <option value="">Select Role</option>
                <option value="student">Student</option>
                <option value="teaching_faculty">Teaching Faculty</option>
                <option value="non_teaching_faculty">Non-Teaching Faculty</option>
            </select>
            <span id="error_role" style="color: red;"><?php echo $error_role; ?></span>

            <div id="additionalFields" style="display: none;">
                <input type="text" autocomplete="off" name="username" placeholder="Username" required />
                <span id="error_username" style="color: red;"><?php echo $error_username; ?></span>

                <!-- Fields for Students -->
                <div id="studentFields" style="display: none;">
                    <select name="class" id="class">
                        <option value="">Select Class</option>
                        <option value="I B.COM Tax">I B.COM Tax</option>
                        <option value="II B.COM Tax">II B.COM Tax</option>
                        <option value="III B.COM Tax">III B.COM Tax</option>

                        <option value="I B.COM CA">I B.COM CA</option>
                        <option value="II B.COM CA">II B.COM CA</option>
                        <option value="III B.COM CA">III B.COM CA</option>

                        <option value="I B.COM CO-OP">I B.COM CO-OP</option>
                        <option value="II B.COM CO-OP">II B.COM CO-OP</option>
                        <option value="III B.COM CO-OP">III B.COM CO-OP</option>

                        <option value="I BA English">I BA English</option>
                        <option value="II BA English">II BA English</option>
                        <option value="III BA English">III BA English</option>

                        <option value="I BCA">I BCA</option>
                        <option value="II BCA">II BCA</option>
                        <option value="III BCA">III BCA</option>

                        <option value="I BTTM">I BTTM</option>
                        <option value="II BTTM">II BTTM</option>
                        <option value="III BTTM">III BTTM</option>

                        <option value="I BBA">I BBA</option>
                        <option value="II BBA">II BBA</option>
                        <option value="III BBA">III BBA</option>

                        <option value="I MSW">I MSW</option>
                        <option value="II MSW">II MSW</option>

                        <option value="I MA English">I MA English</option>
                        <option value="II MA English">II MA English</option>

                        <option value="I M.Sc. Computer Science">I M.Sc. Computer Science</option>
                        <option value="II M.Sc. Computer Science">II M.Sc. Computer Science</option>

                        <option value="I M.Com">I M.Com</option>
                        <option value="II M.Com">II M.Com</option>
                    </select>
                </div>

                <!-- <div id="studentFields" style="display: none;">
                    <input type="text" autocomplete="off" name="reg_no" placeholder="Admission ID" value="studentFields"  />
                    <span id="error_user_id" style="color: red;"><?php echo $error_user_id; ?></span>
                </div> -->
                

                <!-- Fields for Non-Teaching Faculty -->
                <!-- <div id="nonTeachingFacultyFields" style="display: none;">
                    <input type="text" autocomplete="off" name="reg_no" placeholder="ID Number"  />
                    <span id="error_id" style="color: red;"><?php echo $error_id; ?></span>
                </div> -->

                <!-- Fields for Teaching Faculty -->
                <div>
                  <input type="text" autocomplete="off" name="reg_no" placeholder="ID Number"   />
                    <span id="error_id" style="color: red;"  ><?php echo $error_id; ?></span>
                </div>

                <div id="teachingFacultyFields" style="display: none;">

                    <select name="department" id="department">
                        <option value="">Select Department</option>
                        <option value="DEPARTMENT OF COMPUTER SCIENCE">DEPARTMENT OF COMPUTER SCIENCE</option>
                        <option value="DEPARTMENT OF COMMERCE">DEPARTMENT OF COMMERCE</option>
                        <option value="DEPARTMENT OF MANAGEMENT STUDIES">DEPARTMENT OF MANAGEMENT STUDIES</option>
                        <option value="DEPARTMENT OF TOURISM STUDIES">DEPARTMENT OF TOURISM STUDIES</option>
                        <option value="DEPARTMENT OF ENGLISH">DEPARTMENT OF ENGLISH</option>
                        <option value="DEPARTMENT OF SOCIAL WORK">DEPARTMENT OF SOCIAL WORK</option>
                    </select>
                </div>
                <input type="file" required="required" name="user_image" id="user_image" class="form-control">
                <input type="tel" autocomplete="off" name="phone" placeholder="Phone" maxlength="10" oninput="if(this.value.length > 10) this.value = this.value.slice(0, 10);" required />
                <span id="error_phone" style="color: red;"><?php echo $error_phone; ?></span>

                <input type="password" autocomplete="off" name="password" placeholder="Password" required />
                <span id="error_password" style="color: red;"><?php echo $error_password; ?></span>

                <input type="password" autocomplete="off" name="cppassword" placeholder="Confirm Password" required />
                <span id="error_confirm_password" style="color: red;"><?php echo $error_confirm_password; ?></span>
            </div>

            <button type="submit">SIGN UP</button>
        </form>
    </div>

    <div class="form-container sign-in-container">
        <form method="post">
            <h1>Sign in</h1>
            <span>or use your account</span>
            <input type="hidden" name="action" value="login">
            <input type="text" autocomplete="off" name="username" placeholder="Username" />
            <input type="password" autocomplete="off" name="password" placeholder="Password" />
            <span id="error_general" style="color: red;"><?php echo $error_general; ?></span>
            <button type="submit">Sign In</button>
        </form>
    </div>

    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello, Friend!</h1>
                <p>Enter your personal details and start journey with us</p>
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>

<script src="../../assets/js/login.js"></script>
<script>
    function handleRoleChange(e) {
        console.log(e.target.value)
        const role = e.target.value;
       
        const additionalFields = document.getElementById("additionalFields");
        const studentFields = document.getElementById("studentFields");
        const registerId = document.getElementById("regid");
        const teachingFacultyFields = document.getElementById("teachingFacultyFields");

        if (role === "student") {
            teachingFacultyFields.style.display = "block";
            additionalFields.style.display = "block";
            studentFields.style.display = "block";
            // nonTeachingFacultyFields.style.display = "none";
            teachingFacultyFields.style.display = "none";
        } else if (role === "teaching_faculty"){
            teachingFacultyFields.style.display = "block";
            additionalFields.style.display = "block";
            studentFields.style.display = "none";
            // nonTeachingFacultyFields.style.display = "none";
        }else if(role === "non_teaching_faculty"){
            teachingFacultyFields.style.display = "block";
            additionalFields.style.display = "block";
            studentFields.style.display = "none";
            teachingFacultyFields.style.display = "none";

        }
  
}
    // Capitalize the first letter of input fields
    document.querySelectorAll('input[type="text"]').forEach(input => {
        input.addEventListener('input', function () {
            this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);
        });
    });
</script>
</body>
</html>


<?php


// Initialize error messages

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Initialize variables with default values
    $username = isset($_POST['username']) ? ucfirst(trim($_POST['username'])) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $action = isset($_POST['action']) ? trim($_POST['action']) : '';
    $user_image = isset($_FILES['user_image']['name']) ? $_FILES['user_image']['name'] : '';
    $user_image_tmp = isset($_FILES['user_image']['tmp_name']) ? $_FILES['user_image']['tmp_name'] : '';
    $role = isset($_POST['role']) ? trim($_POST['role']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $reg_no = isset($_POST['reg_no']) ? trim($_POST['reg_no']) : '';
    $confirm_password = isset($_POST['cppassword']) ? trim($_POST['cppassword']) : '';
    $class = isset($_POST['class']) ? trim($_POST['class']) : '';
    $department = isset($_POST['department']) ? trim($_POST['department']) : '';

    if ($action == 'login') {
        $sql = "SELECT * FROM user_table WHERE username=?";
        if ($stmt = $con->prepare($sql)) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    $_SESSION['username'] = $user['username'];
                    echo "<script>window.open('/$projectName','_self');</script>";
                    echo "<script>window.alert('Login successfully');</script>";
                    $_SESSION['loggedin'] = true; // Set logged-in status
                    exit();
                } else {
                    echo "<script>window.alert('Invalid password!');</script>";
                }
            } else {
                echo "<script>window.alert('Invalid username!');</script>";
            }
            $stmt->close();
        } else {
            $error_general = "Error preparing statement: " . $con->error;
        }
    } elseif ($action == 'register') {
        // Validate phone number
        if (empty($phone) || !preg_match('/^\d{10}$/', $phone)) {
            echo "<script>window.alert('Phone number must be exactly 10 digits');</script>";
        } else if ($password !== $confirm_password) {
            echo "<script>window.alert('Passwords do not match');</script>";
        } else {
            // Move uploaded file (uncomment if needed)
            move_uploaded_file($user_image_tmp, "../../uploads/images/users/$user_image");
            $hash_password = password_hash($password,PASSWORD_DEFAULT);
            $sql = "INSERT INTO user_table (username, phone, class, reg_no, role, department, image, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            if ($stmt = $con->prepare($sql)) {
                $stmt->bind_param("ssssssss", $username, $phone, $class, $reg_no, $role, $department, $user_image, $hash_password);
                if ($stmt->execute()) {
                    $_SESSION['username'] = $username;
                    echo "<script>window.alert('User added successfully');</script>";
                    echo "<script>window.open('/$projectName','_self');</script>";
                    exit();
                } else {
                    echo "<script>window.alert('Error: " . htmlspecialchars($stmt->error) . "');</script>";
                }
                $stmt->close(); // Close the statement
            } else {
                echo "<script>window.alert('SQL statement preparation failed');</script>";
            }
        }
    } // Make sure this closing brace matches the opening 'if'
    
    }
?>
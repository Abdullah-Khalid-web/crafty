<?php include 'header.php' ?>



<?php
if (isset($_POST['save_changes'])) {
    $user_id = $_SESSION['id'];
    $user_fname = $_POST['user_fname'];
    $user_lname = $_POST['user_lname'];
    $user_email = $_POST['user_email'];
    $user_phoneno = $_POST['user_phoneno'];
    $user_address = $_POST['user_address'];

    // Update user profile
    // $sql = "UPDATE user_reg 
    //         SET user_fname = '$user_fname', user_lname = '$user_lname',user_email = '$user_email', user_address = '$user_address', user_phoneno = '$user_phoneno'
    //         WHERE user_id = '$user_id'";

$sql = "UPDATE users_reg 
SET user_fname = '$user_fname', user_lname = '$user_lname', user_email = '$user_email', user_address = '$user_address', user_phoneno = '$user_phoneno'
WHERE user_id = '$user_id'";



if (mysqli_query($con, $sql)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => mysqli_error($con)]);
}

}

?>

    <?php
    $username = $_SESSION['fname'];
    $user_id = $_SESSION['id'];
    
    
    $sql = "SELECT * FROM `users_reg` where user_id ='$user_id' ";
    $result = mysqli_query($con, $sql);
    $row_data = mysqli_fetch_assoc($result);

    $user_id = $row_data['user_id'];
    $user_fname = $row_data['user_fname'];
    $user_lname = $row_data['user_lname'];
    $user_email = $row_data['user_email'];
    $user_phoneno = $row_data['user_phoneno'];
    $user_address = $row_data['user_address'];
    $user_password = $row_data['user_password'];






    echo '
    <div class="container mt-4">
        <h1 class="text-center mt-3 text-sec">User Profile</h1>
        <!-- form -->
        <form class="form-outline mb-4 w-100" action="" method="post" enctype="multipart/form-data">

            <div class="form-outline mb-4 w-100 m-auto">
                <label for="user_name" class="form-label"> '
                    . $user_fname . '`s ' . $user_lname . '<br>'
                    . $user_fname . '`s ' . '  ID : ' . $user_id . '<br>'
                    . $user_fname . '`s email : ' . $user_email . '<br>'
                    . $user_fname . '`s Phone no : ' . $user_phoneno . '<br>'
                    . $user_fname . '`s Address : ' . $user_address .
                '</label>
            </div>
            <h2 class="text-center text-secondary"  >Edit Your Profile</h2>
            <div class="form-outline mb-4 w-100 m-auto">
                <label for="user_fname" class="form-label">First Name : <span class="red">*</span></label>
                <input type="text" name="user_fname" id="user_fname" class="form-control" placeholder="First Name" value="' . $user_fname . '"
                    autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-100 m-auto">
                <label for="user_lname" class="form-label">Last Name : <span class="red">*</span></label>
                <input type="text" name="user_lname" id="user_lname" class="form-control" placeholder="Last Name" value="' . $user_lname . '"
                    autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-100 m-auto">
                <label for="user_email" class="form-label">Email : <span class="red">*</span></label>
                <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Email" value="' . $user_email . '"
                    autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-100 m-auto">
                <label for="user_phoneno" class="form-label">Phone no : <span class="red">*</span></label>
                <input type="text" name="user_phoneno" id="user_phoneno" class="form-control" placeholder="User Phone no" value="' . $user_phoneno . '"
                    autocomplete="off" required="required">
            </div>
            
            <div class="form-outline mb-4 w-100 m-auto">
                <label for="user_address" class="form-label">Address : <span class="red">*</span></label>
                <input type="text" name="user_address" id="user_address" class="form-control" placeholder="User Address" value="' . $user_address . '"
                    autocomplete="off" required="required">
            </div>
            
            <div class="form-outline mb-4 w-100 m-auto">
                <button style="width: 100%;" type="submit" name="save_changes" class="btn w-10 mx-1 b-2 btn btn-warning ">Save Changes</button>

            </div>



        </form>

    </div>
    
    ';

    ?>

<?php include 'footer.php' ?>
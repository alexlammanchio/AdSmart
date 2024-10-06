<?php include('partials/menu.php'); ?>

<div class='small-container cart-page'>
    <div class='reg'>
        <h1>Add AdSmart Content</h1>
        <br><br>
        <?php 
            if(isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']); // removing session
            }
            
            if(isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']); // removing session
            }
        ?>
        <br><br>
        <!-- Add Content form starts -->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-full">
                <tbody>
                    <tr>
                        <td>Content Name:</td>
                        <td>
                            <input type="text" name="name" placeholder="Enter content name">
                        </td>
                    </tr>
                    <tr>
                        <td>Content Description:</td>
                        <td>
                           <textarea  id ="myTextarea" name="content_description"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Select Image:</td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>
                    <tr>
                        <td>Created By:</td>
                        <td>
                            <input type="text" name="created_username" placeholder="Enter username">
                        </td>
                    </tr>
                    <tr>
                        <td>Active:</td>
                        <td>
                            <input type="radio" name="active" value="Yes"> Yes
                            <input type="radio" name="active" value="No"> No
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="button">
                                <input type="submit" name="submit" value="Add Content" class="btn" style="height:50px; font-size:25px;">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        
        <?php 
            // Check whether the submit button is clicked
            if(isset($_POST['submit'])) {
                $name = $_POST['name'];
                $content_description = isset($_POST['content_description']) ? $_POST['content_description'] : "";
                $created_username = $_POST['created_username'];
                $active = isset($_POST['active']) ? $_POST['active'] : "No";

                // Check whether the image is selected and set the value for image name accordingly
                if(isset($_FILES['image']['name'])) {
                    $image_name = $_FILES['image']['name'];
                    if($image_name != "") {
                        $ext = end(explode('.', $image_name));
                        $image_name = "AdSmart_Content_" . rand(000, 999) . '.' . $ext;

                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "../images/content/" . $image_name;

                        // Upload the image
                        $upload = move_uploaded_file($source_path, $destination_path);
                        if(!$upload) {
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                            header('location:' . ADMIN . 'admin/add-content.php');
                            die();
                        }
                    }
                } else {
                    $image_name = "";
                }

                $created_dt = date('Y-m-d H:i:s');
                $sql = "INSERT INTO content SET 
                        name = '$name', 
                        image_name = '$image_name', 
                        content_description = '$content_description', 
                        created_date = '$created_dt', 
                        created_username = '$created_username', 
                        active = '$active'";

                $res = mysqli_query($conn, $sql);
                if($res == true) {
                    $_SESSION['add'] = "<div class='success'>Content Added Successfully.</div>";
                    header('location:' . ADMIN . 'admin/manage-content.php');
                } else {
                    $_SESSION['add'] = "<div class='error'>Failed to Add Content.</div>";
                    header('location:' . ADMIN . 'admin/add-content.php');
                }
            }
        ?>
        <!-- Add Content form ends -->
    </div>
</div>

<?php include('partials/footer.php'); ?>
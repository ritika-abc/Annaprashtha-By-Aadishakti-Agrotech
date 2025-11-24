<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet"
    <style>
body {
background: #f4f4f4;
font-family: 'Poppins', sans-serif;
padding: 40px;
}
.editor-toolbar button {
border: none;
background: #fff;
border: 1px solid #ddd;
margin-right: 5px;
padding: 5px 10px;
border-radius: 4px;
font-size: 16px;
cursor: pointer;
}
.editor-toolbar button:hover {
background: #eee;
}
#editor {
min-height: 250px;
border: 1px solid #ccc;
padding: 15px;
border-radius: 5px;
background: #fff;
}
</style>

<?php


include "config.php";


?>
<?php

//  update

if (isset($_POST['submit'])) {

    if (isset($_SESSION["user_email"])) {
        $user_email = $_SESSION["user_email"];
    }
    $about_company_content = $_POST['about_company'];
    $detail_box = $_POST['detail_box'];

    $sql1 = "UPDATE `user` SET `about_company`='$about_company_content',`detail_box`='$detail_box'  WHERE `user_email`='$user_email'";
    $query1 = mysqli_query($con, $sql1) or die("dgdgdfgdfg");
}
?>
<?php


include_once "include1/header.php";


?>







<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Dashboard </h2>

                </div>

            </div>
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Company Details</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">About Us</button>
            </li>
            <!-- <li class="nav-item" role="presentation">
                 <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Add Banner</button>
             </li> -->
            <!-- <li class="nav-item" role="presentation">
                 <button class="   btn btn-success"   type="submit"   >Submit</button>
             </li> -->
        </ul>


        <div class="container-fluid my-3">
            <div class="row   graph">
                <div class="col-lg-12 ">
                    <div class="dash_blog">
                        <div class="dash_blog_inner">
                            <div class="task_list_main">

                                <?php
                                if (isset($_SESSION["user_email"])) {
                                    $user_email = $_SESSION["user_email"];
                                }

                                $sel = "SELECT `free-listing-product`.product_name, `free-listing-product`.user_email, `free-listing-product`.product_description, user.user_id, user.user_name ,user.company_name,user.gst,user.iec_code,user.image,user.company_address,user.type,user.about_company,user.user_phone,user.cat_access,user.detail_box
                                    FROM `free-listing-product`
                                    INNER JOIN `user` ON `free-listing-product`.user_email = user.user_email
                                    WHERE `free-listing-product`.user_email = '$user_email'";

                                $q = mysqli_query($con, $sel);

                                // Fetch the first row to display the user's name only once
                                if ($row = mysqli_fetch_array($q)) {
                                    $company_name = $row['company_name'];
                                    $detail_box = $row['detail_box'];
                                    $url = strtolower(str_replace(' ', '+', $company_name));
                                ?>
                                    <div class="border my-5">


                                        <form action="" method="post" enctype="multipart/form-data" onsubmit="return prepareForm();">
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-lg-6 ">
                                                                <table class="table  table-bordered table-light">
                                                                    <tr>
                                                                        <th>Name of Founder</th>
                                                                        <td class="text-capitalize"><?php echo $row['user_name'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Contact Number </th>
                                                                        <td class="text-capitalize"><?php echo $row['user_phone'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Company Name</th>
                                                                        <td><?php echo $row['company_name'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>GST</th>
                                                                        <td><?php echo $row['gst'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>IEC Code</th>
                                                                        <td><?php echo $row['iec_code'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Logo</th>
                                                                        <td> <img style="object-fit: cover;" src="<?php echo $row['image'] ?>" class="border" height="100px" width="100px" alt=""> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Address</th>
                                                                        <td class="text-capitalize"><?php echo $row['company_address'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Business Type</th>
                                                                        <td class="text-capitalize"><?php echo $row['type'] ?></td>
                                                                    </tr>
                                                                    <tr>




                                                                        <th>Your Catalogue</th>
                                                                        <td class="text-capitalize"><a target="_blank" class="text-danger btn btn-light <?php echo ($row['cat_access'] == '0') ? 'disabled  ' : '  '; ?>" href="https://growindiaexport.com/catalogue/<?php echo  $url ?>">view catalogue </a>
                                                                            <p class="text-dark">We will verify the product details and images before activating your catalog.</p>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php
                                                    // Now, output each product_name (loop over the remaining rows)
                                                    // do {

                                                    ?>
                                                    <!-- <div class="shasow-lg border">

                                                         <p><?php //echo $row['product_name']; 
                                                            ?></p>
                                                         <p><?php //echo $row['product_description']; 
                                                            ?></p>
                                                     </div> -->
                                                    <?php
                                                    // } while ($row = mysqli_fetch_array($q)); // Continue looping for remaining rows
                                                    ?>




                                                </div>
                                                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">

                                                    <textarea id="summernote" name="about_company">   <?php echo $about_company_content ?> </textarea>
                                                    <input type="submit" name="submit" class="btn btn-success">



                                                    <div class="mb-2">
                                                        <p>url </p>
                                                        <label class="form-label">detail_box</label>
                                                        <div class="editor-toolbar mb-2">
                                                            <button type="button" onclick="formatDoc('bold')"><i class='bx bx-bold'></i></button>
                                                            <button type="button" onclick="formatDoc('italic')"><i class='bx bx-italic'></i></button>
                                                            <button type="button" onclick="formatDoc('underline')"><i class='bx bx-underline'></i></button>
                                                            <button type="button" onclick="formatDoc('strikeThrough')"><i class='bx bx-strikethrough'></i></button>
                                                            <button type="button" onclick="formatDoc('insertUnorderedList')"><i class='bx bx-list-ul'></i></button>
                                                            <button type="button" onclick="formatDoc('insertOrderedList')"><i class='bx bx-list-ol'></i></button>
                                                            <button type="button" onclick="addLink()"><i class='bx bx-link'></i></button>
                                                            <button type="button" onclick="formatDoc('justifyLeft')"><i class='bx bx-align-left'></i></button>
                                                            <button type="button" onclick="formatDoc('justifyCenter')"><i class='bx bx-align-middle'></i></button>
                                                            <button type="button" onclick="formatDoc('justifyRight')"><i class='bx bx-align-right'></i></button>
                                                        </div>
                                                        <div id="editor" contenteditable="true"></div>
                                                    </div>

                                                    <!-- Hidden textarea to hold formatted content -->
                                                    <textarea name="detail_box" id="hiddenContent" style="display: block;"> <?php echo $detail_box ?></textarea>
                                                    <input type="submit" name="submit" class="btn btn-success">
                                                </div>
                                                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                                                    <div class="contaoner">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mx-3">
                                                                    <h6>Add Banner</h6>
                                                                    <input type="file" name="banner[]" multiple accept="image/*" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">4...</div>
                                            </div>
                                        </form>

                                        <!-- Display each product_name in a loop -->

                                    </div>
                                <?php
                                }
                                ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {

    $user_email = $_SESSION["user_email"];
    $about_company_content = $_POST['about_company'];

    // Prepare image fields
    $image_names = [];
    $image_fields = ['item1', 'item2', 'item3'];
    $upload_success = true;

    foreach ($image_fields as $field) {
        if (isset($_FILES[$field]) && $_FILES[$field]['error'] == 0) {
            $filename = time() . basename($_FILES[$field]['name']);
            $tmp_name = $_FILES[$field]['tmp_name'];
            $destination = "logo/" . $filename;

            if (move_uploaded_file($tmp_name, $destination)) {
                $image_names[$field] = $filename;
            } else {
                $upload_success = false;
                break;
            }
        } else {
            $image_names[$field] = null; // No file uploaded or error
        }
    }

    if ($upload_success) {
        // Build SQL query dynamically
        $sql = "UPDATE `user` SET `about_company` = '$about_company_content'";

        if ($image_names['item1']) $sql .= ", `item1` = '{$image_names['item1']}'";
        if ($image_names['item2']) $sql .= ", `item2` = '{$image_names['item2']}'";
        if ($image_names['item3']) $sql .= ", `item3` = '{$image_names['item3']}'";

        $sql .= " WHERE `user_email` = '$user_email'";

        $query = mysqli_query($con, $sql) or die("Query error");
    } else {
        echo "Image upload failed.";
    }
}
?>
<script>
    $('#summernote').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
    });

    document.addEventListener('keydown', function(e) {
        // Check if the key combination is Ctrl + V (keyCode for V is 86)
        if (e.ctrlKey && e.keyCode === 86) {
            e.preventDefault(); // Prevent the default paste action
            alert('Paste functionality is disabled!');
        }
    });
</script>
<script>
    $('#summernote1').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
    });

    document.addEventListener('keydown', function(e) {
        // Check if the key combination is Ctrl + V (keyCode for V is 86)
        if (e.ctrlKey && e.keyCode === 86) {
            e.preventDefault(); // Prevent the default paste action
            alert('Paste functionality is disabled!');
        }
    });
</script>




<script>
    function formatDoc(command, value = null) {
        document.execCommand(command, false, value);
    }

    function addLink() {
        const url = prompt("Enter the link URL:");
        if (url) formatDoc("createLink", url);
    }

    function prepareForm() {
        const editorHtml = document.getElementById("editor").innerHTML;
        document.getElementById("hiddenContent").value = editorHtml;
        return true;
    }
</script>
<?php
include "include1/footer.php";
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
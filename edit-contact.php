<?php
session_start();
include('includes/header.php');
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Edit & Update Contacts
                        <a href="index.php" class="btn btn-danger float-end"> BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?php
                    include('dbcon.php');

                    if (isset($_GET['id'])) {
                        $key_child = $_GET['id'];

                        $ref_table = 'Contacts';
                        $getdata = $database->getReference($ref_table)->getChild($key_child)->getValue();

                        if ($getdata !== null && is_array($getdata)) {
                            ?>
                            <form action="code.php" method="POST">
                                <input type="hidden" name="key" value="<?= $key_child; ?>">
                                <div class="form-group mb-3">
                                    <label for="">First Name</label>
                                    <input type="text" name="first_name" value="<?= $getdata['fname']; ?>" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Last Name</label>
                                    <input type="text" name="last_name" value="<?= $getdata['lname']; ?>" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Email Address</label>
                                    <input type="email" name="email" value="<?= $getdata['email']; ?>" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Phone Number</label>
                                    <input type="number" name="phone" value="<?= $getdata['phone']; ?>" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" name="update_contact" class="btn btn-primary">Update Contact</button>
                                </div>
                            </form>
                            <?php
                        } else {
                            $_SESSION['status'] = "Invalid Id or Data not Found";
                            header('Location: index.php');
                            exit();
                        }
                    } else {
                        $_SESSION['status'] = "No ID Found";
                        header('Location: index.php');
                        exit();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>

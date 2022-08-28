<?php include('inc/header.php');?> 
<div class="container">
        <div class="row">
            <div class="col-12 ">
                <h1 class="text-center display-4 border my-5 p-2"> Change Password</h1>
            </div>
            <div class="col-sm-6 mx-auto">
                <div class="border p-5 my-3">
<!--change password Form Login-->
                    <form action="handler/change_password.php" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="current_password" placeholder="Current Password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="new_password" placeholder="New Password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm New Password">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-block btn-primary" name="submit"  value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!--change password Form Login-->
<?php include('inc/footer.php');?>

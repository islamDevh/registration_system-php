<?php  include('inc/header.php');  ?> 
<!--loginطول ماهو عامل registerاليوزر مينفعش تتعرضله صفحة ال-->
<?php if(isset($_SESSION['user_name']))//if user here
header("location:index.php"); //back him to index
?>  
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <h1 class="text-center display-4 border my-5 p-2"> Register</h1>
            </div>
<!--show massage succes-->
            <div class="col-sm-6 mx-auto">
            <?php if(isset($_SESSION['sucsses_insert'])): ?> 
                    <h5 class="bg-success text-center p-3"> <?php echo $_SESSION['sucsses_insert']; ?>  </h5>
<!-- hide it after reload-->
            <?php unset($_SESSION['sucsses_insert']); ?> 
            <?php  endif; ?>
            
                <div class="border p-5 my-3">
<!--First Form register-->
                    <form action="handler/register.php" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="mobile" placeholder="Your Mobile">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Your Password">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-block btn-primary" name="submit"  value="register">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!--First Form register-->
<?php  include('inc/footer.php');  ?> 

<h2 class="title">Edit Profile</h2>
<form method="POST" class="edit">
    <input type="hidden" name="edit" value="edit">
    <div class="container">
        <div class="mb-3 row justify-content-center">
            <label for="username" class="col-sm-2 col-form-label">User Name</label>
            <div class="col-sm-10 col-md-5">
                <input type="text" class="form-control" id="username" autocomplete="off" name="username"
                value="<?= $_SESSION['data']['user_name'] ?>">
            </div>
        </div>

        <div class="mb-3 row justify-content-center">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10 col-md-5">
                <input type="email" class="form-control" id="email" name="email"
                value="<?= $_SESSION['data']['email'] ?>">
            </div>
        </div>

        <div class="mb-3 row justify-content-center">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10 col-md-5">
                <input type="password" class="form-control" id="password" name="password" autocomplete="new-password">
            </div>
        </div>
        
        <div class="mb-3 row justify-content-center">
            <label for="fullName" class="col-sm-2 col-form-label">Full Name</label>
            <div class="col-sm-10 col-md-5">
                <input type="text" class="form-control" id="fullName" autocomplete="off" name="fullname"
                value="<?= $_SESSION['data']['full_name'] ?>">
            </div>
        </div>

        <div class="mb-3 row justify-content-center">
            <div class="col-sm-2"></div>
            <div class="col-sm-10 col-md-5">
                <input type="submit" class="btn btn-primary btn-md edit-btn"  value="Save">
            </div>
        </div>

    </div>
</form>
<!-- Add member Form -->
<form method="POST" class="add">
    <div class="container">
        <div class="mb-3 row justify-content-center">
            <div class="col-sm-12">
                <h2 class="title">Add New Member</h2> 
            </div>
        </div>
        <input type="hidden" name="add" value="add">
        <div class="mb-3 row justify-content-center">
            <label for="username" class="col-sm-2 col-form-label">User Name</label>
            <div class="col-sm-10 col-md-5">
                <input type="text" class="form-control" id="username" autocomplete="off" name="user_name">
            </div>
        </div>

        <div class="mb-3 row justify-content-center">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10 col-md-5">
                <input type="email" class="form-control" id="email" name="email">
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
                <input type="text" class="form-control" id="fullName" autocomplete="off" name="full_name">
            </div>
        </div>

        <div class="mb-3 row justify-content-center">
            <div class="col-sm-2"></div>
            <div class="col-sm-10 col-md-5">
                <input type="submit" class="btn btn-primary btn-md add-btn"  value="Save">
            </div>
        </div>

    </div>
</form> <!-- End Add Member Form -->

<!-- Edit Member Form -->

<!-- view Member in table -->
<div class="container">
    <table class="table table-dark table-hover">
        <thead>
            <th>ID</th>
            <th>User Name</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Register Date</th>
            <th>Controls</th>
        </thead>
        <tbody>
            <?php 
                foreach($_SESSION['members_data'] as $order=>$row){
                    $class = $order%2 == 0 ? 'table-active' : '';
            ?>
                    <tr class="<?= $class ?>">
                    <?php foreach($row as $key=>$val ){ 
                        $idClass = $key === 'id' ? 'id' : ''
                    ?>
                        <?php if($key === 'register_status' ) continue ;?>
                        
                        <td class="<?= $idClass ?>" ><?= $val ?></td>
            <?php } ?>
                <td>
                    <button class="btn btn-success edit-member">Edit</button>
                    <button class="btn btn-danger delete-member">Delete</button>
                    <?php if($key === 'register_status' && $val == 0) {?>
                        <button class="btn btn-primary activate-member">Activate</button>
                    <?php } ?>    
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <button class="btn btn-primary add-member">
        <i class="fa-solid fa-plus"></i>
        Add New Member
    </button>
</div> <!-- End view Member Form -->
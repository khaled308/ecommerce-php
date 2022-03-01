<!-- Add Category Form -->
<div class="container">
    <button class="btn btn-primary add-category-btn">Add Category</button>
</div>
<form method="POST" class="add-category form-category-hidden">
    <div class="container">
        <div class="mb-3 row justify-content-center">
            <div class="col-sm-12">
                <h2 class="title">Add New Category</h2> 
            </div>
        </div>

        <input type="hidden" name="category" value="add" class="category-form-type">
        <div class="mb-3 row justify-content-center">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10 col-md-5">
                <input type="text" class="form-control category-name" id="name" autocomplete="off" name="name">
            </div>
        </div>

        <div class="mb-3 row justify-content-center">
            <label class="col-sm-2 col-form-label">Visibility</label>
            <div class="col-sm-10 col-md-5">
                <div class="row">
                    <div class="col">
                        <label for="yes_v">Yes</label>
                        <input type="radio" name="visibility" id="yes_v" value="1" class="category-visibility">
                    </div>
                    <div class="col">
                        <label for="no_v">No</label>
                        <input type="radio" name="visibility" id="no_v" value="0" class="category-visibility">
                    </div>
                </div>

            </div>
        </div>

        <div class="mb-3 row justify-content-center">
            <label class="col-sm-2 col-form-label">Commenting</label>
            <div class="col-sm-10 col-md-5">
                <div class="row">
                    <div class="col">
                        <label for="yes_c">Yes</label>
                        <input type="radio" name="allow_comment" id="yes_c" value="1" class="comments">
                    </div>
                    <div class="col">
                        <label for="no_c">No</label>
                        <input type="radio" name="allow_comment" id="no_c" value="0" class="comments">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mb-3 row justify-content-center">
            <label class="col-sm-2 col-form-label">AD</label>
            <div class="col-sm-10 col-md-5">
                <div class="row">
                    <div class="col">
                        <label for="yes_a">Yes</label>
                        <input type="radio" name="allow_ads" id="yes_a" value="1" class="ads">
                    </div>
                    <div class="col">
                        <label for="no_a">No</label>
                        <input type="radio" name="allow_ads" id="no_a" value="0" class="ads">
                    </div>
                </div>

            </div>
        </div>

        <div class="mb-3 row justify-content-center">
            <label for="fullName" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10 col-md-5">
                <textarea name="description" id="" cols="49" rows="10" class="form-control category-description"></textarea>
            </div>
        </div>

        <div class="mb-3 row justify-content-center">
            <div class="col-sm-2"></div>
            <div class="col-sm-10 col-md-5">
                <input type="submit" class="btn btn-primary btn-md save-category-btn"  value="Save">
            </div>
        </div>

    </div>
</form> <!-- End Add Category Form -->

<div class="container category-wrapper">
    <h2 class="text-center mb-5">Manage Categories</h2>
    <div class="category-manage">
        <?php foreach($_SESSION['categories_data'] as $row){
            ?>
                    <div class="card category" data-id="<?= $row['id'] ?>">
                        <div class="card-body text-center">
                            <h2><?= ucfirst($row['name']) ?></h2>
                            <p><?= $row['description'] ?></p>
                            <div class="other">
                                <span><?=$row['visibility'] == 0 ? 'hidden' : 'visible' ?></span>
                                <span><?= $row['allow_comment'] == 0 ? 'comment no' : 'comment yes' ?></span>
                                <span><?= $row['allow_ads'] == 0 ? 'Ads no' : 'Ads yes' ?></span>
                            </div>
                            <div class="btns">
                                <button class="btn btn-primary edit-category">Edit</button>
                                <button class="btn btn-danger delete-category">Delete</button>
                            </div>
                        </div>
                    </div>
            <?php } ?>
    </div>
</div>

<form action="" method="post">
    <div class="form-group">
        <label for="cat-title">Edit Category</label>
        <input value="<?php if(isset($cat_title)){echo $cat_title;}?>" class="form-control" type="text" name="cat_title">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update" value="Edit Category">
    </div>
</form>
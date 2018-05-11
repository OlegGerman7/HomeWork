<?php require_once'functions.php'; ?>
<?php require_once'header_form.php'; ?> 
<form method="POST" action="delete.php">
    <h3>Delete post</h3>
    <div class="form-group">
        
<label>Id post</label></br>
<input type="text" cols='50' name="id_post"></br></br>  

    </div>
        <button name="delete" type="submit" value="Submit" class="btn btn-danger">Delete post</button></br>
</form>

<?php if (isset($_POST['delete'])){
    deletePost($_POST['id_post']);
}?>

    </body>
</html>










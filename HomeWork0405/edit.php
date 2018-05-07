<?php require_once'functions.php'; ?>
<?php require_once'header_form.php'; ?> 
<form method="POST" action="edit.php">
    <h3>Edit post</h3>
    <div class="form-group">
        <label>Title</label></br>
            <input type="text" cols='50' name="title_edit" requaired ></br></br>
        
        <label>Text</label></br>
            <textarea  name="post_edit" cols='50' rows='7' ></textarea></br>

<label>Id post</label></br>
<input type="text" cols='50' name="id_post"></br></br>  

    </div>
        <button name="edit" type="submit" value="Submit" class="btn btn-warning">Edit post</button></br>
</form>

<?php if (isset($_POST['edit'])){
    editPost($_POST, $_POST['id_post']);
}?>

    </body>
</html>










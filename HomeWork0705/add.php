<?php require_once'functions.php'; ?>
<?php require_once'header_form.php'; ?> 
<form method="POST" action="add.php">
    <h3>Add post</h3>
    <div class="form-group">
        <label>Title</label></br>
            <input type="text" cols='50' name="title_add" requaired ></br></br>
        <label>SubTitle</label></br>
            <input type="text" cols='50' name="sub_title_add" requaired ></br></br>
        <label>Text</label></br>
            <textarea  name="post_add" cols='50' rows='7' ></textarea></br>

<input type="hidden" name="data_add" value="<?php echo date("Y-m-d H:i:s"); ?>"></br>
<label>Url</label></br>
<input type="text" cols='50' name="url_add"></br></br>  

    </div>
        <button name="add" type="submit" value="Submit" class="btn btn-success">Add post</button></br>
</form>

<?php if (isset($_POST['add'])){
    $login = 'German_login';
    addPost($_POST);
}?>

    </body>
</html>










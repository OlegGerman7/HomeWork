<?php
session_start();

define(LOGIN, login);
define(PASSWORD, password);

function login($post){
	if (isset($post['login']) && isset($post['password'])){
		if ($post['login'] == LOGIN && md5($post['password']) == md5(PASSWORD)){
			$check = rtue;
		}
	}

	if ($check){
		header('Location: index.php');
		$_SESSION['access'] = true;
		$_SESSION['login'] = $post['login'];
	} else {
		header('Location: access_denied.php');
		$_SESSION['access'] = false;
	}
}

function viewTitle()
{
    $arr = explode('.', $_SERVER['REQUEST_URI']);
    $str = substr($arr[0], 9);
    if ($str) {
        echo 'Custom Blog - '. ucfirst($str);
    } else {
        echo 'Custom Blog';
    }
}

function viewPost(){

	$title = array('Post1', 'Post2', 'Post3');
	$post = array('Text from post1','Text from post2','Text from post3');

	for ($i = 0; $i < 3 ; $i++) { 
		$res[$i] = array(
				'title' => $title[$i],
				'post' => $post[$i]
			); 
		}
	return $res;

}


// function viewTitle(){
// 	$arr = array(
//        '/' => 'Custom Blog',
//        '/about.php' => 'Custom Blog - About',
//        '/post.php' => 'Custom Blog - Post',
//        '/contact.php' => 'Custom Blog - Contact',
//    );

//    if (isset($arr[$_SERVER['REQUEST_URI']])) {
//        echo $arr[$_SERVER['REQUEST_URI']];
//    } else {
//        echo 'Custom Blog';
//    }

// }

// function view(){
// 	echo "<pre>";
// 	print_r($_SERVER);
// 	echo "</pre>";
// 	$a = '/lesson8/index.php';
// 	echo substr("$a", 9);
// 	echo '<br>';
// 	$b = 'ftjnlfabcd';
// 	$c = 'fabc';
// 	echo strpos($b, $c);
// }



/* DB */
function connectDb(){
	try{
		$dbh = new PDO('mysql:host=localhost;dbname=custom_blog;charset=utf8','root','');
		return $dbh;
	} catch (PDOException $e){
		print "Error!: " . $e->getMessage() . "<br/>";
	    return false;
	}
}



function getArticles(){
	$db = connectDb();
	if ($db){
		$sql = "
			SELECT *
			FROM articles
			";
	return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	}
}


function getAuthor($id){
	$db = connectDb();
	if ($db){
		$sql = "
			SELECT *
			FROM users
			WHERE id=$id
		";
	return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	}

}


function insertArticle($title, $text){
	$db = connectDb();
	if ($db){
		$sql = "INSERT INTO articles(title, content) VALUES ( :title, :content)";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':title', $title, PDO::PARAM_STR);
		$stmt->bindParam(':content', $text, PDO::PARAM_STR);
		$stmt->execute();
	}
}


function deleteArticle($id)
{
    $db = connectDb();
    if ($db) {
        $sql = "DELETE FROM articles WHERE id=$id";
        return $db->prepare($sql)->execute();
    }
    return false;
}


// function insertUser($userData){
// 	$db = connectDb();
// 	if ($db) {
// 		$password = md5($userData['password']);
// 		$sql = "INSERT INTO users(name, last_name, login, email, password)
// 		VALUES (:name, :lastName, :login, :email, :password)";

// 		$stmt = $db->prepare($sql);

// 		$stmt->bindParam(':name', $userData['firstName'], PDO::PARAM_STR);
// 		$stmt->bindParam(':lastName', $userData['lastName'], PDO::PARAM_STR);
// 		$stmt->bindParam(':login', $userData['login'], PDO::PARAM_STR);
// 		$stmt->bindParam(':email', $userData['email'], PDO::PARAM_STR);
// 		$stmt->bindParam(':password', $password, PDO::PARAM_STR);
// 		return $stmt->execute();
// 			}
// }

function insertUser($userData){
	$db = connectDb();
	if ($db){
		$password = md5($userData['password']);
		$sql = "INSERT INTO users (name, last_name, login, email, password)
				VALUES(:name, :last_name, :login, :email, :password)";
		$stmt= $db->prepare($sql);
		$stmt->bindParam(':name', $userData['firstName'], PDO::PARAM_STR);
		$stmt->bindParam(':last_name', $userData['lastName'], PDO::PARAM_STR);
		$stmt->bindParam(':login', $userData['login'], PDO::PARAM_STR);
		$stmt->bindParam(':email', $userData['email'], PDO::PARAM_STR);
		$stmt->bindParam(':password', $password, PDO::PARAM_STR);
		return $stmt->execute();
			}
}




function registerUser(array $userData){
	if ($userData['password'] !== $userData['passwordConfirm']){
		$_SESSION['error_message'] = 'Inputed password not confirm!';
		return;
	}

	if (!isset($userData['login']) || empty($userData['login'])){
		$_SESSION['error_message'] = 'Login error!';
		return;
	}
	if (!isset($userData['email']) || empty($userData['email'])){
		$_SESSION['error_message'] = 'Error email!';
		return;
	}

	
	 if (insertUser($userData)) {
        $_SESSION['error_message'] = false;
    } else {
        $_SESSION['error_message'] = 'Register user not complete';
    }

}


function getErrorMessage()
{
    return isset($_SESSION['error_message']) ? $_SESSION['error_message'] : false;
}


/* Authorization */ 

function authorization(array $userData){
	$db = connectDb();
	if($db){
	$sql = "SELECT login, password FROM users";
	$res = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	}

	if ($res){
		$password = md5($userData['password']);
		foreach ($res as $key => $value) {
			
			if ($value['login'] == $userData['login'] && $value['password'] == $password){
				$_SESSION['acces'] = true;
				$_SESSION['login'] = $userData['login'];
				$flag = true;
				header('Location:post.php');
				exit;
			} 
		}
		
	}
}
?>
<?php
//ADMINKA
	//Add post
function addPost(array$add_post, $login){
	$db = connectDb();
	if ($db){
		$sql = "SELECT id FROM users WHERE login = $login";
		$stm = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
		echo $stm['id'];
		

		$sql = "INSERT INTO articles (title, sub_title, content, created_at, url, author)
				VALUES(:title, :sub_title, :content, :data, :url, :author)";

		$stmt= $db->prepare($sql);
		$stmt->bindParam(':title', $add_post['title_add'], PDO::PARAM_STR);
		$stmt->bindParam(':sub_title', $add_post['sub_title_add'], PDO::PARAM_STR);
		$stmt->bindParam(':content', $add_post['post_add'], PDO::PARAM_STR);
		$stmt->bindParam(':data', $add_post['data_add'], PDO::PARAM_STR);
		$stmt->bindParam(':url', $add_post['url_add'], PDO::PARAM_STR);
		$stmt->bindParam(':author', $stm['id'], PDO::PARAM_STR);
		return $stmt->execute();
			}
}

function editPost(array$editPost, $id){

    $db = connectDb();
    if ($db) {
        $sql = "UPDATE articles 
              SET title = '" . $editPost['title_edit'] . "', content = '" . $editPost['post_edit'] . "' 
              WHERE id = $id";
        return $db->prepare($sql)->execute();
    }
    return false;
}

function deletePost($id)
{
    $db = connectDb();
    if ($db) {
        $sql = "DELETE FROM articles WHERE id=$id";
        return $db->prepare($sql)->execute();
    }
    return false;
}
?>

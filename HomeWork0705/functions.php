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

function getArticle($url){
	$db = connectDb();
	if ($db){
		$sql = "
			SELECT *
			FROM articles
			WHERE url='$url'
			";
	return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	}
}


function getAuthor($login){
	$db = connectDb();
	if ($db){
		$sql = "
			SELECT *
			FROM users
			WHERE login='$login'
		";
	return $db->query($sql)->fetch(PDO::FETCH_ASSOC);
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


function insertArticle($userData)
{
    $db = connectDb();
    if ($db) {
        $authorId = null;
        if ($_SESSION['user_login']) {
            $authorId = getAuthor($_SESSION['user_login']);
        } else {
            return;
        }
        $sql = "INSERT INTO articles(title, sub_title, content, created_at, author, url)
                  VALUES ( :title, :subTitle,  :content, :createdAt, :authorId, :url)";
        $stmt = $db->prepare($sql);
        $datetime = new DateTime();
        $createdAt = $datetime->format('Y-m-d H:i:s');
        $url = getUrl($userData['title']);
        $stmt->bindParam(':title', $userData['title'], PDO::PARAM_STR);
        $stmt->bindParam(':subTitle', $userData['sub_title'], PDO::PARAM_STR);
        $stmt->bindParam(':content', $userData['content'], PDO::PARAM_STR);
        $stmt->bindParam(':createdAt', $createdAt, PDO::PARAM_STR);
        $stmt->bindParam(':authorId', $authorId, PDO::PARAM_STR);
        $stmt->bindParam(':url', $url, PDO::PARAM_STR);
        $stmt->execute();
        }
}


function getUrl($str)
{
    $articleUrl = str_replace(' ', '-', $str);
    $articleUrl = transliteration($articleUrl);
    $articleIsset = getArticleByUrl($articleUrl);
    if (!$articleIsset) {
        return $articleUrl;
    } else {
        $url = $articleIsset['url'];
        $exUrl = explode('-', $url);
        if ($exUrl){
            $temp = (int)end($exUrl);
            $newUrl = $exUrl[0] . '-'. ++$temp;
        } else {
            $temp = 0;
            $newUrl = $articleUrl . '-'. ++$temp;
        }
        return getUrl($newUrl);
    }
}
function transliteration($str)
{
    $st = strtr($str,
        array(
            'а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d',
            'е'=>'e','ё'=>'e','ж'=>'zh','з'=>'z','и'=>'i',
            'к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o',
            'п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u',
            'ф'=>'ph','х'=>'h','ы'=>'y','э'=>'e','ь'=>'',
            'ъ'=>'','й'=>'y','ц'=>'c','ч'=>'ch', 'ш'=>'sh',
            'щ'=>'sh','ю'=>'yu','я'=>'ya',' '=>'_', '<'=>'_',
            '>'=>'_', '?'=>'_', '"'=>'_', '='=>'_', '/'=>'_',
            '|'=>'_'
        )
    );
    $st2 = strtr($st,
        array(
            'А'=>'a','Б'=>'b','В'=>'v','Г'=>'g','Д'=>'d',
            'Е'=>'e','Ё'=>'e','Ж'=>'zh','З'=>'z','И'=>'i',
            'К'=>'k','Л'=>'l','М'=>'m','Н'=>'n','О'=>'o',
            'П'=>'p','Р'=>'r','С'=>'s','Т'=>'t','У'=>'u',
            'Ф'=>'ph','Х'=>'h','Ы'=>'y','Э'=>'e','Ь'=>'',
            'Ъ'=>'','Й'=>'y','Ц'=>'c','Ч'=>'ch', 'Ш'=>'sh',
            'Щ'=>'sh','Ю'=>'yu','Я'=>'ya'
        )
    );
    $translit = $st2;
    return $translit;
}
function getArticleByUrl($str)
{
    $db = connectDb();
    if ($db) {
        $sql = "SELECT *
                FROM articles
                WHERE url='$str'
                ";
        return $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    return false;
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
        $_SESSION['user_login'] = $userData['login'];
        $_SESSION['acces'] = true;
    } else {
        $_SESSION['error_message'] = 'Register user not complete';
    }

   // echo $_SESSION['user_login'];

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
				$_SESSION['user_login'] = $userData['login'];
				$flag = true;
				header('Location:admin/main.php');
				exit;
			} 
		}
		
	}
}
?>
<?php
//ADMINKA
	//Add post
function addPost(array$add_post){
	$db = connectDb();
	if ($db){
		$sql = "SELECT id FROM users WHERE login = 'German_login'";
		$stm = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
		//echo $stm['id'];
		

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
        $sql = "DELETE FROM articles WHERE id=?";
        return $db->prepare($sql)->execute(array($id));
    }
    return false;
}



// SEARCH
function searchArticles($words){
	$db = connectDb();
	if ($db) {
		$words = trim(htmlspecialchars(strip_tags($words)));
		$words = "%$words%";
		$stm  = $db->prepare("SELECT * FROM articles WHERE title LIKE ? OR content LIKE ?");
		$stm->execute(array($words, $words));
		return $stm->fetchAll(PDO::FETCH_ASSOC);
				
    }
}
//COUNT POST
function countPost(){
	$db = connectDb();
	if ($db) {
		$sql = "SELECT id FROM articles";
		$stm = $db->prepare($sql);
		$stm->execute();
		$data = $stm->fetchAll(PDO::FETCH_ASSOC);
		$i = 0;
		foreach ($data as $key => $value) {
			$i++;
				}	
		echo " $i";	
    }
}

function getAllUsers(){
	$db = connectDb();
	if ($db) {
		$sql = "SELECT * FROM users";
		$stm = $db->prepare($sql);
		$stm->execute();
		$data = $stm->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
}


function getCountUsers(){
	$db = connectDb();
	if ($db) {
		$sql = "SELECT * FROM users";
		$stm = $db->prepare($sql);
		$stm->execute();
		$data = $stm->fetchAll(PDO::FETCH_ASSOC);
		$i = 0;
		foreach ($data as $key => $value) {
			$i++;
		}
		return $i;
	}
}
?>
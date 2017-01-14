<?php
    function zag() {
        header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
        header('Content-Type: text/html');
        header('Access-Control-Allow-Origin: *');
    }
	
	function rest_get($request, $data) { }
    function rest_post($request, $data) { }
    function rest_delete($request) { }
    function rest_put($request, $data) { }
    function rest_error($request) { }

    $method  = $_SERVER['REQUEST_METHOD'];
    $request = $_SERVER['REQUEST_URI'];
	
    switch($method) {
        case 'PUT':
            parse_str(file_get_contents('php://input'), $put_vars);
            zag(); $data = $put_vars; rest_put($request, $data); break;
        case 'POST':
            zag(); $data = $_POST; rest_post($request, $data); break;
        case 'GET':
		//$veza = new PDO("mysql:dbname=ordinacija;host=localhost;charset=utf8", "root", "");
		$veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=ordinacija', 'admin', 'admin');
        $veza->exec("set names utf8");
             
            zag(); $data = $_GET; rest_get($request, $data);
            
            
            if (isset ($_GET['korisnik_id']))
                $id_korisnik = $_GET['korisnik_id'];
            else 
                $id_korisnik = "";
            
		if(isset ($_GET['id_korisnik']) && isset ($_GET['doktor']))
		{   $id_korisnik = $_GET['korisnik_id'];
			$doktor = $_GET['doktor'];
            $sql = $veza->prepare("SELECT * FROM nalaz n WHERE n.doktor = :doktor AND n.id_korisnika = :id_korisnik");
            $sql->bindParam(':doktor', $doktor);
			$sql->bindParam(':id_korisnik', $id_korisnik);
            $sql->execute();
			
		}
         elseif (isset ($_GET['korisnik_id']))
        {
            $sql = $veza->prepare("SELECT * FROM nalaz n WHERE n.id_korisnika = :id_korisnik");
            $sql->bindParam(':id_korisnik', $id_korisnik);
            $sql->execute();
        }
		elseif (isset ($_GET['doktor']))
        { $doktor = $_GET['doktor'];
            $sql = $veza->prepare("SELECT * FROM nalaz n WHERE n.doktor = :doktor");
            $sql->bindParam(':doktor', $doktor);
            $sql->execute();
        }
	     
         if(!isset ($_GET['id_korisnik']) && !isset ($_GET['doktor']) )
            {
                $sql = $veza->prepare("SELECT * FROM nalaz");
                $sql->execute();
                
            }
            
            $result = array();
            while($row = $sql->fetch(PDO::FETCH_ASSOC)){
                $result[] = $row;
            }

            print json_encode($result);
            break;
			
            case 'DELETE':
                zag(); rest_delete($request); break;
            default:
                header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
                rest_error($request); break;
        }
?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	?>
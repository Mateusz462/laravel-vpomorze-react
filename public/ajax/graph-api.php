<?php
	require_once('../../config/connect.php'); // Połączenie z bazą danych
	//require_once('../../config/session.php'); // Pobranie pliku z funkcjami
	require_once('../../config/function.php'); // Pobranie pliku z funkcjami
	//session_set_save_handler('_open', '_close', '_read', '_write', '_destroy', '_clean');
	//register_shutdown_function('session_write_close');
	ob_start();
	session_start(); // Rozpoczynamy lub przedłużamy pracę sesji

	if(isset($_GET['action']) && $_GET['action'] == 'get-users-duties'){
		$data[] = $_POST;
		
		//print_r($l1);
		//print "<pre>";
		$output = '';
		while ($row = mysqli_fetch_assoc($l3)){
			//print_r($row);
			//$json_array[] = $row;
			$output .= '<option value="'.$row['id'].'">'.$row['linia'].'/'.$row['brygada'].'/'.$row['zmiana'].' - [ '.$row['klasa_taboru'].' ] [ TYP DNIA ] '.$row['typ'].'</option>';
			//print_r($row);
		}


		$l1 = call("SELECT * FROM wykaz WHERE typ = '.$typ.'");
		while ($row = mysqli_fetch_assoc($l1)){
			$l2 = row("SELECT * FROM wykaz_nie_dostepne_sluzby WHERE data = $data_add_duty");
			if($row['linia'] == $l2['linia']){
				$output .= '<option disabled>'.$row['linia'].'/'.$row['brygada'].'/'.$row['zmiana'].' - [ '.$row['klasa_taboru'].' ] [ TYP DNIA ] '.$row['typ'].' [ZAJETE]</option>';
			} else {
				$output .= '<option value="'.$row['id'].'">'.$row['linia'].'/'.$row['brygada'].'/'.$row['zmiana'].' - [ '.$row['klasa_taboru'].' ] [ TYP DNIA ] '.$row['typ'].'</option>';
			}
			//print_r($row);
			//$json_array[] = $row;
			//$output .= '<option value="'.$row['id'].'">'.$row['linia'].'/'.$row['brygada'].'/'.$row['zmiana'].' - [ '.$row['klasa_taboru'].' ] [ TYP DNIA ] '.$row['typ'].'</option>';
			//print_r($row);
		}
		//$query = "UPDATE login_details SET last_activity = :last_activity WHERE login_details_id = :login_details_id";
		//print_r(json_encode($json_array));
		echo $output;
	} elseif(isset($_GET['action']) && $_GET['action'] == 'sluzba'){
		$sluzba_id = vtxt($_POST['sluzba_id']);
		$l1 = row("SELECT * FROM wykaz WHERE id = $sluzba_id");

		echo $l1['klasa_taboru'];
	} elseif(isset($_GET['action']) && $_GET['action'] == 'pojazd'){
		//$sluzba_id = vtxt($_POST['sluzba_id']);
		//$l1 = call("SELECT * FROM wykaz WHERE id = $sluzba_id");
		$klasa = vtxt($_POST['klasa']);
		$l1 = call("SELECT * FROM tabor");
		$opcja = '';
		while ($row = mysqli_fetch_assoc($l1)){
			//$l2 = row("SELECT * FROM tabor_w_ruchu WHERE tid = '.$row['id'].'");
			if($row['stan'] == 0){
				$opcja .= '<option disabled>'.$row['marka']. ' '. $row['model']. ' #'. $row['taborowy'].' WST</option>';
			} elseif($row['klasa'] == $klasa){
				$opcja .= '<option value='.$row['id'].'>'.$row['marka']. ' '. $row['model']. ' #'. $row['taborowy'].'</option>';
			}else{
				$opcja .= '<option disabled>'.$row['marka']. ' '. $row['model']. ' #'. $row['taborowy'].' TYP</option>';
			}
		}
		echo $opcja;
		//print_r($l1);
	}



?>

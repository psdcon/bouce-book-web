<?php
require_once ('db.php');

if($_POST['action']=='Add' OR $_POST['action']=='Edit'){
	$client_ip = $_SERVER['REMOTE_ADDR'];
	$name = mysqli_real_escape_string($db, $_REQUEST['name']);
	$fig_notation = mysqli_real_escape_string($db, $_REQUEST['fig_notation']);
	$tariff = mysqli_real_escape_string($db, $_REQUEST['tariff']);
	$shape_bonus = mysqli_real_escape_string($db, $_REQUEST['shape_bonus']);
	$level = mysqli_real_escape_string($db, $_REQUEST['level']);
	$start_position = mysqli_real_escape_string($db, $_REQUEST['start_position']);
	$end_position = mysqli_real_escape_string($db, $_REQUEST['end_position']);
	$short_description = mysqli_real_escape_string($db, $_REQUEST['short_description']);
	$long_description = mysqli_real_escape_string($db, $_REQUEST['long_description']);
	$coaching_points = mysqli_real_escape_string($db, $_REQUEST['coaching_points']);
	$lateral_prog = mysqli_real_escape_string($db, $_REQUEST['lateral_prog']);
	$lateral_prog = $lateral_prog == "null"? "": $lateral_prog;
	$linear_prog = mysqli_real_escape_string($db, $_REQUEST['linear_prog']);
	$linear_prog = $linear_prog == "null"? "": $linear_prog;
	$vid = mysqli_real_escape_string($db, $_REQUEST['vid']);

	$dbQuery = null;
	if($_POST['action']=='Add'){
		$dbQuery = mysqli_query($db, "INSERT INTO `skills` 
			(`name`, `level`, `fig_notation`, `tariff`, `shape_bonus`, `start_position`, `end_position`, `short_description`, `long_description`, `coaching_points`, `lateral_prog`, `linear_prog`, `vid`) 
			VALUES ('$name', '$level', '$fig_notation', '$tariff', '$shape_bonus', '$start_position', '$end_position', '$short_description', '$long_description', '$coaching_points', '$lateral_prog', '$linear_prog', '$vid');");
		$id = mysqli_insert_id($db);
	}
	else if($_POST['action']=='Edit'){
		$id = mysqli_real_escape_string($db, $_REQUEST['id']);		
		$dbQuery = mysqli_query($db, "UPDATE skills SET
			name='$name', level='$level', fig_notation='$fig_notation', tariff='$tariff', shape_bonus='$shape_bonus', start_position='$start_position', end_position='$end_position', short_description='$short_description', long_description='$long_description', coaching_points='$coaching_points', lateral_prog='$lateral_prog', linear_prog='$linear_prog',  vid='$vid' 
			WHERE id='$id'");
	}

	if (mysqli_connect_errno()){ /* Couldnt connect to the database*/
		echo "Failed to connect to MySQL: " . mysqli_connect_error($db);
	}
	else if($dbQuery){
		echo "1".$id;
		//"Good things happened with $name! :)";
	}
	else{ //Unsuccessfuly entry
		// var_dump($dbQuery);
		echo 'Database error: '.$dbQuery.mysqli_error($db);
	}
}

elseif($_POST['action']=='Favourite'){	
	$favSkills = mysqli_fetch_assoc(mysqli_query($db, "SELECT favourite_skills FROM users WHERE user ='$loggedIn'"));
	$favSkills = json_decode($favSkills['favourite_skills']);
	$favSkills[] = $_REQUEST['skillName'];
	$favSkills = json_encode($favSkills);
	$favSkills = mysqli_query($db, "UPDATE users SET favourite_skills = '$favSkills' WHERE user ='$loggedIn'");
}

elseif($_POST['action']=='Unfavourite'){	
	$favSkills = mysqli_fetch_assoc(mysqli_query($db, "SELECT favourite_skills FROM users WHERE user ='$loggedIn'"));
	$favSkills = json_decode($favSkills['favourite_skills']);
	$unFavouritedSkill = array($_REQUEST['skillName']);
	$favSkills = array_diff($favSkills, $unFavouritedSkill);
	$favSkills = json_encode($favSkills);
	$favSkills = mysqli_query($db, "UPDATE users SET favourite_skills = '$favSkills' WHERE user = '$loggedIn'");
}

elseif($_POST['action']=='Know'){	
	$learnedSkills = mysqli_fetch_assoc(mysqli_query($db, "SELECT learned_skills FROM users WHERE user ='$loggedIn'"));
	$learnedSkills = json_decode($learnedSkills['learned_skills']);
	$learnedSkills[] = $_REQUEST['skillName'];
	$learnedSkills = json_encode($learnedSkills);
	$learnedSkills = mysqli_query($db, "UPDATE users SET learned_skills = '$learnedSkills' WHERE user ='$loggedIn'");
}

elseif($_POST['action']=='Unknow'){	
	$learnedSkills = mysqli_fetch_assoc(mysqli_query($db, "SELECT learned_skills FROM users WHERE user ='$loggedIn'"));
	$learnedSkills = json_decode($learnedSkills['learned_skills']);
	$unlearnedSkill = array($_REQUEST['skillName']);
	$learnedSkills = array_diff($learnedSkills, $unlearnedSkill);
	$learnedSkills = json_encode($learnedSkills);
	$learnedSkills = mysqli_query($db, "UPDATE users SET learned_skills = '$learnedSkills' WHERE user = '$loggedIn'");
}

elseif($_POST['action']=='Delete'){	
	$copy_skill = mysqli_query($db, "INSERT INTO old_skills 
		(edit_time,name,level,short_desc,description,coaching_points,prereq,lateral_prog,linear_prog,tariff,vid) 
		SELECT '".time()."',name,level,description,coaching_points,prereq,lateral_prog,linear_prog,tariff,vid
		FROM skills
		WHERE id='".$delete_id."'");
	
	$delete_skill = mysqli_query($db, "DELETE FROM skills WHERE id='".$delete_id."'");

	if (mysqli_connect_errno()){ /* Couldnt connect to the database*/
		echo "Failed to connect to MySQL: " . mysqli_connect_error($db);
	}
	else if($copy_skill && $delete_skill){
		echo "1$name was sucessfully updated :)";
	}
	else{ //Unsuccessfuly entry
		echo 'Database error: '.mysqli_error($db);
	}	
}
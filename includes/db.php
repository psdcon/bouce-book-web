<?php
// echo $_SERVER['SERVER_NAME'];
$_SERVER['SERVER_NAME'] == 'bouncebook'?
    // If using local wamp mysql db...
    $db = new mysqli("localhost", "root", "", "bouncebook"): // for local environment
    // But want to use remote server from local
    // $db = new mysqli("192.185.18.236", "ucdtramp_user", "showmeALL", "ucdtramp_bb"):
    $db = new mysqli("127.0.0.1", "ucdtramp_user", "showmeALL", "ucdtramp_bb"); // server environment


session_start(); // For login
$loggedIn = false;
if (isset($_SESSION['login_user'])) {
    $userExists = mysqli_fetch_assoc(mysqli_query($db, "SELECT user, perms FROM users WHERE user='".$_SESSION['login_user']."'"));
    $loggedIn = $userExists['user'];
    $perms = $userExists['perms'];
}

function setTitle($title){
    echo '
        <script>
            window.document.title = "'.$title.'";
        </script>
    ';
}

function string2SafeID($level) {
    return preg_replace('/\W+/','',strtolower($level));
}

function tags_to_links($tagsJSONArray, $seperate = true){
    if (!$tagsJSONArray or $tagsJSONArray == "[]")
        return "None";

    if ($tagsJSONArray[0] == "[")
        $tags = json_decode($tagsJSONArray, true);
    else
        $tags = array($tagsJSONArray); // Single skill was given as name

    global $db;
    $skillLinks = " ";
    foreach ($tags as $skillName) {
        // find the skill in the db based on its id. Make a browse link with the skills name is the anchor text
		$skill_name_query = mysqli_query($db, "SELECT * FROM skills WHERE name='$skillName' LIMIT 1");
		while($skill_name = mysqli_fetch_array($skill_name_query)){
			$skillLinks .= '
                <a href="#/browse/'.$skill_name['level'].'/'.$skill_name['id'].'">'.
                    $skill_name['name'].
                '</a>';
            if($seperate)
                $skillLinks .= '<br>';
		}
	}

    return $skillLinks;
}


function getAllSkillNamesJSON(){
    global $db;

    // Get names of skills for select2 and structure as below
    // [{
    //     text     : "Header One",
    //     children : [{
    //         id   : 0,
    //         text : "Item One"
    //     }, {
    //         ...
    //     }]
    // }]

    // Get the sql data into an assoc array grouped by level
    $groupedSkills = array();
    $skills = mysqli_query($db, "SELECT name,level FROM skills ORDER BY id ASC");
    while($selectSkill = mysqli_fetch_assoc($skills)){
        // Group by making assoc arrays with level as the key
        $groupedSkills[$selectSkill['level']][] = $selectSkill;
    }

    // Format the grouped assoc array as specified by select2 to minic optgroup
    $spitOutJSONSkills = "[";
    foreach ($groupedSkills as $level => $skills) {
        $spitOutJSONSkills .= '{
            text: "'.$level.'",
            children: [
        ';
        foreach ($skills as $selectSkill) {
            $spitOutJSONSkills .= '{
                id: "'.$selectSkill['name'].'",
                text: "'.$selectSkill['name'].'"
            },';
        }

        $spitOutJSONSkills .= '
            ]
        },';
    }
    $spitOutJSONSkills .= "]";

    return $spitOutJSONSkills;
}

function getAllLevelsArray(){
    global $db;
    $levelsArray = array();
    $levels = mysqli_query($db, "SELECT DISTINCT(level) AS level FROM skills");
    while($level = mysqli_fetch_assoc($levels)){
        $levelsArray[] = $level['level'];
    }
    return $levelsArray;
}

?>
<?php
require_once('../includes/db.php');
setTitle("Bounce Book");
?>

<ol class="breadcrumb">
    <li><a href="#browse/all">Browse</a></li>
    <li class="active" id="crumb">All</li>
</ol>
<hr>


<?php
function stringShorten($string, $length = 100, $append = "..."){
    if (strlen($string) <= intval($length)) {
        return $string;
    }
    return substr($string, 0, $length) . $append;
}

$groupedSkills = array();
$skills = mysqli_query($db, "SELECT * FROM skills ORDER BY id ASC");
while($skill = mysqli_fetch_assoc($skills)){
    $groupedSkills[$skill['level']][] = $skill;
}

foreach ($groupedSkills as $level => $skills) { 

    echo '
    <div class="panel panel-primary skills" id="'.levelToSafeId($level).'">
        <div class="panel-heading">'.$level.'</div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th style="width:35%">Name</th>
                    <th style="width:62%">Description</th>
                    <th></th>                        
                </tr>
            </thead>

            <tbody>';   

                foreach ($skills as $skill) {
                    if ($loggedIn) {
                        $userPwns = mysqli_fetch_assoc(mysqli_query($db, "SELECT 1 FROM users WHERE learned_skills LIKE '%".$skill['name']."%'"))['1'] == '1';
                        $knowSkill = $userPwns? "knowSkill": "";
                        echo '
                        <tr>
                        <td><span data-click="dbPwn" data-skillname="'.$skill['name'].'" data-toggle="tooltip" data-placement="top" title="Click to change" class="'.$knowSkill.'">✓</span></td>
                            <td ng-click="go(\'/browse/'.levelToSafeId($level).'/'.$skill['id'].'\')">'.$skill['name'].'</td>
                            <td ng-click="go(\'/browse/'.levelToSafeId($level).'/'.$skill['id'].'\')">'.stringShorten($skill['short_description']).'</td>
                            <td><a href="#/edit/'.levelToSafeId($level).'/'.$skill['id'].'"><span class="glyphicon glyphicon-pencil"></span></a></td>
                        </tr>';
                    }
                    else{
                        echo '
                        <tr>
                            <td></td>
                            <td ng-click="go(\'/browse/'.levelToSafeId($level).'/'.$skill['id'].'\')">'.$skill['name'].'</td>
                            <td ng-click="go(\'/browse/'.levelToSafeId($level).'/'.$skill['id'].'\')">'.stringShorten($skill['short_description']).'</td>
                            <td></td>
                        </tr>';
                    }                    
                }

                echo '    
            </tbody>
        </table>
    </div>';
}
?>

<script>
    $('[data-toggle="tooltip"]').tooltip();

    $('*[data-click="dbPwn"]').click(function () {
            // Skill is known, must unknow
            $thisBtn = $(this);
            thisSkillName = $(this).data("skillname");
            if ($thisBtn.hasClass('knowSkill')) {
                $.ajax({
                    type: "POST",
                    url: "includes/skills.db.php",
                    data: "action=Unknow&skillName="+thisSkillName,
                    dataType: "text",
                    success: function (data) {
                        console.log(data);
                        $thisBtn.removeClass('knowSkill').addClass('unknownSkill');
                    }
                });
            }
            else {
                $.ajax({
                    type: "POST",
                    url: "includes/skills.db.php",
                    data: "action=Know&skillName="+thisSkillName,
                    dataType: "text",
                    success: function (data) {
                        console.log(data);
                        $thisBtn.removeClass('unknownSkill').addClass('knowSkill');
                    }
                });
            }
        });

</script>
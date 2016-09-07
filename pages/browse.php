<?php
require_once('../includes/db.php');
setTitle("Bounce Book - Skills List");

// http://stackoverflow.com/questions/79960/how-to-truncate-a-string-in-php-to-the-word-closest-to-a-certain-number-of-chara
function stringShorten($string, $desiredLen = 100) {
  if (strlen($string) <= $desiredLen) {
    return $string;
  }
  return preg_replace('/\s+?(\S+)?$/', '', substr($string, 0, $desiredLen))."...";
}
?>

<style>
  .skills table {
    margin-bottom: 0;
  }
</style>

<hr>
<h3>Skills</h3>
<p>
  Below is a list of all (most) trampoline skills. Clicking on a skill will show a more detailed view. The check mark can be checked to mark the skill as part of your repertoire.
</p>
<br>

<?php

$groupedSkills = array();
$skills = mysqli_query($db, "SELECT * FROM skills ORDER BY id ASC");
while($skill = mysqli_fetch_assoc($skills)){
    $groupedSkills[$skill['level']][] = $skill;
}

foreach ($groupedSkills as $level => $skills) {
  $levelSafeID = levelToSafeId($level);

  echo '
  <div class="card skills" id="'.$levelSafeID.'">
    <div class="card-header">'.$level.'</div>
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
                <td ng-click="go(\'/browse/'.$levelSafeID.'/'.$skill['id'].'\')">'.$skill['name'].'</td>
                <td ng-click="go(\'/browse/'.$levelSafeID.'/'.$skill['id'].'\')">'.stringShorten($skill['short_description']).'</td>
                <td><a href="#/edit/'.$levelSafeID.'/'.$skill['id'].'"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
              </tr>';
          }
          else{
            echo '
              <tr>
                <td></td>
                <td ng-click="go(\'/browse/'.$levelSafeID.'/'.$skill['id'].'\')">'.$skill['name'].'</td>
                <td ng-click="go(\'/browse/'.$levelSafeID.'/'.$skill['id'].'\')">'.stringShorten($skill['short_description']).'</td>
                <td></td>
              </tr>';
            }
          }

        echo '
      </tbody>
    </table>
  </div>

  <br>
  ';
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
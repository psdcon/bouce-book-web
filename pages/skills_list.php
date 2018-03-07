<?php
require_once('../includes/db.php');
setTitle("Bounce Book - Skills List");

// http://stackoverflow.com/questions/79960/how-to-truncate-a-string-in-php-to-the-word-closest-to-a-certain-number-of-chara
// not first answer
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

<h2>Skills</h2>
<p>
  Below is a list of all (most) trampoline skills. Clicking on a skill will show a more detailed view. The check mark can be checked to mark the skill as part of your repertoire.
</p>
<br>

<?php

  $groupedSkills = array();
  $skills = mysqli_query($db, "SELECT * FROM skills ORDER BY id ASC");
  while($skill = mysqli_fetch_assoc($skills)){
    // Append to assoc array based on level groupings
    $groupedSkills[$skill['level']][] = $skill;
  }

  foreach ($groupedSkills as $level => $skills) {
    $levelSafeID = string2SafeID($level);

    ?>

    <div class="skills" id="<?=$levelSafeID?>">
      <h5><?=$level?></h5>

      <?php
      foreach ($skills as $skill) {
        $skillLink = $levelSafeID.'/'.$skill['id'];

        if ($loggedIn) {
          $userPwns = mysqli_fetch_assoc(mysqli_query($db, "SELECT 1 FROM users WHERE learned_skills LIKE '%".$skill['name']."%'"))['1'] == '1';
          $knowSkill = $userPwns? "knowSkill": "";
          ?>

          <div class="row skill-row skill-row-hover">
            <div class="col-md-3">
              <span data-click="dbPwn" data-skillname="<?=$skill['name']?>"
                    data-toggle="tooltip" data-placement="top" title="Click to change" class="<?=$knowSkill?>">
                ✓
              </span>
              <span ng-click="go('/skills/<?=$skillLink?>')"><?=$skill['name']?></span>
            </div>
            <div class="col-md-8" ng-click="go('/skills/<?=$skillLink?>')"><?=stringShorten($skill['short_description'])?></div>
            <div>
              <a href="#/edit/<?=$skillLink?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
            </div>
          </div>

        <?php
        }
        else{
        ?>

          <div class="row skill-row skill-row-hover" ng-click="go('/skills/<?=$skillLink?>')">
            <div class="col-md-3"><?=$skill['name']?></div>
            <div class="col-md-9"><?=stringShorten($skill['short_description'])?></div>
          </div>

        <?php
          }
        }
        ?>
    </div>

    <br>
<?php
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
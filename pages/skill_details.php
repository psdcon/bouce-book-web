<?php
require_once('../includes/db.php');

$skillQuery = mysqli_query($db, "SELECT * FROM skills WHERE id=".$_GET['skill_id']." LIMIT 1");
$skill = mysqli_fetch_assoc($skillQuery);

setTitle($skill['name']);

// Get this skills prerequisite skills if any
$prereqArray = array();
$prereqs = mysqli_query($db, "SELECT * FROM skills WHERE linear_prog LIKE '%".$skill['name']."%'");
while($prereq = mysqli_fetch_assoc($prereqs)){
  $prereqArray[] = $prereq['name'];
}
$prereqArray = json_encode($prereqArray,true);

// Show if this skill is favourited and pwn or not
$userPwns = mysqli_fetch_assoc(mysqli_query($db, "SELECT 1 FROM users WHERE learned_skills LIKE '%".$skill['name']."%'"))['1'] == "1";
$userFav = mysqli_fetch_assoc(mysqli_query($db, "SELECT 1 FROM users WHERE favourite_skills LIKE '%".$skill['name']."%'"))['1'] == "1";

?>
<div class="clearfix">
  <h3 class="pull-left">
    <?=$skill['name']!=""?$skill['name']:"No name"?>
  </h3>

  <?php if ($loggedIn) { ?>
    <p class="pull-right">
      <a href="#/edit/<?=string2SafeID($skill['level'])?>/<?$skill['id']?>">
        <i class="fa fa-pencil" aria-hidden="true"></i> Edit
      </a>
    </p>
  <?php } ?>
</div>

<div><!-- list container -->

  <div>
    <div class="row">
      <div class="col-xs-6 col-md-2">
        Tariff: <?=$skill['tariff']!=""?$skill['tariff']:"No tariff"?>
      </div>
      <div class="col-xs-6 col-md-2">
        FIG: <?=$skill['fig_notation']!=""?$skill['fig_notation']:"No FIG"?>
      </div>
      <div class="col-xs-6 col-md-2">
        Start Position: <?=$skill['start_position']!=""?$skill['start_position']:"No start"?>
      </div>
      <div class="col-xs-6 col-md-2">
        End Position: <?=$skill['end_position']!=""?$skill['end_position']:"No end"?>
      </div>
      <div class="col-xs-6 col-md-2">
        Favourite:
        <?php
        if ($loggedIn && $userFav) {?>
          <button data-click="dbFavourite" type="button" class="star-favourite btn btn-sm btn-secondary">
            <i class="fa fa-star" aria-hidden="true"></i>
          </button>
        <?php
        } else if ($loggedIn) { ?>
          <button data-click="dbFavourite" type="button" class="star-not-favourite btn btn-sm btn-secondary">
            <i class="fa fa-star-o" aria-hidden="true"></i>
          </button>
        <?php
        } else { ?>
          <button data-click="dbFavourite" type="button" class="star-not-favourite btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="Top" title="Must be logged in">
            <i class="fa fa-star-o" aria-hidden="true"></i>
          </button>
        <?php
        } ?>
      </div>
      <div class="col-xs-6 col-md-2">
        <span data-toggle="tooltip" data-placement="bottom" title="Meaning you know how to do this skill">I pwn this</span>:
        <?php
        if ($loggedIn && $userPwns) { ?>
          <button data-click="dbPwn" type="button" class="knowSkill btn btn-sm btn-secondary">
            <span>✓</span>
          </button>
        <?php
        } else if ($loggedIn) { ?>
          <button data-click="dbPwn" type="button" class="unknownSkill btn btn-sm btn-secondary">
            <span>✓</span>
          </button>
        <?php
        } else { ?>
          <button data-click="dbPwn" type="button" class="unknownSkill btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="Top" title="Must be logged in">
            <span>✓</span>
          </button>
        <?php
        } ?>
      </div>
    </div>
  </div>

  <div>
    <hr>
    <h4>Short Description</h4>
    <p>
      <?=$skill['short_description']!=""?nl2br($skill['short_description'], false):'No short description'?>
    </p>
  </div>

  <div>
    <hr>
    <h4>Long Description</h4>
    <p>
      <?=$skill['long_description']!=""?nl2br($skill['long_description'], false):'No long description'?>
    </p>
  </div>

  <div>
    <hr>
    <h4>Coaching Points</h4>
    <p>
      <?=$skill['coaching_points']!=""?nl2br($skill['coaching_points'], false):'No coaching points'?>
    </p>
  </div>

  <div>
    <hr>
    <h4>Prerequisite Skills</h4>
    <p class="well well-sm">
      <?=tags_to_links($prereqArray)?>
    </p>
  </div>

  <div>
    <hr>
    <h4>Lateral Progressions</h4>
    <p class="well well-sm">
      <?=tags_to_links($skill['lateral_prog'])?>
    </p>
  </div>

  <div>
    <hr>
    <h4>Linear Progressions</h4>
    <p class="well well-sm">
      <?=tags_to_links($skill['linear_prog'])?>
    </p>
  </div>

  <div>
    <hr>
    <h4>Video</h4>
    <?=$skill['vid']!=""?nl2br($skill['vid'], false):'No video info'?>
  </div>
</div><!-- /list container -->


<script>

  $('[data-toggle="tooltip"]').tooltip();

  $('*[data-click="dbFavourite"]').click(function () {
    // Skill is favourite, must unfavourite
    $thisBtn = $(this);
    if ($thisBtn.hasClass('star-favourite')) {
      $.ajax({
        type: "POST",
        url: "includes/skills.db.php",
        data: "action=Unfavourite&skillName=<?=$skill['name']!=""?$skill['name']:""?>",
        dataType: "text",
        success: function (data) {
          console.log(data);
          $thisBtn.removeClass('star-favourite').addClass('star-not-favourite');
          $thisBtn.find('.glyphicon').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
        }
      });
    }
    else {
      $.ajax({
        type: "POST",
        url: "includes/skills.db.php",
        data: "action=Favourite&skillName=<?=$skill['name']!=""?$skill['name']:""?>",
        dataType: "text",
        success: function (data) {
          console.log(data);
          $thisBtn.removeClass('star-not-favourite').addClass('star-favourite');
          $thisBtn.find('.glyphicon').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        }
      });
    }
  });

  $('*[data-click="dbPwn"]').click(function () {
    // Skill is known, must unknow
    $thisBtn = $(this);
    if ($thisBtn.hasClass('knowSkill')) {
      $.ajax({
        type: "POST",
        url: "includes/skills.db.php",
        data: "action=Unknow&skillName=<?=$skill['name']!=""?$skill['name']:""?>",
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
        data: "action=Know&skillName=<?=$skill['name']!=""?$skill['name']:""?>",
        dataType: "text",
        success: function (data) {
          console.log(data);
          $thisBtn.removeClass('unknownSkill').addClass('knowSkill');
        }
      });
    }
  });

</script>
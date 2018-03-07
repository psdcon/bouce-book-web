<?php
require_once('../includes/db.php');
setTitle("Bounce Book - Progressions");
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/css/bootstrap.min.css" integrity="sha384-MIwDKRSSImVFAZCVLtU0LMDdON6KVCrZHyVQQj6e8wIEJkW4tvwqXrbMIya1vriY" crossorigin="anonymous">
<script src="https://use.fontawesome.com/aa1a9d6ccd.js"></script>

<style>
  .knowSkill { /* Is this a known skill, do you know skill? */
    max-width: 1em;
    cursor: pointer;
    color: black;
    -webkit-touch-callout: none; /* iOS Safari */
    -webkit-user-select: none;   /* Chrome/Safari/Opera */
    -khtml-user-select: none;    /* Konqueror */
    -moz-user-select: none;      /* Firefox */
    -ms-user-select: none;       /* Internet Explorer/Edge */
    user-select: none;           /* Non-prefixed version, currently
                                    not supported by any browser */
  }
  .knownSkill { /* Skill is known */
    font-weight: bold;
    color: #66CD00;
  }
</style>


<div class="alert alert-warning" role="alert">
  <strong>Warning!</strong> This page isn't quite fleshed out yet.
</div>

<hr>

<h2>Skill Dependencies</h2>
<p>
  This page attempts to demonstrate progressions through trampoline skills ordered by difficulty. Here lateral progressions are categorised based on variations in to and out of a skill plus variations in axis rotations.
</p>
<br>

<hr>
<h4>Axes Described</h4>
<p>
  <style>
    .img-container img {
        max-height: 400px;
        max-width: 30%;
    }
  </style>
  <div class="img-container">
    <img src="images/1.png" alt="lateral axis">
    <img src="images/2.png" alt="longitudinal axis">
    <img src="images/3.png" alt="dorso-ventral axis">
  </div>
  Lateral axis in red (Somersault -), longitudinal axis in blue (Twist |) and dorso-ventral axis in green (+).
</p>
<br>

<hr>
<h4>Notation Explained</h4>
<p>
  Feet 360- Feet <br>
  Starting position, rotation about axis <strong>-|+</strong>, ending position.
</p>
<br>

<?php

// Load skills
$skillProgressions = file_get_contents("../js/skillProgressions.json");
$skillProgsJSON = json_decode($skillProgressions, true);

// Begin skill loop
foreach ($skillProgsJSON as $skillProgIndex => $skillProg) {
  // var_dump($skillProg);

  $skillName = $skillProg['name'];
  $skillFIG = "No FIG";
  $skillMyFIG = "No my FIG";
  $skillDescription = "No description yet";

  $skillLinProg = $skillProg['linear_progression'];
  $skillLinProgName = $skillLinProg[0];
  $skillLinProgMyFIG = "No my FIG";
  $skillLinProgDesc = "No description yet";
  $skillLinProgIDLink = string2SafeID($skillLinProgName);

  $skillLatProgHeadings = $skillProg['lateral_progressions'];

  if ($loggedIn) {
    $userPwns = mysqli_fetch_assoc(mysqli_query($db, "SELECT 1 FROM users WHERE learned_skills LIKE '%".$skillLinProgName."%'"))['1'] == '1';
    $knowSkill = $userPwns? "knowSkill": "";
  }
?>
  <div class="card card-block" id="<?=string2SafeID($skillName)?>">
    <h4>
      <?=$skillName?>
    </h4>
    <div>
      <p>FIG: <?=$skillFIG?> (<?=$skillMyFIG?>)</p>
      <p><?=$skillDescription?></p>

      <br>

      <h5>Linear Progression</h5>
      <div class="row skill-row skill-row-hover">
        <div class="col-md-3">
          <?php if ($loggedIn) { ?>
          <span  style="padding:0 1em 0 0;" data-click="dbPwn" data-skillname="<?=$skillName?>" class="<?=$knowSkill?>"
                data-toggle="tooltip" data-placement="top" title="Click to change">
            ✓
          </span>
          <?php } ?>
          <span onclick="$('#<?=$skillLinProgIDLink?>').scrollView();"><?=$skillLinProgName?></span>
        </div>
        <div class="col-md-2" onclick="$('#<?=$skillLinProgIDLink?>').scrollView();"><?=$skillLinProgMyFIG?></div>
        <div class="col-md-7" onclick="$('#<?=$skillLinProgIDLink?>').scrollView();"><?=$skillLinProgDesc?></div>
      </div>

      <br>

      <h5>Lateral Progressions</h5>
      <?php
      // for // lateral progression titles
      foreach ($skillLatProgHeadings as $skillLatProgsHeading => $skillLatProgSkills) {
      ?>

        <div class="row skill-row">
          <div class="col-md-12">
            <h6><?=$skillLatProgsHeading?></h6>
          </div>
        </div>

      <?php
        // for // skills under that title
        foreach ($skillLatProgSkills as $skillLatProgSkillsIndex => $skillLatProgSkill) {
          if ($loggedIn) {
            $userPwns = mysqli_fetch_assoc(mysqli_query($db, "SELECT 1 FROM users WHERE learned_skills LIKE '%".$skill['name']."%'"))['1'] == '1';
            $knowSkill = $userPwns? "knowSkill": "";
          }
      ?>

          <div class="row skill-row">
            <div class="col-md-3">
              <?php if ($loggedIn) { ?>
              <span style="padding:0 1em 0 0;" data-click="dbPwn" data-skillname="<?=$skillName?>"
                    data-toggle="tooltip" data-placement="top" title="Click to change">
                ✓
              </span>
              <?php } ?>
              <span><?=$skillLatProgSkill?></span>
            </div>
            <div class="col-md-2">No my FIG</div>
            <div class="col-md-7">No description yet</div>
          </div>

      <?php
        } // end skills under this heading
      } // end lateral progression titles
      ?>
      </div>
    </div>
  </div>

  <br>
  <br>

<?php
} // end skill loop
?>

<script>
    $(function () {
      // Bootstraps Tooltip Init
      $('[data-toggle="tooltip"]').tooltip();

      $('[data-toggle="tooltip"]').click(function(){
        $(this).toggleClass('knownSkill');
      })
    })

    // ===== Scroll to element =====
    $.fn.scrollView = function () {
        return this.each(function () {
            $('html, body').animate({
                scrollTop: $(this).offset().top - $('nav.navbar.navbar-fixed-top.navbar-dark.bg-inverse').outerHeight() - 20.0
            }, 1000);
        });
    }

</script>

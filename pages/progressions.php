<?php
require_once('../includes/db.php');
setTitle("Bounce Book - Progressions");
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/css/bootstrap.min.css" integrity="sha384-MIwDKRSSImVFAZCVLtU0LMDdON6KVCrZHyVQQj6e8wIEJkW4tvwqXrbMIya1vriY" crossorigin="anonymous">
<script src="https://use.fontawesome.com/aa1a9d6ccd.js"></script>

<style>
  body {
    padding-top: 5rem;
  }

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

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 style="font-weight: 300;">Skill Dependencies</h1>
    <p class="lead">This site attempts to demonstrate progressions through trampoline skills ordered by difficulty (For the purpose of this demo only Front drop to Front Somersault). Here lateral progressions are categorised based on variations in to and out of a skill plus variations in axis rotations.</p>
  </div>
</div>

<p>
  <h5>Axes Described</h5>
  <img style="max-width:100%" src="data:image/png;base64,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" alt="">
  <br>
  Lateral axis in red (Somersault -), longitudinal axis in blue (Twist |) and dorsoventral axis in green (+).
</p>

<br>

<p>
  <h5>Notation Explained</h5>
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

  $skillLatProgHeadings = $skillProg['lateral_progressions'];

?>

  <div class="card">
    <div class="card-header">
      <?=$skillName?>
    </div>
    <div class="card-block">
      <p>FIG: <?=$skillFIG?> (<?=$skillMyFIG?>)</p>
      <p><?=$skillDescription?></p>

      <br>

      <h4>Linear Progression</h4>
      <table class="table table-hover">
        <tbody>
          <tr style="cursor:pointer">
            <td class="knowSkill">
              <span class="knownSkill" data-click="dbPwn" data-skillname="<?=$skillName?>" data-toggle="tooltip" data-placement="top" data-original-title="Click to change">✓</span>
            </td>
            <td onclick="$('#front').scrollView();"><?=$skillLinProgName?></td>
            <td onclick="$('#front').scrollView();"><?=$skillLinProgMyFIG?></td>
            <td onclick="$('#front').scrollView();"><?=$skillLinProgDesc?></td>
          </tr>
        </tbody>
      </table>

      <br>

      <h4>Lateral Progressions</h4>
      <table class="table">
        <tbody>
          <?php
            // for // lateral progression titles
            foreach ($skillLatProgHeadings as $skillLatProgsHeading => $skillLatProgSkills) {
            ?>
          <tr>
            <th colspan="4">
              <?=$skillLatProgsHeading?>
            </th>
          </tr>
          <?php
            // for // skills under that title
            foreach ($skillLatProgSkills as $skillLatProgSkillsIndex => $skillLatProgSkill) {
            ?>
              <tr>
                <td class="knowSkill">
                  <span class="knownSkill" data-click="dbPwn" data-skillname="<?=$skillLatProgSkill?>" data-toggle="tooltip" data-placement="top" data-original-title="Click to change">✓</span>
                </td>
                <td><?=$skillLatProgSkill?></td>
                <td>No my FIG</td>
                <td>No description yet</td>
              </tr>
            <?php
              } // end skills under this heading
            } // end lateral progression titles
            ?>
        </tbody>
      </table>
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
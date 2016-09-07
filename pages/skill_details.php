<?php
require_once('../includes/db.php');

$skillQuery = mysqli_query($db, "SELECT * FROM skills WHERE id=".$_GET['skill_id']." LIMIT 1");
$skill = mysqli_fetch_assoc($skillQuery);

setTitle($skill['name']);

// Get this skills prerequsit skills if any
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
<ol class="breadcrumb">
    <li><a href="#browse/all">Browse</a></li>
    <li><a href="#browse/<?=levelToSafeId($skill['level'])?>"><?=$skill['level']?></a></li>
    <li class="active"><?=$skill['name']?></li>
</ol>

<div class="panel panel-primary">
    <div class="panel-heading clearfix">
        <h4 class="pull-left"><?=$skill['name']?></h4>
        <?php if ($loggedIn) {
            echo '
            <p class="pull-right">
                <a class="btn btn-default" href="#/edit/'.levelToSafeId($skill['level']).'/'.$skill['id'].'">
                    <span class="glyphicon glyphicon-pencil"></span> Edit
                </a>
            </p>';
        } ?>
    </div>

    <ul class="list-group">
        <li class="list-group-item">
            <div class="row">
                <div class="col-xs-6 col-md-2">
                    Tariff: <?=$skill['tariff']?>
                </div>
                <div class="col-xs-6 col-md-2">
                    FIG: <?=$skill['fig_notation']?>
                </div>
                <div class="col-xs-6 col-md-2">
                    Start Position: <?=$skill['start_position']?>
                </div>
                <div class="col-xs-6 col-md-2">
                    End Position: <?=$skill['end_position']?>
                </div>
                <div class="col-xs-6 col-md-2">
                    Favourite: 
                    <?php
                    if ($loggedIn && $userFav) 
                        echo '
                            <button data-click="dbFavourite" type="button" class="btn btn-default star-favourite">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button>
                        ';
                    else if ($loggedIn)
                        echo '
                            <button data-click="dbFavourite" type="button" class="star-not-favourite btn btn-default">
                                <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                            </button>
                        ';                    
                    else 
                        echo '
                            <button data-click="dbFavourite" type="button" class="star-not-favourite btn btn-default" data-toggle="tooltip" data-placement="Top" title="Must be logged in">
                                <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                            </button>
                        ';
                    ?>
                </div>
                <div class="col-xs-6 col-md-2">
                    <span data-toggle="tooltip" data-placement="bottom" title="Meaning you know how to do this skill">I pwn this</span>: 
                    <?php
                    if ($loggedIn && $userPwns) 
                        echo '
                            <button data-click="dbPwn" type="button" class="knowSkill btn btn-default">
                                <span>✓</span>
                            </button>
                        ';
                    else if ($loggedIn)
                        echo '
                            <button data-click="dbPwn" type="button" class="unknownSkill btn btn-default">
                                <span>✓</span>
                            </button>
                        ';                    
                    else 
                        echo '
                            <button data-click="dbPwn" type="button" class="unknownSkill btn btn-default" data-toggle="tooltip" data-placement="Top" title="Must be logged in">
                                <span>✓</span>
                            </button>
                        ';
                    ?>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <h3>Short Description</h3>
            <p>
                <?=nl2br($skill['short_description'], false)?>
            </p>
        </li>
        <li class="list-group-item">
            <h3>Long Description</h3>
            <p>
                <?=nl2br($skill['long_description'], false)?>
            </p>
        </li>
        <li class="list-group-item">
            <h3>Coaching Points</h3>
            <p>
                <?=nl2br($skill['coaching_points'], false)?>
            </p>
        </li>
        <li class="list-group-item">
            <h3>Prerequisite Skills</h3>
            <p class="well well-sm">
                <?=tags_to_links($prereqArray)?>
            </p>
        </li>
        <li class="list-group-item">
            <h3>Lateral Progressions</h3>
            <p class="well well-sm">
                <?=tags_to_links($skill['lateral_prog'])?>
            </p>
        </li>
        <li class="list-group-item">
            <h3>Linear Progressions</h3>
            <p class="well well-sm">
                <?=tags_to_links($skill['linear_prog'])?>
            </p>
        </li>
        <li class="list-group-item">
            <h3>Video</h3>
            <?=nl2br($skill['vid'], false)?>            
        </li>
    </ul>
</div> 
<script>

    $('[data-toggle="tooltip"]').tooltip();

    $('*[data-click="dbFavourite"]').click(function () {
        // Skill is favourite, must unfavourite
        $thisBtn = $(this);
        if ($thisBtn.hasClass('star-favourite')) {
            $.ajax({
                type: "POST",
                url: "includes/skills.db.php",
                data: "action=Unfavourite&skillName=<?=$skill['name']?>",
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
                data: "action=Favourite&skillName=<?=$skill['name']?>",
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
                data: "action=Unknow&skillName=<?=$skill['name']?>",
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
                data: "action=Know&skillName=<?=$skill['name']?>",
                dataType: "text",
                success: function (data) {
                    console.log(data);
                    $thisBtn.removeClass('unknownSkill').addClass('knowSkill');
                }
            });
        }
    });

</script>
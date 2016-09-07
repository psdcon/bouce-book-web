<?php
require_once('../includes/db.php');
setTitle("Bounce Book - Add Skill");

$skill = null;
if (isset($_GET[ 'skill_id'])){
    $skill_query = mysqli_query($db, "SELECT * FROM skills WHERE id='".$_GET[ 'skill_id']."' LIMIT 1");
    $skill = mysqli_fetch_assoc($skill_query);
}

$action = ($skill == null)? 'Add': 'Edit';
setTitle($action);
$id = ($skill == null)? '': $_GET[ 'skill_id'];
$name = ($skill == null)? '': $skill['name'];
$fig_notation = ($skill == null)? '': $skill['fig_notation'];
$tariff = ($skill == null)? '': $skill['tariff'];
$shape_bonus = ($skill == null)? '': $skill['shape_bonus'];
$level = ($skill == null)? '': $skill['level'];
$start_position = ($skill == null)? '': $skill['start_position'];
$end_position = ($skill == null)? '': $skill['start_position'];
$short_description = ($skill == null)? '': $skill['short_description'];
$long_description = ($skill == null)? '': $skill['long_description'];
$coaching_points = ($skill == null)? '': $skill['coaching_points'];
$lateral_prog = ($skill == null)? '""': ($skill['lateral_prog'] == ""? '""': $skill['lateral_prog']);
$linear_prog = ($skill == null)? '""': ($skill['linear_prog'] == ""? '""': $skill['linear_prog']);
$vid = ($skill == null)? '': $skill['vid'];

echo '
<script>
    var skillNames = '.getAllSkillNamesJSON().';
</script>
';

?>

<h1 class="page-header"><?=$action?></h1>
<div class="alert alert-dismissable" id="ajaxReturn" style="display:none;"></div>

<form class="form-horizontal" role="form" onSubmit="makeDbCall(this); return false">
    <input type="hidden" id="action" value="<?=$action?>">
    <input type="hidden" id="id" value="<?=$id?>">
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="name" placeholder="Name" value="<?=$name?>">
        </div>
        <label for="name" class="col-sm-1 control-label">FIG</label>
        <div class="col-sm-1">
            <input type="text" class="form-control" id="fig_notation" placeholder="- - /" value="<?=$fig_notation?>">
        </div>
        <label for="name" class="col-sm-1 control-label">Tariff</label>
        <div class="col-sm-1">
            <input type="number" step="0.1" class="form-control" id="tariff" placeholder="0.0" value="<?=$tariff?>">
        </div>
        <label for="shape_bonus" class="col-sm-1 control-label">Shape Bonus</label>
        <div class="col-sm-1">
            <input type="number" step="0.1" class="form-control" id="shape_bonus" placeholder="0.0" value="<?=$shape_bonus?>">
        </div>

    </div>
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Level</label>
        <div class="col-sm-2">
            <select class="form-control" id="level">
                <option>Chose a level...</option>
                <?php
                    foreach (getAllLevelsArray() as $levelOption) {
                        if ($level == $levelOption)
                            echo "<option selected>".$levelOption."</option>";
                        else
                            echo "<option>".$levelOption."</option>";
                    }
                ?>
            </select>
        </div>
        <label for="start_position" class="col-sm-2 control-label">Starting Position</label>
        <div class="col-sm-2">
            <select class="form-control" id="start_position">
                <option>Chose a position...</option>
                <?php
                    foreach (["Feet","Seat","Front","Back"] as $positionOption) {
                        if ($start_position == $positionOption)
                            echo "<option selected>".$positionOption."</option>";
                        else
                            echo "<option>".$positionOption."</option>";
                    }
                ?>
            </select>
        </div>
        <label for="end_position" class="col-sm-2 control-label">End Position</label>
        <div class="col-sm-2">
            <select class="form-control" id="end_position">
                <option>Chose a position...</option>
                <?php
                    foreach (["Feet","Seat","Front","Back"] as $positionOption) {
                        if ($end_position == $positionOption)
                            echo "<option selected>".$positionOption."</option>";
                        else
                            echo "<option>".$positionOption."</option>";
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="short_description" class="col-sm-2 control-label">Short Description</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="short_description" placeholder="Jump up..." value="<?=$short_description?>">
        </div>
    </div>
    <div class="form-group">
        <label for="long_description" class="col-sm-2 control-label">Long Description</label>
        <div class="col-sm-10">
            <textarea class="form-control" rows="3" id="long_description" placeholder="Jump up and down..."><?=$long_description?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="coaching_points" class="col-sm-2 control-label">Coaching Points</label>
        <div class="col-sm-10">
            <textarea class="form-control" rows="3" id="coaching_points" placeholder="Defy gravity"><?=$coaching_points?></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">
            <label for="lateral_prog">Lateral Progressions</label>
        </div>
        <div class="col-sm-10">
            <select id="lateral_prog" class="" multiple="multiple"></select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">
            <label for="linear_prog">Linear Progressions</label>
        </div>
        <div class="col-sm-10">
            <select id="linear_prog" class="" multiple="multiple"></select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">
            <label for="vid">Video</label>
        </div>
        <div class="col-sm-10">
            <textarea class="form-control" rows="3" id="vid" placeholder="Speak clearly and make uncomfortable prolonged eyecontact with the camera..."><?=$vid?></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <a href="#/browse/<?=$level?>/<?=$id?>" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-primary" id="save">Save</button>
        </div>
    </div>
</form>

<script>

    // Set up select2 inputs
    var select2Options = {
        placeholder: "Select some skills",
        data: skillNames,
        tags: true
    };
    $("#lateral_prog")
        .select2(select2Options)
        .val(<?=$lateral_prog?>)
        .trigger("change");
    $("#linear_prog")
        .select2(select2Options)
        .val(<?=$linear_prog?>)
        .trigger("change");

    // Disable current skill from options
    if (<?=$skill==null?0:1?>){
        $("select>optgroup>option[value='<?=$name?>']").prop('disabled', true);
        $('#lateral_prog').select2({placeholder:"Select some skills"});
        $('#linear_prog').select2({placeholder:"Select some skills"});
    }

    // Like the tin says
    autosize($('textarea'));

    function makeDbCall(thisform) {
        //if(mustFill(thisform)){
        $('#save').text('Saving...');
        $.ajax({
            type: "POST",
            url: "includes/skills.db.php",
            data: "action="+ $('#action').val() +
                "&id=" + $('#id').val() +
                "&name=" + $('#name').val() +
                "&fig_notation=" + $('#fig_notation').val() +
                "&tariff=" + $('#tariff').val() +
                "&shape_bonus=" + $('#shape_bonus').val() +
                "&level=" + $('#level').val() +
                "&start_position=" + $('#start_position').val() +
                "&end_position=" + $('#end_position').val() +
                "&short_description=" + $('#short_description').val() +
                "&long_description=" + $('#long_description').val() +
                "&coaching_points=" + $('#coaching_points').val() +
                "&lateral_prog=" + JSON.stringify($('#lateral_prog').val()) +
                "&linear_prog=" + JSON.stringify($('#linear_prog').val()) +
                "&vid=" + $('#vid').val(),
            dataType: "text",
            success: function (data) {
                if (data.charAt(0) == '1') {
                    window.location = '#/browse/'+$('#level').val().toLowerCase()+'/'+data.substring(1);

                    $('input').val('');
                    $('textarea').val('');
                    $('#lateral_prog').val('');
                    $('#linear_prog').val('');

                    $('#ajaxReturn').removeClass('alert-danger'); //Just in case
                    $('#ajaxReturn').addClass('alert-success').html('<strong>Success!</strong> ' + data.substring(1));
                } else {
                    $('#ajaxReturn').removeClass('alert-success'); //Just in case
                    $('#ajaxReturn').addClass('alert-danger').html('<strong>Warning!</strong> ' + data);
                }
                $('#ajaxReturn').prepend('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').show();
                window.scrollTo(0, 0);
                console.log(data);
                $('#save').text('Save');
            }
        });
    }
</script>
<?php
  require_once('../includes/db.php');
  setTitle("Bounce Book - Tree");

  // Convert array into cytoscape data
  $nodes = array();
  $edges = array();
  function getSkillTree($skillName){
    global $db, $nodes, $edges;

    $skill_query = mysqli_query($db, "SELECT * FROM skills WHERE name='$skillName' ORDER BY id ASC");
    $skill = mysqli_fetch_assoc($skill_query);
    $knowSkill = ($skill['learned'] == 1)? "knowSkill": "";

    // Add each node
    $nodes[] = array('data'=>array('id'=>$skill['name']));

    // Add each edge
    $linear_progs = json_decode($skill['linear_prog'], true);
    if ($linear_progs!=null){
      foreach ($linear_progs as $linear_prog) {
        $edges[] = array('data'=>array('source'=>$skill['name'], 'target'=>$linear_prog));
      }

      // Recurse
      $linearProgs = json_decode($skill['linear_prog'], true);
      if (is_array($linearProgs)){
        foreach ($linearProgs as $prog) {
          getSkillTree($prog);
        }
      }
    }
    // end edge loop
  }

  // Start skill tree at Tuck Jump
  getSkillTree("Tuck Jump");

  // Give this information to JavaScript
  echo '
  <script>
      var nodes = '.json_encode($nodes).';
      var edges = '.json_encode($edges).';
  </script>
  ';

?>

<div class="alert alert-warning" role="alert">
  <strong>Warning!</strong> This page isn't quite fleshed out yet. Bit like the rest of them.
</div>

<hr>
<h3>Tree</h3>
<p>This page is intended to graph all the relationships between skills visually.</p>

<strong>Sample suggestion</strong>
<p>Your current skill is "Front Drop". You should learn Back Drop next or how about Turnover/Bounce Roll.</p>

<br>

<!-- Directed graph. Drawn by cytoscape -->
<div id="cy">

</div>


<style>
  #cy {
      /* border: 1px solid black; */
      height: 700px;
      width: 100%;
  }
</style>

<script>

  var cy = cytoscape({
    // very commonly used options:
    container: document.getElementById('cy'),

    // initial viewport state:
    zoom: 1,
    pan: { x: 0, y: 0 },

    // interaction options:
    minZoom: 1e-50,
    maxZoom: 1e50,
    zoomingEnabled: false,
    userZoomingEnabled: false,
    panningEnabled: false,
    userPanningEnabled: false,
    boxSelectionEnabled: false,
    selectionType: 'single',
    touchTapThreshold: 0,
    desktopTapThreshold: 0,
    autolock: false,
    autoungrabify: true,
    autounselectify: true,

    elements: {
      nodes: nodes,
      edges: edges,
    },

    layout: {
      name: 'breadthfirst',

      fit: false, // whether to fit the viewport to the graph
      directed: true, // whether the tree is directed downwards (or edges can point in any direction if false)
      padding: 10, // padding on fit
      circle: false, // put depths in concentric circles if true, put depths top down if false
      spacingFactor: 0.3, // positive spacing factor, larger => more space between nodes (N.B. n/a if causes overlap)
      boundingBox: undefined, // constrain layout bounds; { x1, y1, x2, y2 } or { x1, y1, w, h }
      avoidOverlap: true, // prevents node overlap, may overflow boundingBox if not enough space
      roots: undefined, // the roots of the trees
      maximalAdjustments: 0, // how many times to try to position the nodes in a maximal way (i.e. no backtracking)
      animate: false, // whether to transition the node positions
      animationDuration: 1000, // duration of animation in ms if enabled
      animationEasing: undefined, // easing of animation if enabled
      ready: undefined, // callback on layoutready
      stop: undefined // callback on layoutstop
    },

    // so we can see the ids etc
    style: [
      {
        selector: 'node',
        style: {
          'content': 'data(id)',
        }
      }
    ]

  }); // on dom ready

</script>
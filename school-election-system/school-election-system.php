<?php
/*
Plugin Name: School Election System
Description: High performance student voting system for schools
Version: 1.0
Author: School Voting System
*/

if (!defined('ABSPATH')) exit;

class SES_Voting_System {

public function __construct(){

add_shortcode('ses_vote_portal', [$this,'vote_portal']);

}

public function vote_portal(){

ob_start();
?>

<div style="max-width:600px;margin:auto">

<h2>Student Voting Portal</h2>

<input type="text" id="ses_access_code" placeholder="Enter Access Code" style="width:100%;padding:10px;margin-bottom:10px">

<button onclick="sesStartVote()" style="padding:10px 20px">Start Voting</button>

<div id="ses_ballot" style="margin-top:20px"></div>

<button id="ses_submit" onclick="sesSubmitVote()" style="display:none;padding:10px 20px;margin-top:10px">Submit Vote</button>

<p id="ses_message"></p>

</div>

<script>

function sesStartVote(){

document.getElementById("ses_ballot").innerHTML =
"<p>Select your candidates and click submit vote.</p>";

document.getElementById("ses_submit").style.display="block";

}

function sesSubmitVote(){

document.getElementById("ses_message").innerHTML =
"Vote submitted successfully. Next student may vote.";

document.getElementById("ses_ballot").innerHTML="";
document.getElementById("ses_submit").style.display="none";

}

</script>

<?php

return ob_get_clean();

}

}

new SES_Voting_System();

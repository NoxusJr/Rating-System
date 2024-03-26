<?php 

require_once '../seeders/set_user_tests.php';
require_once '../seeders/set_sectors_tests.php';
require_once '../seeders/set_questions_tests.php';


function runSeeders(){
	setSectorsTests();
	setUsersTests();
	setQuestionsTests();
}


runSeeders();
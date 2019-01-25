<?php
add_action( 'plugins_loaded', array( 'program', 'init' ));


 

require_once("phase.php");
require_once("exercise.php");
require_once("program.php");

class databaseManagement{

	public function fixProgramBodyParts(){
		global $wpdb;
		$programs = new program();
		$tableName = $wpdb->prefix . "cura_programs";
		$allProgs = $programs->getAllPrograms();
		foreach ($allProgs as $key) {
			echo $key->name . " body parts: " . $key->body_part;
			$explodedParts = explode(",", $key->body_part);
			$count = 0;
			$toImplodeIds = array();

			foreach ($explodedParts as $part){
				$partId = $programs->getBodyPartIdByName($part);
				$toImplodeIds[$count] = $partId;
				echo "<br>" . $part . " id added to final array.";
				$count++;
			}

			$finalIds = implode(",", $toImplodeIds);
			if (isset($finalIds) && !is_null($finalIds)){
            $wpdb->update($tableName, array(
            "assoc_body_part_id" => $finalIds),
            array( // Where Clause
            "id" => $key->id));
            echo "<br>" . $finalIds . " added to: " . $key->name;
        	}
		}		
	}

	public function fixProgramSportsOcc(){
		global $wpdb;
		$programs = new program();
		$tableName = $wpdb->prefix . "cura_programs";
		$allProgs = $programs->getAllPrograms();
		foreach ($allProgs as $key) {
			echo $key->name . " sports/occupation: " . $key->sportsOccupation;
			$explodedParts = explode(",", $key->sportsOccupation);
			$count = 0;
			$toImplodeIds = array();

			foreach ($explodedParts as $sport){
				$sportId = $programs->getSportOccIdByName($sport);
				$toImplodeIds[$count] = $sportId;
				echo "<br>" . $sport . " id added to final array.";
				$count++;
			}

			$finalIds = implode(",", $toImplodeIds);
			if (isset($finalIds) && !is_null($finalIds)){
            $wpdb->update($tableName, array(
            "sports_occupation" => $finalIds),
            array( // Where Clause
            "id" => $key->id));
            echo "<br>" . $finalIds . " added to: " . $key->name;
        	}
		}		
	}





}
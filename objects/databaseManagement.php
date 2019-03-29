<?php

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

	public function fixProgramHowItHappened(){
		global $wpdb;
		$programs = new program();
		$tableName = $wpdb->prefix . "cura_programs";
		$allProgs = $programs->getAllPrograms();
		foreach ($allProgs as $key) {
			echo $key->name . " Injury : " . $key->howItHappen;
			$explodedParts = explode(",", $key->howItHappen);
			$count = 0;
			$toImplodeIds = array();

			foreach ($explodedParts as $injury){
				$injuryId = $programs->getHowItHappenedIdByName($injury);
				$toImplodeIds[$count] = $injuryId;
				echo "<br>" . $injury . " id added to final array.";
				$count++;
			}

			$finalIds = implode(",", $toImplodeIds);
			if (isset($finalIds) && !is_null($finalIds)){
            $wpdb->update($tableName, array(
            "how_it_happen" => $finalIds),
            array( // Where Clause
            "id" => $key->id));
            echo "<br>" . $finalIds . " added to: " . $key->name;
        	}
		}		
		}

	public function updateNulls(){
		global $wpdb;
		$programs = new program();
		$tableName = $wpdb->prefix . "cura_programs";

		//fix body part nulls
		$programs->newBodyPart("No Body Part Assigned");
		
		$nullBodyParts = $wpdb->get_results("SELECT id FROM $tableName WHERE assoc_body_part_id IS NULL");
		foreach ($nullBodyParts as $key) {
			$wpdb->update($tableName, array(
            "assoc_body_part_id" => "No Body Part Assigned"),
            array( // Where Clause
            "id" => $key->id));
        	}
		

		//fix sports occupations
		$programs->newSport("No Sport Assigned");
		$lastId = $wpdb->insert_id;
		$nullSportsOcc = $wpdb->get_results("SELECT id FROM $tableName WHERE sports_occupation IS NULL");
		foreach ($nullSportsOcc as $key) {
			$wpdb->update($tableName, array(
            "sports_occupation" => "No Sport Assigned"),
            array( // Where Clause
            "id" => $key->id));
        	}
		

		//fix injury
		$programs->newHowItHappened("No How It Happened Assigned");
		$lastId = $wpdb->insert_id;
		$nullInjuries = $wpdb->get_results("SELECT id FROM $tableName WHERE how_it_happen IS NULL");
		foreach ($nullInjuries as $key) {
			$wpdb->update($tableName, array(
            "how_it_happen" => "No How It Happened Assigned"),
            array( // Where Clause
            "id" => $key->id));
        	}
		


	}





}
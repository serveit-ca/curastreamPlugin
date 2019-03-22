<?php
add_action( 'plugins_loaded', array( 'program', 'init' ));


 
require_once("program.php");
require_once("phase.php");
require_once("exercise.php");
class group
{

public function newCustomGroup($groupName){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_groups";
        $groupName = trim($groupName);
        if (isset($groupName) && !is_null($groupName)){
            $wpdb->insert($tableName, array(
            "name" => $groupName,
            "type" => 2));
            $lastid = $wpdb->insert_id;
            return $lastid;
        }
    }
    public function newCorp($corpName){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_corps";
        //$corpName = trim($corpName);
        if (isset($corpName) && !is_null($corpName)){
            $wpdb->insert($tableName, array(
            "name" => $corpName));
            $lastid = $wpdb->insert_id;
            return $lastid;
        }
    }

    public function newCorpGroup($groupName, $corpId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_groups";
        $groupName = trim($groupName);
        if (isset($groupName) && !is_null($groupName)){
            $wpdb->insert($tableName, array(
            "name" => $groupName,
            "type" => 1));
            $lastid = $wpdb->insert_id;

            $tableName = $wpdb->prefix . "cura_corp_groups";
            $wpdb->insert($tableName, array(
            "group_id" => $lastid,
            "corp_Id" => $corpId));
            
            return $lastid;
        }
    }

    public function getCorpById($corpId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_corps";
        $corp = $wpdb->get_results("SELECT mempr_id, name FROM $tableName WHERE id = $corpId");
        return $corp;
    }

    public function getProgramsByGroupId($groupId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_group_programs";
        $groupIds = $wpdb->get_results("SELECT program_id FROM $tableName WHERE group_id = $groupId");
        $progIds = array();
        foreach ($groupIds as $key) {
            $program = $key->program_id;
            $progIds[] = $program;
        }
        return $progIds;
    }

    public function getUsersByGroupId($groupId){
        global $wpdb;
        $tableNameA = $wpdb->prefix . "cura_user_programs";
        $programUsers = $wpdb->get_results("SELECT DISTINCT user_id FROM $tableNameA WHERE group_id = $groupId", ARRAY_A);
        $usersArray = array();
        foreach($programUsers as $key){
            $userObj = get_user_by('ID', $key['user_id']);
           if (isset($userObj->first_name) && !is_null($userObj->first_name) && isset($userObj->last_name) && !is_null($userObj->last_name)){
                //print_r($userObj);
                $userName = $userObj->first_name . " " . $userObj->last_name;
                //echo "User Name " . $userName;
                $usersArray[] = $userName;
            }
            elseif(isset($userObj->display_name) && !is_null($userObj->display_name)){
                $userName = $userObj->display_name;
            }
        }
        return $usersArray;
    }

    public function assignUserToGroup($groupId, $userId){
        global $wpdb;
        $progams = new program();
        $tableName = $wpdb->prefix . "cura_group_users";
        if (isset($groupId) && !is_null($groupId) && isset($userId) && !is_null($userId)){
            $wpdb->insert($tableName, array(
            "group_id" => $groupId,
            "user_id" => $userId,
            "privilege_level" => 0));
            $lastid = $wpdb->insert_id;

            //get all programs from group
            $allGroupProgs =  $this->getProgramsByGroupId($groupId);
            foreach ($allGroupProgs as $key) {
                if($programs->checkAssigned($key, $userId) == "notAssigned"){
                        $programs->assignProgramToUser($key, $userId);
                         $this->makeGroupAssigned($key, $groupId, $userId);
                         echo "Program with Id: " . $key . " Assigned to User with Id: " . $userId . "<br>";
                    }
                else{
                    echo "User is already assigned to this group.";
                }
                
            }
            return $lastid;
        }
    }

    public function removeUserFromGroup($groupId, $userId){
        global $wpdb;
        $progams = new program();
        $tableName = $wpdb->prefix . "cura_group_users";
        if (isset($groupId) && !is_null($groupId) && isset($userId) && !is_null($userId)){
            $wpdb->delete($tableName, array(
                "group_id" => $groupId,
                "user_id" => $userId));
            // Delete all of that users programs tied to the group --
            $groupProgs = $this->getProgramsByGroupId($groupId);
            foreach ($groupProgs as $key) {
                if($this->checkGroupAssigned($key, $userId) == "Assigned"){
                    $programs->removeProgramFromUser($key, $userId);
                }
            }


            
        }    
    }

    public function checkGroupAssigned($programId, $userId){
        global $wpdb;
        $status = "notGroupAssigned";
        if (isset($programId) && !is_null($programId) && isset($userId) && !is_null($userId)){
            $tableName = $wpdb->prefix . "cura_user_programs";

            $updateInfo = $wpdb->get_row("SELECT group_id FROM $tableName WHERE user_id = $userId AND saved_prog_id = $programId", ARRAY_A);
            if (is_null($updateInfo) || $updateInfo['group_id'] == 0){
                $status="notGroupAssigned";
            } else{
                $status="Assigned";
            }
        }
            return $status;
    }

    public function assignProgramToGroup($programId, $groupId){
        global $wpdb;
        $progams = new program();
        $tableName = $wpdb->prefix . "cura_group_programs";
        if (isset($groupId) && !is_null($groupId) && isset($programId) && !is_null($programId)){
            $wpdb->insert($tableName, array(
                "program_id" => $programId,
                "group_id" => $groupId));
            $groupUsers = $this->getUsersByGroupId($groupId);
            if (isset($groupId) && !is_null($groupId)){
                foreach ($groupUsers as $key) {
                    if($programs->checkAssigned($programId, $key) == "notAssigned"){
                        $programs->assignProgramToUser($programId, $key);
                        $this->makeGroupAssigned($programId, $groupId, $key);
                    }
                }
            }
        }   
        
    }

    public function removeProgramFromGroup($programId, $groupId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_group_programs";
        if (isset($groupId) && !is_null($groupId) && isset($programId) && !is_null($programId)){
            $wpdb->delete($tableName, array(
                "program_id" => $programId,
                "group_id" => $groupId));
            $groupUsers = $this->getUsersByGroupId($groupId);
            foreach ($groupUsers as $key) {
                if($this->checkGroupAssigned($programId, $key) == "Assigned"){                    
                    $this->removeProgramFromUser($programId, $key);
                }
            }
        } 

    }

    public function changeGroupUserPrivilege($groupId, $userId, $privilegeLevel){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_group_users";
        //Check and Update name
        if (isset($privilegeLevel) && !is_null($privilegeLevel)){
            $wpdb->update($tableName, array(
            "privilege_level" => $privilegeLevel),
            array( // Where Clause
            "user_id" => $userId,
            "group_id" => $groupId));
            echo "User with Id " . $userId . " Privilege Changed to " . $privilegeLevel;
        }
    }

    public function checkUserPrivilege($userId, $groupId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_group_users";
        $privLevel = $wpdb->get_row("SELECT privilege_level FROM $tableName WHERE user_id = $userId AND group_id = $groupId");
        if($privLevel->privilege_level == 2){
            return "Owner Level";
        }
        elseif($privLevel->privilege_level == 1) {
            return "Admin Level";
        }
        elseif($privLevel->privilege_level == 0) {
            return "User Level";
        }
        else{
            return "Error: Privilege Level Not Assigned";
        }

    }

    public function makeGroupAssigned($programId, $groupId, $userId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_user_programs";
        //Check and Update name
        if (isset($programId) && !is_null($programId) && isset($userId) && !is_null($userId) && isset($groupId) && !is_null($groupId)){
            $wpdb->update($tableName, array(
            "group_id" => $groupId),
            array( // Where Clause
            "saved_prog_id" => $programId,
            "user_id" => $userId));
        }
    }

    public function getAllCorpGroups(){
        global $wpdb;
        $tableName =  $wpdb->prefix . "cura_groups";
        $corpGroups = $wpdb->get_results("SELECT id, name, type FROM $tableName WHERE type = 1 ORDER BY name");
        $groups = array();
        foreach ($corpGroups as $key) {
            $aGroup = array();
            $aGroup['name'] = $key->name;
            $aGroup['id'] = $key->id;
            $aGroup['type'] = $key->type;
            $groups[] = $aGroup;
        }
        return $groups;
    }

    public function getAllCustomGroups(){
        global $wpdb;
        $tableName =  $wpdb->prefix . "cura_groups";
        $corpGroups = $wpdb->get_results("SELECT id, name, type FROM $tableName WHERE type = 2 ORDER BY name");
        $groups = array();
        foreach ($corpGroups as $key) {
            $aGroup = array();
            $aGroup['name'] = $key->name;
            $aGroup['id'] = $key->id;
            $aGroup['type'] = $key->type;
            $groups[] = $aGroup;
        }
        return $groups;
    }

    public function getCorpAccountByGroupId($groupId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_corp_groups";
        $corpId = $wpdb->get_row("SELECT corp_id FROM $tableName WHERE group_id = $groupId");
        if(isset($corpId)){
            return $corpId->corp_id;
        }
        else{
            return "No Corp For This Group";
        }
    }

    public function checkGroupType($groupId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_groups";
        $type = $wpdb->get_row("SELECT type FROM $tableName WHERE group_id = $groupId");
        return $type;
    }

    public function deleteGroup($groupId){
        global $wpdb;
        // Removes all Users
        $groupUsers = $this->getUsersByGroupId($groupId);
        foreach ($groupUsers as $key) {
            $this->removeUserFromGroup($key);
        }
        // Removes all programs
        $groupProgs = $this->getProgramsByGroupId($groupId);
        foreach ($groupProgs as $key) {
            $this->removeProgramFromGroup($key);
        }
        // Removes from Corp Group Table
        $groupType = $this->checkGroupType($groupId);
        if($groupType == 1){
            // Is a Corp. Group, delete it.
            $tableNameB = $wpdb->prefix . "cura_corp_groups";
            $wpdb->delete($tableNameB, array(
                "group_id" => $groupId));
        }
    }

   

    public function updateMemprIdToCorp($memprId, $corpId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_corps";

        if (isset($memprId) && !is_null($memprId)){
            $wpdb->update($tableName, array(
            "mempr_id" => $memprId),
            array( // Where Clause
            "id" => $corpId));
        }

    }

    public function getCorpIdByMemprId($memprId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_corps";

        $corpId = $wpdb->get_row("SELECT id FROM $tableName WHERE mempr_id = $memprId");

        return $corpId->id;
    }

    public function getGroupIdByCorpId($corpId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_corp_groups";

        $groupId = $wpdb->get_row("SELECT group_id FROM $tableName WHERE corp_id = $corpId");

        return $groupId->group_id;
    }

    // Pricing Functions Below

    public function newPricingTier($minUser, $maxUser, $pricePer){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_corp_tiers";
        if (isset($minUser) && !is_null($minUser) && isset($maxUser) && !is_null($maxUser) && isset($pricePer) && !is_null($pricePer)){
            $wpdb->insert($tableName, array(
            "min_users" => $minUser,
            "max_users" => $maxUser,
            "price_per_user" => $pricePer,
            "is_default" => 0));
            $lastid = $wpdb->insert_id;
            return $lastid;
        }
    }

    public function newDefaultPricingTier($minUser, $maxUser, $pricePer){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_corp_tiers";
        if (isset($minUser) && !is_null($minUser) && isset($maxUser) && !is_null($maxUser) && isset($pricePer) && !is_null($pricePer)){
            $wpdb->insert($tableName, array(
            "min_users" => $minUser,
            "max_users" => $maxUser,
            "price_per_user" => $pricePer,
            "is_default" => 1));
            $lastid = $wpdb->insert_id;
            return $lastid;
        }
    }

    public function updatePricingTier($minUser, $maxUser, $pricePer, $tierId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_corp_tiers";

        //Check and update Min User
        if (isset($minUser) && !is_null($maxUser)){
            $wpdb->update($tableName, array(
            "min_users" => $minUser),
            array( // Where Clause
            "id" => $tierId));
        }

        //Check and update Max User
        if (isset($maxUser) && !is_null($maxUser)){
            $wpdb->update($tableName, array(
            "max_users" => $maxUser),
            array( // Where Clause
            "id" => $tierId));
        }

        //Check and update Min User
        if (isset($pricePer) && !is_null($pricePer)){
            $wpdb->update($tableName, array(
            "price_per_user" => $pricePer),
            array( // Where Clause
            "id" => $tierId));
        }
    }

    public function checkTierUserLimits($tierId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_corp_tiers";

        $limits = $wpdb->get_row("SELECT min_users, max_users FROM $tableName WHERE id = $tierId");
        return $limits;
    }

    public function getCurrentPricePerUser($tierId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_corp_tiers";

        $price = $wpdb->get_row("SELECT price_per_user FROM $tableName WHERE id = $tierId");
        return $price->price_per_user;
    }

    public function getCurrentPricePerUserByCorp($corpId){
        global $wpdb;
        $numUsers = $this->getNumberOfCorpSubAccounts($corpId);
        echo "Number of Users within Get Price: " . $numUsers . "<br>";
        $tableName = $wpdb->prefix . "cura_corp_prices";
        $allTiers = $wpdb->get_results("SELECT tier_id FROM $tableName WHERE corp_id = $corpId");
        $tableName = $wpdb->prefix . "cura_corp_tiers";
        $userPrice = 0;
        foreach ($allTiers as $key) {
            $tier = $wpdb->get_row("SELECT min_users, max_users, price_per_user FROM $tableName WHERE id = $key->tier_id");
            if($numUsers > ($tier->min_users-1) && ($tier->max_users+1) > $numUsers){
                $userPrice = $tier->price_per_user;
            }
        }
        if($userPrice == 0){
            return "No Pricing Tier Found";
        }
        else{
            return $userPrice;
        }
    }

    public function getTotalSubscriptionPrice($corpId){
        $userPrice = $this->getCurrentPricePerUserByCorp($corpId);
        $numUsers = $this->getNumberOfCorpSubAccounts($corpId);
        $totalPrice = $userPrice * $numUsers;
        return $totalPrice;
    }

    public function getNumberOfCorpSubAccounts($corpId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_corp_groups";

        $group = $wpdb->get_row("SELECT group_id FROM $tableName WHERE corp_id = $corpId");
        $groupId = $group->group_id;

        $tableName = $wpdb->prefix . "cura_group_users";
        $users = $wpdb->get_results("SELECT user_id FROM $tableName WHERE group_id = $groupId");
        $count = 0;
        foreach ($users as $key) {
            $count++;
        }
        return $count;
    }

    public function getCorpTier($corpId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_corp_prices";
        $allTiers = $wpdb->get_results("SELECT tier_id FROM $tableName WHERE corp_id = $corpId");
        $tableName = $wpdb->prefix . "cura_corp_tiers";
        $corpTier = 0;
        foreach ($allTiers as $key) {
            $tier = $wpdb->get_row("SELECT min_users, max_users, id FROM $tableName WHERE id = $key");
            if($numUsers > $tier->min_users && $tier->max_users < $numUsers){
                $corpTier = $tier->id;
            }
        }
        return $corpTier;
    }

    public function checkValidTier($lastMax, $newMin, $newMax, $nextMin){
        if($lastMax < $newMin && ($newMin - $lastMax) == 1 && $newMax < $newMax && ($nextMin - $newMax) == 1){
            if(isset($nextMin)){
                if($newMax < $nextMin){
                    return "Valid Tier";
                }
            }
            else{        
                return "Valid Tier";
            }
        }            
        else{
            return "Tier Not Valid";
        }
    }

    public function assignTierToCorp($tierId, $corpId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_corp_prices";
        if (isset($tierId) && !is_null($tierId) && isset($corpId) && !is_null($corpId)){
            $wpdb->insert($tableName, array(
            "tier_id" => $tierId,
            "corp_id" => $corpId));
            $lastid = $wpdb->insert_id;
            return $lastid;
        }
    }

    public function removeTierFromCorp($tierId, $corpId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_corp_prices";
        $wpdb->delete($tableName, array(
                "tier_id" => $tierId,
                "corp_id" => $corpId));
    }

    public function assignAllDefaultsToCorp($corpId){
        global $wpdb;
        $tableName = $wpdb->prefix . "cura_corp_tiers";
        $defaultTiers = $wpdb->get_results("SELECT id FROM $tableName WHERE is_default = 1");
        $tableName = $wpdb->prefix . "cura_corp_prices";
        foreach ($defaultTiers as $key) {
            if (isset($key->id) && !is_null($key->id) && isset($corpId) && !is_null($corpId)){
            $wpdb->insert($tableName, array(
            "tier_id" => $key->id,
            "corp_id" => $corpId));            
            }
        }
    }



}

?>
<?php 

class WP_Program_Test extends WP_UnitTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->class_instance = new WP_Program_Test();
    }

    public function reset_database(){
    	$command = "mysql --user={$vals['root']} --password='{$vals['']}' "
 		. "-h {$vals['db_host']} -D {$vals['db_name']} < {'travis.sql'}";

		$output = shell_exec($command . '/shellexec.sql');
    }

    public function test_get_program_by_id()
    {
    	$programs = new program();
    	$program37 = $programs->getProgramById(37);
    	assert($program37->id == 37, "getProgramById");
    	$this->reset_database();
    }




}

?>
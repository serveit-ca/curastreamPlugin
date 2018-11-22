<?php 

class WP_Program_Test extends WP_UnitTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->class_instance = new WP_Program_Test();
    }

    public function test_get_program_by_id()
    {
    	public $programs = new program();
    	$program37 = $programs->getProgramById(37);
    	if ($program37 -> id == 37) {
    		assert(true);
    	}
    	else{
    		assert(false);
    	}
    }


}

?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_User extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(
            array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => true,
                    'auto_increment' => true
                ),
                'username' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ),
                'email' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ),
                'age' => array(
                    'type' => 'INT',
                    'constraint' => '100',
                ),
                'gender' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ),
                'password' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ),
            )
        );
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('userdetails');


        $this->dbforge->add_field(
            array(
                'id_2' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => true,
                    'auto_increment' => true
                ),
                'num_id' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => true,
                ),
                'mobile' => array(
                    'type' => 'VARCHAR', // Changed to INT
                    'constraint' => 10, // Length of mobile number
                ),
            )
        );
        $this->dbforge->add_key('id_2', true);
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY(num_id) REFERENCES userdetails(id)');
        $this->dbforge->create_table('usernumber');
    }
    public function down()
    {
        $this->dbforge->drop_table('usernumber');
        $this->dbforge->drop_table('userdetails');
    }
}
?>
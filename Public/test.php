<?php

class SignonHandler
{
    private $ldap_connection;
    
    public function connect()
    {
        $this->ldap_connection = ldap_connect("192.168.1.126", 389);
        if ($this->ldap_connection)
        {
            ldap_set_option($this->ldap_connection, LDAP_OPT_PROTOCOL_VERSION, 3);
        } else {
            throw new Exception("Cannot connect to ldap server");
        }
    }
    
    public function login($userdn, $password)
    {
        if (!ldap_bind($this->ldap_connection, $userdn, $password))
        {
            throw new Exception("Cannot bind to ldap connection");
        }        
    }
}

$soh = new SignonHandler();
$soh->connect();
$soh->login("uid=TestUser,ou=webusers,dc=plazko,dc=com", "Test123");
die("Login is successful");
?>
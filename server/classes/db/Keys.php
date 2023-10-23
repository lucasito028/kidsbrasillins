<?php
 
    namespace Keys;

    abstract class Keys{
    
        protected $host = "localhost";
        protected $user = "root";
        protected $db = "kidsbrasil";
        protected $password = "";
        protected $port = 3307;
    
        //The part of Connect
        protected object $conn;
    
    }


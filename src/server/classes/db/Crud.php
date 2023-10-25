<?php

    namespace Crud;

    require_once 'Acess.php';

    interface Crud{

        function select($dados): array;

        function insert($dados);  

        function update($dados); 

        function delete($dados);

        function view($dados);  

    }


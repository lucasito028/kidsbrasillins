<?php

    namespace Crud;
    interface Crud{

        function select($dados): array;

        function insert($dados);  

        function update($dados); 

        function delete($dados);

        function view($dados);  

    }


<?php
    function task_get_all() {
        return R::findAll('tasks');
    }
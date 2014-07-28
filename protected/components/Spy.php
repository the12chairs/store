<?php
    class Spy extends CApplicationComponent {

       public function send($name){
           error_log($name . "\n", 3, "spy.log");
       }
    }
<?php
class User {
        public $first_name;
        public $last_name;
        public $user_name;
        protected $password;

        public function getAuthentication($params) {
                if ($this->user_name == $params['username']){
                        if ($this->password == $params['password']{
                                return true;
                        } else {
                                throw new Exception("Invalid Password");
                        }
                } else {
                        throw new Exception("User not found");
                }
        }
}


<?php

    class Validator{
        private $nameIsValid = false;
        private $genderIsValid  = false;
        private $emailIsValid  = false;
        private $websiteIsValid  = false;
        private $commentIsValid  = false;

        public function getNameIsValid() {
            return $this->nameIsValid;
        }

        public function setNameIsValid($nameValidator) {
            $this->nameIsValid = $nameValidator;
        }

        public function getGenderIsValid() {
            return $this->genderIsValid;
        }

        public function setGenderIsValid($genderIsValid) {
            $this->genderIsValid = $genderIsValid;
        }

        public function getEmailIsValid() {
            return $this->emailIsValid;
        }

        public function setEmailIsValid($emailValidator) {
            $this->emailIsValid = $emailValidator;
        }

        public function getWebsiteIsValid() {
            return $this->websiteIsValid;
        }

        public function setWebsiteIsValid($websiteIsValid) {
            $this->websiteIsValid = $websiteIsValid;
        }

        public function getCommentIsValid() {
            return $this->commentIsValid;
        }

        public function setCommentIsValid($commentIsValid) {
            $this->commentIsValid = $commentIsValid;
        }


    /*$name = $_REQUEST["q1"];
    $value = $_REQUEST["q2"];*/

    }

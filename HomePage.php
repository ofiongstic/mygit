<?php

    include_once "Page.php";
    include_once "Validator.php";
    class HomePage implements Page {
        private $title = "Site 3";
        private $method = "Post";
        private $name = "";
        private $gender = "";
        private $email = "";
        private $website = "";
        private $comment = "";
        private $nameErr = "";
        private $genderErr = "";
        private $emailErr = "";
        private $websiteErr = "";
        private $commentErr = "";
        private $validator;

        public function __construct() {
            $this->validator = new Validator();
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getGender() {
            return $this->gender;
        }

        public function setGender($gender) {
            $this->gender = $gender;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getWebsite() {
            return $this->website;
        }

        public function setWebsite($website) {
            $this->website = $website;
        }

        public function getComment() {
            return $this->comment;
        }

        public function setComment($comment) {
            $this->comment = $comment;
        }

        public function getNameErr() {
            return $this->nameErr;
        }

        public function setNameErr($nameErr) {
            $this->nameErr = $nameErr;
        }

        public function getGenderErr() {
            return $this->genderErr;
        }

        public function setGenderErr($genderErr) {
            $this->genderErr = $genderErr;
        }

        public function getEmailErr() {
            return $this->emailErr;
        }

        public function setEmailErr($emailErr) {
            $this->emailErr = $emailErr;
        }

        public function getWebsiteErr() {
            return $this->websiteErr;
        }

        public function setWebsiteErr($websiteErr) {
            $this->websiteErr = $websiteErr;
        }

        public function getCommentErr() {
            return $this->commentErr;
        }

        public function setCommentErr($commentErr) {
            $this->commentErr = $commentErr;
        }

        public function loadHomePage() {
            $nameSet  = $this->getName();
            $genderSet  = $this->getGender();
            $emailSet  = $this->getEmail();
            $websiteSet  = $this->getWebsite();
            $commentSet  = $this->getComment();
            $nameErrSet  = $this->getNameErr();
            $genderErrSet  = $this->getGenderErr();
            $emailErrSet  = $this->getEmailErr();
            $websiteErrSet  = $this->getWebsiteErr();
            $commentErrSet  = $this->getCommentErr();
            $action = htmlspecialchars($_SERVER["PHP_SELF"]);

            $form = "<form action=\"$action\" method=\"post\">
    <div id=\"row1\">
        NAME:
        <br>
        <input id=\"name\" type=\"text\" name=\"name\" value=\"$nameSet\">
        <br>
        <span>$nameErrSet</span>
        <br><br>
        GENDER:
        <br>
        <select name=\"gender\" value=\"$genderSet\" >
        <option value=\"Male\">Male</option>
        <option value=\"Female\">Female</option>
        <option value=\"Others\">Others</option>
        </select>
        <br>
        <span>$genderErrSet</span>
        <br><br>
    </div>
    <div id=\"row2\">
        EMAIL:
        <br>
        <input type=\"text\" name=\"email\"  value=\"$emailSet\" >
        <br>
        <span>$emailErrSet</span>
        <br><br>
        WEBSITE:
        <br>
        <input type=\"text\" name=\"website\"   value=\"$websiteSet\">
        <br>
        <span>$websiteErrSet</span>
    </div>
    <br><br>
    COMMENTS:
    <br>
    <textarea rows=\"5\" cols=\"25\" name=\"comments\">$commentSet</textarea>
    <br>
    <span>$commentErrSet</span>
    <br>
    <button type='submit'>OK</button>

</form> ";
            echo $form;
        }

        public function verifyInput() {
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $_name = $_POST["name"];
                $this->verifyName($_name);
                $_email = $_POST["email"];
                $this->verifyEmail($_email);
                $_website = $_POST["website"];
                $this->verifyWebsite( $_website);
                $_comments = $_POST["comments"];
                $this->verifyComments($_comments);
                $_gender = $_POST["gender"];
                $this->verifyGender($_gender);
            }
        }

        public function loadMethod() {
            return $this->method;
        }

        public function loadTitle() {
            return $this->title;
        }

        private function testInput($input) {
            $input = trim($input);
            $input = stripslashes($input);
            $input = htmlspecialchars($input);
            return $input;
        }

        function containSymbols($in) {
            return !preg_match("/^[a-zA-Z ]*$/", $in);
        }

        public function showOutput() {
            $nVal = $this->validator->getNameIsValid();
            $eVal = $this->validator->getEmailIsValid();
            $gVal = $this->validator->getGenderIsValid();
            $wVal = $this->validator->getWebsiteIsValid();
            $cVal = $this->validator->getCommentIsValid();
            echo "<br>";
            if ($nVal && $eVal){
                echo "Form will be processed !";
            }
            else{
                echo "Form will not be processed !";
            }
        }

        private function verifyName($_name) {
            if (empty($_name)) {
                $this->setNameErr("Name required");
            }
            else {
                $_name = $this->testInput($_name);
                if ($this->containSymbols($_name)) {
                    $this->setNameErr("No symbols : $_name");
                }
                else {
                    $this->setName($_name);
                    $this->validator->setNameIsValid(true);
                }
            }
        }

        private function verifyEmail($_email) {
            if (empty($_email)) {
                $this->setEmailErr("Email required.");
            }
            else {
                $_email = $this->testInput($_email);
                if (!$this->isEmail($_email)) {
                    $this->setEmailErr("Invalid Email format: $_email");
                }
                else {
                    $this->setEmail($_email);
                    $this->validator->setEmailIsValid(true);
                }
            }
        }

        private function verifyWebsite($_website) {
            
        }

        private function verifyComments($_comments) {
            
        }

        private function verifyGender($_gender) {

        }

        function isEmail($mail) {
            return filter_var($mail, FILTER_VALIDATE_EMAIL);
        }

    }
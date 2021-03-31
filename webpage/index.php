<?php
$name = '';
$email = '';
$username = '';
$password = '';
$confirm_password = '';
$date_of_birth = '';
$gender = '';
$marital_status = '';
$address = '';
$city = '';
$postal_code = '';
$home_phone = '';
$mobile_phone = '';
$credit_card_number = '';
$credit_card_expiry = '';
$monthly_salary = '';
$url = '';
$gpa = '';


$isNameValid = true;
$isEmailValid = true;
$isUsernameValid = true;
$isPasswordValid = true;
$isConfirmPasswordValid = true;
$isDateOfBirthValid = true;
$isGenderValid = true;
$isMaritalStatusValid = true;
$isAddressValid = true;
$isCityValid = true;
$isPostalCodeValid = true;
$isHomePhoneValid = true;
$isMobilePhoneValid = true;
$isCreditNumberValid = true;
$isCreditExpiryValid = true;
$isMonthlySalaryValid = true;
$isUrlValid = true;
$isGpaValid = true;

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $confirm_password = $_REQUEST['confirm_password'];
    $date_of_birth = $_REQUEST['date_of_birth'];
    $gender = $_REQUEST['gender'];
    $marital_status = $_REQUEST['marital_status'];
    $address = $_REQUEST['address'];
    $city = $_REQUEST['city'];
    $postal_code = $_REQUEST['postal_code'];
    $home_phone = $_REQUEST['home_phone'];
    $mobile_phone = $_REQUEST['mobile_phone'];
    $credit_card_number = $_REQUEST['credit_card_number'];
    $credit_card_expiry = $_REQUEST['credit_card_expiry'];
    $monthly_salary = $_REQUEST['monthly_salary'];
    $url = $_REQUEST['url'];
    $gpa = $_REQUEST['gpa'];


    $isNameValid = preg_match('/^[A-Z][a-z]*$/', $name) && strlen($name) >= 2;
    $isEmailValid = preg_match('/[a-z0-9.]*@[a-z.]*\.[a-z]{2,3}/', $email);
    $isUsernameValid = preg_match('/^[a-z0-9]*$/i', $username) && strlen($username) >= 5;
    $isPasswordValid = preg_match('/^[a-z0-9]*$/i', $password) && strlen($password) >= 8;
    $isConfirmPasswordValid = $confirm_password == $password;
    $isDateOfBirthValid = preg_match('/^(0[1-9]|[12][0-9]|3[01])\.(0[1-9]|1[012])\.(19|20)\d\d$/', $date_of_birth);
    $isGenderValid = preg_match('/^(Male)|(Female)$/', $gender);
    $isMaritalStatusValid = preg_match('/^(Single)|(Married)|(Divorced)|(Widowed)$/', $marital_status);
    $isAddressValid = preg_match('/(.*)/i', $address);
    $isCityValid = preg_match('/^[a-z][a-z \-]*[a-z]$/i', $city);
    $isPostalCodeValid = preg_match('/\d/', $postal_code);
    $isHomePhoneValid = preg_match('/^[0-9]{2}\s[0-9]{7}$/', $home_phone);
    $isMobilePhoneValid = preg_match('/^[0-9]{2}\s[0-9]{7}$/', $mobile_phone);
    $isCreditNumberValid = preg_match('/^[0-9]{4}\s[0-9]{4}\s[0-9]{4}\s[0-9]{4}$/', $credit_card_number);
    $isCreditExpiryValid = preg_match('/^(0[1-9]|[12][0-9]|3[01])\.(0[1-9]|1[012])\.(19|20)\d\d$/', $credit_card_expiry);
    $isMonthlySalaryValid = preg_match('/^UZS\s[0-9]{3},[0-9]{3}\.[0-9]{2}$/', $monthly_salary);
    $isUrlValid = preg_match('/^http:\/\/[a-z0-9]*\.[a-z]{2,3}$/', $url);
    $isGpaValid = $gpa < 4.5;


    $isFormValid = $isNameValid && $isEmailValid && $isUsernameValid && $isPasswordValid && $isConfirmPasswordValid && $isDateOfBirthValid && $isGenderValid && $isMaritalStatusValid && $isAddressValid
        && $isCityValid && $isPostalCodeValid && $isHomePhoneValid && $isMobilePhoneValid && $isCreditNumberValid && $isCreditExpiryValid && $isMonthlySalaryValid && $isUrlValid && $isGpaValid;

    if ($isFormValid) {
        header('Location: thanks.php', TRUE, 301);
    }
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Validating Forms</title>
    <link href="style.css" type="text/css" rel="stylesheet"/>
</head>

<body>
<h1>Registration Form</h1>

<p>
    This form validates user input and then displays "Thank You" page.
</p>

<hr/>

<form action="index.php" method="post">
    <h2>Please, fill below fields correctly</h2>
    <dl>
        <dt>Name</dt>
        <dd>
            <input type="text" name="name" value="<?= $name ?>">
        </dd>
        <dd class="<?= $isNameValid ? '' : 'not' ?>valid">
            This field is required. It has to contain at least 2 chars. It should not contain any number.
        </dd>

        <dt>Email</dt>
        <dd>
            <input type="text" name="email" value="<?= $email ?>">
        </dd>
        <dd class="<?= $isEmailValid ? '' : 'not' ?>valid">
            This field is required. It should correspond to email format.
        </dd>

        <dt>Username</dt>
        <dd>
            <input type="text" name="username" value="<?= $username ?>">
        </dd>
        <dd class="<?= $isUsernameValid ? '' : 'not' ?>valid">
            This field is required. It has to contain at least 2 chars. It should not contain any number.
        </dd>

        <dt>Password</dt>
        <dd>
            <input type="password" name="password" value="<?= $password ?>">
        </dd>
        <dd class="<?= $isPasswordValid ? '' : 'not' ?>valid">
            This field is required. It has to contain at least 8 chars.
        </dd>

        <dt>Confirm Password</dt>
        <dd>
            <input type="password" name="confirm_password" value="<?= $confirm_password ?>">
        </dd>
        <dd class="<?= $isConfirmPasswordValid ? '' : 'not' ?>valid">
            This field is required. It has to be equal to Password field.
        </dd>

        <dt>Date of Birth</dt>
        <dd>
            <input type="text" name="date_of_birth" value="<?= $date_of_birth ?>">
        </dd>
        <dd class="<?= $isDateOfBirthValid ? '' : 'not' ?>valid">
            Date should be written in dd.MM.yyyy format. For ex, 07.03.2019
        </dd>

        <dt>Gender</dt>
        <dd>
            <input type="text" name="gender" value="<?= $gender ?>">
        </dd>
        <dd class="<?= $isGenderValid ? '' : 'not' ?>valid">
            2 options accepted: Male, Female.
        </dd>

        <dt>Marital Status</dt>
        <dd>
            <input type="text" name="marital_status" value="<?= $marital_status ?>">
        </dd>
        <dd class="<?= $isMaritalStatusValid ? '' : 'not' ?>valid">
            This field is required. It has to contain at least 2 chars. It should not contain any number.
        </dd>

        <dt>Address</dt>
        <dd>
            <input type="text" name="address" value="<?= $address ?>">
        </dd>
        <dd class="<?= $isAddressValid ? '' : 'not' ?>valid">
            This is required field.
        </dd>

        <dt>City</dt>
        <dd>
            <input type="text" name="city" value="<?= $city ?>">
        </dd>
        <dd class="<?= $isCityValid ? '' : 'not' ?>valid">
            This is required field.
        </dd>

        <dt>Postal Code</dt>
        <dd>
            <input type="text" name="postal_code" value="<?= $postal_code ?>" maxlength="6">
        </dd>
        <dd class="<?= $isPostalCodeValid ? '' : 'not' ?>valid">
            This is required field. It should follow 6 digit format. For ex, 100011
        </dd>

        <dt>Home Phone</dt>
        <dd>
            <input type="text" name="home_phone" value="<?= $home_phone ?>" maxlength="10">
        </dd>
        <dd class="<?= $isHomePhoneValid ? '' : 'not' ?>valid">
            This is required field. It should follow 9 digit format. For ex, 97 1234567
        </dd>

        <dt>Mobile Phone</dt>
        <dd>
            <input type="text" name="mobile_phone" value="<?= $mobile_phone ?>">
        </dd>
        <dd class="<?= $isMobilePhoneValid ? '' : 'not' ?>valid">
            This is required field. It should follow 9 digit format. For ex, 97 1234567
        </dd>

        <dt>Credit Card Number</dt>
        <dd>
            <input type="text" name="credit_card_number" value="<?= $credit_card_number ?>">
        </dd>
        <dd class="<?= $isCreditNumberValid ? '' : 'not' ?>valid">
            This is required field. It should follow 16 digit format. For ex, 1234 1234 1234 1234
        </dd>

        <dt>Credit Card Expiry Date</dt>
        <dd>
            <input type="text" name="credit_card_expiry" value="<?= $credit_card_expiry ?>">
        </dd>
        <dd class="<?= $isCreditExpiryValid ? '' : 'not' ?>valid">
            This is required field. Date should be written in dd.MM.yyyy format. For ex, 07.03.2019
        </dd>

        <dt>Monthly Salary</dt>
        <dd>
            <input type="text" name="monthly_salary" value="<?= $monthly_salary ?>">
        </dd>
        <dd class="<?= $isMonthlySalaryValid ? '' : 'not' ?>valid">
            This is required field. It should be written in following format UZS 200,000.00
        </dd>

        <dt>Web Site URL</dt>
        <dd>
            <input type="text" name="url" value="<?= $url ?>">
        </dd>
        <dd class="<?= $isUrlValid ? '' : 'not' ?>valid">
            This is required eld. It should match URL format. For ex, http://github.com
        </dd>

        <dt>Overall GPA</dt>
        <dd>
            <input type="text" name="gpa" value="<?= $gpa ?>">
        </dd>
        <dd class="<?= $isGpaValid ? '' : 'not' ?>valid">
            This is required field. It should be a floating point number less than 4.5
        </dd>

    </dl>

    <div>
        <input type="submit" value="Register">
    </div>

</form>

</body>
</html>
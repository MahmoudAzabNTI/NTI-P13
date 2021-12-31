<?php
class AuthenticationRequest
{
    private $first_name;
    private $last_name;
    private $email;
    private $phone;
    private $password;
    private $confirm_password;
   
      /**
     * Get the value of first_name
     */
    public function getFirst_name()
    {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     *
     * @return  self
     */
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get the value of last_name
     */
    public function getLast_name()
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     *
     * @return  self
     */
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
    /**
     * Get the value of confirm_password
     */
    public function getConfirmPassword()
    {
        return $this->confirm_password;
    }

    /**
     * Set the value of confirm_password
     *
     * @return  self
     */
    public function setConfirmPassword($confirm_password)
    {
        $this->confirm_password = $confirm_password;

        return $this;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }
    public function validationFirstName()
    {
        $errors = [];
        if (empty($this->first_name)) {
            $errors['first_name-required'] = "<div class='alert alert-danger'>First Name Is Required</div>";
        }
        return $errors;
    }
    public function validationLastName()
    {
        $errors = [];
        if (empty($this->last_name)) {
            $errors['last_name-required'] = "<div class='alert alert-danger'>Last Name Is Required</div>";
        }
        return $errors;
    }
    public function validationEmail()
    {
        $errors = [];
        if (empty($this->email)) {
            $errors['email-required'] = "<div class='alert alert-danger'>Email Is Required</div>";
        } else {
            $pattern = '/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/';
            if (!preg_match($pattern, $this->email)) {
                $errors['email-pattern'] = "<div class='alert alert-danger'>Email is Invalid</div>";
            }
        }
        return $errors;
    }
    public function validationPhone()
    {
        $errors = [];
        if (empty($this->phone)) {
            $errors['phone-required'] = "<div class='alert alert-danger'>Phone Is Required</div>";
        }
        return $errors;
    }
    public function validationPassword()
    {
        $errors = [];
        if (empty($this->password)) {
            $errors['password-required'] = "<div class='alert alert-danger'>Password Is Required</div>";
        } else {
            $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/';
            if (!preg_match($pattern, $this->password)) {
                $errors['password-pattern'] = "<div class='alert alert-danger'>Minimum eight and maximum 20 characters, at least one uppercase letter, one lowercase letter, one number and one special character</div>";
            }
        }
        return $errors;
    }
    public function validationConfirmPassword()
    {
        $errors = [];
        if (empty($this->confirm_password)) {
            $errors['confirm_password-required'] = "<div class='alert alert-danger'>ConfirmPassword Is Required</div>";
        } else {
            $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/';
            if (!preg_match($pattern, $this->confirm_password)) {
                $errors['password-pattern'] = "<div class='alert alert-danger'>Minimum eight and maximum 20 characters, at least one uppercase letter, one lowercase letter, one number and one special character</div>";
            } else {
                if ($this->password != $this->confirm_password) {
                    $errors['password-matched'] = "<div class='alert alert-danger'>Password Not Matched ConfirmPassword</div>";
                }
            }
        }
        return $errors;
    }

  
}
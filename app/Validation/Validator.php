<?php 

namespace App\Validation;

class Validator
{

    private $data;
    private $errors;
    
    public function __construct(array $data)
    {
        $this->data = $data;
    }


    public function validate(array $rules)
    {
        foreach($rules as $name => $rulesArray){
            if(array_key_exists($name, $this->data)){
                foreach($rulesArray as $rule){
                    switch($rule){
                        case 'required':
                            $this->required($name, $this->data[$name]);
                            break;
                        case substr($rule, 0, 3) === 'min':
                            $this->min($name, $this->data[$name], $rule);
                        default:

                            break;
                    }
                }
            }
        }

        return  $this->getErrors();
    }

    private function required(string $name, string $value)
    {
        $value = trim($value);

        if(!isset($value) || is_null($value) || empty($value)){
            $this->errors[$name][] = "{$name} est incorrect.";
        }
    }

    private function min(string $name, string $value, string $rule)
    {
        preg_match_all('/(\d+)/', $rule, $matches);
        // var_dump((int)$matches[0][0]);die();
        $limit = (int) $matches[0][0];

        if(strlen($value) < $limit){
            $this->errors[$name][] = "{$name} doit comprendre un minimum de {$limit} caractères";
        }
    }

    private function getErrors()
    {
        return $this->errors;
    }
}
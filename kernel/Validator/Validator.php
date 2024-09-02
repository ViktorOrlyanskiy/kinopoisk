<?php

namespace App\Kernel\Validator;

class Validator
{
    private array $errors = [];

    public function errors()
    {
        return $this->errors;
    }

    public function validate(array $data, array $rules): bool
    {
        $this->errors = [];

        foreach ($rules as $key => $rule) {
            $rules = $rule;
            $keyErrors = [];

            foreach ($rules as $rule) {

                $rule = explode(':', $rule);

                $ruleName = $rule[0];
                $ruleValue = $rule[1] ?? null;

                $validateResult = $this->validateRule($key, $data[$key], $ruleName, $ruleValue);

                if (! empty($validateResult)) {
                    array_push($keyErrors, $this->validateRule($key, $data[$key], $ruleName, $ruleValue));
                }

                if (! empty($keyErrors)) {
                    $this->errors[$key] = $keyErrors;
                }

            }
        }

        return empty($this->errors);
    }

    private function validateRule(string $key, string $value, string $ruleName, ?string $ruleValue = null): ?string
    {
        switch ($ruleName) {
            case 'required':
                if (empty($value)) {
                    return "Поле $key обязательное!";
                }

                return null;

            case 'min':
                if (strlen($value) < $ruleValue) {

                    return "Поле $key должно быть длиннее $ruleValue!";
                }

                return null;

            case 'max':
                if (strlen($value) > $ruleValue) {
                    return "Поле $key должно быть короче $ruleValue!";
                }

                return null;

            default:
                return null;
        }
    }
}

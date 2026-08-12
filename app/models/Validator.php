<?php

namespace App;

class Validator
{
    protected array $errors = [];

    public function required(string $field, string $value, ?string $message = null): self
    {
        if (trim($value) === "") {
            $this->errors["$field"] = $message ?? ucfirst($field) . " is required";
        }

        return $this;
    }

    public function email(string $field, string $value, ?string $message = null): self
    {
        if (isset($this->errors[$field])) {
            return $this;
        }

        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = $message ?? "Please enter a valid email";
        }

        return $this;
    }

    public function min(string $field, string $value, int $length, ?string $message = null): self
    {
        if (isset($this->errors[$field])) {
            return $this;
        }

        if (strlen($value) < $length) {
            $this->errors[$field] = $message ?? ucfirst($field) . " must be at least {$length} characters";
        }

        return $this;
    }

    public function max(string $field, string $value, int $length, ?string $message = null): self
    {
        if (isset($this->errors[$field])) {
            return $this;
        }

        if (strlen($value) > $length) {
            $this->errors[$field] = $message ?? ucfirst($field) . " may not exceed {$length} characters";
        }

        return $this;
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function passes(): bool
    {
        return empty($this->errors());
    }
}
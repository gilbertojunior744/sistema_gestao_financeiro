<?php
class Validator {
    public static function validateRequired($field, $value) {
        if (empty($value)) {
            return "$field é obrigatório.";
        }
        return null;
    }

    public static function validateEmail($value) {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return "E-mail inválido.";
        }
        return null;
    }

    public static function validateCNPJ_CPF($value) {
        // Exemplo de validação simples (pode ser aprimorada para validar CNPJ e CPF corretamente)
        if (empty($value)) {
            return "CNPJ ou CPF é obrigatório.";
        }
        if (!preg_match('/^[0-9]{11,14}$/', $value)) {
            return "CNPJ ou CPF inválido.";
        }
        return null;
    }

    public static function validateTelefone($value) {
        if (empty($value)) {
            return "Telefone é obrigatório.";
        }
        if (!preg_match('/^\(\d{2}\)\s\d{4,5}-\d{4}$/', $value)) {
            return "Telefone inválido. Exemplo: (XX) XXXX-XXXX ou (XX) XXXXX-XXXX.";
        }
        return null;
    }

    public static function validateStatus($value) {
        if ($value !== 'A' && $value !== 'I') {
            return "Status inválido.";
        }
        return null;
    }
}

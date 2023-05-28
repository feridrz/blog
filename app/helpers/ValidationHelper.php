<?php
namespace App\helpers;
class ValidationHelper
{
    public static function validateUsername($username)
    {
        if (empty($username)) {
            return 'Username is required';
        } elseif (strlen($username) < 4 || strlen($username) > 20) {
            return 'Username must be between 4 and 20 characters';
        } elseif (!preg_match('/^[a-zA-Z0-9_-]+$/', $username)) {
            return 'Username can only contain letters, numbers, dashes, and underscores';
        } else {
            return '';
        }
    }

    public static function validateEmail($email)
    {
        if (empty($email)) {
            return 'Email is required';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 'Email is not valid';
        } else {
            return '';
        }
    }

    public static function validatePassword($password)
    {
        if (empty($password)) {
            return 'Password is required';
        } elseif (strlen($password) < 6) {
            return 'Password must be at least 6 characters';
        } else {
            return '';
        }
    }

    public static function validateImage($image)
    {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (empty($image)) {
            return 'Image is required';
        } else {
            $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
            if (!in_array($extension, $allowedExtensions)) {
                return 'Invalid image format. Allowed formats are: ' . implode(', ', $allowedExtensions);
            } elseif ($image['size'] > 1000000) {
                return 'Image size should not exceed 1MB';
            } else {
                return '';
            }
        }
    }
    public static function validateTitle($title)
    {
        if (empty($title)) {
            return 'Title is required';
        } elseif (strlen($title) > 255) {
            return 'Title must be less than 255';
        } else {
            return '';
        }
    }
    public static function validateDescription($description)
    {
        if (empty($description)) {
            return 'Description is required';
        } else {
            return '';
        }
    }
}
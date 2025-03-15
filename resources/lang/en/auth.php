<?php
return [
    'name' => [
        'required' => 'Name is required',
        'maxlength' => 'Name must not exceed 255 characters',
    ],
    'email' => [
        'required' => 'Email is required',
        'email' => 'Please enter a valid email address',
        'maxlength' => 'Email must not exceed 255 characters',
        'remote' => 'Email already exists',
    ],
    'password' => [
        'required' => 'Password is required',
        'minlength' => 'Password must be at least 8 characters',
    ],
    'password_confirmation' => [
        'required' => 'Password confirmation is required',
        'equalTo' => 'Passwords do not match',
    ],
    'phone' => [
        'required' => 'Phone number is required',
        'maxlength' => 'Phone number must not exceed 15 characters',
    ],
    'company_name' => [
        'required' => 'Company name is required',
        'maxlength' => 'Company name must not exceed 255 characters',
    ],
    'experience_years' => [
        'required' => 'Experience years are required',
        'min' => 'Experience years must be at least 0',
    ],
    'consultation_fee' => [
        'required' => 'Consultation fee is required',
        'min' => 'Consultation fee must be at least 0',
    ],
    'cv_path' => [
        'required' => 'Please upload your CV',
        'extension' => 'The CV must be in PDF, DOC, or DOCX format',
    ],
];


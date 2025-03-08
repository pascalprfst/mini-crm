<?php

namespace App;

enum InputType: string
{
    case TEXT = 'text';
    case DATE = 'date';
    case URL = 'url';
    case EMAIL = 'email';
    case LONGTEXT = 'longtext';
}

<?php

namespace App\Enums;

enum ConstantEnum: string
{
    // Groups
    case GROUP_GENERAL = 'general';
    case GROUP_USER = 'user';
    case GROUP_EMPLOYEE = 'employee';

    // Keys
    case KEY_STATUS = 'status';
    case KEY_GENDER = 'gender';
    case KEY_MARITAL_STATUS = 'marital_status';
    case KEY_GL_CLASS = 'gl_class';
    case KEY_COST_CENTER = 'cost_center';
    case KEY_EMP_STATUS = 'emp_status';
    case KEY_LEAVING_REASON = 'leaving_reason';
}

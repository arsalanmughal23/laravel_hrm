<?php

namespace App\Enums;

enum ConstantEnum: string
{
    // Groups
    case GroupGeneral = 'general';
    case GroupUser = 'user';
    case GroupEmployee = 'employee';

    // Keys
    case KeyStatus = 'status';
    case KeyGender = 'gender';
    case KeyMartialStatus = 'marital_status';
    case KeyGLClass = 'gl_class';
    case KeyCostCenter = 'cost_center';
    case KeyEmpStatus = 'emp_status';
    case KeyLeavingReason = 'leaving_reason';
}

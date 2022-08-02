<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Asset
 *
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $purchase_date
 * @property string $purchase_from
 * @property string|null $manufacturer
 * @property string|null $model
 * @property string|null $serial_number
 * @property string $supplier
 * @property string|null $condition
 * @property int|null $warranty
 * @property string $value
 * @property string|null $description
 * @property string|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Asset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Asset newQuery()
 * @method static \Illuminate\Database\Query\Builder|Asset onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Asset query()
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereCondition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereManufacturer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset wherePurchaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset wherePurchaseFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereSerialNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereSupplier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereWarranty($value)
 * @method static \Illuminate\Database\Query\Builder|Asset withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Asset withoutTrashed()
 */
	class Asset extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Client
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $phone
 * @property string $company
 * @property string|null $avatar
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ClientFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client newQuery()
 * @method static \Illuminate\Database\Query\Builder|Client onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Client withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Client withoutTrashed()
 */
	class Client extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Contact
 *
 * @property int $id
 * @property string $name
 * @property string|null $email
 * @property string $number
 * @property string|null $status
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereUpdatedAt($value)
 */
	class Contact extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Department
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\DepartmentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Department query()
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereUpdatedAt($value)
 */
	class Department extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Designation
 *
 * @property int $id
 * @property string $name
 * @property int|null $department_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Department|null $department
 * @method static \Database\Factories\DesignationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Designation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Designation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Designation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Designation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Designation whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Designation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Designation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Designation whereUpdatedAt($value)
 */
	class Designation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Employee
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string|null $phone
 * @property int|null $department_id
 * @property int|null $designation_id
 * @property string|null $company
 * @property string|null $avatar
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $uuid
 * @property-read \App\Models\Department|null $department
 * @property-read \App\Models\Designation|null $designation
 * @method static \Database\Factories\EmployeeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereDesignationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUuid($value)
 */
	class Employee extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EmployeeAttendance
 *
 * @property int $id
 * @property int|null $employee_id
 * @property string|null $checkin
 * @property string|null $checkout
 * @property string|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Employee|null $employee
 * @method static \Database\Factories\EmployeeAttendanceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeAttendance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeAttendance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeAttendance query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeAttendance whereCheckin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeAttendance whereCheckout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeAttendance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeAttendance whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeAttendance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeAttendance whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeAttendance whereUpdatedAt($value)
 */
	class EmployeeAttendance extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Expense
 *
 * @property int $id
 * @property string $name
 * @property string|null $purchased_from
 * @property string|null $purchased_date
 * @property int|null $user_id
 * @property string|null $payment_method
 * @property string $amount
 * @property string|null $file
 * @property string|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ExpenseFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Expense newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Expense query()
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense wherePurchasedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense wherePurchasedFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereUserId($value)
 */
	class Expense extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Goal
 *
 * @property int $id
 * @property int|null $goal_type_id
 * @property string $subject
 * @property string $target
 * @property string $start_date
 * @property string $end_date
 * @property string|null $description
 * @property string $status
 * @property string $progress
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\GoalType|null $goal_type
 * @method static \Illuminate\Database\Eloquent\Builder|Goal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Goal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Goal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereGoalTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereProgress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereTarget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereUpdatedAt($value)
 */
	class Goal extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\GoalType
 *
 * @property int $id
 * @property string $type
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GoalType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GoalType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GoalType query()
 * @method static \Illuminate\Database\Eloquent\Builder|GoalType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GoalType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GoalType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GoalType whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GoalType whereUpdatedAt($value)
 */
	class GoalType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Holiday
 *
 * @property int $id
 * @property string $name
 * @property string $holiday_date
 * @property int $completed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Holiday newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Holiday newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Holiday query()
 * @method static \Illuminate\Database\Eloquent\Builder|Holiday whereCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Holiday whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Holiday whereHolidayDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Holiday whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Holiday whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Holiday whereUpdatedAt($value)
 */
	class Holiday extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Invoice
 *
 * @property int $id
 * @property string|null $inv_id
 * @property int|null $client_id
 * @property int|null $project_id
 * @property int|null $tax_id
 * @property string|null $email
 * @property string|null $client_address
 * @property string|null $billing_address
 * @property string|null $invoice_date
 * @property string|null $due_date
 * @property array|null $items
 * @property string|null $note
 * @property string|null $discount
 * @property string|null $total
 * @property string|null $status
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client|null $client
 * @property-read \App\Models\Project|null $project
 * @property-read \App\Models\Tax|null $tax
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice newQuery()
 * @method static \Illuminate\Database\Query\Builder|Invoice onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereBillingAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereClientAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereInvId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereInvoiceDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereItems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereTaxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Invoice withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Invoice withoutTrashed()
 */
	class Invoice extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Job
 *
 * @property int $id
 * @property string $title
 * @property int|null $department_id
 * @property string $location
 * @property int $vacancies
 * @property int $experience
 * @property int|null $age
 * @property string|null $salary_from
 * @property string|null $salary_to
 * @property string $type
 * @property string $status
 * @property string $start_date
 * @property string $expire_date
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\JobApplicant[] $JobApplicants
 * @property-read int|null $job_applicants_count
 * @property-read \App\Models\Department|null $department
 * @method static \Illuminate\Database\Eloquent\Builder|Job newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Job newQuery()
 * @method static \Illuminate\Database\Query\Builder|Job onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Job query()
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereExpireDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereSalaryFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereSalaryTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereVacancies($value)
 * @method static \Illuminate\Database\Query\Builder|Job withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Job withoutTrashed()
 */
	class Job extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\JobApplicant
 *
 * @property int $id
 * @property int|null $job_id
 * @property string $name
 * @property string $email
 * @property string $cv
 * @property string|null $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Job|null $Job
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplicant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplicant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplicant query()
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplicant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplicant whereCv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplicant whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplicant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplicant whereJobId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplicant whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplicant whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplicant whereUpdatedAt($value)
 */
	class JobApplicant extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Leave
 *
 * @property int $id
 * @property int|null $employee_id
 * @property int|null $leave_type_id
 * @property string $from
 * @property string $to
 * @property string $reason
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Employee|null $employee
 * @property-read \App\Models\LeaveType|null $leaveType
 * @method static \Database\Factories\LeaveFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Leave newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Leave newQuery()
 * @method static \Illuminate\Database\Query\Builder|Leave onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Leave query()
 * @method static \Illuminate\Database\Eloquent\Builder|Leave whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leave whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leave whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leave whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leave whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leave whereLeaveTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leave whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leave whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leave whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leave whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Leave withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Leave withoutTrashed()
 */
	class Leave extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LeaveType
 *
 * @property int $id
 * @property string $type
 * @property string $days
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\LeaveTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType query()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType whereDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType whereUpdatedAt($value)
 */
	class LeaveType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Overtime
 *
 * @property int $id
 * @property int|null $employee_id
 * @property string $overtime_date
 * @property string $hours
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Employee|null $employee
 * @method static \Database\Factories\OvertimeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Overtime newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Overtime newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Overtime query()
 * @method static \Illuminate\Database\Eloquent\Builder|Overtime whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Overtime whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Overtime whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Overtime whereHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Overtime whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Overtime whereOvertimeDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Overtime whereUpdatedAt($value)
 */
	class Overtime extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Policy
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int|null $department_id
 * @property string|null $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Department|null $department
 * @method static \Illuminate\Database\Eloquent\Builder|Policy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Policy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Policy query()
 * @method static \Illuminate\Database\Eloquent\Builder|Policy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Policy whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Policy whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Policy whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Policy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Policy whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Policy whereUpdatedAt($value)
 */
	class Policy extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Project
 *
 * @property int $id
 * @property string $name
 * @property int|null $client_id
 * @property string $start_date
 * @property string $end_date
 * @property string $rate
 * @property string $rate_type
 * @property string $priority
 * @property \App\Models\Employee|null $leader
 * @property array $team
 * @property string|null $description
 * @property array|null $files
 * @property string|null $progress
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client|null $client
 * @method static \Database\Factories\ProjectFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereFiles($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereLeader($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereProgress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereRateType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereTeam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 */
	class Project extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProvidentFund
 *
 * @property int $id
 * @property int|null $employee_id
 * @property string|null $type
 * @property string|null $employee_share_amount
 * @property string|null $org_share_amount
 * @property string|null $employee_share_percent
 * @property string|null $org_share_percent
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Employee|null $employee
 * @method static \Database\Factories\ProvidentFundFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ProvidentFund newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProvidentFund newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProvidentFund query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProvidentFund whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProvidentFund whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProvidentFund whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProvidentFund whereEmployeeShareAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProvidentFund whereEmployeeSharePercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProvidentFund whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProvidentFund whereOrgShareAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProvidentFund whereOrgSharePercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProvidentFund whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProvidentFund whereUpdatedAt($value)
 */
	class ProvidentFund extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tax
 *
 * @property int $id
 * @property string $name
 * @property string|null $percentage
 * @property string|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TaxFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Tax newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tax newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tax query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tax whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tax whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tax whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tax wherePercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tax whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tax whereUpdatedAt($value)
 */
	class Tax extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Ticket
 *
 * @property int $id
 * @property string $subject
 * @property string|null $tk_id
 * @property int|null $employee_id
 * @property int|null $client_id
 * @property string|null $priority
 * @property string|null $cc
 * @property array|null $followers
 * @property array|null $files
 * @property string|null $description
 * @property string|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client|null $client
 * @property-read \App\Models\Employee|null $employee
 * @method static \Database\Factories\TicketFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereCc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereFiles($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereFollowers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereTkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereUpdatedAt($value)
 */
	class Ticket extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $username
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $avatar
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 */
	class User extends \Eloquent {}
}


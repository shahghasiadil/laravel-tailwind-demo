<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\User;
use App\Models\UserDepartmentShift;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserDepartmentShift>
 */
class UserDepartmentShiftFactory extends Factory
{
    protected $model = UserDepartmentShift::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $startAt = fake()->dateTimeThisMonth;
        $endAt = fake()->dateTimeThisMonth;

        return [
            'user_id' => User::all()->random()->first(),
            'department_id' => Department::all()->random()->first(),
            'start_at' => $startAt,
            'end_at' => $endAt,
            'weekdaystime' => json_encode($this->generateWeeklyCalendar()),
            'created_by' => User::all()->random()->first(),
            'updated_by' => User::all()->random()->first(),
            'created_at' => $startAt,
            'updated_at' => $startAt,
        ];
    }

    /**
     * Generate a sample weekly calendar.
     *
     * @return array
     */
    private function generateWeeklyCalendar()
    {
        return [
            'Monday' => ['start' => '09:00', 'end' => '17:00'],
            'Tuesday' => ['start' => '09:00', 'end' => '17:00'],
            'Wednesday' => ['start' => '09:00', 'end' => '17:00'],
            'Thursday' => ['start' => '09:00', 'end' => '17:00'],
            'Friday' => ['start' => '09:00', 'end' => '17:00'],
            'Saturday' => ['start' => '10:00', 'end' => '14:00'],
            'Sunday' => ['start' => '10:00', 'end' => '14:00'],
        ];
    }

}

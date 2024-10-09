<?php

namespace Database\Seeders;

use App\Models\student;
use App\Models\subject;
use App\Models\teacher;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'guest',
            'email' => 'test@example.com',
            'password'=>'123'
        ]);

        subject::create([
            'subject'=>'damn'
        ]);

        teacher::create([
            't_name'=>'cctv',
            'age'=>'20',
            'gender'=>'Male',
            'phone'=>'111111111',
            'subject_id'=>'1'
        ]);

        teacher::create([
            't_name'=>'kaiyi',
            'age'=>'20',
            'gender'=>'Male',
            'phone'=>'222222222',
            'subject_id'=>'1'
        ]);

        student::create([
            's_name'=>'dennis',
            'age'=>'19',
            'gender'=>'Male',
            'phone'=>'1234567890',
            'subject_id'=>'1',
            'teacher_id'=>'1'
        ]);

        student::create([
            's_name'=>'chongyang',
            'age'=>'19',
            'gender'=>'Male',
            'phone'=>'0123456789',
            'subject_id'=>'1',
            'teacher_id'=>'2'
        ]);
    }
}

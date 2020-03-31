<?php


use App\Domain\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    protected $table = 'users';

    public function run(Faker $faker)
    {
        DB::table($this->table)->insert([
            'username' => 'admin',
            'password' => '$2y$10$.mfnyJTDGKrNx599Z4/jwefKPhl.NN8vDPqtsB5sUgWLXtHlf3vM2', // admin
            'email' => 'admin@gmail.com',
            'name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'profile' => User::ADMIN_PROFILE,
            'is_active' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        for ($i = 0; $i < 9; $i++) {
            DB::table($this->table)->insert([
                'username' => $faker->userName,
                'password' => '$2y$10$WUmHOPlnW7tLd9BaSKR0sefhcszdnTAwRcvLzdVQV6eCmSlylffjm', // 1234
                'email' => $faker->email,
                'name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'profile' => User::USER_PROFILE,
                'is_active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

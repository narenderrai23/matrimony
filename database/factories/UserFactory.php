<?php

namespace Database\Factories;

use App\Faker\IndianNames;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $casteArray = [
            "Brahmin",
            "Kshatriya",
            "Vaishya",
            "Shudra",
            "Kayastha",
            "Rajput",
            "Jat",
            "Yadav",
            "Kurmi",
            "Nair",
            "Maratha",
            "Bunt",
            "Lingayat",
            "Reddy",
            "Kamma",
            "Goud",
            "Patel",
            "Gujjar",
            "Bania",
            "Agarwal",
            "Koli",
            "Lohana",
            "Meena",
            "Balija",
            "Naidu",
            "Chettiar",
            "Nadar",
            "Pandey",
            "Teli",
            "Thakur",
            "Namboodiri",
            "Iyer",
            "Iyengar",
            "Vanniyar",
            "Devanga",
            "Ezhava",
            "Thiyya",
            "Saini",
            "Khatri",
            "Arora",
            "Ahir",
            "Mali",
            "Ravidas",
            "Chamar",
            "Dhobi",
            "Banjara",
            "Meo",
            "Lodha",
            "Prajapati",
            "Sahu",
            "Kushwaha",
            "Gond",
            "Munda",
            "Santhal",
            "Oraon",
            "Bhuiya",
            "Bhil",
            "Mahishya",
            "Kayal",
            "Pillai",
            "Mudaliar",
            "Gounder",
            "Thiyya",
            "Velama",
            "Kapus",
            "Vokkaliga",
            "Khandayat",
            "Rajaka",
            "Pasi",
            "Mallah",
            "Kaibarta",
            "Kharwar",
            "Baiga",
            "Korwa",
            "Birhor",
            "Bhuiya",
            "Kanjar",
            "Pardhi",
            "Nayak",
            "Solanki",
            "Chauhan",
            "Soni",
            "Suthar",
            "Rawat",
            "Pal",
            "Raigar",
            "Charan",
            "Dhangar",
            "Khatik",
            "Ahirwar",
            "Khateek",
            "Khushwaha"
        ];
        $this->faker->addProvider(new IndianNames($this->faker));

        return [
            'name' => $this->faker->indianName(),
            'email' => $this->faker->unique()->safeEmail,
            'age' => $this->faker->numberBetween(18, 80),
            'gender' => $this->faker->randomElement(['male', 'female', 'other']),
            'caste' => $this->faker->randomElement($casteArray),
            'address' => $this->faker->address,
            'profile_picture' => $this->faker->imageUrl(400, 400, 'people'),
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Default password
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

public function run(): void
{
    $this->call([
        CategorySeeder::class,
        TaskSeeder::class,
    ]);
}



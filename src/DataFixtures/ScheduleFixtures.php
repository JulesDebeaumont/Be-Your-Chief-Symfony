<?php

namespace App\DataFixtures;

use App\Factory\ScheduleFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ScheduleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $schedules = json_decode(file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'Schedule.json'), true);

        foreach ($schedules as $schedule) {
            ScheduleFactory::new()->create($schedule);
        }
    }
}

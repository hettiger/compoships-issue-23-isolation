<?php

namespace Tests\feature;

use App\ModelA;
use App\ModelB;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ModelATest extends TestCase
{
    use DatabaseMigrations;

    public function testFactoryImplementation()
    {
        factory(ModelA::class)
            ->create()
            ->each(function (ModelA $modelA) {
                $modelA->modelB()->save(factory(ModelB::class)->make());
            });

        $this->assertSameCompositeKeys();
    }

    public function testWorkaround()
    {
        factory(ModelA::class)->create();

        $modelA = ModelA::firstOrFail();

        $modelA->modelB()->save(
            factory(ModelB::class)->make()
        );

        $this->assertSameCompositeKeys();
    }

    private function assertSameCompositeKeys()
    {
        $modelA = ModelA::firstOrFail();
        $modelB = ModelB::firstOrFail();

        $this->assertSame(
            $modelA->get(['event_id', 'event_date'])->toArray(),
            $modelB->get(['event_id', 'event_date'])->toArray()
        );
    }
}

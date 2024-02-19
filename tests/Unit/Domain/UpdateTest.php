<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain;

use LibKml\Domain\Feature\Placemark;
use LibKml\Domain\Update;
use PHPUnit\Framework\TestCase;

final class UpdateTest extends TestCase
{
    private Update $update;

    protected function setUp(): void
    {
        $this->update = new Update();
    }

    public function testTargetHrefField(): void
    {
        $targetHref = 'http://www.google.com';

        $this->update->setTargetHref($targetHref);

        self::assertEquals($targetHref, $this->update->getTargetHref());
    }

    public function testChangeField(): void
    {
        $change1 = new Placemark();
        $change2 = new Placemark();
        $changes = [$change1, $change2];

        $this->update->setChange($changes);

        self::assertCount(count($changes), $this->update->getChange());
        self::assertContains($change1, $this->update->getChange());
        self::assertContains($change2, $this->update->getChange());
    }

    public function testCreateField(): void
    {
        $create1 = new Placemark();
        $create2 = new Placemark();
        $creates = [$create1, $create2];

        $this->update->setCreate($creates);

        self::assertCount(count($creates), $this->update->getCreate());
        self::assertContains($create1, $this->update->getCreate());
        self::assertContains($create2, $this->update->getCreate());
    }

    public function testDeleteField(): void
    {
        $delete1 = new Placemark();
        $delete2 = new Placemark();
        $deletes = [$delete1, $delete2];

        $this->update->setDelete($deletes);

        self::assertCount(count($deletes), $this->update->getDelete());
        self::assertContains($delete1, $this->update->getDelete());
        self::assertContains($delete2, $this->update->getDelete());
    }
}

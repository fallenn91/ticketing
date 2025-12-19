<?php

namespace Tests\Unit;

use App\View\TicketPresentation;
use PHPUnit\Framework\TestCase;

class TicketPresentationTest extends TestCase
{
    public function test_get_status_config_returns_correct_styles(): void
    {
        $abiertoConfig = TicketPresentation::getStatusConfig('abierto');
        $this->assertIsArray($abiertoConfig);
        $this->assertArrayHasKey('base', $abiertoConfig);
        $this->assertArrayHasKey('hover', $abiertoConfig);
        $this->assertArrayHasKey('icon', $abiertoConfig);
        $this->assertStringContainsString('bg-blue-50', $abiertoConfig['base']);
        $this->assertStringContainsString('text-blue-700', $abiertoConfig['base']);

        $enProcesoConfig = TicketPresentation::getStatusConfig('en_proceso');
        $this->assertIsArray($enProcesoConfig);
        $this->assertArrayHasKey('base', $enProcesoConfig);
        $this->assertArrayHasKey('hover', $enProcesoConfig);
        $this->assertArrayHasKey('icon', $enProcesoConfig);
        $this->assertStringContainsString('bg-amber-50', $enProcesoConfig['base']);
        $this->assertStringContainsString('text-amber-700', $enProcesoConfig['base']);

        $resueltoConfig = TicketPresentation::getStatusConfig('resuelto');
        $this->assertIsArray($resueltoConfig);
        $this->assertArrayHasKey('base', $resueltoConfig);
        $this->assertArrayHasKey('hover', $resueltoConfig);
        $this->assertArrayHasKey('icon', $resueltoConfig);
        $this->assertStringContainsString('bg-emerald-50', $resueltoConfig['base']);
        $this->assertStringContainsString('text-emerald-700', $resueltoConfig['base']);

        $cerradoConfig = TicketPresentation::getStatusConfig('cerrado');
        $this->assertIsArray($cerradoConfig);
        $this->assertArrayHasKey('base', $cerradoConfig);
        $this->assertArrayHasKey('hover', $cerradoConfig);
        $this->assertArrayHasKey('icon', $cerradoConfig);
        $this->assertStringContainsString('bg-slate-100', $cerradoConfig['base']);
        $this->assertStringContainsString('text-slate-600', $cerradoConfig['base']);
    }

    public function test_get_status_config_returns_default_for_unknown(): void
    {
        $unknownConfig = TicketPresentation::getStatusConfig('unknown_status');
        $defaultConfig = TicketPresentation::getStatusConfig('cerrado');

        $this->assertIsArray($unknownConfig);
        $this->assertEquals($defaultConfig, $unknownConfig);
        $this->assertArrayHasKey('base', $unknownConfig);
        $this->assertArrayHasKey('hover', $unknownConfig);
        $this->assertArrayHasKey('icon', $unknownConfig);
        $this->assertStringContainsString('bg-slate-100', $unknownConfig['base']);
    }

    public function test_get_priority_config_returns_correct_styles(): void
    {
        $bajaConfig = TicketPresentation::getPriorityConfig('baja');
        $this->assertIsArray($bajaConfig);
        $this->assertArrayHasKey('text', $bajaConfig);
        $this->assertArrayHasKey('bg', $bajaConfig);
        $this->assertArrayHasKey('hover', $bajaConfig);
        $this->assertArrayHasKey('bars', $bajaConfig);
        $this->assertStringContainsString('text-slate-500', $bajaConfig['text']);
        $this->assertStringContainsString('bg-slate-50', $bajaConfig['bg']);
        $this->assertEquals(1, $bajaConfig['bars']);

        $mediaConfig = TicketPresentation::getPriorityConfig('media');
        $this->assertIsArray($mediaConfig);
        $this->assertArrayHasKey('text', $mediaConfig);
        $this->assertArrayHasKey('bg', $mediaConfig);
        $this->assertArrayHasKey('hover', $mediaConfig);
        $this->assertArrayHasKey('bars', $mediaConfig);
        $this->assertStringContainsString('text-blue-500', $mediaConfig['text']);
        $this->assertStringContainsString('bg-blue-50', $mediaConfig['bg']);
        $this->assertEquals(2, $mediaConfig['bars']);

        $altaConfig = TicketPresentation::getPriorityConfig('alta');
        $this->assertIsArray($altaConfig);
        $this->assertArrayHasKey('text', $altaConfig);
        $this->assertArrayHasKey('bg', $altaConfig);
        $this->assertArrayHasKey('hover', $altaConfig);
        $this->assertArrayHasKey('bars', $altaConfig);
        $this->assertStringContainsString('text-orange-500', $altaConfig['text']);
        $this->assertStringContainsString('bg-orange-50', $altaConfig['bg']);
        $this->assertEquals(3, $altaConfig['bars']);

        $criticaConfig = TicketPresentation::getPriorityConfig('critica');
        $this->assertIsArray($criticaConfig);
        $this->assertArrayHasKey('text', $criticaConfig);
        $this->assertArrayHasKey('bg', $criticaConfig);
        $this->assertArrayHasKey('hover', $criticaConfig);
        $this->assertArrayHasKey('bars', $criticaConfig);
        $this->assertStringContainsString('text-red-500', $criticaConfig['text']);
        $this->assertStringContainsString('bg-red-50', $criticaConfig['bg']);
        $this->assertEquals(4, $criticaConfig['bars']);
    }

    public function test_get_priority_config_returns_default_for_unknown(): void
    {
        $unknownConfig = TicketPresentation::getPriorityConfig('unknown_priority');
        $defaultConfig = TicketPresentation::getPriorityConfig('baja');

        $this->assertIsArray($unknownConfig);
        $this->assertEquals($defaultConfig, $unknownConfig);
        $this->assertArrayHasKey('text', $unknownConfig);
        $this->assertArrayHasKey('bg', $unknownConfig);
        $this->assertArrayHasKey('hover', $unknownConfig);
        $this->assertArrayHasKey('bars', $unknownConfig);
        $this->assertStringContainsString('text-slate-500', $unknownConfig['text']);
        $this->assertEquals(1, $unknownConfig['bars']);
    }

    public function test_get_type_config_returns_correct_styles(): void
    {
        $incidenciaConfig = TicketPresentation::getTypeConfig('incidencia');
        $this->assertIsArray($incidenciaConfig);
        $this->assertArrayHasKey('base', $incidenciaConfig);
        $this->assertArrayHasKey('icon', $incidenciaConfig);
        $this->assertStringContainsString('bg-red-50', $incidenciaConfig['base']);
        $this->assertStringContainsString('text-red-700', $incidenciaConfig['base']);

        $peticionConfig = TicketPresentation::getTypeConfig('peticion');
        $this->assertIsArray($peticionConfig);
        $this->assertArrayHasKey('base', $peticionConfig);
        $this->assertArrayHasKey('icon', $peticionConfig);
        $this->assertStringContainsString('bg-violet-50', $peticionConfig['base']);
        $this->assertStringContainsString('text-violet-700', $peticionConfig['base']);
    }

    public function test_get_type_config_returns_default_for_unknown(): void
    {
        $unknownConfig = TicketPresentation::getTypeConfig('unknown_type');
        $defaultConfig = TicketPresentation::getTypeConfig('incidencia');

        $this->assertIsArray($unknownConfig);
        $this->assertEquals($defaultConfig, $unknownConfig);
        $this->assertArrayHasKey('base', $unknownConfig);
        $this->assertArrayHasKey('icon', $unknownConfig);
        $this->assertStringContainsString('bg-red-50', $unknownConfig['base']);
        $this->assertStringContainsString('text-red-700', $unknownConfig['base']);
    }
}

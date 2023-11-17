<?php

namespace Database\Factories\Document;

use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    protected $model = Document::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement($this->getDocumentName())
        ];
    }

    private function getDocumentName(): array
    {
        return [
            'Spectrum of Innovation',
            'Echoes of Progress',
            'Navigating Paradigms',
            'Beyond Horizons',
            'Insights Unveiled',
            'Redefining Norms',
            'Harmony in Chaos',
            'Journey to Discovery',
            'Fusion of Ideas',
            'Uncharted Realms',
            'Metamorphosis Chronicles',
            'Quest for Harmony',
            'Evolving Dynamics',
            'Blueprints of Tomorrow',
            'Whispers of Change',
            'Exploring Frontiers',
            'Shifting Perspectives',
            'Mosaic of Innovation',
            'Reflections in Flux',
            'Voyage of Evolution',
            'Pioneering Vistas',
            'Catalysts of Transformation',
            'Eclipsing Boundaries',
            'Tales of Progression',
            'Reimagining Realities',
            'Innovative Symphony',
            'Threshold of Advancement',
            'Ripples of Change',
            'Emerging Horizons',
            'Dawn of Ingenuity',
            'Ethereal Revolutions',
            'Chapters of Innovation',
            'Shaping Tomorrows Landscape',
            'Flourishing Frontiers',
            'Evolving Narratives',
            'Odyssey of Breakthroughs',
            'Vanguard Journeys',
            'Resonance of Change',
            'Dynamic Infusion',
            'Trailblazing Transformation',
            'Advent of Progress',
            'Revelations in Motion',
            'Quest for Progress',
            'Reimagined Journeys'
        ];
    }
}
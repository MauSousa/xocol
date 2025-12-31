<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ServiceService
{
    public function list()
    {
        return Service::with('projects')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();
    }

    public function create(array $data, array $projectIds = []): Service
    {
        $payload = $this->normalizePayload($data);

        $service = Service::create($payload);
        $service->projects()->sync($projectIds);

        return $service;
    }

    public function update(Service $service, array $data, array $projectIds = []): Service
    {
        $payload = $this->normalizePayload($data, $service);

        $service->update($payload);
        $service->projects()->sync($projectIds);

        return $service;
    }

    public function delete(Service $service): void
    {
        $service->projects()->detach();
        $service->delete();
    }

    private function normalizePayload(array $data, ?Service $service = null): array
    {
        $payload = Arr::only($data, [
            'name',
            'slug',
            'description',
            'icon',
            'is_active',
            'sort_order',
        ]);

        if (empty($payload['slug']) && !empty($payload['name'])) {
            $payload['slug'] = Str::slug($payload['name']);
        }

        if ($service && empty($payload['slug']) && $service->slug) {
            $payload['slug'] = $service->slug;
        }

        return $payload;
    }
}

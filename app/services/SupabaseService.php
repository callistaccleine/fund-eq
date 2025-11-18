<?php

declare(strict_types=1);

namespace App\Services;

use RuntimeException;

class SupabaseService
{
    private string $restUrl;
    private string $key;
    private string $taskTable;

    public function __construct(array $config)
    {
        $this->restUrl = rtrim($config['url'] ?? '', '/');
        $this->key = $config['key'] ?? '';
        $this->taskTable = $config['table'] ?? 'tasks';
    }

    public function fetchTasks(): array
    {
        $response = $this->request('GET');

        return json_decode($response, true) ?? [];
    }

    public function createTask(array $task): array
    {
        $payload = json_encode([$task]);
        $response = $this->request('POST', $payload);

        return json_decode($response, true)[0] ?? $task;
    }

    public function updateTask(int $id, array $task): bool
    {
        $this->request('PATCH', json_encode($task), [
            'Prefer: return=minimal',
            'Content-Profile: ' . $this->taskTable,
        ], "?id=eq.$id");

        return true;
    }

    public function deleteTask(int $id): bool
    {
        $this->request('DELETE', null, ['Prefer: return=minimal'], "?id=eq.$id");

        return true;
    }

    private function request(string $method, ?string $body = null, array $extraHeaders = [], string $query = ''): string
    {
        $endpoint = "{$this->restUrl}/rest/v1/{$this->taskTable}{$query}";
        $ch = curl_init($endpoint);

        $headers = array_merge([
            "apikey: {$this->key}",
            "Authorization: Bearer {$this->key}",
            'Content-Type: application/json',
            'Accept: application/json',
        ], $extraHeaders);

        curl_setopt_array($ch, [
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers,
        ]);

        if ($body !== null) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        }

        $response = curl_exec($ch);
        $error = curl_error($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($response === false || $status >= 400) {
            $message = $error ?: $response;
            throw new RuntimeException("Supabase request failed: {$message}");
        }

        return $response ?: '[]';
    }
}

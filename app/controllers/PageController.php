<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\SupabaseService;
use RuntimeException;

class PageController
{
    private SupabaseService $supabase;

    public function __construct(SupabaseService $supabase)
    {
        $this->supabase = $supabase;
    }

    public function home(): void
    {
        $pillars = [
            'Investment Management' => 'Fund structuring, portfolio oversight, and compliance guardrails live in the Investment Manager entity.',
            'Technology Platform' => 'Digital onboarding, investor comms, and reporting sit within the Technology entity for rapid iteration.',
            'Fund Promotion' => 'Capital raising and partnerships operate in the Promotion entity with clear Chinese walls.',
            'AFSL + Governance' => 'A standalone responsible entity holds the AFSL and drives governance, risk, and insurance programs.',
        ];

        $this->render('home', [
            'pageTitle' => 'Fund EQ | Institutional Fund Infrastructure',
            'pillars' => $pillars,
        ]);
    }

    public function team(): void
    {
        $team = [
            [
                'name' => 'Ava Sinclair',
                'role' => 'Chief Investment Officer',
                'bio' => 'Co-founded Fund EQ after 15 years of running multi-asset strategies for sovereign wealth clients.',
            ],
            [
                'name' => 'Marcus Reid',
                'role' => 'Chief Technology Officer',
                'bio' => 'Built enterprise capital-raising platforms; leads integrations, Supabase data services, and cybersecurity.',
            ],
            [
                'name' => 'Priya Koh',
                'role' => 'Head of Promotion',
                'bio' => 'Guides distribution across wholesale channels and coordinates campaign compliance with AFSL obligations.',
            ],
            [
                'name' => 'Noah Everett',
                'role' => 'Responsible Manager',
                'bio' => 'Directs the AFSL entity, chairs the risk committee, and manages the whole-of-fund insurance program.',
            ],
        ];

        $this->render('team', [
            'pageTitle' => 'Fund EQ | Leadership',
            'team' => $team,
        ]);
    }

    public function tasks(): void
    {
        $message = null;
        $status = 'success';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'] ?? '';
            try {
                if ($action === 'create') {
                    $this->supabase->createTask([
                        'title' => trim($_POST['title'] ?? ''),
                        'owner' => trim($_POST['owner'] ?? ''),
                        'status' => trim($_POST['status'] ?? ''),
                        'start_date' => $_POST['start_date'] ?? null,
                    ]);
                    $message = 'Task created';
                } elseif ($action === 'update') {
                    $this->supabase->updateTask(
                        (int) $_POST['task_id'],
                        [
                            'title' => trim($_POST['title'] ?? ''),
                            'owner' => trim($_POST['owner'] ?? ''),
                            'status' => trim($_POST['status'] ?? ''),
                            'start_date' => $_POST['start_date'] ?? null,
                        ]
                    );
                    $message = 'Task updated';
                } elseif ($action === 'delete') {
                    $this->supabase->deleteTask((int) $_POST['task_id']);
                    $message = 'Task deleted';
                }
            } catch (RuntimeException $exception) {
                $message = $exception->getMessage();
                $status = 'danger';
            }
        }

        $tasks = [];
        try {
            $tasks = $this->supabase->fetchTasks();
        } catch (RuntimeException $exception) {
            $message = $exception->getMessage();
            $status = 'danger';
        }

        $this->render('tasks', [
            'pageTitle' => 'Fund EQ | Transition Tasks',
            'tasks' => $tasks,
            'message' => $message,
            'messageStatus' => $status,
        ]);
    }

    private function render(string $view, array $data = []): void
    {
        extract($data);
        $layoutPath = __DIR__ . '/../views/layout';
        $viewPath = __DIR__ . '/../views/' . $view . '.php';

        include $layoutPath . '/header.php';
        include $viewPath;
        include $layoutPath . '/footer.php';
    }
}
